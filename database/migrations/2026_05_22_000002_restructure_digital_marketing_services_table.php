<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('digital_marketing_service_benefits');
        Schema::dropIfExists('digital_marketing_service_process_steps');
        Schema::dropIfExists('digital_marketing_service_strategies');
        Schema::dropIfExists('digital_marketing_service_solutions');
        Schema::dropIfExists('digital_marketing_service_deliver_metrics');
        Schema::dropIfExists('digital_marketing_service_features');
        Schema::dropIfExists('digital_marketing_services');

        Schema::create('digital_marketing_services', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique()->index();
            $table->string('label');
            $table->string('hero_title');
            $table->text('hero_description');
            $table->string('deliver_title')->nullable();
            $table->text('deliver_description')->nullable();
            $table->json('deliver_approach')->nullable();
            $table->string('process_title')->nullable();
            $table->text('process_description')->nullable();
            $table->string('strategies_title')->nullable();
            $table->text('strategies_description')->nullable();
            $table->string('benefits_title')->nullable();
            $table->text('benefits_description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        Schema::create('digital_marketing_service_features', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained('digital_marketing_services')->cascadeOnDelete();
            $table->text('feature');
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        Schema::create('digital_marketing_service_deliver_metrics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained('digital_marketing_services')->cascadeOnDelete();
            $table->string('label');
            $table->string('value');
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        Schema::create('digital_marketing_service_solutions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained('digital_marketing_services')->cascadeOnDelete();
            $table->string('title');
            $table->text('description');
            $table->json('features')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        Schema::create('digital_marketing_service_strategies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained('digital_marketing_services')->cascadeOnDelete();
            $table->string('title');
            $table->text('description');
            $table->json('tactics')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        Schema::create('digital_marketing_service_process_steps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained('digital_marketing_services')->cascadeOnDelete();
            $table->string('title');
            $table->text('description');
            $table->json('activities')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        Schema::create('digital_marketing_service_benefits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained('digital_marketing_services')->cascadeOnDelete();
            $table->string('title');
            $table->text('description');
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('digital_marketing_service_benefits');
        Schema::dropIfExists('digital_marketing_service_process_steps');
        Schema::dropIfExists('digital_marketing_service_strategies');
        Schema::dropIfExists('digital_marketing_service_solutions');
        Schema::dropIfExists('digital_marketing_service_deliver_metrics');
        Schema::dropIfExists('digital_marketing_service_features');
        Schema::dropIfExists('digital_marketing_services');

        Schema::create('digital_marketing_services', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('label');
            $table->json('hero');
            $table->json('what_we_deliver')->nullable();
            $table->json('solutions')->nullable();
            $table->json('strategies')->nullable();
            $table->json('process')->nullable();
            $table->json('benefits')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }
};
