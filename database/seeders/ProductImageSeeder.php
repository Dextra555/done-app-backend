<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductImage;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::all();

        foreach ($products as $product) {
            // Create main image
            ProductImage::create([
                'product_id' => $product->id,
                'image_url' => 'products/' . $product->id . '_main.webp',
                'type' => 'main',
                'sort_order' => 0,
                'is_active' => true
            ]);

            // Create gallery images (2-4 images per product)
            $galleryCount = rand(2, 4);
            for ($i = 1; $i <= $galleryCount; $i++) {
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_url' => 'products/' . $product->id . '_gallery_' . $i . '.webp',
                    'type' => 'gallery',
                    'sort_order' => $i,
                    'is_active' => true
                ]);
            }

            // Create thumbnail images (1-2 images per product)
            $thumbnailCount = rand(1, 2);
            for ($i = 1; $i <= $thumbnailCount; $i++) {
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_url' => 'products/' . $product->id . '_thumb_' . $i . '.webp',
                    'type' => 'thumbnail',
                    'sort_order' => $i,
                    'is_active' => true
                ]);
            }
        }
    }
} 