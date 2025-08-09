<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            // Living Room Products
            [
                'category_name' => 'Living Room',
                'name' => 'Modern 3-Seater Fabric Sofa',
                'description' => 'Comfortable 3-seater sofa with premium fabric upholstery. Perfect for modern living rooms.',
                'key_features' => 'Premium fabric, High-density foam, Sturdy wooden frame, Easy assembly',
                'cost_price' => 450.00,
                'selling_price' => 699.99,
                'stock' => 25,
                'status' => 'active',
                'average_rating' => 4.5,
                'review_count' => 12,
            ],
            [
                'category_name' => 'Living Room',
                'name' => 'Rustic Wood Coffee Table',
                'description' => 'Beautiful rustic coffee table made from solid wood with natural finish.',
                'key_features' => 'Solid wood construction, Natural finish, Storage shelf, Easy to clean',
                'cost_price' => 120.00,
                'selling_price' => 199.99,
                'stock' => 15,
                'status' => 'active',
                'average_rating' => 4.3,
                'review_count' => 8,
            ],
            [
                'category_name' => 'Living Room',
                'name' => 'Modern TV Stand with Storage',
                'description' => 'Contemporary TV stand with ample storage space for media equipment.',
                'key_features' => 'Cable management, Multiple shelves, Glass doors, LED lighting',
                'cost_price' => 180.00,
                'selling_price' => 299.99,
                'stock' => 20,
                'status' => 'active',
                'average_rating' => 4.7,
                'review_count' => 15,
            ],
            
            // Bedroom Products
            [
                'category_name' => 'Bedroom',
                'name' => 'Queen Size Platform Bed',
                'description' => 'Elegant queen size platform bed with upholstered headboard.',
                'key_features' => 'Queen size, Upholstered headboard, Platform design, No box spring needed',
                'cost_price' => 300.00,
                'selling_price' => 499.99,
                'stock' => 18,
                'status' => 'active',
                'average_rating' => 4.6,
                'review_count' => 22,
            ],
            [
                'category_name' => 'Bedroom',
                'name' => '6-Drawer Dresser with Mirror',
                'description' => 'Spacious 6-drawer dresser with attached mirror for bedroom organization.',
                'key_features' => '6 spacious drawers, Attached mirror, Solid wood construction, Smooth gliding drawers',
                'cost_price' => 250.00,
                'selling_price' => 399.99,
                'stock' => 12,
                'status' => 'active',
                'average_rating' => 4.4,
                'review_count' => 9,
            ],
            [
                'category_name' => 'Bedroom',
                'name' => 'Modern Nightstand with USB Port',
                'description' => 'Contemporary nightstand with built-in USB charging port and drawer storage.',
                'key_features' => 'USB charging port, Drawer storage, LED night light, Modern design',
                'cost_price' => 80.00,
                'selling_price' => 129.99,
                'stock' => 30,
                'status' => 'active',
                'average_rating' => 4.8,
                'review_count' => 18,
            ],
            
            // Dining Room Products
            [
                'category_name' => 'Dining Room',
                'name' => 'Extendable Dining Table',
                'description' => 'Versatile extendable dining table that seats 6-8 people comfortably.',
                'key_features' => 'Extendable design, Solid wood top, Seats 6-8 people, Easy to maintain',
                'cost_price' => 350.00,
                'selling_price' => 549.99,
                'stock' => 10,
                'status' => 'active',
                'average_rating' => 4.5,
                'review_count' => 14,
            ],
            [
                'category_name' => 'Dining Room',
                'name' => 'Upholstered Dining Chairs',
                'description' => 'Comfortable upholstered dining chairs with padded seats and backs.',
                'key_features' => 'Upholstered seats, Padded backs, Sturdy construction, Easy to clean',
                'cost_price' => 90.00,
                'selling_price' => 149.99,
                'stock' => 40,
                'status' => 'active',
                'average_rating' => 4.4,
                'review_count' => 16,
            ],
            
            // Kitchen Products
            [
                'category_name' => 'Kitchen',
                'name' => 'Kitchen Island with Storage',
                'description' => 'Functional kitchen island with storage drawers and breakfast bar.',
                'key_features' => 'Storage drawers, Breakfast bar, Solid wood construction, Easy assembly',
                'cost_price' => 400.00,
                'selling_price' => 649.99,
                'stock' => 8,
                'status' => 'active',
                'average_rating' => 4.6,
                'review_count' => 11,
            ],
            [
                'category_name' => 'Kitchen',
                'name' => 'Bar Stools Set of 3',
                'description' => 'Modern bar stools perfect for kitchen islands and breakfast bars.',
                'key_features' => 'Set of 3, Adjustable height, Padded seats, Modern design',
                'cost_price' => 150.00,
                'selling_price' => 249.99,
                'stock' => 15,
                'status' => 'active',
                'average_rating' => 4.4,
                'review_count' => 13,
            ],
            
            // Office Products
            [
                'category_name' => 'Office',
                'name' => 'L-Shaped Computer Desk',
                'description' => 'Spacious L-shaped desk perfect for home office or gaming setup.',
                'key_features' => 'L-shaped design, Cable management, Keyboard tray, Monitor stand',
                'cost_price' => 200.00,
                'selling_price' => 349.99,
                'stock' => 12,
                'status' => 'active',
                'average_rating' => 4.7,
                'review_count' => 19,
            ],
            [
                'category_name' => 'Office',
                'name' => 'Ergonomic Office Chair',
                'description' => 'Comfortable ergonomic office chair with adjustable features and lumbar support.',
                'key_features' => 'Ergonomic design, Adjustable height, Lumbar support, Breathable mesh',
                'cost_price' => 180.00,
                'selling_price' => 279.99,
                'stock' => 18,
                'status' => 'active',
                'average_rating' => 4.8,
                'review_count' => 25,
            ],
            
            // Outdoor Products
            [
                'category_name' => 'Outdoor',
                'name' => 'Weather-Resistant Patio Set',
                'description' => 'Durable patio furniture set with table and 4 chairs for outdoor dining.',
                'key_features' => 'Weather-resistant, UV-protected, Easy to clean, Folding chairs',
                'cost_price' => 300.00,
                'selling_price' => 449.99,
                'stock' => 8,
                'status' => 'active',
                'average_rating' => 4.5,
                'review_count' => 10,
            ],
            
            // Bathroom Products
            [
                'category_name' => 'Bathroom',
                'name' => 'Double Sink Bathroom Vanity',
                'description' => 'Elegant double sink vanity with storage and mirror for master bathroom.',
                'key_features' => 'Double sinks, Ample storage, Integrated mirror, Soft-close drawers',
                'cost_price' => 400.00,
                'selling_price' => 599.99,
                'stock' => 6,
                'status' => 'active',
                'average_rating' => 4.6,
                'review_count' => 7,
            ],
            
            // Kids Room Products
            [
                'category_name' => 'Kids Room',
                'name' => 'Twin Size Loft Bed',
                'description' => 'Space-saving loft bed with desk underneath, perfect for kids rooms.',
                'key_features' => 'Loft design, Built-in desk, Safety rails, Ladder included',
                'cost_price' => 250.00,
                'selling_price' => 399.99,
                'stock' => 10,
                'status' => 'active',
                'average_rating' => 4.7,
                'review_count' => 12,
            ],
        ];

        foreach ($products as $product) {
            $category = Category::where('name', $product['category_name'])->first();
            
            if ($category) {
                Product::create([
                    'category_id' => $category->id,
                    'name' => $product['name'],
                    'description' => $product['description'],
                    'key_features' => $product['key_features'],
                    'cost_price' => $product['cost_price'],
                    'selling_price' => $product['selling_price'],
                    'stock' => $product['stock'],
                    'status' => $product['status'],
                    'average_rating' => $product['average_rating'],
                    'review_count' => $product['review_count'],
                ]);
            }
        }
    }
} 