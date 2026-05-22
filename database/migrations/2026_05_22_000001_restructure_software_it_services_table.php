<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('software_it_service_benefits');
        Schema::dropIfExists('software_it_service_process_steps');
        Schema::dropIfExists('software_it_service_tech_categories');
        Schema::dropIfExists('software_it_service_deliverables');
        Schema::dropIfExists('software_it_service_features');
        Schema::dropIfExists('software_it_services');

        Schema::create('software_it_services', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique()->index();
            $table->string('label');
            $table->string('hero_title');
            $table->text('hero_description');
            $table->string('deliver_title')->nullable();
            $table->text('deliver_description')->nullable();
            $table->string('tech_title')->nullable();
            $table->text('tech_description')->nullable();
            $table->string('process_title')->nullable();
            $table->text('process_description')->nullable();
            $table->string('benefits_title')->nullable();
            $table->text('benefits_description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        Schema::create('software_it_service_features', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained('software_it_services')->cascadeOnDelete();
            $table->text('feature');
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        Schema::create('software_it_service_deliverables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained('software_it_services')->cascadeOnDelete();
            $table->string('title');
            $table->text('description');
            $table->json('features')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        Schema::create('software_it_service_tech_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained('software_it_services')->cascadeOnDelete();
            $table->string('category');
            $table->json('technologies')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        Schema::create('software_it_service_process_steps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained('software_it_services')->cascadeOnDelete();
            $table->string('title');
            $table->text('description');
            $table->json('activities')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        Schema::create('software_it_service_benefits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained('software_it_services')->cascadeOnDelete();
            $table->string('title');
            $table->text('description');
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('software_it_service_benefits');
        Schema::dropIfExists('software_it_service_process_steps');
        Schema::dropIfExists('software_it_service_tech_categories');
        Schema::dropIfExists('software_it_service_deliverables');
        Schema::dropIfExists('software_it_service_features');
        Schema::dropIfExists('software_it_services');

        Schema::create('software_it_services', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('label');
            $table->json('hero');
            $table->json('what_we_deliver')->nullable();
            $table->json('technologies')->nullable();
            $table->json('process')->nullable();
            $table->json('benefits')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }
};
