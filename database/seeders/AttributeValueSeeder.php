<?php

namespace Database\Seeders;

use App\Models\AttributeValue;
use App\Models\ProductAttribute;
use App\Models\AttributeSubAttribute;
use Illuminate\Database\Seeder;

class AttributeValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all attributes and their sub-attributes
        $attributes = ProductAttribute::with('subAttributes')->get();

        foreach ($attributes as $attribute) {
            if ($attribute->subAttributes->count() > 0) {
                // Create attribute values for each sub-attribute
                foreach ($attribute->subAttributes as $subAttribute) {
                    AttributeValue::create([
                        'attribute_id' => $attribute->id,
                        'sub_attribute_id' => $subAttribute->id,
                        'value' => $subAttribute->name, // Use sub-attribute name as the value
                    ]);
                }
            } else {
                // For attributes without sub-attributes, create some default values
                $defaultValues = $this->getDefaultValuesForAttribute($attribute->name);
                foreach ($defaultValues as $value) {
                    AttributeValue::create([
                        'attribute_id' => $attribute->id,
                        'sub_attribute_id' => null,
                        'value' => $value,
                    ]);
                }
            }
        }
    }

    /**
     * Get default values for attributes that don't have sub-attributes
     */
    private function getDefaultValuesForAttribute($attributeName)
    {
        $defaultValues = [
            'Seat Height' => ['18"', '20"', '22"', '24"', '26"'],
            'Seat Depth' => ['18"', '20"', '22"', '24"', '26"'],
            'Seat Width' => ['20"', '22"', '24"', '26"', '28"'],
            'Table Height' => ['28"', '30"', '32"', '36"', '42"'],
            'Table Length' => ['36"', '48"', '60"', '72"', '84"'],
            'Table Width' => ['24"', '30"', '36"', '42"', '48"'],
            'Drawer Count' => ['1', '2', '3', '4', '5', '6'],
            'Shelf Count' => ['1', '2', '3', '4', '5', '6'],
            'Door Count' => ['1', '2', '3', '4', '5', '6'],
        ];

        return $defaultValues[$attributeName] ?? ['Standard'];
    }
} 