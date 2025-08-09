<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductReview;
use App\Models\B2CUser;
use Faker\Factory as Faker;

class ProductVariantReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        // Get all product variants
        $variants = ProductVariant::with('product')->get();
        $users = B2CUser::all();
        
        if ($variants->isEmpty()) {
            $this->command->info('No product variants found. Please run ProductVariantSeeder first.');
            return;
        }
        
        if ($users->isEmpty()) {
            $this->command->info('No B2C users found. Creating sample users...');
            // Create some sample users if none exist
            for ($i = 0; $i < 10; $i++) {
                B2CUser::create([
                    'name' => $faker->name,
                    'email' => $faker->unique()->safeEmail,
                    'phone' => $faker->phoneNumber,
                    'password' => bcrypt('password'),
                    'is_active' => true,
                ]);
            }
            $users = B2CUser::all();
        }
        
        $this->command->info('Seeding product variant reviews...');
        
        foreach ($variants as $variant) {
            // Generate 3-10 reviews per variant
            $reviewCount = rand(3, 10);
            
            for ($i = 0; $i < $reviewCount; $i++) {
                $rating = rand(1, 5);
                $user = $users->random();
                
                // Generate review content based on rating and variant attributes
                $content = $this->generateVariantReviewContent($rating, $variant, $faker);
                $title = $this->generateVariantReviewTitle($rating, $variant, $faker);
                
                $review = ProductReview::create([
                    'product_id' => $variant->product_id,
                    'variant_id' => $variant->id,
                    'user_id' => $user->id,
                    'rating' => $rating,
                    'title' => $title,
                    'content' => $content,
                    'is_verified' => rand(0, 1),
                    'is_approved' => rand(0, 10) > 1, // 90% approval rate
                    'helpful_count' => rand(0, 15),
                    'images' => $this->generateReviewImages($faker),
                    'ip_address' => $faker->ipv4,
                    'user_agent' => $faker->userAgent,
                    'approved_at' => $faker->dateTimeBetween('-6 months', 'now'),
                    'approved_by' => null, // Will be set by admin later
                ]);
            }
        }
        
        $this->command->info('Product variant reviews seeded successfully!');
    }
    
    private function generateVariantReviewContent($rating, $variant, $faker)
    {
        $productName = $variant->product->name;
        $sku = $variant->sku;
        
        $templates = [
            1 => [
                "Very disappointed with this $productName variant ($sku). The quality is poor and it doesn't match the description.",
                "Not worth the money for this specific variant. The $sku version has issues that weren't mentioned.",
                "Terrible experience with this variant. The $productName in $sku arrived damaged and defective.",
                "I regret buying this specific variant. The $sku version doesn't work as advertised.",
                "Poor quality for this variant. The $productName in $sku is overpriced and underperforming."
            ],
            2 => [
                "The $productName variant ($sku) is okay but has some issues. Not quite what I expected for this specific model.",
                "Average quality for this variant. The $sku version could be better for the price.",
                "It works but could be better. Some minor problems with this specific $productName variant.",
                "Decent variant but needs improvement. The $sku version is not bad but not great either.",
                "Okay for the price but nothing special. Expected more from this $productName variant."
            ],
            3 => [
                "Good $productName variant overall. The $sku version does what it's supposed to do.",
                "Satisfied with this specific variant. Quality is acceptable for the $sku model.",
                "It's fine. This $productName variant meets my basic expectations.",
                "Decent variant, no major complaints about the $sku version.",
                "Average quality for this variant, works as expected."
            ],
            4 => [
                "Great $productName variant! Very satisfied with the $sku version quality and performance.",
                "Excellent value for money for this specific variant. The $sku version is highly recommended.",
                "Really good variant. This $productName in $sku exceeded my expectations.",
                "Very happy with this specific variant. The $sku version quality is impressive.",
                "Great buy for this variant! Would definitely recommend the $sku version to others."
            ],
            5 => [
                "Absolutely amazing $productName variant! The $sku version is the best purchase I've made this year.",
                "Outstanding quality and performance for this variant. The $sku version exceeds all expectations.",
                "Perfect variant! Couldn't be happier with this specific $productName in $sku.",
                "Exceptional quality and value for this variant. The $sku version is highly recommended to everyone.",
                "Fantastic variant! The $productName in $sku is worth every penny. Will buy this specific version again."
            ]
        ];
        
        $baseContent = $templates[$rating][array_rand($templates[$rating])];
        
        // Add variant-specific details
        $variantDetails = [
            "The color and size are exactly as described.",
            "Perfect fit for my needs.",
            "The material quality is excellent.",
            "Very durable and well-made.",
            "Great attention to detail in this variant.",
            "The finish is beautiful and consistent.",
            "Excellent craftsmanship for this specific variant.",
            "The dimensions are perfect.",
            "Love the design of this variant.",
            "High-quality materials used in this version."
        ];
        
        if (rand(0, 1)) {
            $baseContent .= ' ' . $variantDetails[array_rand($variantDetails)];
        }
        
        return $baseContent;
    }
    
    private function generateVariantReviewTitle($rating, $variant, $faker)
    {
        $productName = $variant->product->name;
        $sku = $variant->sku;
        
        $templates = [
            1 => ["Terrible $productName Variant", "Very Disappointed with $sku", "Poor Quality Variant", "Not Recommended", "Waste of Money"],
            2 => ["Okay but Could Be Better", "Average Quality Variant", "Not Bad but Not Great", "Decent Variant", "Meets Basic Needs"],
            3 => ["Good $productName Variant", "Satisfied", "Decent Quality", "Works Fine", "Acceptable"],
            4 => ["Great $productName Variant!", "Highly Recommend $sku", "Excellent Quality", "Very Satisfied", "Great Value"],
            5 => ["Amazing $productName Variant!", "Perfect $sku!", "Outstanding Quality", "Best Purchase Ever", "Exceptional!"]
        ];
        
        return $templates[$rating][array_rand($templates[$rating])];
    }
    
    private function generateReviewImages($faker)
    {
        // 25% chance of having images for variant reviews
        if (rand(1, 10) <= 2) {
            $imageCount = rand(1, 2);
            $images = [];
            
            for ($i = 0; $i < $imageCount; $i++) {
                $images[] = $faker->imageUrl(640, 480, 'products', true);
            }
            
            return json_encode($images);
        }
        
        return null;
    }
} 