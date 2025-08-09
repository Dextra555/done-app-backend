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
        Schema::table('product_variant_images', function (Blueprint $table) {
            $table->integer('sort_order')->default(0)->after('type');
            $table->boolean('is_active')->default(true)->after('sort_order');
            
            // Add index for better performance
            $table->index(['variant_id', 'type']);
            $table->index(['variant_id', 'sort_order']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_variant_images', function (Blueprint $table) {
            $table->dropIndex(['variant_id', 'type']);
            $table->dropIndex(['variant_id', 'sort_order']);
            $table->dropColumn(['sort_order', 'is_active']);
        });
    }
}; 