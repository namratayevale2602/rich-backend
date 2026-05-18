<?php
// routes/api.php

use App\Http\Controllers\Api\InternshipApplicationController;
use App\Http\Controllers\Api\FormSubmissionController;
use App\Http\Controllers\Api\CareerController;
use Illuminate\Support\Facades\Route;

// Public routes for internship applications
Route::post('/internship/apply', [InternshipApplicationController::class, 'store']);
Route::get('/internship/status/{id}', [InternshipApplicationController::class, 'show']);
Route::post('/internship/check-status', [InternshipApplicationController::class, 'checkStatus']);
Route::post('/form-submit', [FormSubmissionController::class, 'submit'])
         ->defaults('type', 'contact');
    Route::post('/enquiry-form-submit', [FormSubmissionController::class, 'submit'])
         ->defaults('type', 'enquiry');
    Route::post('/demo-form-submit', [FormSubmissionController::class, 'submit'])
         ->defaults('type', 'demo');
 Route::post('/career/apply', [CareerController::class, 'apply']);

// Protected admin routes
Route::middleware(['auth:sanctum'])->group(function () {
    Route::put('/internship/update-status/{id}', [InternshipApplicationController::class, 'updateStatus']);

      Route::get('/submissions', [FormSubmissionController::class, 'index']);
        Route::get('/submissions/{id}', [FormSubmissionController::class, 'show']);
        Route::put('/submissions/{id}/status', [FormSubmissionController::class, 'updateStatus']);
        Route::delete('/submissions/{id}', [FormSubmissionController::class, 'destroy']);

           Route::get('/career/applications', [CareerController::class, 'index']);
        Route::get('/career/applications/{id}', [CareerController::class, 'show']);
        Route::get('/career/applications/{id}/download', [CareerController::class, 'downloadResume']);
        Route::put('/career/applications/{id}/status', [CareerController::class, 'updateStatus']);
        Route::delete('/career/applications/{id}', [CareerController::class, 'destroy']);
});