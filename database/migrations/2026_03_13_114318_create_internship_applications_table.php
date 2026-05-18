<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('internship_applications', function (Blueprint $table) {
            $table->id();
            
            // Personal Details
            $table->string('name');
            $table->string('email');
            $table->string('phone', 20);
            $table->string('whatsapp', 20)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->enum('gender', ['Male', 'Female', 'Other'])->nullable();
            $table->string('location')->nullable();
            $table->string('other_location')->nullable();
            
            // Academic Details
            $table->string('college')->nullable();
            $table->string('other_college')->nullable();
            $table->string('branch')->nullable();
            $table->string('year')->nullable();
            $table->string('technology')->nullable();
            $table->enum('mode', ['Online', 'Offline'])->nullable();
            
            // Status tracking
            $table->enum('status', [
                'pending', 
                'reviewed', 
                'shortlisted', 
                'accepted', 
                'rejected'
            ])->default('pending');
            
            $table->text('admin_notes')->nullable();
            $table->timestamp('reviewed_at')->nullable();
            
            // Timestamps
            $table->timestamps();
            $table->softDeletes(); // For archiving/deletion
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('internship_applications');
    }
};
