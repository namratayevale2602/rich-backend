<?php
// app/Http/Controllers/InternshipApplicationController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\InternshipApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InternshipApplicationController extends Controller
{
     protected $whatsappService;

    public function __construct(WhatsAppService $whatsappService)
    {
        $this->whatsappService = $whatsappService;
    }

    /**
     * Store a newly created application.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            // Personal Details
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:internship_applications,email',
            'phone' => 'required|string|max:20',
            'whatsapp' => 'nullable|string|max:20',
            'dob' => 'nullable|date',
            'gender' => 'nullable|in:Male,Female,Other',
            'location' => 'nullable|string|max:255',
            'other_location' => 'nullable|string|max:255|required_if:location,Other',
            
            // Academic Details
            'college' => 'nullable|string|max:255',
            'other_college' => 'nullable|string|max:255|required_if:college,Other',
            'branch' => 'nullable|string|max:255',
            'year' => 'nullable|string|max:50',
            'technology' => 'nullable|string|max:255',
            'mode' => 'nullable|in:Online,Offline',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Create the application
            $application = InternshipApplication::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'whatsapp' => $request->whatsapp,
                'date_of_birth' => $request->dob,
                'gender' => $request->gender,
                'location' => $request->location,
                'other_location' => $request->other_location,
                'college' => $request->college,
                'other_college' => $request->other_college,
                'branch' => $request->branch,
                'year' => $request->year,
                'technology' => $request->technology,
                'mode' => $request->mode,
                'status' => 'pending'
            ]);

            // Send WhatsApp notification using internship template
            $whatsappResult = $this->whatsappService->sendInternshipNotification(
                $request->name,
                $request->phone
            );

            // Log WhatsApp result
            if (isset($whatsappResult[0]['success']) && $whatsappResult[0]['success']) {
                \Log::info('Internship WhatsApp notification sent', [
                    'application_id' => $application->id,
                    'mobile' => $request->phone
                ]);
            } else {
                \Log::warning('Internship WhatsApp notification failed', [
                    'application_id' => $application->id,
                    'error' => $whatsappResult[0]['error'] ?? 'Unknown error'
                ]);
            }

            return response()->json([
                'success' => true,
                'message' => 'Application submitted successfully!',
                'data' => $application
            ], 201);

        } catch (\Exception $e) {
            \Log::error('Internship application error: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Failed to submit application. Please try again.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get application by ID (for status checking).
     */
    public function show($id)
    {
        $application = InternshipApplication::find($id);
        
        if (!$application) {
            return response()->json([
                'success' => false,
                'message' => 'Application not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $application
        ]);
    }

    /**
     * Check application status by email.
     */
    public function checkStatus(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $applications = InternshipApplication::where('email', $request->email)
            ->orderBy('created_at', 'desc')
            ->get(['id', 'name', 'status', 'created_at', 'technology']);

        if ($applications->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No applications found for this email'
            ]);
        }

        return response()->json([
            'success' => true,
            'data' => $applications
        ]);
    }

    /**
     * Update application status (admin only - will be protected by middleware).
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,reviewed,shortlisted,accepted,rejected',
            'admin_notes' => 'nullable|string'
        ]);

        $application = InternshipApplication::find($id);
        
        if (!$application) {
            return response()->json([
                'success' => false,
                'message' => 'Application not found'
            ], 404);
        }

        $application->status = $request->status;
        $application->admin_notes = $request->admin_notes;
        $application->reviewed_at = now();
        $application->save();

        return response()->json([
            'success' => true,
            'message' => 'Application status updated successfully',
            'data' => $application
        ]);
    }
}