<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductReview;
use App\Models\B2CUser;
use Faker\Factory as Faker;

class ProductReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        // Get all products
        $products = Product::all();
        $users = B2CUser::all();
        
        if ($products->isEmpty()) {
            $this->command->info('No products found. Please run ProductSeeder first.');
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
        
        $this->command->info('Seeding product reviews...');
        
        foreach ($products as $product) {
            // Generate 5-15 reviews per product
            $reviewCount = rand(5, 15);
            
            for ($i = 0; $i < $reviewCount; $i++) {
                $rating = rand(1, 5);
                $user = $users->random();
                
                // Generate review content based on rating
                $content = $this->generateReviewContent($rating, $faker);
                $title = $this->generateReviewTitle($rating, $faker);
                
                $review = ProductReview::create([
                    'product_id' => $product->id,
                    'variant_id' => null, // Product-level review
                    'user_id' => $user->id,
                    'rating' => $rating,
                    'title' => $title,
                    'content' => $content,
                    'is_verified' => rand(0, 1),
                    'is_approved' => rand(0, 10) > 1, // 90% approval rate
                    'helpful_count' => rand(0, 25),
                    'images' => $this->generateReviewImages($faker),
                    'ip_address' => $faker->ipv4,
                    'user_agent' => $faker->userAgent,
                    'approved_at' => $faker->dateTimeBetween('-6 months', 'now'),
                    'approved_by' => null, // Will be set by admin later
                ]);
            }
        }
        
        $this->command->info('Product reviews seeded successfully!');
    }
    
    private function generateReviewContent($rating, $faker)
    {
        $templates = [
            1 => [
                'Very disappointed with this product. The quality is poor and it broke after a few days.',
                'Not worth the money at all. I expected much better quality.',
                'Terrible experience. The product arrived damaged and customer service was unhelpful.',
                'I regret buying this. It doesn\'t work as advertised.',
                'Poor quality and overpriced. Would not recommend to anyone.'
            ],
            2 => [
                'The product is okay but has some issues. Not quite what I expected.',
                'Average quality. There are better options available for the same price.',
                'It works but could be better. Some minor problems with functionality.',
                'Decent product but needs improvement. Not bad but not great either.',
                'Okay for the price but nothing special. Expected more.'
            ],
            3 => [
                'Good product overall. Does what it\'s supposed to do.',
                'Satisfied with the purchase. Quality is acceptable.',
                'It\'s fine. Meets my basic expectations.',
                'Decent product, no major complaints.',
                'Average quality, works as expected.'
            ],
            4 => [
                'Great product! Very satisfied with the quality and performance.',
                'Excellent value for money. Highly recommend.',
                'Really good product. Exceeded my expectations.',
                'Very happy with this purchase. Quality is impressive.',
                'Great buy! Would definitely recommend to others.'
            ],
            5 => [
                'Absolutely amazing product! Best purchase I\'ve made this year.',
                'Outstanding quality and performance. Exceeds all expectations.',
                'Perfect product! Couldn\'t be happier with this purchase.',
                'Exceptional quality and value. Highly recommend to everyone.',
                'Fantastic product! Worth every penny. Will buy again.'
            ]
        ];
        
        $baseContent = $templates[$rating][array_rand($templates[$rating])];
        
        // Add some variety with additional sentences
        $additionalSentences = [
            'Delivery was fast and packaging was secure.',
            'The seller was very professional and helpful.',
            'Product arrived on time and in perfect condition.',
            'Great customer service experience.',
            'Would definitely buy from this seller again.',
            'The product looks exactly like the pictures.',
            'Very easy to use and set up.',
            'Perfect for my needs.',
            'Great addition to my collection.',
            'Highly satisfied with the purchase.'
        ];
        
        if (rand(0, 1)) {
            $baseContent .= ' ' . $additionalSentences[array_rand($additionalSentences)];
        }
        
        return $baseContent;
    }
    
    private function generateReviewTitle($rating, $faker)
    {
        $templates = [
            1 => ['Terrible Product', 'Very Disappointed', 'Poor Quality', 'Not Recommended', 'Waste of Money'],
            2 => ['Okay but Could Be Better', 'Average Quality', 'Not Bad but Not Great', 'Decent Product', 'Meets Basic Needs'],
            3 => ['Good Product', 'Satisfied', 'Decent Quality', 'Works Fine', 'Acceptable'],
            4 => ['Great Product!', 'Highly Recommend', 'Excellent Quality', 'Very Satisfied', 'Great Value'],
            5 => ['Amazing Product!', 'Perfect!', 'Outstanding Quality', 'Best Purchase Ever', 'Exceptional!']
        ];
        
        return $templates[$rating][array_rand($templates[$rating])];
    }
    
    private function generateReviewImages($faker)
    {
        // 30% chance of having images
        if (rand(1, 10) <= 3) {
            $imageCount = rand(1, 3);
            $images = [];
            
            for ($i = 0; $i < $imageCount; $i++) {
                $images[] = $faker->imageUrl(640, 480, 'products', true);
            }
            
            return json_encode($images);
        }
        
        return null;
    }
} 