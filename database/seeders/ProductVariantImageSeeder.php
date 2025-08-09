<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductVariant;
use App\Models\ProductVariantImage;

class ProductVariantImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $variants = ProductVariant::all();

        foreach ($variants as $variant) {
            // Create main image
            ProductVariantImage::create([
                'variant_id' => $variant->id,
                'image_url' => 'variants/' . $variant->id . '_main.webp',
                'type' => 'main',
                'sort_order' => 0,
                'is_active' => true
            ]);

            // Create gallery images (1-3 images per variant)
            $galleryCount = rand(1, 3);
            for ($i = 1; $i <= $galleryCount; $i++) {
                ProductVariantImage::create([
                    'variant_id' => $variant->id,
                    'image_url' => 'variants/' . $variant->id . '_gallery_' . $i . '.webp',
                    'type' => 'gallery',
                    'sort_order' => $i,
                    'is_active' => true
                ]);
            }
        }
    }
} 