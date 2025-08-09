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
        Schema::table('service_videos', function (Blueprint $table) {
            $table->boolean('is_story')->default(false)->after('status');
            $table->timestamp('expires_at')->nullable()->after('is_story');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('service_videos', function (Blueprint $table) {
            $table->dropColumn(['is_story', 'expires_at']);
        });
    }
};
