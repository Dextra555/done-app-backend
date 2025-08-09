<?php

namespace Database\Seeders;

use App\Models\ProductAttribute;
use Illuminate\Database\Seeder;

class ProductAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $attributes = [
            ['name' => 'Material'],
            ['name' => 'Color'],
            ['name' => 'Size'],
            ['name' => 'Style'],
            ['name' => 'Finish'],
            ['name' => 'Brand'],
            ['name' => 'Weight Capacity'],
            ['name' => 'Assembly Required'],
            ['name' => 'Warranty'],
            ['name' => 'Frame Material'],
            ['name' => 'Upholstery Type'],
            ['name' => 'Seat Height'],
            ['name' => 'Seat Depth'],
            ['name' => 'Seat Width'],
            ['name' => 'Table Height'],
            ['name' => 'Table Length'],
            ['name' => 'Table Width'],
            ['name' => 'Drawer Count'],
            ['name' => 'Shelf Count'],
            ['name' => 'Door Count'],
        ];

        foreach ($attributes as $attribute) {
            ProductAttribute::create($attribute);
        }
    }
} 