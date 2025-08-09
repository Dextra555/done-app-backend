<?php

namespace App\Http\Controllers\Api\B2C;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\AttributeValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductVariantController extends Controller
{
    /**
     * Get all variants for a specific product
     */
    public function index(Request $request, $productId)
    {
        try {
            $product = Product::active()->find($productId);
            
            if (!$product) {
                return response()->json([
                    'status' => false,
                    'message' => 'Product not found'
                ], 404);
            }

            $variants = $product->variants()
                ->with(['images', 'attributeValues.attribute', 'attributeValues.subAttribute', 'product.tags'])
                ->where('stock', '>', 0)
                ->get();

            return response()->json([
                'status' => true,
                'message' => 'Product variants retrieved successfully',
                'data' => [
                    'product' => [
                        'id' => $product->id,
                        'name' => $product->name,
                        'slug' => $product->slug
                    ],
                    'variants' => $variants->map(function ($variant) {
                        return $this->formatVariant($variant);
                    })
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to retrieve product variants',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get a specific variant by ID
     */
    public function show(Request $request, $productId, $variantId)
    {
        try {
            $product = Product::active()->find($productId);
            
            if (!$product) {
                return response()->json([
                    'status' => false,
                    'message' => 'Product not found'
                ], 404);
            }

            $variant = $product->variants()
                ->with(['images', 'attributeValues.attribute', 'attributeValues.subAttribute', 'product.tags'])
                ->find($variantId);

            if (!$variant) {
                return response()->json([
                    'status' => false,
                    'message' => 'Product variant not found'
                ], 404);
            }

            return response()->json([
                'status' => true,
                'message' => 'Product variant retrieved successfully',
                'data' => [
                    'product' => [
                        'id' => $product->id,
                        'name' => $product->name,
                        'slug' => $product->slug
                    ],
                    'variant' => $this->formatVariantDetail($variant)
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to retrieve product variant',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get variants by attribute combination
     */
    public function getByAttributes(Request $request, $productId)
    {
        $validator = Validator::make($request->all(), [
            'attribute_values' => 'required|array',
            'attribute_values.*' => 'integer|exists:attribute_values,id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $attributeValueIds = $request->input('attribute_values', []);
            $product = Product::active()->find($productId);

            if (!$product) {
                return response()->json([
                    'status' => false,
                    'message' => 'Product not found'
                ], 404);
            }

            $variants = ProductVariant::with(['images', 'attributeValues.attribute', 'attributeValues.subAttribute'])
                ->where('product_id', $productId)
                ->whereHas('attributeValues', function ($query) use ($attributeValueIds) {
                    $query->whereIn('attribute_values.id', $attributeValueIds);
                }, '=', count($attributeValueIds))
                ->get();

            return response()->json([
                'status' => true,
                'message' => 'Variants by attributes retrieved successfully',
                'data' => [
                    'product' => [
                        'id' => $product->id,
                        'name' => $product->name,
                        'slug' => $product->slug
                    ],
                    'variants' => $variants->map(function ($variant) {
                        return [
                            'id' => $variant->id,
                            'sku' => $variant->sku,
                            'price' => $variant->price,
                            'selling_price' => $variant->selling_price ?? $variant->price,
                            'original_price' => $variant->original_price ?? $variant->price,
                            'cost_price' => $variant->cost_price,
                            'stock' => $variant->stock,
                            'min_stock' => $variant->min_stock ?? 0,
                            'is_in_stock' => $variant->stock > 0,
                            'is_low_stock' => $variant->stock <= ($variant->min_stock ?? 5),
                            'is_on_sale' => $variant->selling_price && $variant->original_price && $variant->selling_price < $variant->original_price,
                            'discount_percentage' => $variant->selling_price && $variant->original_price && $variant->selling_price < $variant->original_price
                                ? round((($variant->original_price - $variant->selling_price) / $variant->original_price) * 100, 2)
                                : 0,
                            'images' => [
                                'main_image' => $variant->image_url ? url($variant->image_url) : null,
                                'other_images' => $variant->images->map(function ($image) {
                                    return [
                                        'id' => $image->id,
                                        'url' => url($image->image_url),
                                        'type' => $image->type,
                                        'sort_order' => $image->sort_order
                                    ];
                                })
                            ],
                            'attributes' => $variant->attributeValues->map(function ($attributeValue) {
                                return [
                                    'attribute_id' => $attributeValue->attribute->id,
                                    'attribute_name' => $attributeValue->attribute->name,
                                    'value_id' => $attributeValue->id,
                                    'value_name' => $attributeValue->value,
                                    'sub_attribute' => $attributeValue->subAttribute ? [
                                        'id' => $attributeValue->subAttribute->id,
                                        'name' => $attributeValue->subAttribute->name
                                    ] : null
                                ];
                            })
                        ];
                    })
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to retrieve variants by attributes',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get available attribute combinations for a product
     */
    public function getAttributeCombinations(Request $request, $productId)
    {
        try {
            $product = Product::active()->find($productId);
            
            if (!$product) {
                return response()->json([
                    'status' => false,
                    'message' => 'Product not found'
                ], 404);
            }

            $variants = $product->variants()
                ->with(['attributeValues.attribute', 'attributeValues.subAttribute'])
                ->where('stock', '>', 0)
                ->get();

            $attributeCombinations = [];
            $attributes = [];

            foreach ($variants as $variant) {
                $combination = [];
                foreach ($variant->attributeValues as $attributeValue) {
                    $attributeId = $attributeValue->attribute->id;
                    $attributeName = $attributeValue->attribute->name;
                    
                    if (!isset($attributes[$attributeId])) {
                        $attributes[$attributeId] = [
                            'id' => $attributeId,
                            'name' => $attributeName,
                            'values' => []
                        ];
                    }

                    $valueId = $attributeValue->id;
                    $valueName = $attributeValue->value;
                    
                    $combination[$attributeId] = [
                        'attribute_id' => $attributeId,
                        'attribute_name' => $attributeName,
                        'value_id' => $valueId,
                        'value_name' => $valueName
                    ];

                    // Add to attributes list if not already present
                    $exists = false;
                    foreach ($attributes[$attributeId]['values'] as $existingValue) {
                        if ($existingValue['id'] === $valueId) {
                            $exists = true;
                            break;
                        }
                    }
                    
                    if (!$exists) {
                        $attributes[$attributeId]['values'][] = [
                            'id' => $valueId,
                            'name' => $valueName
                        ];
                    }
                }
                
                if (!empty($combination)) {
                    $attributeCombinations[] = [
                        'variant_id' => $variant->id,
                        'sku' => $variant->sku,
                        'price' => $variant->price,
                        'stock' => $variant->stock,
                        'image_url' => $variant->image_url ? url($variant->image_url) : null,
                        'combination' => array_values($combination)
                    ];
                }
            }

            return response()->json([
                'status' => true,
                'message' => 'Attribute combinations retrieved successfully',
                'data' => [
                    'product' => [
                        'id' => $product->id,
                        'name' => $product->name,
                        'slug' => $product->slug
                    ],
                    'attributes' => array_values($attributes),
                    'combinations' => $attributeCombinations
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to retrieve attribute combinations',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get variants by price range
     */
    public function getByPriceRange(Request $request, $productId)
    {
        $validator = Validator::make($request->all(), [
            'min_price' => 'nullable|numeric|min:0',
            'max_price' => 'nullable|numeric|min:0',
            'sort_by' => 'nullable|in:price,stock,created_at',
            'sort_order' => 'nullable|in:asc,desc'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $product = Product::active()->find($productId);
            
            if (!$product) {
                return response()->json([
                    'status' => false,
                    'message' => 'Product not found'
                ], 404);
            }

            $query = $product->variants()
                ->with(['images', 'attributeValues.attribute', 'attributeValues.subAttribute'])
                ->where('stock', '>', 0);

            // Apply price range filter
            if ($request->min_price) {
                $query->where('price', '>=', $request->min_price);
            }
            if ($request->max_price) {
                $query->where('price', '<=', $request->max_price);
            }

            // Apply sorting
            $sortBy = $request->get('sort_by', 'price');
            $sortOrder = $request->get('sort_order', 'asc');
            $query->orderBy($sortBy, $sortOrder);

            $variants = $query->get();

            return response()->json([
                'status' => true,
                'message' => 'Product variants retrieved successfully',
                'data' => [
                    'product' => [
                        'id' => $product->id,
                        'name' => $product->name,
                        'slug' => $product->slug
                    ],
                    'filters' => [
                        'min_price' => $request->min_price,
                        'max_price' => $request->max_price,
                        'sort_by' => $sortBy,
                        'sort_order' => $sortOrder
                    ],
                    'variants' => $variants->map(function ($variant) {
                        return $this->formatVariant($variant);
                    })
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to retrieve product variants',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get variant stock status
     */
    public function getStockStatus(Request $request, $productId, $variantId)
    {
        try {
            $product = Product::active()->find($productId);
            
            if (!$product) {
                return response()->json([
                    'status' => false,
                    'message' => 'Product not found'
                ], 404);
            }

            $variant = $product->variants()->find($variantId);

            if (!$variant) {
                return response()->json([
                    'status' => false,
                    'message' => 'Product variant not found'
                ], 404);
            }

            return response()->json([
                'status' => true,
                'message' => 'Stock status retrieved successfully',
                'data' => [
                    'variant_id' => $variant->id,
                    'sku' => $variant->sku,
                    'stock' => $variant->stock,
                    'is_in_stock' => $variant->is_in_stock,
                    'stock_status' => $this->getStockStatusText($variant->stock)
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to retrieve stock status',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Format variant for list view
     */
    private function formatVariant($variant)
    {
        return [
            'id' => $variant->id,
            'sku' => $variant->sku,
            'price' => $variant->price,
            'selling_price' => $variant->main_selling_price,
            'original_price' => $variant->original_price,
            'cost_price' => $variant->cost_price,
            'stock' => $variant->stock,
            'min_stock' => $variant->min_stock,
            'is_in_stock' => $variant->is_in_stock,
            'is_low_stock' => $variant->is_low_stock,
            'is_on_sale' => $variant->is_on_sale,
            'discount_percentage' => $variant->discount_percentage,
            'is_active' => $variant->is_active,
            'is_featured' => $variant->is_featured,
            'average_rating' => $variant->average_rating,
            'review_count' => $variant->review_count,
            'image_url' => $variant->image_url ? url($variant->image_url) : null,
            'variant_tags' => $variant->tags->map(function ($tag) {
                return [
                    'id' => $tag->id,
                    'name' => $tag->name
                ];
            }),
            'product_tags' => $variant->product->tags->map(function ($tag) {
                return [
                    'id' => $tag->id,
                    'name' => $tag->name
                ];
            }),
            'attributes' => $variant->attributeValues->map(function ($attributeValue) {
                return [
                    'attribute_id' => $attributeValue->attribute->id,
                    'attribute_name' => $attributeValue->attribute->name,
                    'value_id' => $attributeValue->id,
                    'value_name' => $attributeValue->value,
                    'sub_attribute' => $attributeValue->subAttribute ? [
                        'id' => $attributeValue->subAttribute->id,
                        'name' => $attributeValue->subAttribute->name
                    ] : null
                ];
            })
        ];
    }

    /**
     * Format variant for detail view
     */
    private function formatVariantDetail($variant)
    {
        $formattedVariant = $this->formatVariant($variant);
        
        $formattedVariant['images'] = $variant->images->map(function ($image) {
            return [
                'id' => $image->id,
                'image_url' => $image->image_url ? url($image->image_url) : null,
                'type' => $image->type,
                'is_primary' => $image->is_primary ?? false
            ];
        });

        return $formattedVariant;
    }

    /**
     * Get stock status text
     */
    private function getStockStatusText($stock)
    {
        if ($stock <= 0) {
            return 'out_of_stock';
        } elseif ($stock <= 5) {
            return 'low_stock';
        } else {
            return 'in_stock';
        }
    }
} 