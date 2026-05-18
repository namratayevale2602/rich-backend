<?php
// database/migrations/2024_03_25_000001_create_career_applications_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('career_applications', function (Blueprint $table) {
            $table->id();
            
            // Personal Information
            $table->string('fullname');
            $table->string('email');
            $table->string('mobile', 10);
            $table->string('apply_for');
            
            // File Management
            $table->string('resume_path')->nullable();
            $table->string('resume_original_name')->nullable();
            $table->string('resume_mime_type')->nullable();
            $table->integer('resume_size')->nullable();
            
            // Application Status
            $table->enum('status', ['pending', 'reviewed', 'shortlisted', 'rejected', 'hired'])
                  ->default('pending');
            
            // Admin Management
            $table->text('admin_notes')->nullable();
            $table->timestamp('reviewed_at')->nullable();
            $table->unsignedBigInteger('reviewed_by')->nullable();
            
            // Tracking
            $table->string('ip_address')->nullable();
            $table->text('user_agent')->nullable();
            
            $table->timestamps();
            
            // Indexes
            $table->index('email');
            $table->index('status');
            $table->index('apply_for');
            $table->index('created_at');
            
            // Foreign key (if you have users table for admin)
            // $table->foreign('reviewed_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('career_applications');
    }
};