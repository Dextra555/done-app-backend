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
        Schema::table('product_stories', function (Blueprint $table) {
            // Add media_path column after media_url
            $table->string('media_path')->nullable()->after('media_url');
            
            // Make media_url virtual (computed) by making it nullable
            $table->string('media_url')->nullable()->change();
            
            // Add unique constraint to ensure one story per product
            $table->unique('product_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_stories', function (Blueprint $table) {
            // Drop unique constraint
            $table->dropUnique(['product_id']);
            
            // Drop the media_path column
            $table->dropColumn('media_path');
            
            // Revert media_url to required
            $table->string('media_url')->nullable(false)->change();
        });
    }
};
