<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class ProductTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::all();
        $tags = Tag::all();

        // Define tag assignments based on product characteristics
        $tagAssignments = [
            // Living Room Products
            'Modern 3-Seater Fabric Sofa' => ['Comfortable', 'Durable', 'Easy Assembly', 'Contemporary', 'Premium'],
            'Rustic Wood Coffee Table' => ['Handcrafted', 'Rustic', 'Solid wood construction', 'Storage', 'Easy to clean'],
            'Modern TV Stand with Storage' => ['Contemporary', 'Storage', 'Cable management', 'LED lighting', 'Multi-Functional'],
            
            // Bedroom Products
            'Queen Size Platform Bed' => ['Queen size', 'Elegant', 'Platform design', 'No box spring needed', 'Comfortable'],
            '6-Drawer Dresser with Mirror' => ['Storage', 'Solid wood construction', 'Attached mirror', 'Smooth gliding drawers', 'Spacious'],
            'Modern Nightstand with USB Port' => ['Contemporary', 'USB charging port', 'LED night light', 'Modern design', 'Compact'],
            
            // Dining Room Products
            'Extendable Dining Table' => ['Extendable design', 'Solid wood top', 'Seats 6-8 people', 'Easy to maintain', 'Multi-Functional'],
            'Upholstered Dining Chairs' => ['Upholstered', 'Comfortable', 'Durable', 'Easy to clean', 'Contemporary'],
            'Buffet Sideboard' => ['Storage', 'Display', 'Solid wood construction', 'Multiple shelves', 'Elegant'],
            
            // Office Products
            'Ergonomic Office Chair' => ['Ergonomic', 'Comfortable', 'Adjustable', 'Durable', 'Professional'],
            'L-Shaped Desk' => ['L-shaped', 'Storage', 'Cable management', 'Spacious', 'Modern'],
            'Filing Cabinet' => ['Storage', 'Durable', 'Lockable', 'Multiple drawers', 'Professional'],
            
            // Kitchen Products
            'Kitchen Island with Stools' => ['Kitchen island', 'Storage', 'Seating', 'Multi-Functional', 'Contemporary'],
            'Pantry Cabinet' => ['Storage', 'Organized', 'Multiple shelves', 'Durable', 'Spacious'],
            'Wine Rack' => ['Wine storage', 'Display', 'Compact', 'Elegant', 'Temperature controlled'],
            
            // Bathroom Products
            'Vanity Set with Mirror' => ['Vanity', 'Storage', 'Mirror', 'Contemporary', 'Easy to clean'],
            'Towel Rack' => ['Towel storage', 'Wall mounted', 'Durable', 'Easy to install', 'Compact'],
            'Shower Caddy' => ['Shower storage', 'Waterproof', 'Compact', 'Easy to install', 'Organized'],
            
            // Outdoor Products
            'Patio Dining Set' => ['Outdoor', 'Weather-Resistant', 'Dining', 'Comfortable', 'Durable'],
            'Garden Bench' => ['Outdoor', 'Garden', 'Comfortable', 'Weather-Resistant', 'Rustic'],
            'Umbrella Stand' => ['Outdoor', 'Umbrella holder', 'Heavy duty', 'Weather-Resistant', 'Stable'],
            
            // Storage Products
            'Bookshelf' => ['Storage', 'Display', 'Multiple shelves', 'Durable', 'Versatile'],
            'Wardrobe' => ['Storage', 'Clothing', 'Spacious', 'Durable', 'Organized'],
            'Storage Ottoman' => ['Storage', 'Seating', 'Multi-Functional', 'Compact', 'Comfortable'],
            
            // Accent Products
            'Floor Lamp' => ['Lighting', 'Floor lamp', 'Contemporary', 'Adjustable', 'Elegant'],
            'Wall Art' => ['Wall decoration', 'Artistic', 'Contemporary', 'Easy to hang', 'Versatile'],
            'Throw Pillows' => ['Comfortable', 'Decorative', 'Soft', 'Versatile', 'Easy to clean'],
            
            // Kids Products
            'Kids Study Desk' => ['Kids', 'Study', 'Compact', 'Durable', 'Kid-Friendly'],
            'Toy Storage Box' => ['Storage', 'Kids', 'Kid-Friendly', 'Durable', 'Organized'],
            'Children\'s Chair' => ['Kids', 'Kid-Friendly', 'Comfortable', 'Durable', 'Compact'],
            
            // Pet Products
            'Pet Bed' => ['Pet-Friendly', 'Comfortable', 'Durable', 'Easy to clean', 'Soft'],
            'Pet Feeding Station' => ['Pet-Friendly', 'Feeding', 'Organized', 'Durable', 'Easy to clean'],
            'Cat Tree' => ['Pet-Friendly', 'Cat furniture', 'Multi-level', 'Durable', 'Entertainment']
        ];

        foreach ($products as $product) {
            $productName = $product->name;
            
            // Find matching tags for this product
            $productTags = [];
            
            // Check exact name match
            if (isset($tagAssignments[$productName])) {
                $productTags = $tagAssignments[$productName];
            } else {
                // Fallback: assign random tags based on category
                $categoryName = $product->category->name ?? '';
                
                // Assign tags based on category
                switch (strtolower($categoryName)) {
                    case 'living room':
                        $productTags = ['Comfortable', 'Contemporary', 'Durable', 'Elegant', 'Multi-Functional'];
                        break;
                    case 'bedroom':
                        $productTags = ['Comfortable', 'Storage', 'Elegant', 'Durable', 'Relaxation'];
                        break;
                    case 'dining room':
                        $productTags = ['Dining', 'Comfortable', 'Elegant', 'Durable', 'Multi-Functional'];
                        break;
                    case 'office':
                        $productTags = ['Professional', 'Durable', 'Storage', 'Comfortable', 'Work'];
                        break;
                    case 'kitchen':
                        $productTags = ['Storage', 'Multi-Functional', 'Durable', 'Organized', 'Contemporary'];
                        break;
                    case 'bathroom':
                        $productTags = ['Storage', 'Easy to clean', 'Compact', 'Durable', 'Contemporary'];
                        break;
                    case 'outdoor':
                        $productTags = ['Outdoor', 'Weather-Resistant', 'Durable', 'Comfortable', 'UV-Protected'];
                        break;
                    default:
                        $productTags = ['Durable', 'Contemporary', 'Comfortable', 'Elegant', 'Multi-Functional'];
                        break;
                }
            }
            
            // Get tag IDs
            $tagIds = [];
            foreach ($productTags as $tagName) {
                $tag = $tags->where('name', $tagName)->first();
                if ($tag) {
                    $tagIds[] = $tag->id;
                }
            }
            
            // Assign tags to product (2-5 tags per product)
            if (!empty($tagIds)) {
                $selectedTagIds = array_slice($tagIds, 0, rand(2, min(5, count($tagIds))));
                $product->tags()->attach($selectedTagIds);
            }
        }
    }
} 