<?php
// app/Http/Controllers/Api/FormSubmissionController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FormSubmission;
use App\Services\WhatsAppService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class FormSubmissionController extends Controller
{
   protected $whatsappService;

    public function __construct(WhatsAppService $whatsappService)
    {
        $this->whatsappService = $whatsappService;
    }

    public function submit(Request $request)
{
    // Determine form type from endpoint or request
    $formType = $request->route('type') ?? $request->input('form_type', 'contact');
    
    // Validate based on form type
    $validator = $this->getValidator($request, $formType);
    
    if ($validator->fails()) {
        return response()->json([
            'status' => false,
            'message' => 'Validation errors',
            'errors' => $validator->errors()
        ], 422);
    }
    
    try {
        // Prepare data for storage
        $data = $this->prepareData($request, $formType);
        
        // Add IP and user agent
        $data['ip_address'] = $request->ip();
        $data['user_agent'] = $request->userAgent();
        
        // Create submission
        $submission = FormSubmission::create($data);
        
        // Send WhatsApp notification ONLY to sales team (NOT to user)
        $whatsappResult = $this->whatsappService->sendEnquiryNotification(
            $request->fullname,
            $request->mobile,
            $formType
        );

        // Check if any message was sent successfully
        $anySuccess = false;
        foreach ($whatsappResult as $result) {
            if (isset($result['success']) && $result['success']) {
                $anySuccess = true;
                break;
            }
        }
        
        if ($anySuccess) {
            Log::info('Enquiry WhatsApp notification sent to sales team', [
                'submission_id' => $submission->id,
                'form_type' => $formType,
                'customer_name' => $request->fullname,
                'customer_mobile' => $request->mobile
            ]);
        } else {
            Log::warning('Enquiry WhatsApp notification failed for all recipients', [
                'submission_id' => $submission->id,
                'errors' => array_column($whatsappResult, 'error')
            ]);
        }
        
        return response()->json([
            'status' => true,
            'message' => 'Form submitted successfully!',
            'data' => $submission
        ], 200);
        
    } catch (\Exception $e) {
        Log::error('Form submission error: ' . $e->getMessage(), [
            'form_type' => $formType,
            'data' => $request->all()
        ]);
        
        return response()->json([
            'status' => false,
            'message' => 'There was a technical error! Please try again.'
        ], 500);
    }
}
    
    private function getValidator(Request $request, string $formType)
    {
        $rules = [
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobile' => 'required|string|regex:/^[7-9]\d{9}$/|max:10',
            'company' => 'nullable|string|max:255',
            'message' => 'nullable|string',
        ];
        
        // Add form-specific rules
        switch ($formType) {
            case FormSubmission::TYPE_CONTACT:
                $rules['company'] = 'required|string|max:255';
                $rules['country'] = 'nullable|string|max:100';
                $rules['city'] = 'nullable|string|max:100';
                $rules['product'] = 'nullable|string|max:255';
                $rules['agreement'] = 'sometimes|boolean';
                break;
                
            case FormSubmission::TYPE_ENQUIRY:
                $rules['company'] = 'required|string|max:255';
                break;
                
            case FormSubmission::TYPE_DEMO:
                $rules['company'] = 'required|string|max:255';
                break;
        }
        
        return Validator::make($request->all(), $rules);
    }
    
    private function prepareData(Request $request, string $formType): array
    {
        $data = [
            'form_type' => $formType,
            'fullname' => $request->fullname,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'company' => $request->company,
            'message' => $request->message,
        ];
        
        // Add form-specific data
        switch ($formType) {
            case FormSubmission::TYPE_CONTACT:
                $data['country'] = $request->country;
                $data['city'] = $request->city;
                $data['product'] = $request->product;
                $data['agreement'] = $request->agreement ?? true;
                break;
        }
        
        return $data;
    }
    
    // Admin endpoints
    public function index(Request $request)
    {
        $query = FormSubmission::latest();
        
        // Filter by form type
        if ($request->has('form_type') && in_array($request->form_type, ['contact', 'enquiry', 'demo'])) {
            $query->where('form_type', $request->form_type);
        }
        
        // Filter by status
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }
        
        // Search
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('fullname', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('mobile', 'like', "%{$search}%")
                  ->orWhere('company', 'like', "%{$search}%");
            });
        }
        
        $submissions = $query->paginate(20);
        
        return response()->json($submissions);
    }
    
    public function show($id)
    {
        $submission = FormSubmission::findOrFail($id);
        
        // Mark as read when viewed
        if ($submission->status === FormSubmission::STATUS_PENDING) {
            $submission->markAsRead();
        }
        
        return response()->json($submission);
    }
    
    public function updateStatus(Request $request, $id)
    {
        $submission = FormSubmission::findOrFail($id);
        
        $validator = Validator::make($request->all(), [
            'status' => 'required|in:pending,read,replied,spam',
            'admin_notes' => 'nullable|string'
        ]);
        
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        
        $submission->update([
            'status' => $request->status,
            'admin_notes' => $request->admin_notes
        ]);
        
        if ($request->status === FormSubmission::STATUS_READ && is_null($submission->read_at)) {
            $submission->markAsRead();
        }
        
        if ($request->status === FormSubmission::STATUS_REPLIED) {
            $submission->markAsReplied();
        }
        
        return response()->json([
            'status' => true,
            'message' => 'Status updated successfully',
            'data' => $submission
        ]);
    }
    
    public function destroy($id)
    {
        $submission = FormSubmission::findOrFail($id);
        $submission->delete();
        
        return response()->json([
            'status' => true,
            'message' => 'Submission deleted successfully'
        ]);
    }
}