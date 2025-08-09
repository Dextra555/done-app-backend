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
        Schema::create('b2b_users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->integer('email_otp')->nullable();
            $table->string('mobile_number')->unique();
            $table->string('password');
            $table->string('company_name');
            $table->string('registration_id_file')->nullable();
            $table->string('company_license_file')->nullable();
            $table->string('gst_file')->nullable();
            $table->string('pan_file')->nullable();
            $table->string('aadhar_file')->nullable();
            $table->boolean('is_approved')->default(false);
            $table->boolean('login_status')->default(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('b2b_users');
    }
}; 