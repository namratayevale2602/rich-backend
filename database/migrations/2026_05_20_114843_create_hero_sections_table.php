<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hero_sections', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('subtitle');
            $table->string('hero_image')->nullable();
            $table->string('hero_image_400')->nullable();
            $table->string('hero_image_500')->nullable();
            $table->string('hero_image_600')->nullable();
            $table->string('hero_image_700')->nullable();
            $table->string('hero_image_800')->nullable();
            $table->string('hero_image_1000')->nullable();
            $table->string('hero_image_1500')->nullable();
            $table->string('cta_text')->nullable();
            $table->string('cta_link')->nullable();
            $table->string('cta_secondary_text')->nullable();
            $table->string('cta_secondary_link')->nullable();
            $table->json('stats')->nullable(); // Store stats as JSON
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hero_sections');
    }
};