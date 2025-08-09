<?php

namespace Database\Seeders;

use App\Models\AttributeSubAttribute;
use App\Models\ProductAttribute;
use Illuminate\Database\Seeder;

class AttributeSubAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subAttributes = [
            // Material sub-attributes
            ['attribute_name' => 'Material', 'name' => 'Wood'],
            ['attribute_name' => 'Material', 'name' => 'Metal'],
            ['attribute_name' => 'Material', 'name' => 'Fabric'],
            ['attribute_name' => 'Material', 'name' => 'Leather'],
            ['attribute_name' => 'Material', 'name' => 'Plastic'],
            ['attribute_name' => 'Material', 'name' => 'Glass'],
            ['attribute_name' => 'Material', 'name' => 'Marble'],
            ['attribute_name' => 'Material', 'name' => 'Granite'],
            
            // Color sub-attributes
            ['attribute_name' => 'Color', 'name' => 'Brown'],
            ['attribute_name' => 'Color', 'name' => 'Black'],
            ['attribute_name' => 'Color', 'name' => 'White'],
            ['attribute_name' => 'Color', 'name' => 'Gray'],
            ['attribute_name' => 'Color', 'name' => 'Beige'],
            ['attribute_name' => 'Color', 'name' => 'Blue'],
            ['attribute_name' => 'Color', 'name' => 'Red'],
            ['attribute_name' => 'Color', 'name' => 'Green'],
            
            // Size sub-attributes
            ['attribute_name' => 'Size', 'name' => 'Small'],
            ['attribute_name' => 'Size', 'name' => 'Medium'],
            ['attribute_name' => 'Size', 'name' => 'Large'],
            ['attribute_name' => 'Size', 'name' => 'Extra Large'],
            
            // Style sub-attributes
            ['attribute_name' => 'Style', 'name' => 'Modern'],
            ['attribute_name' => 'Style', 'name' => 'Traditional'],
            ['attribute_name' => 'Style', 'name' => 'Contemporary'],
            ['attribute_name' => 'Style', 'name' => 'Industrial'],
            ['attribute_name' => 'Style', 'name' => 'Rustic'],
            ['attribute_name' => 'Style', 'name' => 'Minimalist'],
            ['attribute_name' => 'Style', 'name' => 'Vintage'],
            ['attribute_name' => 'Style', 'name' => 'Scandinavian'],
            
            // Finish sub-attributes
            ['attribute_name' => 'Finish', 'name' => 'Natural'],
            ['attribute_name' => 'Finish', 'name' => 'Stained'],
            ['attribute_name' => 'Finish', 'name' => 'Painted'],
            ['attribute_name' => 'Finish', 'name' => 'Distressed'],
            ['attribute_name' => 'Finish', 'name' => 'Glossy'],
            ['attribute_name' => 'Finish', 'name' => 'Matte'],
            
            // Brand sub-attributes
            ['attribute_name' => 'Brand', 'name' => 'IKEA'],
            ['attribute_name' => 'Brand', 'name' => 'Ashley Furniture'],
            ['attribute_name' => 'Brand', 'name' => 'Pottery Barn'],
            ['attribute_name' => 'Brand', 'name' => 'West Elm'],
            ['attribute_name' => 'Brand', 'name' => 'Crate & Barrel'],
            ['attribute_name' => 'Brand', 'name' => 'Ethan Allen'],
            ['attribute_name' => 'Brand', 'name' => 'La-Z-Boy'],
            ['attribute_name' => 'Brand', 'name' => 'Bassett Furniture'],
            
            // Weight Capacity sub-attributes
            ['attribute_name' => 'Weight Capacity', 'name' => 'Up to 200 lbs'],
            ['attribute_name' => 'Weight Capacity', 'name' => 'Up to 300 lbs'],
            ['attribute_name' => 'Weight Capacity', 'name' => 'Up to 400 lbs'],
            ['attribute_name' => 'Weight Capacity', 'name' => 'Up to 500 lbs'],
            
            // Assembly Required sub-attributes
            ['attribute_name' => 'Assembly Required', 'name' => 'Yes'],
            ['attribute_name' => 'Assembly Required', 'name' => 'No'],
            ['attribute_name' => 'Assembly Required', 'name' => 'Minimal'],
            
            // Warranty sub-attributes
            ['attribute_name' => 'Warranty', 'name' => '1 Year'],
            ['attribute_name' => 'Warranty', 'name' => '2 Years'],
            ['attribute_name' => 'Warranty', 'name' => '3 Years'],
            ['attribute_name' => 'Warranty', 'name' => '5 Years'],
            ['attribute_name' => 'Warranty', 'name' => 'Lifetime'],
            
            // Frame Material sub-attributes
            ['attribute_name' => 'Frame Material', 'name' => 'Solid Wood'],
            ['attribute_name' => 'Frame Material', 'name' => 'Engineered Wood'],
            ['attribute_name' => 'Frame Material', 'name' => 'Metal'],
            ['attribute_name' => 'Frame Material', 'name' => 'Plywood'],
            ['attribute_name' => 'Frame Material', 'name' => 'MDF'],
            
            // Upholstery Type sub-attributes
            ['attribute_name' => 'Upholstery Type', 'name' => 'Fabric'],
            ['attribute_name' => 'Upholstery Type', 'name' => 'Leather'],
            ['attribute_name' => 'Upholstery Type', 'name' => 'Faux Leather'],
            ['attribute_name' => 'Upholstery Type', 'name' => 'Microfiber'],
            ['attribute_name' => 'Upholstery Type', 'name' => 'Velvet'],
            ['attribute_name' => 'Upholstery Type', 'name' => 'Linen'],
        ];

        foreach ($subAttributes as $subAttribute) {
            $attribute = ProductAttribute::where('name', $subAttribute['attribute_name'])->first();
            if ($attribute) {
                AttributeSubAttribute::create([
                    'attribute_id' => $attribute->id,
                    'name' => $subAttribute['name'],
                ]);
            }
        }
    }
} 