<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chatbot_leads', function (Blueprint $table) {
            $table->id();
            $table->string('service')->nullable();
            $table->string('fullname')->nullable();
            $table->string('mobile', 15)->nullable();
            $table->string('email')->nullable();
            $table->string('product')->nullable();
            $table->string('ip_address')->nullable();
            $table->timestamps();

            $table->index('mobile');
            $table->index('email');
            $table->index('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chatbot_leads');
    }
};
