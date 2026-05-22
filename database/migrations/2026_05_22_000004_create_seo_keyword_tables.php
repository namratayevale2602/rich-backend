<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('seo_keyword_groups', function (Blueprint $table) {
            $table->id();
            $table->string('group_key', 100)->unique();
            $table->string('label', 255);
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->unsignedSmallInteger('order')->default(0);
            $table->timestamps();
        });

        Schema::create('seo_keywords', function (Blueprint $table) {
            $table->id();
            $table->foreignId('group_id')
                ->constrained('seo_keyword_groups')
                ->cascadeOnDelete();
            $table->string('keyword', 255);
            $table->unsignedSmallInteger('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('seo_keywords');
        Schema::dropIfExists('seo_keyword_groups');
    }
};
