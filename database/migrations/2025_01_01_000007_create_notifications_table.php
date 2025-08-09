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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('user_type')->default('b2c'); // b2c, b2b, admin
            $table->string('title');
            $table->text('message');
            $table->string('type')->default('general'); // general, product_created, price_updated, etc.
            $table->json('data')->nullable();
            $table->timestamp('read_at')->nullable();
            $table->string('status')->default('unread'); // unread, read
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
}; 