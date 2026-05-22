<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('enquiry_flex', function (Blueprint $table) {
            $table->id();
            $table->string('background')->default('#004ecc40');
            $table->string('title');
            $table->string('subtitle');
            $table->text('description');
            $table->string('image')->nullable();
            $table->string('image_400')->nullable();
            $table->string('image_800')->nullable();
            $table->string('image_alt')->default('offer');
            $table->json('buttons');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('enquiry_flex');
    }
};
