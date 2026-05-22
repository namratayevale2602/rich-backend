<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('legal_pages', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['terms', 'privacy'])->unique();
            $table->string('page_title');
            $table->text('introduction')->nullable();
            $table->string('last_updated')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('legal_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('legal_page_id')->constrained('legal_pages')->cascadeOnDelete();
            $table->string('title');
            $table->text('content');
            $table->boolean('show_contact_info')->default(false);
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('legal_subsections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('legal_section_id')->constrained('legal_sections')->cascadeOnDelete();
            $table->string('title');
            $table->text('content');
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('legal_subsections');
        Schema::dropIfExists('legal_sections');
        Schema::dropIfExists('legal_pages');
    }
};
