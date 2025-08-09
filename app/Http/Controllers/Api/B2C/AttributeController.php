<?php

namespace App\Http\Controllers\Api\B2C;

use App\Http\Controllers\Controller;
use App\Models\ProductAttribute;
use App\Models\AttributeValue;
use App\Models\AttributeSubAttribute;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class AttributeController extends Controller
{
    /**
     * Get all attributes with their values
     */
    public function index(): JsonResponse
    {
        try {
            $attributes = ProductAttribute::with(['subAttributes', 'values.subAttribute'])
                ->get()
                ->map(function ($attribute) {
                    return [
                        'id' => $attribute->id,
                        'name' => $attribute->name,
                        'sub_attributes' => $attribute->subAttributes->map(function ($subAttr) {
                            return [
                                'id' => $subAttr->id,
                                'name' => $subAttr->name,
                            ];
                        }),
                        'values' => $attribute->values->map(function ($value) {
                            return [
                                'id' => $value->id,
                                'value' => $value->value,
                                'sub_attribute_id' => $value->sub_attribute_id,
                                'sub_attribute_name' => $value->subAttribute ? $value->subAttribute->name : null,
                            ];
                        }),
                    ];
                });

            return response()->json([
                'status' => true,
                'message' => 'Attributes retrieved successfully',
                'data' => $attributes
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to retrieve attributes',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get a specific attribute with its values
     */
    public function show($id): JsonResponse
    {
        try {
            $attribute = ProductAttribute::with(['subAttributes', 'values.subAttribute'])
                ->findOrFail($id);

            $data = [
                'id' => $attribute->id,
                'name' => $attribute->name,
                'sub_attributes' => $attribute->subAttributes->map(function ($subAttr) {
                    return [
                        'id' => $subAttr->id,
                        'name' => $subAttr->name,
                    ];
                }),
                'values' => $attribute->values->map(function ($value) {
                    return [
                        'id' => $value->id,
                        'value' => $value->value,
                        'sub_attribute_id' => $value->sub_attribute_id,
                        'sub_attribute_name' => $value->subAttribute ? $value->subAttribute->name : null,
                    ];
                }),
            ];

            return response()->json([
                'status' => true,
                'message' => 'Attribute retrieved successfully',
                'data' => $data
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Attribute not found',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    /**
     * Get attribute values for a specific attribute
     */
    public function getValues($attributeId): JsonResponse
    {
        try {
            $values = AttributeValue::where('attribute_id', $attributeId)
                ->with('subAttribute')
                ->get()
                ->map(function ($value) {
                    return [
                        'id' => $value->id,
                        'value' => $value->value,
                        'sub_attribute_id' => $value->sub_attribute_id,
                        'sub_attribute_name' => $value->subAttribute ? $value->subAttribute->name : null,
                    ];
                });

            return response()->json([
                'status' => true,
                'message' => 'Attribute values retrieved successfully',
                'data' => $values
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to retrieve attribute values',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get sub-attributes for a specific attribute
     */
    public function getSubAttributes($attributeId): JsonResponse
    {
        try {
            $subAttributes = AttributeSubAttribute::where('attribute_id', $attributeId)
                ->get()
                ->map(function ($subAttr) {
                    return [
                        'id' => $subAttr->id,
                        'name' => $subAttr->name,
                    ];
                });

            return response()->json([
                'status' => true,
                'message' => 'Sub-attributes retrieved successfully',
                'data' => $subAttributes
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to retrieve sub-attributes',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Search attributes by name
     */
    public function search(Request $request): JsonResponse
    {
        try {
            $query = $request->input('query', '');
            
            if (empty($query)) {
                return response()->json([
                    'status' => false,
                    'message' => 'Search query is required'
                ], 400);
            }

            $attributes = ProductAttribute::where('name', 'LIKE', "%{$query}%")
                ->with(['subAttributes', 'values.subAttribute'])
                ->get()
                ->map(function ($attribute) {
                    return [
                        'id' => $attribute->id,
                        'name' => $attribute->name,
                        'sub_attributes' => $attribute->subAttributes->map(function ($subAttr) {
                            return [
                                'id' => $subAttr->id,
                                'name' => $subAttr->name,
                            ];
                        }),
                        'values' => $attribute->values->map(function ($value) {
                            return [
                                'id' => $value->id,
                                'value' => $value->value,
                                'sub_attribute_id' => $value->sub_attribute_id,
                                'sub_attribute_name' => $value->subAttribute ? $value->subAttribute->name : null,
                            ];
                        }),
                    ];
                });

            return response()->json([
                'status' => true,
                'message' => 'Attributes search completed',
                'data' => $attributes
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to search attributes',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get attribute combinations for product variants
     */
    public function getCombinations(Request $request): JsonResponse
    {
        try {
            $attributeIds = $request->input('attribute_ids', []);
            
            if (empty($attributeIds)) {
                return response()->json([
                    'status' => false,
                    'message' => 'Attribute IDs are required'
                ], 400);
            }

            $combinations = [];
            
            foreach ($attributeIds as $attributeId) {
                $attribute = ProductAttribute::with(['values.subAttribute'])
                    ->find($attributeId);
                
                if ($attribute) {
                    $combinations[] = [
                        'attribute_id' => $attribute->id,
                        'attribute_name' => $attribute->name,
                        'values' => $attribute->values->map(function ($value) {
                            return [
                                'id' => $value->id,
                                'value' => $value->value,
                                'sub_attribute_id' => $value->sub_attribute_id,
                                'sub_attribute_name' => $value->subAttribute ? $value->subAttribute->name : null,
                            ];
                        })
                    ];
                }
            }

            return response()->json([
                'status' => true,
                'message' => 'Attribute combinations retrieved successfully',
                'data' => $combinations
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to get attribute combinations',
                'error' => $e->getMessage()
            ], 500);
        }
    }
} 