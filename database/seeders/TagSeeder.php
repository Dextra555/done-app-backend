<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            'Eco-Friendly',
            'Handcrafted',
            'Vintage',
            'Luxury',
            'Budget-Friendly',
            'Space-Saving',
            'Multi-Functional',
            'Pet-Friendly',
            'Kid-Friendly',
            'Waterproof',
            'Fire-Resistant',
            'Antique',
            'Contemporary',
            'Minimalist',
            'Bohemian',
            'Industrial',
            'Scandinavian',
            'Mid-Century Modern',
            'Art Deco',
            'Farmhouse',
            'Coastal',
            'Urban',
            'Rustic',
            'Elegant',
            'Comfortable',
            'Durable',
            'Easy Assembly',
            'Customizable',
            'Limited Edition',
            'Best Seller',
            'New Arrival',
            'Sale',
            'Premium',
            'Affordable',
            'High-End',
            'Compact',
            'Large',
            'Lightweight',
            'Heavy Duty',
            'Foldable',
            'Stackable',
            'Modular',
            'Convertible',
            'Reclining',
            'Swivel',
            'Rocking',
            'Gliding',
            'Storage',
            'Display',
            'Work',
            'Relaxation',
            'Entertainment',
            'Dining',
            'Sleeping',
            'Study',
            'Gaming',
            'Outdoor',
            'Indoor',
            'Weather-Resistant',
            'UV-Protected',
            'Stain-Resistant',
            'Scratch-Resistant',
        ];

        foreach ($tags as $tagName) {
            Tag::create(['name' => $tagName]);
        }
    }
} 