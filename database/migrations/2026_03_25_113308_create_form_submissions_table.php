<?php
// database/migrations/2024_12_25_000001_create_form_submissions_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('form_submissions', function (Blueprint $table) {
            $table->id();
            
            // Form type to identify which form submitted
            $table->enum('form_type', ['contact', 'enquiry', 'demo'])
                  ->default('contact')
                  ->index();
            
            // Common fields
            $table->string('fullname');
            $table->string('email');
            $table->string('mobile', 10);
            $table->string('company')->nullable();
            $table->text('message')->nullable();
            
            // Contact form specific fields
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('product')->nullable();
            $table->boolean('agreement')->default(true);
            
            // Admin management fields
            $table->enum('status', ['pending', 'read', 'replied', 'spam'])->default('pending');
            $table->text('admin_notes')->nullable();
            $table->timestamp('read_at')->nullable();
            $table->timestamp('replied_at')->nullable();
            
            // Tracking
            $table->string('ip_address')->nullable();
            $table->text('user_agent')->nullable();
            
            $table->timestamps();
            
            // Indexes for better performance
            $table->index('email');
            $table->index('status');
            $table->index('form_type');
            $table->index('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('form_submissions');
    }
};