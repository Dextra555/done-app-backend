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
        Schema::table('product_reviews', function (Blueprint $table) {
            // Enhanced review fields
            $table->string('title')->nullable()->after('content');
            $table->boolean('is_verified')->default(false)->after('title');
            $table->boolean('is_approved')->default(true)->after('is_verified');
            $table->integer('helpful_count')->default(0)->after('is_approved');
            $table->json('images')->nullable()->after('helpful_count');
            
            // Review metadata
            $table->string('ip_address')->nullable()->after('images');
            $table->string('user_agent')->nullable()->after('ip_address');
            $table->timestamp('approved_at')->nullable()->after('user_agent');
            $table->foreignId('approved_by')->nullable()->constrained('admins')->onDelete('set null')->after('approved_at');
            
            // Indexes for better performance
            $table->index(['product_id', 'is_approved']);
            $table->index(['variant_id', 'is_approved']);
            $table->index(['user_id', 'created_at']);
            $table->index(['rating', 'is_approved']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_reviews', function (Blueprint $table) {
            $table->dropIndex(['product_id', 'is_approved']);
            $table->dropIndex(['variant_id', 'is_approved']);
            $table->dropIndex(['user_id', 'created_at']);
            $table->dropIndex(['rating', 'is_approved']);
            
            $table->dropForeign(['approved_by']);
            $table->dropColumn([
                'title',
                'is_verified',
                'is_approved',
                'helpful_count',
                'images',
                'ip_address',
                'user_agent',
                'approved_at',
                'approved_by'
            ]);
        });
    }
}; 