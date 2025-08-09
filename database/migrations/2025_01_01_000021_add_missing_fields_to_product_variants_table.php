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
        Schema::table('product_variants', function (Blueprint $table) {
            // Pricing fields
            $table->decimal('selling_price', 10, 2)->nullable()->after('price');
            $table->decimal('original_price', 10, 2)->nullable()->after('selling_price');
            $table->decimal('cost_price', 10, 2)->nullable()->after('original_price');
            
            // Shipping dimensions
            $table->decimal('weight', 8, 2)->nullable()->after('cost_price');
            $table->decimal('length', 8, 2)->nullable()->after('weight');
            $table->decimal('width', 8, 2)->nullable()->after('length');
            $table->decimal('height', 8, 2)->nullable()->after('width');
            
            // Status and management fields
            $table->boolean('is_active')->default(true)->after('height');
            $table->boolean('is_featured')->default(false)->after('is_active');
            $table->integer('min_stock')->default(5)->after('is_featured');
            
            // Rating and review fields
            $table->decimal('average_rating', 3, 2)->nullable()->after('min_stock');
            $table->integer('review_count')->default(0)->after('average_rating');
            
            // SEO and description fields
            $table->string('meta_title')->nullable()->after('review_count');
            $table->text('meta_description')->nullable()->after('meta_title');
            $table->string('slug')->nullable()->after('meta_description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_variants', function (Blueprint $table) {
            $table->dropColumn([
                'selling_price',
                'original_price', 
                'cost_price',
                'weight',
                'length',
                'width',
                'height',
                'is_active',
                'is_featured',
                'min_stock',
                'average_rating',
                'review_count',
                'meta_title',
                'meta_description',
                'slug'
            ]);
        });
    }
}; 