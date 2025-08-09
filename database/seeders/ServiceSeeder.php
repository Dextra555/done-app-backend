<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'serviceName' => 'Furniture Assembly Service',
                'uploadedDate' => now()->subDays(30),
                'createdDate' => now()->subDays(35),
                'category_name' => 'Living Room',
                'product_name' => 'Modern 3-Seater Fabric Sofa',
            ],
            [
                'serviceName' => 'Custom Furniture Design',
                'uploadedDate' => now()->subDays(25),
                'createdDate' => now()->subDays(30),
                'category_name' => 'Bedroom',
                'product_name' => 'Queen Size Platform Bed',
            ],
            [
                'serviceName' => 'Furniture Delivery & Installation',
                'uploadedDate' => now()->subDays(20),
                'createdDate' => now()->subDays(25),
                'category_name' => 'Dining Room',
                'product_name' => 'Extendable Dining Table Set',
            ],
            [
                'serviceName' => 'Furniture Repair & Restoration',
                'uploadedDate' => now()->subDays(15),
                'createdDate' => now()->subDays(20),
                'category_name' => 'Living Room',
                'product_name' => 'Rustic Wood Coffee Table',
            ],
            [
                'serviceName' => 'Interior Design Consultation',
                'uploadedDate' => now()->subDays(10),
                'createdDate' => now()->subDays(15),
                'category_name' => 'Office',
                'product_name' => 'L-Shaped Computer Desk',
            ],
            [
                'serviceName' => 'Furniture Moving & Relocation',
                'uploadedDate' => now()->subDays(5),
                'createdDate' => now()->subDays(10),
                'category_name' => 'Kitchen',
                'product_name' => 'Rolling Kitchen Island Cart',
            ],
            [
                'serviceName' => 'Custom Upholstery Service',
                'uploadedDate' => now()->subDays(3),
                'createdDate' => now()->subDays(8),
                'category_name' => 'Living Room',
                'product_name' => 'Modern 3-Seater Fabric Sofa',
            ],
            [
                'serviceName' => 'Furniture Refinishing',
                'uploadedDate' => now()->subDays(1),
                'createdDate' => now()->subDays(5),
                'category_name' => 'Bedroom',
                'product_name' => '6-Drawer Dresser with Mirror',
            ],
        ];

        foreach ($services as $service) {
            $category = Category::where('name', $service['category_name'])->first();
            $product = Product::where('name', $service['product_name'])->first();
            
            Service::create([
                'serviceName' => $service['serviceName'],
                'uploadedDate' => $service['uploadedDate'],
                'createdDate' => $service['createdDate'],
                'categoryID' => $category ? $category->id : null,
                'productID' => $product ? $product->id : null,
            ]);
        }
    }
} 