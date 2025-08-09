<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductReview;
use Illuminate\Support\Facades\DB;

class ProductRatingStatsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Updating product rating statistics...');
        
        // Update product rating statistics
        $products = Product::all();
        
        foreach ($products as $product) {
            $this->updateProductRatingStats($product);
        }
        
        $this->command->info('Updating product variant rating statistics...');
        
        // Update variant rating statistics
        $variants = ProductVariant::all();
        
        foreach ($variants as $variant) {
            $this->updateVariantRatingStats($variant);
        }
        
        $this->command->info('Rating statistics updated successfully!');
    }
    
    private function updateProductRatingStats($product)
    {
        // Get approved reviews for this product (variant_id is null for product-level reviews)
        $reviews = ProductReview::where('product_id', $product->id)
            ->whereNull('variant_id')
            ->where('is_approved', true)
            ->get();
        
        if ($reviews->count() > 0) {
            $averageRating = $reviews->avg('rating');
            $reviewCount = $reviews->count();
            
            $product->update([
                'average_rating' => round($averageRating, 2),
                'review_count' => $reviewCount
            ]);
        }
    }
    
    private function updateVariantRatingStats($variant)
    {
        // Get approved reviews for this specific variant
        $reviews = ProductReview::where('variant_id', $variant->id)
            ->where('is_approved', true)
            ->get();
        
        if ($reviews->count() > 0) {
            $averageRating = $reviews->avg('rating');
            $reviewCount = $reviews->count();
            
            $variant->update([
                'average_rating' => round($averageRating, 2),
                'review_count' => $reviewCount
            ]);
        }
    }
} 