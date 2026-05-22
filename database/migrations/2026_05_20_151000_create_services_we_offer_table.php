<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services_we_offer', function (Blueprint $table) {
            $table->id();
            $table->string('number', 5);
            $table->string('title');
            $table->string('description');
            $table->string('image')->nullable();
            $table->string('image_400')->nullable();
            $table->string('image_700')->nullable();
            $table->string('gradient')->default('from-blue-600 to-purple-700');
            $table->string('icon')->nullable();
            $table->json('features');
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services_we_offer');
    }
};
