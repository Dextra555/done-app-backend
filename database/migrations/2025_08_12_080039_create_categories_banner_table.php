<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories_banner', function (Blueprint $table) {
            $table->id();
            $table->string('subtitle')->nullable();
            $table->string('heading_1')->nullable();
            $table->string('heading_2')->nullable();
            $table->string('heading_3')->nullable();
            $table->string('image')->nullable();
            $table->string('link')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->integer('sort_order')->default(0);
            $table->text('description')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_link')->nullable();
            $table->enum('type', ['image', 'video'])->default('image');
            $table->string('video_url')->nullable();
            $table->string('video_thumbnail')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories_banner');
    }
};
