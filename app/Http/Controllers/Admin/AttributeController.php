<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductAttribute;
use App\Models\AttributeSubAttribute;
use App\Models\AttributeValue;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class AttributeController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of attributes
     */
    public function index()
    {
        $attributes = ProductAttribute::with(['subAttributes', 'values'])->get();
        return view('admin.attributes.index', compact('attributes'));
    }

    /**
     * Show the form for creating a new attribute
     */
    public function create()
    {
        return view('admin.attributes.create');
    }

    /**
     * Store a newly created attribute
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:product_attributes,name',
            'sub_attributes' => 'nullable|array',
            'sub_attributes.*' => 'string|max:100',
            'custom_values' => 'nullable|array',
            'custom_values.*' => 'string|max:100',
        ]);

        $attribute = ProductAttribute::create([
            'name' => $request->name,
        ]);

        // Create sub-attributes if provided
        if ($request->has('sub_attributes') && is_array($request->sub_attributes)) {
            foreach ($request->sub_attributes as $subAttrName) {
                if (!empty(trim($subAttrName))) {
                    $subAttribute = AttributeSubAttribute::create([
                        'attribute_id' => $attribute->id,
                        'name' => trim($subAttrName),
                    ]);

                    // Create attribute value for this sub-attribute
                    AttributeValue::create([
                        'attribute_id' => $attribute->id,
                        'sub_attribute_id' => $subAttribute->id,
                        'value' => $subAttribute->name,
                    ]);
                }
            }
        }

        // Create custom values if provided (without sub-attributes)
        if ($request->has('custom_values') && is_array($request->custom_values)) {
            foreach ($request->custom_values as $customValue) {
                if (!empty(trim($customValue))) {
                    AttributeValue::create([
                        'attribute_id' => $attribute->id,
                        'sub_attribute_id' => null,
                        'value' => trim($customValue),
                    ]);
                }
            }
        }

        return redirect()->route('admin.attributes.index')
            ->with('success', 'Attribute created successfully!');
    }

    /**
     * Show the form for editing the specified attribute
     */
    public function edit(ProductAttribute $attribute)
    {
        $attribute->load(['subAttributes', 'values']);
        return view('admin.attributes.edit', compact('attribute'));
    }

    /**
     * Update the specified attribute
     */
    public function update(Request $request, ProductAttribute $attribute)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:product_attributes,name,' . $attribute->id,
            'sub_attributes' => 'nullable|array',
            'sub_attributes.*' => 'string|max:100',
            'custom_values' => 'nullable|array',
            'custom_values.*' => 'string|max:100',
        ]);

        $attribute->update([
            'name' => $request->name,
        ]);

        // Handle sub-attributes
        if ($request->has('sub_attributes')) {
            // Delete existing sub-attributes and their values
            $attribute->subAttributes()->delete();
            $attribute->values()->delete();

            // Create new sub-attributes
            foreach ($request->sub_attributes as $subAttrName) {
                if (!empty(trim($subAttrName))) {
                    $subAttribute = AttributeSubAttribute::create([
                        'attribute_id' => $attribute->id,
                        'name' => trim($subAttrName),
                    ]);

                    // Create attribute value
                    AttributeValue::create([
                        'attribute_id' => $attribute->id,
                        'sub_attribute_id' => $subAttribute->id,
                        'value' => $subAttribute->name,
                    ]);
                }
            }
        }

        // Handle custom values
        if ($request->has('custom_values')) {
            // Delete existing custom values (without sub-attributes)
            $attribute->values()->whereNull('sub_attribute_id')->delete();

            // Create new custom values
            foreach ($request->custom_values as $customValue) {
                if (!empty(trim($customValue))) {
                    AttributeValue::create([
                        'attribute_id' => $attribute->id,
                        'sub_attribute_id' => null,
                        'value' => trim($customValue),
                    ]);
                }
            }
        }

        return redirect()->route('admin.attributes.index')
            ->with('success', 'Attribute updated successfully!');
    }

    /**
     * Remove the specified attribute
     */
    public function destroy(ProductAttribute $attribute)
    {
        // Check if attribute is being used by any variants
        $usedByVariants = $attribute->values()
            ->whereHas('variants')
            ->exists();

        if ($usedByVariants) {
            return back()->with('error', 'Cannot delete attribute that is being used by product variants.');
        }

        $attribute->delete();

        return redirect()->route('admin.attributes.index')
            ->with('success', 'Attribute deleted successfully!');
    }

    /**
     * Get attribute values for AJAX requests
     */
    public function getAttributeValues(Request $request): JsonResponse
    {
        $attributeId = $request->input('attribute_id');
        
        $values = AttributeValue::where('attribute_id', $attributeId)
            ->with(['subAttribute'])
            ->get()
            ->map(function ($value) {
                return [
                    'id' => $value->id,
                    'text' => $value->value ?? $value->subAttribute->name,
                    'sub_attribute_id' => $value->sub_attribute_id,
                ];
            });

        return response()->json($values);
    }

    /**
     * Add a new sub-attribute to an existing attribute
     */
    public function addSubAttribute(Request $request, ProductAttribute $attribute): JsonResponse
    {
        $request->validate([
            'name' => 'required|string|max:100',
        ]);

        $subAttribute = AttributeSubAttribute::create([
            'attribute_id' => $attribute->id,
            'name' => $request->name,
        ]);

        $attributeValue = AttributeValue::create([
            'attribute_id' => $attribute->id,
            'sub_attribute_id' => $subAttribute->id,
            'value' => $subAttribute->name,
        ]);

        return response()->json([
            'success' => true,
            'sub_attribute' => $subAttribute,
            'attribute_value' => $attributeValue,
        ]);
    }

    /**
     * Add a new custom value to an existing attribute
     */
    public function addCustomValue(Request $request, ProductAttribute $attribute): JsonResponse
    {
        $request->validate([
            'value' => 'required|string|max:100',
        ]);

        $attributeValue = AttributeValue::create([
            'attribute_id' => $attribute->id,
            'sub_attribute_id' => null,
            'value' => $request->value,
        ]);

        return response()->json([
            'success' => true,
            'attribute_value' => $attributeValue,
        ]);
    }

    /**
     * Remove a sub-attribute
     */
    public function removeSubAttribute(Request $request, ProductAttribute $attribute): JsonResponse
    {
        $request->validate([
            'sub_attribute_id' => 'required|exists:attribute_sub_attributes,id',
        ]);

        $subAttribute = AttributeSubAttribute::find($request->sub_attribute_id);
        
        // Check if it's being used by variants
        $usedByVariants = $subAttribute->values()
            ->whereHas('variants')
            ->exists();

        if ($usedByVariants) {
            return response()->json([
                'success' => false,
                'message' => 'Cannot delete sub-attribute that is being used by product variants.',
            ], 422);
        }

        $subAttribute->delete();

        return response()->json([
            'success' => true,
            'message' => 'Sub-attribute removed successfully.',
        ]);
    }

    /**
     * Remove a custom value
     */
    public function removeCustomValue(Request $request, ProductAttribute $attribute): JsonResponse
    {
        $request->validate([
            'value_id' => 'required|exists:attribute_values,id',
        ]);

        $attributeValue = AttributeValue::find($request->value_id);
        
        // Check if it's being used by variants
        $usedByVariants = $attributeValue->variants()->exists();

        if ($usedByVariants) {
            return response()->json([
                'success' => false,
                'message' => 'Cannot delete value that is being used by product variants.',
            ], 422);
        }

        $attributeValue->delete();

        return response()->json([
            'success' => true,
            'message' => 'Custom value removed successfully.',
        ]);
    }

    /**
     * Add new attribute via AJAX
     */
    public function addAttribute(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:product_attributes,name',
        ]);

        $attribute = ProductAttribute::create([
            'name' => $request->name,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Attribute created successfully',
            'data' => [
                'id' => $attribute->id,
                'name' => $attribute->name,
            ]
        ]);
    }

    /**
     * Add new sub-attribute via AJAX
     */
    public function addSubAttributeAjax(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'attribute_id' => 'required|exists:product_attributes,id',
        ]);

        // Check if sub-attribute already exists for this attribute
        $existingSubAttr = AttributeSubAttribute::where('attribute_id', $request->attribute_id)
            ->where('name', $request->name)
            ->first();

        if ($existingSubAttr) {
            return response()->json([
                'success' => true,
                'message' => 'Sub-attribute already exists',
                'data' => [
                    'id' => $existingSubAttr->id,
                    'name' => $existingSubAttr->name,
                ]
            ]);
        }

        $subAttribute = AttributeSubAttribute::create([
            'attribute_id' => $request->attribute_id,
            'name' => $request->name,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Sub-attribute created successfully',
            'data' => [
                'id' => $subAttribute->id,
                'name' => $subAttribute->name,
            ]
        ]);
    }

    /**
     * Add new attribute value via AJAX
     */
    public function addAttributeValue(Request $request): JsonResponse
    {
        $request->validate([
            'value' => 'required|string|max:255',
            'attribute_id' => 'required|exists:product_attributes,id',
        ]);

        // Check if value already exists for this attribute
        $existingValue = AttributeValue::where('attribute_id', $request->attribute_id)
            ->where('value', $request->value)
            ->first();

        if ($existingValue) {
            return response()->json([
                'success' => true,
                'message' => 'Value already exists',
                'data' => [
                    'id' => $existingValue->id,
                    'value' => $existingValue->value,
                ]
            ]);
        }

        $attributeValue = AttributeValue::create([
            'attribute_id' => $request->attribute_id,
            'sub_attribute_id' => null,
            'value' => $request->value,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Attribute value created successfully',
            'data' => [
                'id' => $attributeValue->id,
                'value' => $attributeValue->value,
            ]
        ]);
    }

    /**
     * Add new sub-attribute value via AJAX
     */
    public function addSubAttributeValue(Request $request): JsonResponse
    {
        $request->validate([
            'value' => 'required|string|max:255',
            'sub_attribute_id' => 'required|exists:attribute_sub_attributes,id',
        ]);

        // Get the attribute_id from sub_attribute
        $subAttribute = AttributeSubAttribute::find($request->sub_attribute_id);
        if (!$subAttribute) {
            return response()->json([
                'success' => false,
                'message' => 'Sub-attribute not found'
            ], 404);
        }

        // Check if value already exists for this sub-attribute
        $existingValue = AttributeValue::where('sub_attribute_id', $request->sub_attribute_id)
            ->where('value', $request->value)
            ->first();

        if ($existingValue) {
            return response()->json([
                'success' => true,
                'message' => 'Value already exists',
                'data' => [
                    'id' => $existingValue->id,
                    'value' => $existingValue->value,
                ]
            ]);
        }

        $attributeValue = AttributeValue::create([
            'attribute_id' => $subAttribute->attribute_id,
            'sub_attribute_id' => $request->sub_attribute_id,
            'value' => $request->value,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Sub-attribute value created successfully',
            'data' => [
                'id' => $attributeValue->id,
                'value' => $attributeValue->value,
            ]
        ]);
    }
} 