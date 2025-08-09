<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Living Room',
                'slug' => 'living-room',
                'description' => 'Comfortable and stylish furniture for your living space',
                'image_url' => '/images/categories/living-room.jpg',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bedroom',
                'slug' => 'bedroom',
                'description' => 'Peaceful and functional bedroom furniture',
                'image_url' => '/images/categories/bedroom.jpg',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dining Room',
                'slug' => 'dining-room',
                'description' => 'Elegant dining furniture for family gatherings',
                'image_url' => '/images/categories/dining-room.jpg',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kitchen',
                'slug' => 'kitchen',
                'description' => 'Practical and modern kitchen furniture',
                'image_url' => '/images/categories/kitchen.jpg',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Office',
                'slug' => 'office',
                'description' => 'Professional and ergonomic office furniture',
                'image_url' => '/images/categories/office.jpg',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Outdoor',
                'slug' => 'outdoor',
                'description' => 'Durable and weather-resistant outdoor furniture',
                'image_url' => '/images/categories/outdoor.jpg',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bathroom',
                'slug' => 'bathroom',
                'description' => 'Functional and stylish bathroom furniture',
                'image_url' => '/images/categories/bathroom.jpg',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kids Room',
                'slug' => 'kids-room',
                'description' => 'Safe and fun furniture for children',
                'image_url' => '/images/categories/kids-room.jpg',
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Category::insert($categories);
    }
} 