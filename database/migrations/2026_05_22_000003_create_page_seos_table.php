<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('page_seos', function (Blueprint $table) {
            $table->id();
            $table->string('group', 50);          // page | product | software_service | digital_marketing_service
            $table->string('group_label', 100);   // human-readable group name for admin display
            $table->string('page_key', 100)->unique();
            $table->string('label', 255);          // human-readable page name
            $table->string('title', 500);
            $table->text('description');
            $table->text('keywords')->nullable();
            $table->string('h1', 500)->nullable();
            $table->string('canonical', 255)->nullable();
            $table->string('og_image', 255)->nullable();
            $table->string('breadcrumb', 255)->nullable();
            $table->boolean('is_active')->default(true);
            $table->unsignedSmallInteger('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('page_seos');
    }
};
