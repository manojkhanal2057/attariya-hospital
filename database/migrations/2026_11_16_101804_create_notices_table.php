<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notices', function (Blueprint $table) {
            $table->id();

            // Basic information
            $table->string('title');
            $table->string('slug')->unique();

            // Notice category
            $table->string('category')->default('general');

            // Notice content
            $table->text('description')->nullable();
            $table->longText('body')->nullable();

            // PDF attachment
            $table->string('pdf')->nullable();

            // Publishing
            $table->dateTime('published_at')->nullable();
            $table->boolean('is_published')->default(false);

            // Display order
            $table->unsignedInteger('sort_order')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notices');
    }
};