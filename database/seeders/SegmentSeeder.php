<?php

namespace Database\Seeders;

use App\Models\Segment;
use Illuminate\Database\Seeder;

class SegmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $segments = [
            [
                'name' => 'Featured',
                'slug' => 'featured',
                'description' => 'Handpicked selection of our best products',
                'is_active' => true,
                'sort_order' => 1,
                'icon' => 'star'
            ],
            [
                'name' => 'Trending',
                'slug' => 'trending',
                'description' => 'Products that are currently popular',
                'is_active' => true,
                'sort_order' => 2,
                'icon' => 'trending-up'
            ],
            [
                'name' => 'Top Sales',
                'slug' => 'top-sales',
                'description' => 'Our best selling products',
                'is_active' => true,
                'sort_order' => 3,
                'icon' => 'award'
            ],
            [
                'name' => 'New Arrivals',
                'slug' => 'new-arrivals',
                'description' => 'Check out our latest products',
                'is_active' => true,
                'sort_order' => 4,
                'icon' => 'clock'
            ],
            [
                'name' => 'Best Deals',
                'slug' => 'best-deals',
                'description' => 'Special offers and discounts',
                'is_active' => true,
                'sort_order' => 5,
                'icon' => 'percent'
            ]
        ];

        foreach ($segments as $segment) {
            Segment::updateOrCreate(
                ['slug' => $segment['slug']],
                $segment
            );
        }
    }
}
