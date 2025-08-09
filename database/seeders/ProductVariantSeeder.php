<?php

namespace Database\Seeders;

use App\Models\ProductVariant;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductVariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $variants = [
            // Sofa variants
            [
                'product_name' => 'Modern 3-Seater Fabric Sofa',
                'sku' => 'SOFA-001-BLUE',
                'stock' => 8,
                'price' => 699.99,
                'image_url' => 'products/sofa-blue.jpg',
            ],
            [
                'product_name' => 'Modern 3-Seater Fabric Sofa',
                'sku' => 'SOFA-001-GRAY',
                'stock' => 12,
                'price' => 699.99,
                'image_url' => 'products/sofa-gray.jpg',
            ],
            [
                'product_name' => 'Modern 3-Seater Fabric Sofa',
                'sku' => 'SOFA-001-BEIGE',
                'stock' => 5,
                'price' => 699.99,
                'image_url' => 'products/sofa-beige.jpg',
            ],
            
            // Coffee table variants
            [
                'product_name' => 'Rustic Wood Coffee Table',
                'sku' => 'CTABLE-001-NATURAL',
                'stock' => 10,
                'price' => 199.99,
                'image_url' => 'products/coffee-table-natural.jpg',
            ],
            [
                'product_name' => 'Rustic Wood Coffee Table',
                'sku' => 'CTABLE-001-DARK',
                'stock' => 5,
                'price' => 199.99,
                'image_url' => 'products/coffee-table-dark.jpg',
            ],
            
            // TV Stand variants
            [
                'product_name' => 'Modern TV Stand with Storage',
                'sku' => 'TVSTAND-001-BLACK',
                'stock' => 15,
                'price' => 299.99,
                'image_url' => 'products/tv-stand-black.jpg',
            ],
            [
                'product_name' => 'Modern TV Stand with Storage',
                'sku' => 'TVSTAND-001-WHITE',
                'stock' => 5,
                'price' => 299.99,
                'image_url' => 'products/tv-stand-white.jpg',
            ],
            
            // Bed variants
            [
                'product_name' => 'Queen Size Platform Bed',
                'sku' => 'BED-001-WALNUT',
                'stock' => 12,
                'price' => 499.99,
                'image_url' => 'products/bed-walnut.jpg',
            ],
            [
                'product_name' => 'Queen Size Platform Bed',
                'sku' => 'BED-001-OAK',
                'stock' => 6,
                'price' => 499.99,
                'image_url' => 'products/bed-oak.jpg',
            ],
            
            // Dresser variants
            [
                'product_name' => '6-Drawer Dresser with Mirror',
                'sku' => 'DRESSER-001-CHERRY',
                'stock' => 8,
                'price' => 399.99,
                'image_url' => 'products/dresser-cherry.jpg',
            ],
            [
                'product_name' => '6-Drawer Dresser with Mirror',
                'sku' => 'DRESSER-001-MAPLE',
                'stock' => 4,
                'price' => 399.99,
                'image_url' => 'products/dresser-maple.jpg',
            ],
            
            // Nightstand variants
            [
                'product_name' => 'Modern Nightstand with USB Port',
                'sku' => 'NIGHTSTAND-001-BLACK',
                'stock' => 20,
                'price' => 129.99,
                'image_url' => 'products/nightstand-black.jpg',
            ],
            [
                'product_name' => 'Modern Nightstand with USB Port',
                'sku' => 'NIGHTSTAND-001-WHITE',
                'stock' => 10,
                'price' => 129.99,
                'image_url' => 'products/nightstand-white.jpg',
            ],
            
            // Dining table variants
            [
                'product_name' => 'Extendable Dining Table Set',
                'sku' => 'DTABLE-001-OAK',
                'stock' => 6,
                'price' => 899.99,
                'image_url' => 'products/dining-table-oak.jpg',
            ],
            [
                'product_name' => 'Extendable Dining Table Set',
                'sku' => 'DTABLE-001-MAHOGANY',
                'stock' => 4,
                'price' => 899.99,
                'image_url' => 'products/dining-table-mahogany.jpg',
            ],
            
            // Dining chairs variants
            [
                'product_name' => 'Upholstered Dining Chairs Set',
                'sku' => 'DCHAIR-001-BEIGE',
                'stock' => 15,
                'price' => 299.99,
                'image_url' => 'products/dining-chairs-beige.jpg',
            ],
            [
                'product_name' => 'Upholstered Dining Chairs Set',
                'sku' => 'DCHAIR-001-BROWN',
                'stock' => 10,
                'price' => 299.99,
                'image_url' => 'products/dining-chairs-brown.jpg',
            ],
            
            // Kitchen island variants
            [
                'product_name' => 'Rolling Kitchen Island Cart',
                'sku' => 'KISLAND-001-NATURAL',
                'stock' => 10,
                'price' => 249.99,
                'image_url' => 'products/kitchen-island-natural.jpg',
            ],
            [
                'product_name' => 'Rolling Kitchen Island Cart',
                'sku' => 'KISLAND-001-DARK',
                'stock' => 5,
                'price' => 249.99,
                'image_url' => 'products/kitchen-island-dark.jpg',
            ],
            
            // Bar stools variants
            [
                'product_name' => 'Adjustable Bar Stools Set',
                'sku' => 'BSTOOL-001-BLACK',
                'stock' => 15,
                'price' => 189.99,
                'image_url' => 'products/bar-stools-black.jpg',
            ],
            [
                'product_name' => 'Adjustable Bar Stools Set',
                'sku' => 'BSTOOL-001-CHROME',
                'stock' => 5,
                'price' => 189.99,
                'image_url' => 'products/bar-stools-chrome.jpg',
            ],
            
            // Desk variants
            [
                'product_name' => 'L-Shaped Computer Desk',
                'sku' => 'DESK-001-BLACK',
                'stock' => 8,
                'price' => 349.99,
                'image_url' => 'products/desk-black.jpg',
            ],
            [
                'product_name' => 'L-Shaped Computer Desk',
                'sku' => 'DESK-001-WHITE',
                'stock' => 4,
                'price' => 349.99,
                'image_url' => 'products/desk-white.jpg',
            ],
            
            // Office chair variants
            [
                'product_name' => 'Ergonomic Office Chair',
                'sku' => 'OCHAIR-001-BLACK',
                'stock' => 12,
                'price' => 279.99,
                'image_url' => 'products/office-chair-black.jpg',
            ],
            [
                'product_name' => 'Ergonomic Office Chair',
                'sku' => 'OCHAIR-001-GRAY',
                'stock' => 6,
                'price' => 279.99,
                'image_url' => 'products/office-chair-gray.jpg',
            ],
            
            // Patio set variants
            [
                'product_name' => 'Weather-Resistant Patio Set',
                'sku' => 'PATIO-001-BROWN',
                'stock' => 5,
                'price' => 449.99,
                'image_url' => 'products/patio-set-brown.jpg',
            ],
            [
                'product_name' => 'Weather-Resistant Patio Set',
                'sku' => 'PATIO-001-WHITE',
                'stock' => 3,
                'price' => 449.99,
                'image_url' => 'products/patio-set-white.jpg',
            ],
            
            // Vanity variants
            [
                'product_name' => 'Double Sink Bathroom Vanity',
                'sku' => 'VANITY-001-WHITE',
                'stock' => 4,
                'price' => 599.99,
                'image_url' => 'products/vanity-white.jpg',
            ],
            [
                'product_name' => 'Double Sink Bathroom Vanity',
                'sku' => 'VANITY-001-GRAY',
                'stock' => 2,
                'price' => 599.99,
                'image_url' => 'products/vanity-gray.jpg',
            ],
            
            // Loft bed variants
            [
                'product_name' => 'Twin Size Loft Bed',
                'sku' => 'LOFTBED-001-NATURAL',
                'stock' => 6,
                'price' => 399.99,
                'image_url' => 'products/loft-bed-natural.jpg',
            ],
            [
                'product_name' => 'Twin Size Loft Bed',
                'sku' => 'LOFTBED-001-WHITE',
                'stock' => 4,
                'price' => 399.99,
                'image_url' => 'products/loft-bed-white.jpg',
            ],
        ];

        foreach ($variants as $variant) {
            $product = Product::where('name', $variant['product_name'])->first();
            
            if ($product) {
                ProductVariant::create([
                    'product_id' => $product->id,
                    'sku' => $variant['sku'],
                    'stock' => $variant['stock'],
                    'price' => $variant['price'],
                    'image_url' => $variant['image_url'],
                ]);
            }
        }
    }
} 