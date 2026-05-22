<?php
// app/Http/Controllers/Api/CareerController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CareerApplication;
use App\Models\CareerIntro;
use App\Models\CareerPosition;
use App\Services\WhatsAppService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class CareerController extends Controller
{
    protected $whatsappService;

    public function __construct(WhatsAppService $whatsappService)
    {
        $this->whatsappService = $whatsappService;
    }

    public function getIntro()
    {
        $intros = CareerIntro::active()->get()->map(fn($i) => [
            'id'          => $i->id,
            'title'       => $i->title,
            'description' => $i->description,
            'image'       => $i->image_url,
        ]);

        return response()->json(['success' => true, 'data' => $intros]);
    }

    public function getPositions()
    {
        $positions = CareerPosition::active()->orderBy('order')->get(['id', 'position', 'experience', 'type', 'location', 'opening']);

        return response()->json(['success' => true, 'data' => $positions]);
    }

    public function apply(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobile' => 'required|string|regex:/^[7-9]\d{9}$/|max:10',
            'apply_for' => 'required|string|max:255',
            'document' => 'required|file|mimes:pdf,doc,docx|max:5120', // Max 5MB
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Handle file upload
            $file = $request->file('document');
            $originalName = $file->getClientOriginalName();
            $mimeType = $file->getMimeType();
            $fileSize = $file->getSize();
            
            // Store file with unique name
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('career/resumes', $fileName, 'public');
            
            // Create application record
            $application = CareerApplication::create([
                'fullname' => $request->fullname,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'apply_for' => $request->apply_for,
                'resume_path' => $filePath,
                'resume_original_name' => $originalName,
                'resume_mime_type' => $mimeType,
                'resume_size' => $fileSize,
                'status' => 'pending',
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent()
            ]);

            // Send WhatsApp notification to sales team using template
            $whatsappResult = $this->whatsappService->sendCareerNotification(
                $request->fullname,
                $request->mobile
            );

            // Log WhatsApp result
            if (isset($whatsappResult[0]['success']) && $whatsappResult[0]['success']) {
                Log::info('Career WhatsApp notification sent', [
                    'application_id' => $application->id,
                    'mobile' => $request->mobile
                ]);
            } else {
                Log::warning('Career WhatsApp notification failed', [
                    'application_id' => $application->id,
                    'error' => $whatsappResult[0]['error'] ?? 'Unknown error'
                ]);
            }

            return response()->json([
                'status' => true,
                'message' => 'Application submitted successfully!',
                'data' => [
                    'id' => $application->id,
                    'fullname' => $application->fullname,
                    'apply_for' => $application->apply_for
                ]
            ], 200);

        } catch (\Exception $e) {
            Log::error('Career application error: ' . $e->getMessage(), [
                'data' => $request->all()
            ]);
            
            return response()->json([
                'status' => false,
                'message' => 'There was a technical error! Please try again.'
            ], 500);
        }
    }

    // Admin endpoints
    public function index(Request $request)
    {
        $query = CareerApplication::latest();
        
        // Filter by status
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }
        
        // Filter by position
        if ($request->has('position')) {
            $query->where('apply_for', $request->position);
        }
        
        // Search
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('fullname', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('mobile', 'like', "%{$search}%")
                  ->orWhere('apply_for', 'like', "%{$search}%");
            });
        }
        
        $applications = $query->paginate(20);
        
        return response()->json($applications);
    }

    public function show($id)
    {
        $application = CareerApplication::findOrFail($id);
        
        // Add file URL to response
        $application->resume_url = $application->resume_url;
        
        return response()->json($application);
    }

    public function downloadResume($id)
    {
        $application = CareerApplication::findOrFail($id);
        
        if (!$application->resume_path || !Storage::disk('public')->exists($application->resume_path)) {
            return response()->json([
                'status' => false,
                'message' => 'Resume not found'
            ], 404);
        }
        
        return Storage::disk('public')->download($application->resume_path, $application->resume_original_name);
    }

    public function updateStatus(Request $request, $id)
    {
        $application = CareerApplication::findOrFail($id);
        
        $validator = Validator::make($request->all(), [
            'status' => 'required|in:pending,reviewed,shortlisted,rejected,hired',
            'admin_notes' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $application->update([
            'status' => $request->status,
            'admin_notes' => $request->admin_notes,
            'reviewed_at' => in_array($request->status, ['reviewed', 'shortlisted', 'rejected', 'hired']) ? now() : $application->reviewed_at,
            'reviewed_by' => auth()->id() ?? null
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Status updated successfully',
            'data' => $application
        ]);
    }

    public function destroy($id)
    {
        $application = CareerApplication::findOrFail($id);
        
        // Delete resume file
        if ($application->resume_path && Storage::disk('public')->exists($application->resume_path)) {
            Storage::disk('public')->delete($application->resume_path);
        }
        
        $application->delete();
        
        return response()->json([
            'status' => true,
            'message' => 'Application deleted successfully'
        ]);
    }
}