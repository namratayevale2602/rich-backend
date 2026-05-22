<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('how_to_guide_intros', function (Blueprint $table) {
            $table->id();
            $table->text('introduction');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('how_to_guide_magazines', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->text('description');
            $table->string('document')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        Schema::create('how_to_guide_samples', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('document')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('how_to_guide_samples');
        Schema::dropIfExists('how_to_guide_magazines');
        Schema::dropIfExists('how_to_guide_intros');
    }
};
