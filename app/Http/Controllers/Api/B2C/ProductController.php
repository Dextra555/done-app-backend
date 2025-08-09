<?php

namespace App\Http\Controllers\Api\B2C;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductReview;
use App\Models\ProductAttribute;
use App\Models\AttributeValue;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Get all products with pagination and comprehensive filtering
     */
    public function index(Request $request)
    {
        try {
            // Validate request parameters
            $validator = Validator::make($request->all(), [
                'per_page' => 'nullable|integer|min:1|max:100',
                'sort_by' => 'nullable|in:selling_price,average_rating,review_count,created_at,name',
                'sort_order' => 'nullable|in:asc,desc',
                'category_id' => 'nullable|integer|exists:categories,id',
                'min_price' => 'nullable|numeric|min:0',
                'max_price' => 'nullable|numeric|min:0',
                'attribute_values' => 'nullable|array',
                'attribute_values.*' => 'integer|exists:attribute_values,id',
                'rating' => 'nullable|numeric|min:1|max:5',
                'search' => 'nullable|string|max:255',
                'featured' => 'nullable|boolean',
                'on_sale' => 'nullable|boolean'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            $perPage = $request->get('per_page', 12);
            $sortBy = $request->get('sort_by', 'created_at');
            $sortOrder = $request->get('sort_order', 'desc');
            $categoryId = $request->get('category_id');
            $minPrice = $request->get('min_price');
            $maxPrice = $request->get('max_price');
            $attributeValueIds = $request->input('attribute_values', []);
            $rating = $request->get('rating');
            $search = $request->get('search');
            $featured = $request->get('featured');
            $onSale = $request->get('on_sale');

            $query = Product::with([
                'category', 
                'tags',
                'mainVariant', 
                'mainImage',
                'otherImages',
                'variants.attributeValues.attribute',
                'variants.attributeValues.subAttribute',
                'variants.mainImage',
                'variants.otherImages',
                'reviews' => function ($q) {
                    $q->withRating();
                }
            ])
            ->active()
            ->inStock();

            // Apply category filter
            if ($categoryId) {
                $query->where('category_id', $categoryId);
            }

            // Apply price range filter using the new scope
            if ($minPrice || $maxPrice) {
                $query->priceRange($minPrice, $maxPrice);
            }

            // Apply attribute filter
            if (!empty($attributeValueIds)) {
                $query->whereHas('variants.attributeValues', function ($subQuery) use ($attributeValueIds) {
                    $subQuery->whereIn('attribute_values.id', $attributeValueIds);
                }, '>=', 1);
            }

            // Apply rating filter
            if ($rating) {
                $query->whereHas('reviews', function ($subQuery) use ($rating) {
                    $subQuery->havingRaw('AVG(rating) >= ?', [$rating]);
                });
            }

            // Apply search filter
            if ($search) {
                $query->where(function ($subQuery) use ($search) {
                    $subQuery->where('name', 'LIKE', "%{$search}%")
                             ->orWhere('description', 'LIKE', "%{$search}%")
                             ->orWhereHas('category', function ($catQuery) use ($search) {
                                 $catQuery->where('name', 'LIKE', "%{$search}%");
                             });
                });
            }

            // Apply featured filter
            if ($featured !== null) {
                $query->where('is_featured', $featured);
            }

            // Apply on sale filter
            if ($onSale !== null) {
                if ($onSale) {
                    $query->whereHas('variants', function ($subQuery) {
                        $subQuery->where('selling_price', '<', \DB::raw('original_price'));
                    });
                } else {
                    $query->whereDoesntHave('variants', function ($subQuery) {
                        $subQuery->where('selling_price', '<', \DB::raw('original_price'));
                    });
                }
            }

            // Apply sorting
            if ($sortBy === 'selling_price') {
                $query->orderByRaw('(SELECT MIN(selling_price) FROM product_variants WHERE product_variants.product_id = products.id) ' . $sortOrder);
            } elseif ($sortBy === 'average_rating') {
                $query->orderByRaw('(SELECT AVG(rating) FROM product_reviews WHERE product_reviews.product_id = products.id) ' . $sortOrder);
            } elseif ($sortBy === 'review_count') {
                $query->orderByRaw('(SELECT COUNT(*) FROM product_reviews WHERE product_reviews.product_id = products.id) ' . $sortOrder);
            } else {
                $query->orderBy($sortBy, $sortOrder);
            }

            $products = $query->paginate($perPage);

            // Get available filters for the current result set
            $availableFilters = $this->getAvailableFilters($query);

            return response()->json([
                'status' => true,
                'message' => 'Products retrieved successfully',
                'data' => [
                    'filters' => [
                        'applied' => [
                            'category_id' => $categoryId,
                            'min_price' => $minPrice,
                            'max_price' => $maxPrice,
                            'attribute_values' => $attributeValueIds,
                            'rating' => $rating,
                            'search' => $search,
                            'featured' => $featured,
                            'on_sale' => $onSale,
                            'sort_by' => $sortBy,
                            'sort_order' => $sortOrder
                        ],
                        'available' => $availableFilters
                    ],
                    'products' => $products->getCollection()->map(function ($product) {
                        return $this->formatProduct($product);
                    }),
                    'pagination' => [
                        'current_page' => $products->currentPage(),
                        'last_page' => $products->lastPage(),
                        'per_page' => $products->perPage(),
                        'total' => $products->total(),
                        'from' => $products->firstItem(),
                        'to' => $products->lastItem()
                    ]
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to retrieve products',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get product basic information (lightweight)
     */
    public function showBasic(Request $request, $id)
    {
        try {
            $product = Product::with(['category', 'tags', 'mainImage', 'otherImages'])
                ->active()
                ->find($id);

            if (!$product) {
                return response()->json([
                    'status' => false,
                    'message' => 'Product not found'
                ], 404);
            }

            return response()->json([
                'status' => true,
                'message' => 'Product basic information retrieved successfully',
                'data' => [
                    'product' => [
                        'id' => $product->id,
                        'name' => $product->name,
                        'description' => $product->description,
                        'key_features' => $product->key_features,
                        'slug' => $product->slug,
                        'status' => $product->status,
                        'is_featured' => $product->is_featured,
                        'created_at' => $product->created_at,
                        'updated_at' => $product->updated_at,
                        
                        // Images information
                        'images' => [
                            'main_image' => $product->mainImage ? url($product->mainImage->image_url) : null,
                            'other_images' => $product->otherImages->map(function ($image) {
                                return [
                                    'id' => $image->id,
                                    'url' => url($image->image_url),
                                    'type' => $image->type,
                                    'sort_order' => $image->sort_order
                                ];
                            })
                        ],
                        
                        // Category information
                        'category' => [
                            'id' => $product->category->id,
                            'name' => $product->category->name,
                            'description' => $product->category->description,
                            'image_url' => $product->category->image_url ? url($product->category->image_url) : null,
                            'slug' => $product->category->slug
                        ],

                        // Pricing information (from main variant)
                        'pricing' => [
                            'selling_price' => $product->selling_price,
                            'cost_price' => $product->cost_price,
                            'original_price' => $product->original_price,
                            'is_on_sale' => $product->is_on_sale,
                            'discount_percentage' => $product->discount_percentage
                        ],

                        // Rating and review information
                        'rating' => [
                            'average_rating' => $product->average_rating,
                            'review_count' => $product->review_count
                        ],

                        // Stock information
                        'stock' => [
                            'total_stock' => $product->stock,
                            'is_in_stock' => $product->stock > 0
                        ],

                        // Tags
                        'tags' => $product->tags->map(function ($tag) {
                            return [
                                'id' => $tag->id,
                                'name' => $tag->name
                            ];
                        })
                    ]
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to retrieve product basic information',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get product attributes and variants summary
     */
    
    public function showAttributes($productId)
    {
        $product = \App\Models\Product::with([
            'productAttributeValues.attributeValue.attribute',
            'productAttributeValues.attributeValue.subAttribute'
        ])->find($productId);

        if (!$product) {
            return response()->json([
                'status' => false,
                'message' => 'Product not found'
            ], 404);
        }

        $attributes = [];
        foreach ($product->productAttributeValues as $pav) {
            $attribute = $pav->attributeValue->attribute;
            $subAttribute = $pav->attributeValue->subAttribute;
            $value = $pav->attributeValue;

            $attrId = $attribute->id;
            if (!isset($attributes[$attrId])) {
                $attributes[$attrId] = [
                    'attribute_id' => $attribute->id,
                    'attribute_name' => $attribute->name,
                    'values' => []
                ];
            }
            $attributes[$attrId]['values'][] = [
                'id' => $value->id,
                'value' => $value->value,
                'sub_attribute' => $subAttribute ? [
                    'id' => $subAttribute->id,
                    'name' => $subAttribute->name
                ] : null
            ];
        }

        return response()->json([
            'status' => true,
            'message' => 'Product attributes retrieved successfully',
            'data' => array_values($attributes)
        ]);
    }

    /**
     * Get product variants with images
     */
    public function showVariants(Request $request, $id)
    {
        try {
            $product = Product::with([
                'variants.images',
                'variants.attributeValues.attribute',
                'variants.attributeValues.subAttribute'
            ])
            ->active()
            ->find($id);

            if (!$product) {
                return response()->json([
                    'status' => false,
                    'message' => 'Product not found'
                ], 404);
            }

            // Get filter parameters
            $filters = $request->only(['min_price', 'max_price', 'in_stock_only', 'active_only']);
            $sortBy = $request->get('sort_by', 'price');
            $sortOrder = $request->get('sort_order', 'asc');

            $variants = $product->variants();

            // Apply filters
            if ($filters['min_price'] ?? false) {
                $variants->where('selling_price', '>=', $filters['min_price']);
            }
            if ($filters['max_price'] ?? false) {
                $variants->where('selling_price', '<=', $filters['max_price']);
            }
            if ($filters['in_stock_only'] ?? false) {
                $variants->where('stock', '>', 0);
            }
            if ($filters['active_only'] ?? false) {
                $variants->where('is_active', true);
            }

            // Apply sorting
            $variants->orderBy($sortBy, $sortOrder);

            $variants = $variants->get();

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
                        'applied' => $filters,
                        'sort_by' => $sortBy,
                        'sort_order' => $sortOrder
                    ],
                    'variants' => [
                        'summary' => [
                            'total_variants' => $variants->count(),
                            'active_variants' => $variants->where('is_active', true)->count(),
                            'in_stock_variants' => $variants->where('stock', '>', 0)->count(),
                            'on_sale_variants' => $variants->filter(function ($v) {
                                return $v->selling_price < $v->original_price;
                            })->count(),
                            'price_range' => [
                                'min' => $variants->min('selling_price'),
                                'max' => $variants->max('selling_price')
                            ],
                            'stock_range' => [
                                'min' => $variants->min('stock'),
                                'max' => $variants->max('stock')
                            ]
                        ],
                        'list' => $variants->map(function ($variant) {
                            return [
                                'id' => $variant->id,
                                'sku' => $variant->sku,
                                'price' => $variant->price,
                                'selling_price' => $variant->selling_price,
                                'original_price' => $variant->original_price,
                                'cost_price' => $variant->cost_price,
                                'stock' => $variant->stock,
                                'min_stock' => $variant->min_stock,
                                'is_active' => $variant->is_active,
                                'is_featured' => $variant->is_featured,
                                'is_in_stock' => $variant->stock > 0,
                                'is_on_sale' => $variant->selling_price < $variant->original_price,
                                'discount_percentage' => $variant->original_price > 0 ? 
                                    round((($variant->original_price - $variant->selling_price) / $variant->original_price) * 100, 2) : 0,
                                'image_url' => $variant->image_url ? url($variant->image_url) : null,
                                'images' => $variant->images->map(function ($image) {
                                    return [
                                        'id' => $image->id,
                                        'image_url' => $image->image_url ? url($image->image_url) : null,
                                        'type' => $image->type,
                                        'sort_order' => $image->sort_order
                                    ];
                                }),
                                'attributes' => $variant->attributeValues->map(function ($attributeValue) {
                                    return [
                                        'attribute_id' => $attributeValue->attribute->id,
                                        'attribute_name' => $attributeValue->attribute->name,
                                        'value_id' => $attributeValue->id,
                                        'value' => $attributeValue->value,
                                        'sub_attribute_id' => $attributeValue->sub_attribute_id,
                                        'sub_attribute_name' => $attributeValue->subAttribute ? $attributeValue->subAttribute->name : null,
                                    ];
                                })
                            ];
                        })
                    ]
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
     * Get product reviews summary and list
     */
    public function showReviews(Request $request, $id)
    {
        try {
            $product = Product::with([
                'reviews' => function ($q) {
                    $q->withRating();
                }
            ])
            ->active()
            ->find($id);

            if (!$product) {
                return response()->json([
                    'status' => false,
                    'message' => 'Product not found'
                ], 404);
            }

            $reviews = $product->reviews;
            $totalReviews = $reviews->count();
            $averageRating = $totalReviews > 0 ? $reviews->avg('rating') : 0;
            $ratingDistribution = [];
            
            for ($i = 1; $i <= 5; $i++) {
                $count = $reviews->where('rating', $i)->count();
                $percentage = $totalReviews > 0 ? round(($count / $totalReviews) * 100, 1) : 0;
                $ratingDistribution[$i] = [
                    'count' => $count,
                    'percentage' => $percentage
                ];
            }

            return response()->json([
                'status' => true,
                'message' => 'Product reviews retrieved successfully',
                'data' => [
                    'product' => [
                        'id' => $product->id,
                        'name' => $product->name,
                        'slug' => $product->slug
                    ],
                    'reviews' => [
                        'summary' => [
                            'total_reviews' => $totalReviews,
                            'average_rating' => round($averageRating, 1),
                            'rating_distribution' => $ratingDistribution,
                            'verified_reviews' => $reviews->where('is_verified', true)->count(),
                            'recent_reviews' => $reviews->take(5)->count()
                        ],
                        'list' => $reviews->map(function ($review) {
                            return [
                                'id' => $review->id,
                                'rating' => $review->rating,
                                'title' => $review->title,
                                'content' => $review->content,
                                'images' => $review->images ? json_decode($review->images, true) : [],
                                'is_verified' => $review->is_verified,
                                'helpful_count' => $review->helpful_count,
                                'created_at' => $review->created_at,
                                'updated_at' => $review->updated_at,
                                'user' => [
                                    'id' => $review->user->id,
                                    'name' => $review->user->name,
                                    'avatar' => $review->user->avatar ?? null
                                ]
                            ];
                        })
                    ]
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to retrieve product reviews',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get product attribute combinations for frontend configurator
     */
    public function showAttributeCombinations(Request $request, $id)
    {
        try {
            $product = Product::with(['variants.attributeValues.attribute', 'variants.attributeValues.subAttribute'])
                ->active()
                ->find($id);

            if (!$product) {
                return response()->json([
                    'status' => false,
                    'message' => 'Product not found'
                ], 404);
            }

            // Get attribute combinations for frontend configurator
            $attributeCombinations = [];
            
            foreach ($product->variants as $variant) {
                $combination = [];
                $combinationKey = '';
                
                // Sort attributes by ID for consistent combination keys
                $sortedAttributes = $variant->attributeValues->sortBy('attribute.id');
                
                foreach ($sortedAttributes as $attributeValue) {
                    $attributeId = $attributeValue->attribute->id;
                    $combination[$attributeId] = [
                        'attribute_id' => $attributeId,
                        'attribute_name' => $attributeValue->attribute->name,
                        'attribute_display_name' => ucfirst($attributeValue->attribute->name),
                        'value_id' => $attributeValue->id,
                        'value' => $attributeValue->value,
                        'display_value' => ucfirst($attributeValue->value),
                        'sub_attribute_id' => $attributeValue->sub_attribute_id,
                        'sub_attribute_name' => $attributeValue->subAttribute ? $attributeValue->subAttribute->name : null,
                        'sub_attribute_display_name' => $attributeValue->subAttribute ? ucfirst($attributeValue->subAttribute->name) : null,
                    ];
                    
                    $combinationKey .= $attributeId . ':' . $attributeValue->id . '|';
                }
                
                if (!isset($attributeCombinations[$combinationKey])) {
                    $attributeCombinations[$combinationKey] = [
                        'combination_id' => md5($combinationKey),
                        'combination_name' => $this->generateCombinationName($combination),
                        'attributes' => array_values($combination),
                        'variants' => []
                    ];
                }
                
                $attributeCombinations[$combinationKey]['variants'][] = [
                    'variant_id' => $variant->id,
                    'sku' => $variant->sku,
                    'price' => $variant->price,
                    'selling_price' => $variant->selling_price,
                    'original_price' => $variant->original_price,
                    'stock' => $variant->stock,
                    'is_in_stock' => $variant->stock > 0,
                    'image_url' => $variant->image_url ? url($variant->image_url) : null,
                    'is_active' => $variant->is_active
                ];
            }

            return response()->json([
                'status' => true,
                'message' => 'Product attribute combinations retrieved successfully',
                'data' => [
                    'product' => [
                        'id' => $product->id,
                        'name' => $product->name,
                        'slug' => $product->slug
                    ],
                    'combinations' => [
                        'summary' => [
                            'total_combinations' => count($attributeCombinations),
                            'combinations_with_stock' => array_filter($attributeCombinations, function ($combo) {
                                return array_filter($combo['variants'], function ($variant) {
                                    return $variant['is_in_stock'];
                                });
                            })
                        ],
                        'list' => array_values($attributeCombinations)
                    ]
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to retrieve product attribute combinations',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get complete product details (original show method - kept for backward compatibility)
     */
    public function show(Request $request, $id)
    {
        try {
            $product = Product::with([
                'category', 
                'tags',
                'mainImage',
                'otherImages',
                'variants.mainImage',
                'variants.otherImages',
                'variants.attributeValues.attribute',
                'variants.attributeValues.subAttribute',
                'reviews' => function ($q) {
                    $q->with('user')->orderBy('created_at', 'desc');
                }
            ])
            ->active()
            ->find($id);

            if (!$product) {
                return response()->json([
                    'status' => false,
                    'message' => 'Product not found'
                ], 404);
            }

            return response()->json([
                'status' => true,
                'message' => 'Product retrieved successfully',
                'data' => [
                    'product' => $this->formatProductFullDetail($product)
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to retrieve product',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Search products
     */
    public function search(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'query' => 'required|string|min:2',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $query = $request->query;
            $perPage = $request->get('per_page', 12);

            $products = Product::with(['category', 'tags', 'mainVariant', 'mainImage', 'otherImages'])
                ->active()
                ->inStock()
                ->where(function ($q) use ($query) {
                    $q->where('name', 'LIKE', "%{$query}%")
                      ->orWhere('description', 'LIKE', "%{$query}%")
                      ->orWhere('key_features', 'LIKE', "%{$query}%");
                })
                ->orWhereHas('category', function ($q) use ($query) {
                    $q->where('name', 'LIKE', "%{$query}%");
                })
                ->paginate($perPage);

            return response()->json([
                'status' => true,
                'message' => 'Search completed successfully',
                'data' => [
                    'query' => $query,
                    'products' => $products->getCollection()->map(function ($product) {
                        return $this->formatProduct($product);
                    }),
                    'pagination' => [
                        'current_page' => $products->currentPage(),
                        'last_page' => $products->lastPage(),
                        'per_page' => $products->perPage(),
                        'total' => $products->total(),
                        'from' => $products->firstItem(),
                        'to' => $products->lastItem()
                    ]
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Search failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get featured products
     */
    public function featured(Request $request)
    {
        try {
            $limit = $request->get('limit', 8);

            $products = Product::with(['category', 'tags', 'mainVariant'])
                ->active()
                ->inStock()
                ->featured()
                ->orderBy('average_rating', 'desc')
                ->orderBy('review_count', 'desc')
                ->limit($limit)
                ->get();

            return response()->json([
                'status' => true,
                'message' => 'Featured products retrieved successfully',
                'data' => [
                    'products' => $products->map(function ($product) {
                        return $this->formatProduct($product);
                    })
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to retrieve featured products',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get related products
     */
    public function related(Request $request, $id)
    {
        try {
            $product = Product::find($id);
            
            if (!$product) {
                return response()->json([
                    'status' => false,
                    'message' => 'Product not found'
                ], 404);
            }

            $relatedProducts = Product::with(['category', 'tags', 'mainVariant'])
                ->active()
                ->inStock()
                ->where('id', '!=', $id)
                ->where(function ($query) use ($product) {
                    $query->where('category_id', $product->category_id);
                })
                ->limit(6)
                ->get();

            return response()->json([
                'status' => true,
                'message' => 'Related products retrieved successfully',
                'data' => [
                    'products' => $relatedProducts->map(function ($product) {
                        return $this->formatProduct($product);
                    })
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to retrieve related products',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Add product review
     */
    public function addReview(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'rating' => 'required|integer|between:1,5',
            'title' => 'nullable|string|max:255',
            'content' => 'required|string|min:10|max:2000',
            'images' => 'nullable|array|max:5',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $product = Product::active()->find($id);
            
            if (!$product) {
                return response()->json([
                    'status' => false,
                    'message' => 'Product not found'
                ], 404);
            }

            $user = $request->user();

            // Check if user already reviewed this product
            $existingReview = ProductReview::where('product_id', $id)
                ->whereNull('variant_id')
                ->where('user_id', $user->id)
                ->first();

            if ($existingReview) {
                return response()->json([
                    'status' => false,
                    'message' => 'You have already reviewed this product'
                ], 400);
            }

            // Handle image uploads
            $images = null;
            if ($request->hasFile('images')) {
                $imageUrls = [];
                foreach ($request->file('images') as $image) {
                    $path = $image->store('reviews', 'public');
                    $imageUrls[] = asset('storage/' . $path);
                }
                $images = json_encode($imageUrls);
            }

            $review = ProductReview::create([
                'product_id' => $id,
                'variant_id' => null, // Product-level review
                'user_id' => $user->id,
                'rating' => $request->rating,
                'title' => $request->title,
                'content' => $request->content,
                'images' => $images,
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'is_verified' => false,
                'is_approved' => true, // Auto-approve for now, can be moderated later
                'approved_at' => now(),
            ]);

            // Update product rating statistics
            $this->updateProductRatingStats($product);

            return response()->json([
                'status' => true,
                'message' => 'Review added successfully',
                'data' => [
                    'review' => $this->formatReview($review)
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to add review',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get products on sale
     */
    public function onSale(Request $request)
    {
        try {
            $perPage = $request->get('per_page', 12);
            $sortBy = $request->get('sort_by', 'discount_percentage');
            $sortOrder = $request->get('sort_order', 'desc');

            $products = Product::with(['category', 'mainVariant'])
                ->active()
                ->inStock()
                ->where('cost_price', '>', 0)
                ->whereRaw('selling_price < cost_price')
                ->orderBy($sortBy, $sortOrder)
                ->paginate($perPage);

            return response()->json([
                'status' => true,
                'message' => 'Products on sale retrieved successfully',
                'data' => [
                    'products' => $products->getCollection()->map(function ($product) {
                        $formatted = $this->formatProduct($product);
                        $formatted['is_on_sale'] = true;
                        $formatted['discount_percentage'] = $product->discount_percentage;
                        $formatted['original_price'] = $product->cost_price;
                        return $formatted;
                    }),
                    'pagination' => [
                        'current_page' => $products->currentPage(),
                        'last_page' => $products->lastPage(),
                        'per_page' => $products->perPage(),
                        'total' => $products->total(),
                        'from' => $products->firstItem(),
                        'to' => $products->lastItem()
                    ]
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to retrieve products on sale',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get products by category
     */
    public function getByCategory(Request $request, $categoryId)
    {
        try {
            $perPage = $request->get('per_page', 12);
            $sortBy = $request->get('sort_by', 'created_at');
            $sortOrder = $request->get('sort_order', 'desc');
            $minPrice = $request->get('min_price');
            $maxPrice = $request->get('max_price');
            $rating = $request->get('rating');

            $query = Product::with(['category', 'mainVariant', 'reviews' => function ($q) {
                $q->withRating();
            }])
            ->active()
            ->inStock()
            ->where('category_id', $categoryId);

            // Apply price range filter
            if ($minPrice || $maxPrice) {
                $query->priceRange($minPrice, $maxPrice);
            }

            // Apply rating filter
            if ($rating) {
                $query->byRating($rating);
            }

            // Apply sorting
            $query->orderBy($sortBy, $sortOrder);

            $products = $query->paginate($perPage);

            return response()->json([
                'status' => true,
                'message' => 'Products by category retrieved successfully',
                'data' => [
                    'category_id' => $categoryId,
                    'products' => $products->getCollection()->map(function ($product) {
                        return $this->formatProduct($product);
                    }),
                    'pagination' => [
                        'current_page' => $products->currentPage(),
                        'last_page' => $products->lastPage(),
                        'per_page' => $products->perPage(),
                        'total' => $products->total(),
                        'from' => $products->firstItem(),
                        'to' => $products->lastItem()
                    ]
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to retrieve products by category',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get products by price range
     */
    public function getByPriceRange(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'min_price' => 'required|numeric|min:0',
            'max_price' => 'required|numeric|min:0',
            'per_page' => 'nullable|integer|min:1|max:100',
            'sort_by' => 'nullable|in:selling_price,average_rating,review_count,created_at',
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
            $perPage = $request->get('per_page', 12);
            $sortBy = $request->get('sort_by', 'selling_price');
            $sortOrder = $request->get('sort_order', 'asc');

            $products = Product::with(['category', 'mainVariant'])
                ->active()
                ->inStock()
                ->priceRange($request->min_price, $request->max_price)
                ->orderBy($sortBy, $sortOrder)
                ->paginate($perPage);

            return response()->json([
                'status' => true,
                'message' => 'Products by price range retrieved successfully',
                'data' => [
                    'filters' => [
                        'min_price' => $request->min_price,
                        'max_price' => $request->max_price,
                        'sort_by' => $sortBy,
                        'sort_order' => $sortOrder
                    ],
                    'products' => $products->getCollection()->map(function ($product) {
                        return $this->formatProduct($product);
                    }),
                    'pagination' => [
                        'current_page' => $products->currentPage(),
                        'last_page' => $products->lastPage(),
                        'per_page' => $products->perPage(),
                        'total' => $products->total(),
                        'from' => $products->firstItem(),
                        'to' => $products->lastItem()
                    ]
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to retrieve products by price range',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get products by rating
     */
    public function getByRating(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'rating' => 'required|numeric|min:1|max:5',
            'per_page' => 'nullable|integer|min:1|max:100',
            'sort_by' => 'nullable|in:average_rating,review_count,created_at',
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
            $perPage = $request->get('per_page', 12);
            $sortBy = $request->get('sort_by', 'average_rating');
            $sortOrder = $request->get('sort_order', 'desc');

            $products = Product::with(['category', 'mainVariant'])
                ->active()
                ->inStock()
                ->byRating($request->rating)
                ->orderBy($sortBy, $sortOrder)
                ->paginate($perPage);

            return response()->json([
                'status' => true,
                'message' => 'Products by rating retrieved successfully',
                'data' => [
                    'filters' => [
                        'rating' => $request->rating,
                        'sort_by' => $sortBy,
                        'sort_order' => $sortOrder
                    ],
                    'products' => $products->getCollection()->map(function ($product) {
                        return $this->formatProduct($product);
                    }),
                    'pagination' => [
                        'current_page' => $products->currentPage(),
                        'last_page' => $products->lastPage(),
                        'per_page' => $products->perPage(),
                        'total' => $products->total(),
                        'from' => $products->firstItem(),
                        'to' => $products->lastItem()
                    ]
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to retrieve products by rating',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get product statistics
     */
    public function getStatistics(Request $request)
    {
        try {
            $totalProducts = Product::active()->count();
            $inStockProducts = Product::active()->inStock()->count();
            $onSaleProducts = Product::active()->inStock()
                ->where('cost_price', '>', 0)
                ->whereRaw('selling_price < cost_price')
                ->count();
            $featuredProducts = Product::active()->inStock()->featured()->count();

            $priceRanges = [
                'under_50' => Product::active()->inStock()->where('selling_price', '<', 50)->count(),
                '50_to_100' => Product::active()->inStock()->whereBetween('selling_price', [50, 100])->count(),
                '100_to_200' => Product::active()->inStock()->whereBetween('selling_price', [100, 200])->count(),
                '200_to_500' => Product::active()->inStock()->whereBetween('selling_price', [200, 500])->count(),
                'above_500' => Product::active()->inStock()->where('selling_price', '>', 500)->count(),
            ];

            $ratingRanges = [
                '5_star' => Product::active()->inStock()->where('average_rating', '>=', 4.5)->count(),
                '4_star' => Product::active()->inStock()->whereBetween('average_rating', [4.0, 4.49])->count(),
                '3_star' => Product::active()->inStock()->whereBetween('average_rating', [3.0, 3.99])->count(),
                'below_3' => Product::active()->inStock()->where('average_rating', '<', 3.0)->count(),
            ];

            return response()->json([
                'status' => true,
                'message' => 'Product statistics retrieved successfully',
                'data' => [
                    'overview' => [
                        'total_products' => $totalProducts,
                        'in_stock_products' => $inStockProducts,
                        'on_sale_products' => $onSaleProducts,
                        'featured_products' => $featuredProducts
                    ],
                    'price_ranges' => $priceRanges,
                    'rating_ranges' => $ratingRanges
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to retrieve product statistics',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Format product for list view
     */
    private function formatProduct($product)
    {
        return [
            'id' => $product->id,
            'name' => $product->name,
            'description' => $product->description,
            'key_features' => $product->key_features,
            'cost_price' => $product->cost_price,
            'selling_price' => $product->selling_price,
            'stock' => $product->stock,
            'status' => $product->status,
            'sku' => $product->sku,
            'slug' => $product->slug,
            'meta_title' => $product->meta_title,
            'meta_description' => $product->meta_description,
            'meta_keywords' => $product->meta_keywords,
            'created_at' => $product->created_at,
            'updated_at' => $product->updated_at,
            'category' => $product->category ? [
                'id' => $product->category->id,
                'name' => $product->category->name,
                'slug' => $product->category->slug,
                'image_url' => $product->category->image_url ? url($product->category->image_url) : null,
            ] : null,
            'main_image_url' => $product->mainImage ? url($product->mainImage->image_url) : ($product->image_url ? url($product->image_url) : null),
            'other_images' => $product->otherImages->map(function ($image) {
                return [
                    'id' => $image->id,
                    'image_url' => url($image->image_url),
                    'type' => $image->type,
                    'sort_order' => $image->sort_order
                ];
            }),
            'images' => [
                'main' => $product->mainImage ? [
                    'id' => $product->mainImage->id,
                    'image_url' => url($product->mainImage->image_url),
                    'type' => $product->mainImage->type
                ] : null,
                'other' => $product->otherImages->map(function ($image) {
                    return [
                        'id' => $image->id,
                        'image_url' => url($image->image_url),
                        'type' => $image->type,
                        'sort_order' => $image->sort_order
                    ];
                }),
                'all' => $product->all_images->map(function ($image) {
                    return [
                        'id' => $image->id,
                        'image_url' => url($image->image_url),
                        'type' => $image->type,
                        'sort_order' => $image->sort_order
                    ];
                })
            ],
            'variants_count' => $product->variants->count(),
            'reviews_count' => $product->reviews->count(),
            'average_rating' => $product->average_rating ?? 0,
            'is_in_stock' => $product->stock > 0,
            'is_on_sale' => $product->selling_price && $product->cost_price && $product->selling_price < $product->cost_price,
            'discount_percentage' => $product->selling_price && $product->cost_price && $product->selling_price < $product->cost_price 
                ? round((($product->cost_price - $product->selling_price) / $product->cost_price) * 100, 2) 
                : 0,
        ];
    }

    /**
     * Format product for detail view
     */
    private function formatProductDetail($product)
    {
        $formattedProduct = $this->formatProduct($product);
        
        $formattedProduct['key_features'] = $product->key_features;
        $formattedProduct['cost_price'] = $product->cost_price;
        $formattedProduct['main_image_url'] = $product->mainImage ? url($product->mainImage->image_url) : ($product->image_url ? url($product->image_url) : null);
        $formattedProduct['other_images'] = $product->otherImages->map(function ($image) {
            return [
                'id' => $image->id,
                'image_url' => url($image->image_url),
                'type' => $image->type,
                'sort_order' => $image->sort_order
            ];
        });
        $formattedProduct['variants'] = $product->variants->map(function ($variant) {
            return [
                'id' => $variant->id,
                'sku' => $variant->sku,
                'price' => $variant->price,
                'stock' => $variant->stock,
                'main_image_url' => $variant->mainImage ? url($variant->mainImage->image_url) : ($variant->image_url ? url($variant->image_url) : null),
                'other_images' => $variant->otherImages->map(function ($image) {
                    return [
                        'id' => $image->id,
                        'image_url' => url($image->image_url),
                        'type' => $image->type,
                        'sort_order' => $image->sort_order
                    ];
                }),
                'image_url' => $variant->mainImage ? url($variant->mainImage->image_url) : ($variant->image_url ? url($variant->image_url) : null),
                'images' => [
                    'main' => $variant->mainImage ? [
                        'id' => $variant->mainImage->id,
                        'image_url' => url($variant->mainImage->image_url),
                        'type' => $variant->mainImage->type
                    ] : null,
                    'other' => $variant->otherImages->map(function ($image) {
                        return [
                            'id' => $image->id,
                            'image_url' => url($image->image_url),
                            'type' => $image->type,
                            'sort_order' => $image->sort_order
                        ];
                    }),
                    'all' => $variant->all_images->map(function ($image) {
                        return [
                            'id' => $image->id,
                            'image_url' => url($image->image_url),
                            'type' => $image->type,
                            'sort_order' => $image->sort_order
                        ];
                    })
                ]
            ];
        });
        
        $formattedProduct['reviews'] = $product->reviews->whereNull('variant_id')->map(function ($review) {
            return $this->formatReview($review);
        });
        
        return $formattedProduct;
    }

    /**
     * Format product for full detail view with comprehensive information
     */
    private function formatProductFullDetail($product)
    {
        $formattedProduct = $this->formatProductDetail($product);
        
        // Add main image URL and other images
        $formattedProduct['main_image_url'] = $product->mainImage ? url($product->mainImage->image_url) : ($product->image_url ? url($product->image_url) : null);
        $formattedProduct['other_images'] = $product->otherImages->map(function ($image) {
            return [
                'id' => $image->id,
                'image_url' => url($image->image_url),
                'type' => $image->type,
                'sort_order' => $image->sort_order
            ];
        });
        
        // Get available attributes for this product
        $attributes = [];
        if ($product->variants && $product->variants->isNotEmpty()) {
            $attributeGroups = [];
            
            foreach ($product->variants as $variant) {
                if ($variant->attributeValues) {
                    foreach ($variant->attributeValues as $attributeValue) {
                        // If there is a sub-attribute, but it has no name, skip this value
                        if ($attributeValue->sub_attribute_id && 
                            (!$attributeValue->subAttribute || empty($attributeValue->subAttribute->name))) {
                            continue;
                        }
                        $attributeId = $attributeValue->attribute->id;
                        $attributeName = $attributeValue->attribute->name;
                        
                        if (!isset($attributeGroups[$attributeId])) {
                            $attributeGroups[$attributeId] = [
                                'id' => $attributeId,
                                'name' => $attributeName,
                                'values' => []
                            ];
                        }
                        
                        // Check if this value is already added
                        $valueExists = false;
                        foreach ($attributeGroups[$attributeId]['values'] as $existingValue) {
                            if ($existingValue['id'] === $attributeValue->id) {
                                $valueExists = true;
                                break;
                            }
                        }
                        
                        if (!$valueExists) {
                            $attributeGroups[$attributeId]['values'][] = [
                                'id' => $attributeValue->id,
                                'value' => $attributeValue->value,
                                'sub_attribute_id' => $attributeValue->sub_attribute_id,
                                'sub_attribute_name' => $attributeValue->subAttribute ? $attributeValue->subAttribute->name : null,
                            ];
                        }
                    }
                }
            }
            
            $attributes = array_values($attributeGroups);
        }
        
        $formattedProduct['attributes'] = $attributes;
        $formattedProduct['tags'] = $product->tags->map(function ($tag) {
            return [
                'id' => $tag->id,
                'name' => $tag->name
            ];
        });
        
        // Add detailed variant information with images
        $formattedProduct['variants'] = $product->variants->map(function ($variant) {
            return [
                'id' => $variant->id,
                'sku' => $variant->sku,
                'price' => $variant->price,
                'stock' => $variant->stock,
                'main_image_url' => $variant->mainImage ? url($variant->mainImage->image_url) : ($variant->image_url ? url($variant->image_url) : null),
                'other_images' => $variant->otherImages->map(function ($image) {
                    return [
                        'id' => $image->id,
                        'image_url' => url($image->image_url),
                        'type' => $image->type,
                        'sort_order' => $image->sort_order
                    ];
                }),
                'image_url' => $variant->mainImage ? url($variant->mainImage->image_url) : ($variant->image_url ? url($variant->image_url) : null),
                'images' => [
                    'main' => $variant->mainImage ? [
                        'id' => $variant->mainImage->id,
                        'image_url' => url($variant->mainImage->image_url),
                        'type' => $variant->mainImage->type
                    ] : null,
                    'other' => $variant->otherImages->map(function ($image) {
                        return [
                            'id' => $image->id,
                            'image_url' => url($image->image_url),
                            'type' => $image->type,
                            'sort_order' => $image->sort_order
                        ];
                    }),
                    'all' => $variant->all_images->map(function ($image) {
                        return [
                            'id' => $image->id,
                            'image_url' => url($image->image_url),
                            'type' => $image->type,
                            'sort_order' => $image->sort_order
                        ];
                    })
                ],
                'attribute_values' => $variant->attributeValues->map(function ($attributeValue) {
                    return [
                        'id' => $attributeValue->id,
                        'value' => $attributeValue->value,
                        'attribute' => [
                            'id' => $attributeValue->attribute->id,
                            'name' => $attributeValue->attribute->name
                        ],
                        'sub_attribute' => $attributeValue->subAttribute ? [
                            'id' => $attributeValue->subAttribute->id,
                            'name' => $attributeValue->subAttribute->name
                        ] : null
                    ];
                }),
                'reviews' => $variant->reviews->map(function ($review) {
                    return $this->formatReview($review);
                }),
                'average_rating' => $variant->average_rating ?? 0,
                'review_count' => $variant->reviews->count(),
                'is_in_stock' => $variant->stock > 0,
                'is_on_sale' => $variant->selling_price && $variant->original_price && $variant->selling_price < $variant->original_price,
                'discount_percentage' => $variant->selling_price && $variant->original_price && $variant->selling_price < $variant->original_price 
                    ? round((($variant->original_price - $variant->selling_price) / $variant->original_price) * 100, 2) 
                    : 0,
            ];
        });
        
        return $formattedProduct;
    }

    /**
     * Get product attributes in structured format
     */
    public function getProductAttributes(Request $request, $productId)
    {
        try {
            $product = Product::with([
                'variants.attributeValues.attribute',
                'variants.attributeValues.subAttribute'
            ])
            ->active()
            ->find($productId);

            if (!$product) {
                return response()->json([
                    'status' => false,
                    'message' => 'Product not found'
                ], 404);
            }

            // Get all unique attributes and their values from all variants
            $productAttributeGroups = [];
            
            foreach ($product->variants as $variant) {
                foreach ($variant->attributeValues as $attributeValue) {
                    // If there is a sub-attribute, but it has no name, skip this value
                    if ($attributeValue->sub_attribute_id && 
                        (!$attributeValue->subAttribute || empty($attributeValue->subAttribute->name))) {
                        continue;
                    }
                    $attributeId = $attributeValue->attribute->id;
                    $attributeName = $attributeValue->attribute->name;
                    $valueId = $attributeValue->id;
                    
                    // Initialize attribute group if not exists
                    if (!isset($productAttributeGroups[$attributeId])) {
                        $productAttributeGroups[$attributeId] = [
                            'id' => $attributeId,
                            'name' => $attributeName,
                            'display_name' => ucfirst($attributeName),
                            'type' => 'select',
                            'is_required' => true,
                            'values' => [],
                            'total_variants_with_this_attribute' => 0
                        ];
                    }
                    
                    // Count variants that have this attribute
                    $productAttributeGroups[$attributeId]['total_variants_with_this_attribute']++;
                    
                    // Add value if not already exists
                    if (!isset($productAttributeGroups[$attributeId]['values'][$valueId])) {
                        $productAttributeGroups[$attributeId]['values'][$valueId] = [
                            'id' => $valueId,
                            'value' => $attributeValue->value,
                            'display_value' => ucfirst($attributeValue->value),
                            'sub_attribute_id' => $attributeValue->sub_attribute_id,
                            'sub_attribute_name' => $attributeValue->subAttribute ? $attributeValue->subAttribute->name : null,
                            'sub_attribute_display_name' => $attributeValue->subAttribute ? ucfirst($attributeValue->subAttribute->name) : null,
                            'variant_count' => 0,
                            'is_available' => true
                        ];
                    }
                    
                    // Count variants that have this specific value
                    $productAttributeGroups[$attributeId]['values'][$valueId]['variant_count']++;
                }
            }
            
            // Convert to indexed arrays and add availability check
            foreach ($productAttributeGroups as $attributeId => &$attributeGroup) {
                $attributeGroup['values'] = array_values($attributeGroup['values']);
                
                // Check availability for each value (has variants with stock > 0)
                foreach ($attributeGroup['values'] as &$value) {
                    $value['is_available'] = $product->variants
                        ->where('stock', '>', 0)
                        ->filter(function ($variant) use ($attributeId, $value) {
                            return $variant->attributeValues->contains(function ($av) use ($attributeId, $value) {
                                return $av->attribute->id === $attributeId && $av->id === $value['id'];
                            });
                        })
                        ->count() > 0;
                }
            }
            // FLATTEN VALUES
            $flatAttributeValues = [];
            foreach ($productAttributeGroups as $attributeId => $attributeGroup) {
                foreach ($attributeGroup['values'] as $value) {
                    $value['attribute_id'] = $attributeGroup['id'];
                    $value['attribute_name'] = $attributeGroup['name'];
                    $value['attribute_display_name'] = $attributeGroup['display_name'];
                    $flatAttributeValues[] = $value;
                }
            }

            // Find the color attribute group
            $colorAttribute = null;
            foreach ($productAttributeGroups as $attributeGroup) {
                if (strtolower($attributeGroup['name']) === 'color') {
                    $colorAttribute = $attributeGroup;
                    // Convert values to indexed array if not already
                    $colorAttribute['values'] = array_values($colorAttribute['values']);
                    break;
                }
            }

            return response()->json([
                'status' => true,
                'message' => 'Product attributes retrieved successfully',
                'data' => [
                   
                    'color_attribute' => $colorAttribute
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to retrieve product attributes',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get variants by attribute values
     */
    public function getVariantsByAttributes(Request $request, $productId)
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
                            'image_url' => $variant->image_url ? url($variant->image_url) : null,
                            'images' => $variant->images->map(function ($image) {
                                return [
                                    'id' => $image->id,
                                    'image_url' => $image->image_url ? url($image->image_url) : null,
                                    'type' => $image->type,
                                    'is_primary' => $image->is_primary ?? false,
                                    'sort_order' => $image->sort_order ?? 0
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
    // ... (rest of the code remains the same)
    public function getAttributeCombinations(Request $request, $productId)
    {
        try {
            $product = Product::with(['variants.attributeValues.attribute', 'variants.attributeValues.subAttribute'])
                ->active()
                ->find($productId);

            if (!$product) {
                return response()->json([
                    'status' => false,
                    'message' => 'Product not found'
                ], 404);
            }

            // Get all unique attribute combinations
            $combinations = [];
            $attributeGroups = [];

            foreach ($product->variants as $variant) {
                $combination = [];
                foreach ($variant->attributeValues as $attributeValue) {
                    $attributeId = $attributeValue->attribute->id;
                    $combination[$attributeId] = [
                        'attribute_id' => $attributeId,
                        'attribute_name' => $attributeValue->attribute->name,
                        'value_id' => $attributeValue->id,
                        'value' => $attributeValue->value,
                        'sub_attribute_id' => $attributeValue->sub_attribute_id,
                        'sub_attribute_name' => $attributeValue->subAttribute ? $attributeValue->subAttribute->name : null,
                    ];
                }
                
                $combinationKey = json_encode($combination);
                if (!isset($combinations[$combinationKey])) {
                    $combinations[$combinationKey] = [
                        'variant_id' => $variant->id,
                        'sku' => $variant->sku,
                        'price' => $variant->price,
                        'stock' => $variant->stock,
                        'attributes' => array_values($combination)
                    ];
                }
            }

            // Group by attributes
            foreach ($product->variants as $variant) {
                foreach ($variant->attributeValues as $attributeValue) {
                    $attributeId = $attributeValue->attribute->id;
                    if (!isset($attributeGroups[$attributeId])) {
                        $attributeGroups[$attributeId] = [
                            'attribute_id' => $attributeId,
                            'attribute_name' => $attributeValue->attribute->name,
                            'values' => []
                        ];
                    }

                    $valueExists = false;
                    foreach ($attributeGroups[$attributeId]['values'] as $existingValue) {
                        if ($existingValue['value_id'] === $attributeValue->id) {
                            $valueExists = true;
                            break;
                        }
                    }

                    if (!$valueExists) {
                        $attributeGroups[$attributeId]['values'][] = [
                            'value_id' => $attributeValue->id,
                            'value' => $attributeValue->value,
                            'sub_attribute_id' => $attributeValue->sub_attribute_id,
                            'sub_attribute_name' => $attributeValue->subAttribute ? $attributeValue->subAttribute->name : null,
                        ];
                    }
                }
            }

            return response()->json([
                'status' => true,
                'message' => 'Attribute combinations retrieved successfully',
                'data' => [
                    'product_id' => $productId,
                    'attribute_groups' => array_values($attributeGroups),
                    'combinations' => array_values($combinations)
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
     * Get available filters for the current product set
     */
    private function getAvailableFilters($query)
    {
        try {
            // Clone the query to avoid affecting the main query
            $filterQuery = clone $query;
            
            // Get product IDs from the current filtered set
            $productIds = $filterQuery->pluck('id')->toArray();
            
            if (empty($productIds)) {
                return [
                    'categories' => [],
                    'price_range' => ['min' => 0, 'max' => 0],
                    'attributes' => [],
                    'ratings' => []
                ];
            }

            // Get available categories
            $categories = \App\Models\Category::whereHas('products', function ($q) use ($productIds) {
                $q->whereIn('id', $productIds);
            })->select('id', 'name')->get();

            // Get price range
            $priceRange = \App\Models\ProductVariant::whereIn('product_id', $productIds)
                ->selectRaw('MIN(selling_price) as min_price, MAX(selling_price) as max_price')
                ->first();

            // Get available attributes and their values
            $attributes = ProductAttribute::with(['values.subAttribute'])
                ->whereHas('values.variants', function ($q) use ($productIds) {
                    $q->whereIn('product_id', $productIds);
                })
                ->get()
                ->map(function ($attribute) use ($productIds) {
                    $values = $attribute->values()
                        ->whereHas('variants', function ($q) use ($productIds) {
                            $q->whereIn('product_id', $productIds);
                        })
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

                    return [
                        'id' => $attribute->id,
                        'name' => $attribute->name,
                        'values' => $values
                    ];
                });

            // Get available ratings
            $ratings = \App\Models\ProductReview::whereIn('product_id', $productIds)
                ->selectRaw('rating, COUNT(*) as count')
                ->groupBy('rating')
                ->orderBy('rating', 'desc')
                ->get()
                ->map(function ($rating) {
                    return [
                        'rating' => $rating->rating,
                        'count' => $rating->count
                    ];
                });

            return [
                'categories' => $categories,
                'price_range' => [
                    'min' => $priceRange->min_price ?? 0,
                    'max' => $priceRange->max_price ?? 0
                ],
                'attributes' => $attributes,
                'ratings' => $ratings
            ];

        } catch (\Exception $e) {
            return [
                'categories' => [],
                'price_range' => ['min' => 0, 'max' => 0],
                'attributes' => [],
                'ratings' => []
            ];
        }
    }

    /**
     * Filter products by attributes
     */
    public function filterByAttributes(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'attribute_values' => 'required|array',
            'attribute_values.*' => 'integer|exists:attribute_values,id',
            'per_page' => 'nullable|integer|min:1|max:100',
            'sort_by' => 'nullable|in:selling_price,average_rating,review_count,created_at',
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
            $perPage = $request->get('per_page', 12);
            $sortBy = $request->get('sort_by', 'created_at');
            $sortOrder = $request->get('sort_order', 'desc');
            $attributeValueIds = $request->input('attribute_values', []);

            $products = Product::with(['category', 'mainVariant', 'variants.attributeValues'])
                ->active()
                ->inStock()
                ->whereHas('variants.attributeValues', function ($query) use ($attributeValueIds) {
                    $query->whereIn('attribute_values.id', $attributeValueIds);
                }, '>=', 1)
                ->orderBy($sortBy, $sortOrder)
                ->paginate($perPage);

            return response()->json([
                'status' => true,
                'message' => 'Products filtered by attributes successfully',
                'data' => [
                    'filters' => [
                        'attribute_values' => $attributeValueIds,
                        'sort_by' => $sortBy,
                        'sort_order' => $sortOrder
                    ],
                    'products' => $products->getCollection()->map(function ($product) {
                        return $this->formatProduct($product);
                    }),
                    'pagination' => [
                        'current_page' => $products->currentPage(),
                        'last_page' => $products->lastPage(),
                        'per_page' => $products->perPage(),
                        'total' => $products->total(),
                        'from' => $products->firstItem(),
                        'to' => $products->lastItem()
                    ]
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to filter products by attributes',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Generate a human-readable variant name based on attributes
     */
    private function generateVariantName($attributeSummary)
    {
        $parts = [];
        foreach ($attributeSummary as $attribute) {
            $part = ucfirst($attribute['value']);
            if ($attribute['sub_attribute']) {
                $part .= ' ' . ucfirst($attribute['sub_attribute']);
            }
            $parts[] = $part;
        }
        
        return implode(' - ', $parts);
    }

    /**
     * Generate a human-readable combination name
     */
    private function generateCombinationName($combination)
    {
        $parts = [];
        foreach ($combination as $attribute) {
            $part = ucfirst($attribute['display_value']);
            if ($attribute['sub_attribute_display_name']) {
                $part .= ' ' . $attribute['sub_attribute_display_name'];
            }
            $parts[] = $part;
        }
        
        return implode(' + ', $parts);
    }

    /**
     * Get product variants in structured format
     */
    public function getProductVariants(Request $request, $productId)
    {
        try {
            $product = Product::with([
                'variants.images',
                'variants.attributeValues.attribute',
                'variants.attributeValues.subAttribute'
            ])
            ->active()
            ->find($productId);

            if (!$product) {
                return response()->json([
                    'status' => false,
                    'message' => 'Product not found'
                ], 404);
            }

            // Get filter parameters
            $filters = $request->only(['min_price', 'max_price', 'in_stock_only', 'active_only']);
            $sortBy = $request->get('sort_by', 'price');
            $sortOrder = $request->get('sort_order', 'asc');

            $variants = $product->variants();

            // Apply filters
            if ($filters['min_price'] ?? false) {
                $variants->where('selling_price', '>=', $filters['min_price']);
            }
            if ($filters['max_price'] ?? false) {
                $variants->where('selling_price', '<=', $filters['max_price']);
            }
            if ($filters['in_stock_only'] ?? false) {
                $variants->where('stock', '>', 0);
            }
            if ($filters['active_only'] ?? false) {
                $variants->where('is_active', true);
            }

            // Apply sorting
            $variants->orderBy($sortBy, $sortOrder);

            $variants = $variants->get();

            // Group variants by attributes for better organization
            $variantsByAttributes = [];
            foreach ($variants as $variant) {
                $attributeKey = '';
                $attributeSummary = [];
                
                foreach ($variant->attributeValues->sortBy('attribute.id') as $attributeValue) {
                    $attributeKey .= $attributeValue->attribute->id . ':' . $attributeValue->id . '|';
                    $attributeSummary[] = [
                        'attribute_name' => $attributeValue->attribute->name,
                        'value' => $attributeValue->value,
                        'sub_attribute' => $attributeValue->subAttribute ? $attributeValue->subAttribute->name : null
                    ];
                }
                
                if (!isset($variantsByAttributes[$attributeKey])) {
                    $variantsByAttributes[$attributeKey] = [
                        'attribute_combination' => $attributeSummary,
                        'variants' => []
                    ];
                }
                
                $variantsByAttributes[$attributeKey]['variants'][] = [
                    'id' => $variant->id,
                    'sku' => $variant->sku,
                    'price' => $variant->price,
                    'selling_price' => $variant->selling_price,
                    'original_price' => $variant->original_price,
                    'cost_price' => $variant->cost_price,
                    'stock' => $variant->stock,
                    'min_stock' => $variant->min_stock,
                    'is_active' => $variant->is_active,
                    'is_featured' => $variant->is_featured,
                    'is_in_stock' => $variant->stock > 0,
                    'is_on_sale' => $variant->selling_price < $variant->original_price,
                    'discount_percentage' => $variant->original_price > 0 ? 
                        round((($variant->original_price - $variant->selling_price) / $variant->original_price) * 100, 2) : 0,
                    'image_url' => $variant->image_url ? url($variant->image_url) : null,
                    'images' => $variant->images->map(function ($image) {
                        return [
                            'id' => $image->id,
                            'image_url' => $image->image_url ? url($image->image_url) : null,
                            'type' => $image->type,
                            'alt_text' => $image->alt_text,
                            'sort_order' => $image->sort_order
                        ];
                    }),
                    'attributes' => $variant->attributeValues->map(function ($attributeValue) {
                        return [
                            'attribute_id' => $attributeValue->attribute->id,
                            'attribute_name' => $attributeValue->attribute->name,
                            'value_id' => $attributeValue->id,
                            'value' => $attributeValue->value,
                            'sub_attribute_id' => $attributeValue->sub_attribute_id,
                            'sub_attribute_name' => $attributeValue->subAttribute ? $attributeValue->subAttribute->name : null,
                        ];
                    })
                ];
            }

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
                        'applied' => $filters,
                        'sort_by' => $sortBy,
                        'sort_order' => $sortOrder
                    ],
                    'variants' => [
                        'summary' => [
                            'total_variants' => $variants->count(),
                            'active_variants' => $variants->where('is_active', true)->count(),
                            'in_stock_variants' => $variants->where('stock', '>', 0)->count(),
                            'on_sale_variants' => $variants->filter(function ($v) {
                                return $v->selling_price < $v->original_price;
                            })->count(),
                            'price_range' => [
                                'min' => $variants->min('selling_price'),
                                'max' => $variants->max('selling_price')
                            ],
                            'stock_range' => [
                                'min' => $variants->min('stock'),
                                'max' => $variants->max('stock')
                            ]
                        ],
                        'list' => $variants->map(function ($variant) {
                            return [
                                'id' => $variant->id,
                                'sku' => $variant->sku,
                                'price' => $variant->price,
                                'selling_price' => $variant->selling_price,
                                'original_price' => $variant->original_price,
                                'cost_price' => $variant->cost_price,
                                'stock' => $variant->stock,
                                'min_stock' => $variant->min_stock,
                                'is_active' => $variant->is_active,
                                'is_featured' => $variant->is_featured,
                                'is_in_stock' => $variant->stock > 0,
                                'is_on_sale' => $variant->selling_price < $variant->original_price,
                                'discount_percentage' => $variant->original_price > 0 ? 
                                    round((($variant->original_price - $variant->selling_price) / $variant->original_price) * 100, 2) : 0,
                                'image_url' => $variant->image_url ? url($variant->image_url) : null,
                                'images' => $variant->images->map(function ($image) {
                                    return [
                                        'id' => $image->id,
                                        'image_url' => $image->image_url ? url($image->image_url) : null,
                                        'type' => $image->type,
                                        'alt_text' => $image->alt_text,
                                        'sort_order' => $image->sort_order
                                    ];
                                }),
                                'attributes' => $variant->attributeValues->map(function ($attributeValue) {
                                    return [
                                        'attribute_id' => $attributeValue->attribute->id,
                                        'attribute_name' => $attributeValue->attribute->name,
                                        'value_id' => $attributeValue->id,
                                        'value' => $attributeValue->value,
                                        'sub_attribute_id' => $attributeValue->sub_attribute_id,
                                        'sub_attribute_name' => $attributeValue->subAttribute ? $attributeValue->subAttribute->name : null,
                                    ];
                                })
                            ];
                        }),
                        'grouped_by_attributes' => array_values($variantsByAttributes)
                    ]
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
     * Update product rating statistics
     */
    private function updateProductRatingStats($product)
    {
        $reviews = ProductReview::where('product_id', $product->id)
            ->whereNull('variant_id')
            ->where('is_approved', true)
            ->get();
        
        if ($reviews->count() > 0) {
            $averageRating = $reviews->avg('rating');
            $reviewCount = $reviews->count();
            
            $product->update([
                'average_rating' => round($averageRating, 2),
                'review_count' => $reviewCount
            ]);
        }
    }

    /**
     * Get product reviews with pagination and filtering
     */
    public function getReviews(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'per_page' => 'nullable|integer|min:1|max:50',
                'rating' => 'nullable|integer|between:1,5',
                'sort_by' => 'nullable|in:created_at,rating,helpful_count',
                'sort_order' => 'nullable|in:asc,desc',
                'verified_only' => 'nullable|boolean'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            $product = Product::active()->find($id);
            
            if (!$product) {
                return response()->json([
                    'status' => false,
                    'message' => 'Product not found'
                ], 404);
            }

            $perPage = $request->get('per_page', 10);
            $rating = $request->get('rating');
            $sortBy = $request->get('sort_by', 'created_at');
            $sortOrder = $request->get('sort_order', 'desc');
            $verifiedOnly = $request->get('verified_only', false);

            $query = ProductReview::with('user')
                ->where('product_id', $id)
                ->whereNull('variant_id')
                ->where('is_approved', true);

            // Apply rating filter
            if ($rating) {
                $query->where('rating', $rating);
            }

            // Apply verified filter
            if ($verifiedOnly) {
                $query->where('is_verified', true);
            }

            // Apply sorting
            $query->orderBy($sortBy, $sortOrder);

            $reviews = $query->paginate($perPage);

            // Calculate rating statistics
            $ratingStats = $this->calculateRatingStats($product);

            return response()->json([
                'status' => true,
                'message' => 'Product reviews retrieved successfully',
                'data' => [
                    'product' => [
                        'id' => $product->id,
                        'name' => $product->name,
                        'average_rating' => $product->average_rating,
                        'review_count' => $product->review_count
                    ],
                    'rating_statistics' => $ratingStats,
                    'reviews' => [
                        'current_page' => $reviews->currentPage(),
                        'per_page' => $reviews->perPage(),
                        'total' => $reviews->total(),
                        'last_page' => $reviews->lastPage(),
                        'data' => $reviews->getCollection()->map(function ($review) {
                            return $this->formatReview($review);
                        })
                    ]
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to retrieve product reviews',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Calculate rating statistics for a product
     */
    private function calculateRatingStats($product)
    {
        $reviews = ProductReview::where('product_id', $product->id)
            ->whereNull('variant_id')
            ->where('is_approved', true)
            ->get();

        $stats = [
            'total_reviews' => $reviews->count(),
            'average_rating' => $reviews->count() > 0 ? round($reviews->avg('rating'), 2) : 0,
            'rating_distribution' => [
                5 => $reviews->where('rating', 5)->count(),
                4 => $reviews->where('rating', 4)->count(),
                3 => $reviews->where('rating', 3)->count(),
                2 => $reviews->where('rating', 2)->count(),
                1 => $reviews->where('rating', 1)->count(),
            ]
        ];

        // Calculate percentages
        if ($stats['total_reviews'] > 0) {
            foreach ($stats['rating_distribution'] as $rating => $count) {
                $stats['rating_distribution'][$rating] = [
                    'count' => $count,
                    'percentage' => round(($count / $stats['total_reviews']) * 100, 1)
                ];
            }
        }

        return $stats;
    }

    /**
     * Format review for API response
     */
    private function formatReview($review)
    {
        return [
            'id' => $review->id,
            'rating' => $review->rating,
            'title' => $review->title,
            'content' => $review->content,
            'images' => $review->images ? json_decode($review->images, true) : [],
            'is_verified' => $review->is_verified,
            'helpful_count' => $review->helpful_count,
            'created_at' => $review->created_at,
            'user' => [
                'id' => $review->user->id,
                'name' => $review->user->name,
                'avatar' => $review->user->avatar ?? null
            ]
        ];
    }

    /**
     * Get product variants by selected attributes (for product configurator)
     */
    public function getVariantsBySelectedAttributes(Request $request, $productId)
    {
        $validator = Validator::make($request->all(), [
            'selected_attributes' => 'required|array',
            'selected_attributes.*.attribute_id' => 'required|integer|exists:product_attributes,id',
            'selected_attributes.*.value_id' => 'required|integer|exists:attribute_values,id',
            'include_out_of_stock' => 'nullable|boolean',
            'include_inactive' => 'nullable|boolean'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $product = Product::with([
                'variants.images',
                'variants.attributeValues.attribute',
                'variants.attributeValues.subAttribute'
            ])
            ->active()
            ->find($productId);

            if (!$product) {
                return response()->json([
                    'status' => false,
                    'message' => 'Product not found'
                ], 404);
            }

            $selectedAttributes = $request->input('selected_attributes', []);
            $includeOutOfStock = $request->get('include_out_of_stock', false);
            $includeInactive = $request->get('include_inactive', false);

            // Build attribute filter
            $attributeFilters = [];
            foreach ($selectedAttributes as $selectedAttr) {
                $attributeFilters[] = [
                    'attribute_id' => $selectedAttr['attribute_id'],
                    'value_id' => $selectedAttr['value_id']
                ];
            }

            // Filter variants based on selected attributes
            $filteredVariants = $product->variants->filter(function ($variant) use ($attributeFilters, $includeOutOfStock, $includeInactive) {
                // Check if variant matches all selected attributes
                $matchesAttributes = true;
                foreach ($attributeFilters as $filter) {
                    $hasAttribute = $variant->attributeValues->contains(function ($attrValue) use ($filter) {
                        return $attrValue->attribute->id === $filter['attribute_id'] && 
                               $attrValue->id === $filter['value_id'];
                    });
                    
                    if (!$hasAttribute) {
                        $matchesAttributes = false;
                        break;
                    }
                }

                if (!$matchesAttributes) {
                    return false;
                }

                // Apply stock filter
                if (!$includeOutOfStock && $variant->stock <= 0) {
                    return false;
                }

                // Apply active filter
                if (!$includeInactive && !$variant->is_active) {
                    return false;
                }

                return true;
            });

            // Get available attributes for remaining variants
            $availableAttributes = $this->getAvailableAttributesForVariants($filteredVariants);

            // Get variant combinations for the selected attributes
            $variantCombinations = $this->getVariantCombinationsForAttributes($product, $selectedAttributes);

            return response()->json([
                'status' => true,
                'message' => 'Product variants by selected attributes retrieved successfully',
                'data' => [
                    'product' => [
                        'id' => $product->id,
                        'name' => $product->name,
                        'slug' => $product->slug
                    ],
                    'selected_attributes' => $selectedAttributes,
                    'filters' => [
                        'include_out_of_stock' => $includeOutOfStock,
                        'include_inactive' => $includeInactive
                    ],
                    'variants' => [
                        'summary' => [
                            'total_matching_variants' => $filteredVariants->count(),
                            'in_stock_variants' => $filteredVariants->where('stock', '>', 0)->count(),
                            'active_variants' => $filteredVariants->where('is_active', true)->count(),
                            'price_range' => [
                                'min' => $filteredVariants->min('selling_price'),
                                'max' => $filteredVariants->max('selling_price')
                            ]
                        ],
                        'list' => $filteredVariants->map(function ($variant) {
                            return [
                                'id' => $variant->id,
                                'sku' => $variant->sku,
                                'price' => $variant->price,
                                'selling_price' => $variant->selling_price,
                                'original_price' => $variant->original_price,
                                'cost_price' => $variant->cost_price,
                                'stock' => $variant->stock,
                                'min_stock' => $variant->min_stock,
                                'is_active' => $variant->is_active,
                                'is_featured' => $variant->is_featured,
                                'is_in_stock' => $variant->stock > 0,
                                'is_on_sale' => $variant->selling_price < $variant->original_price,
                                'discount_percentage' => $variant->original_price > 0 ? 
                                    round((($variant->original_price - $variant->selling_price) / $variant->original_price) * 100, 2) : 0,
                                'image_url' => $variant->image_url ? url($variant->image_url) : null,
                                'images' => $variant->images->map(function ($image) {
                                    return [
                                        'id' => $image->id,
                                        'image_url' => $image->image_url ? url($image->image_url) : null,
                                        'type' => $image->type,
                                        'alt_text' => $image->alt_text,
                                        'sort_order' => $image->sort_order
                                    ];
                                }),
                                'attributes' => $variant->attributeValues->map(function ($attributeValue) {
                                    return [
                                        'attribute_id' => $attributeValue->attribute->id,
                                        'attribute_name' => $attributeValue->attribute->name,
                                        'value_id' => $attributeValue->id,
                                        'value' => $attributeValue->value,
                                        'sub_attribute_id' => $attributeValue->sub_attribute_id,
                                        'sub_attribute_name' => $attributeValue->subAttribute ? $attributeValue->subAttribute->name : null,
                                    ];
                                })
                            ];
                        })
                    ],
                    'available_attributes' => $availableAttributes,
                    'variant_combinations' => $variantCombinations
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to retrieve product variants by selected attributes',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get available attribute values for a product based on current selection
     */
    public function getAvailableAttributeValues(Request $request, $productId)
    {
        $validator = Validator::make($request->all(), [
            'selected_attributes' => 'nullable|array',
            'selected_attributes.*.attribute_id' => 'integer|exists:product_attributes,id',
            'selected_attributes.*.value_id' => 'integer|exists:attribute_values,id',
            'target_attribute_id' => 'nullable|integer|exists:product_attributes,id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $product = Product::with([
                'variants.attributeValues.attribute',
                'variants.attributeValues.subAttribute'
            ])
            ->active()
            ->find($productId);

            if (!$product) {
                return response()->json([
                    'status' => false,
                    'message' => 'Product not found'
                ], 404);
            }

            $selectedAttributes = $request->input('selected_attributes', []);
            $targetAttributeId = $request->get('target_attribute_id');

            // Get all variants that match the current selection
            $matchingVariants = $this->getVariantsMatchingAttributes($product, $selectedAttributes);

            // Get available attribute values for the target attribute
            $availableValues = $this->getAvailableValuesForAttribute($matchingVariants, $targetAttributeId);

            return response()->json([
                'status' => true,
                'message' => 'Available attribute values retrieved successfully',
                'data' => [
                    'product' => [
                        'id' => $product->id,
                        'name' => $product->name,
                        'slug' => $product->slug
                    ],
                    'selected_attributes' => $selectedAttributes,
                    'target_attribute_id' => $targetAttributeId,
                    'available_values' => $availableValues,
                    'matching_variants_count' => $matchingVariants->count()
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to retrieve available attribute values',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get product configuration with all available attributes and current selection
     */
    public function getProductConfiguration(Request $request, $productId)
    {
        try {
            $product = Product::with([
                'variants.images',
                'variants.attributeValues.attribute',
                'variants.attributeValues.subAttribute'
            ])
            ->active()
            ->find($productId);

            if (!$product) {
                return response()->json([
                    'status' => false,
                    'message' => 'Product not found'
                ], 404);
            }

            $selectedAttributes = $request->input('selected_attributes', []);

            // Get all available attributes for this product
            $allAttributes = $this->getAllProductAttributes($product);

            // Get variants matching current selection
            $matchingVariants = $this->getVariantsMatchingAttributes($product, $selectedAttributes);

            // Get available values for each attribute based on current selection
            $availableAttributes = [];
            foreach ($allAttributes as $attribute) {
                $availableValues = $this->getAvailableValuesForAttribute($matchingVariants, $attribute['id']);
                $availableAttributes[] = [
                    'attribute' => $attribute,
                    'available_values' => $availableValues
                ];
            }

            // Get recommended/default selection
            $recommendedSelection = $this->getRecommendedAttributeSelection($product);

            return response()->json([
                'status' => true,
                'message' => 'Product configuration retrieved successfully',
                'data' => [
                    'product' => [
                        'id' => $product->id,
                        'name' => $product->name,
                        'slug' => $product->slug,
                        'description' => $product->description,
                        'key_features' => $product->key_features,
                        'image_url' => $product->main_image_url ? url($product->main_image_url) : null,
                        'rating' => [
                            'average_rating' => $product->average_rating,
                            'review_count' => $product->review_count
                        ],
                        'pricing' => [
                            'selling_price' => $product->selling_price,
                            'original_price' => $product->original_price,
                            'is_on_sale' => $product->is_on_sale,
                            'discount_percentage' => $product->discount_percentage
                        ]
                    ],
                    'configuration' => [
                        'selected_attributes' => $selectedAttributes,
                        'recommended_selection' => $recommendedSelection,
                        'available_attributes' => $availableAttributes,
                        'matching_variants_count' => $matchingVariants->count()
                    ],
                    'current_variants' => $matchingVariants->map(function ($variant) {
                        return [
                            'id' => $variant->id,
                            'sku' => $variant->sku,
                            'price' => $variant->price,
                            'selling_price' => $variant->selling_price,
                            'original_price' => $variant->original_price,
                            'stock' => $variant->stock,
                            'is_in_stock' => $variant->stock > 0,
                            'is_on_sale' => $variant->selling_price < $variant->original_price,
                            'discount_percentage' => $variant->original_price > 0 ? 
                                round((($variant->original_price - $variant->selling_price) / $variant->original_price) * 100, 2) : 0,
                            'image_url' => $variant->image_url ? url($variant->image_url) : null,
                            'attributes' => $variant->attributeValues->map(function ($attributeValue) {
                                return [
                                    'attribute_id' => $attributeValue->attribute->id,
                                    'attribute_name' => $attributeValue->attribute->name,
                                    'value_id' => $attributeValue->id,
                                    'value' => $attributeValue->value,
                                    'sub_attribute_id' => $attributeValue->sub_attribute_id,
                                    'sub_attribute_name' => $attributeValue->subAttribute ? $attributeValue->subAttribute->name : null,
                                ];
                            })
                        ];
                    })
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to retrieve product configuration',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get product variant by exact attribute combination
     */
    public function getVariantByExactAttributes(Request $request, $productId)
    {
        $validator = Validator::make($request->all(), [
            'attributes' => 'required|array',
            'attributes.*.attribute_id' => 'required|integer|exists:product_attributes,id',
            'attributes.*.value_id' => 'required|integer|exists:attribute_values,id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $product = Product::with([
                'variants.images',
                'variants.attributeValues.attribute',
                'variants.attributeValues.subAttribute'
            ])
            ->active()
            ->find($productId);

            if (!$product) {
                return response()->json([
                    'status' => false,
                    'message' => 'Product not found'
                ], 404);
            }

            $requestedAttributes = $request->input('attributes', []);

            // Find variant that exactly matches the requested attributes
            $matchingVariant = $product->variants->first(function ($variant) use ($requestedAttributes) {
                // Check if variant has exactly the same attributes
                if ($variant->attributeValues->count() !== count($requestedAttributes)) {
                    return false;
                }

                foreach ($requestedAttributes as $requestedAttr) {
                    $hasAttribute = $variant->attributeValues->contains(function ($attrValue) use ($requestedAttr) {
                        return $attrValue->attribute->id === $requestedAttr['attribute_id'] && 
                               $attrValue->id === $requestedAttr['value_id'];
                    });
                    
                    if (!$hasAttribute) {
                        return false;
                    }
                }

                return true;
            });

            if (!$matchingVariant) {
                return response()->json([
                    'status' => false,
                    'message' => 'No variant found with the specified attributes'
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
                    'requested_attributes' => $requestedAttributes,
                    'variant' => [
                        'id' => $matchingVariant->id,
                        'sku' => $matchingVariant->sku,
                        'price' => $matchingVariant->price,
                        'selling_price' => $matchingVariant->selling_price,
                        'original_price' => $matchingVariant->original_price,
                        'cost_price' => $matchingVariant->cost_price,
                        'stock' => $matchingVariant->stock,
                        'min_stock' => $matchingVariant->min_stock,
                        'is_active' => $matchingVariant->is_active,
                        'is_featured' => $matchingVariant->is_featured,
                        'is_in_stock' => $matchingVariant->stock > 0,
                        'is_on_sale' => $matchingVariant->selling_price < $matchingVariant->original_price,
                        'discount_percentage' => $matchingVariant->original_price > 0 ? 
                            round((($matchingVariant->original_price - $matchingVariant->selling_price) / $matchingVariant->original_price) * 100, 2) : 0,
                        'image_url' => $matchingVariant->image_url ? url($matchingVariant->image_url) : null,
                        'images' => $matchingVariant->images->map(function ($image) {
                            return [
                                'id' => $image->id,
                                'image_url' => $image->image_url ? url($image->image_url) : null,
                                'type' => $image->type,
                                'alt_text' => $image->alt_text,
                                'sort_order' => $image->sort_order
                            ];
                        }),
                        'attributes' => $matchingVariant->attributeValues->map(function ($attributeValue) {
                            return [
                                'attribute_id' => $attributeValue->attribute->id,
                                'attribute_name' => $attributeValue->attribute->name,
                                'value_id' => $attributeValue->id,
                                'value' => $attributeValue->value,
                                'sub_attribute_id' => $attributeValue->sub_attribute_id,
                                'sub_attribute_name' => $attributeValue->subAttribute ? $attributeValue->subAttribute->name : null,
                            ];
                        })
                    ]
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
     * Helper method to get variants matching specific attributes
     */
    private function getVariantsMatchingAttributes($product, $selectedAttributes)
    {
        if (empty($selectedAttributes)) {
            return $product->variants;
        }

        return $product->variants->filter(function ($variant) use ($selectedAttributes) {
            foreach ($selectedAttributes as $selectedAttr) {
                $hasAttribute = $variant->attributeValues->contains(function ($attrValue) use ($selectedAttr) {
                    return $attrValue->attribute->id === $selectedAttr['attribute_id'] && 
                           $attrValue->id === $selectedAttr['value_id'];
                });
                
                if (!$hasAttribute) {
                    return false;
                }
            }
            return true;
        });
    }

    /**
     * Helper method to get available values for a specific attribute
     */
    private function getAvailableValuesForAttribute($variants, $attributeId)
    {
        $availableValues = [];
        
        foreach ($variants as $variant) {
            foreach ($variant->attributeValues as $attributeValue) {
                if ($attributeValue->attribute->id === $attributeId) {
                    $valueExists = false;
                    foreach ($availableValues as $existingValue) {
                        if ($existingValue['id'] === $attributeValue->id) {
                            $valueExists = true;
                            break;
                        }
                    }
                    
                    if (!$valueExists) {
                        $availableValues[] = [
                            'id' => $attributeValue->id,
                            'value' => $attributeValue->value,
                            'display_value' => ucfirst($attributeValue->value),
                            'sub_attribute_id' => $attributeValue->sub_attribute_id,
                            'sub_attribute_name' => $attributeValue->subAttribute ? $attributeValue->subAttribute->name : null,
                            'is_available' => $variant->stock > 0 && $variant->is_active
                        ];
                    }
                }
            }
        }
        
        return $availableValues;
    }

    /**
     * Helper method to get all product attributes
     */
    private function getAllProductAttributes($product)
    {
        $attributes = [];
        
        foreach ($product->variants as $variant) {
            foreach ($variant->attributeValues as $attributeValue) {
                $attributeExists = false;
                foreach ($attributes as $existingAttribute) {
                    if ($existingAttribute['id'] === $attributeValue->attribute->id) {
                        $attributeExists = true;
                        break;
                    }
                }
                
                if (!$attributeExists) {
                    $attributes[] = [
                        'id' => $attributeValue->attribute->id,
                        'name' => $attributeValue->attribute->name,
                        'display_name' => ucfirst($attributeValue->attribute->name),
                        'type' => 'select'
                    ];
                }
            }
        }
        
        return $attributes;
    }

    /**
     * Helper method to get recommended attribute selection
     */
    private function getRecommendedAttributeSelection($product)
    {
        // Find the first in-stock variant and use its attributes as recommendation
        $recommendedVariant = $product->variants
            ->where('stock', '>', 0)
            ->where('is_active', true)
            ->first();

        if (!$recommendedVariant) {
            return [];
        }

        return $recommendedVariant->attributeValues->map(function ($attributeValue) {
            return [
                'attribute_id' => $attributeValue->attribute->id,
                'attribute_name' => $attributeValue->attribute->name,
                'value_id' => $attributeValue->id,
                'value' => $attributeValue->value
            ];
        })->toArray();
    }

    /**
     * Helper method to get available attributes for variants
     */
    private function getAvailableAttributesForVariants($variants)
    {
        $availableAttributes = [];
        
        foreach ($variants as $variant) {
            foreach ($variant->attributeValues as $attributeValue) {
                $attributeId = $attributeValue->attribute->id;
                
                if (!isset($availableAttributes[$attributeId])) {
                    $availableAttributes[$attributeId] = [
                        'id' => $attributeId,
                        'name' => $attributeValue->attribute->name,
                        'display_name' => ucfirst($attributeValue->attribute->name),
                        'values' => []
                    ];
                }
                
                $valueExists = false;
                foreach ($availableAttributes[$attributeId]['values'] as $existingValue) {
                    if ($existingValue['id'] === $attributeValue->id) {
                        $valueExists = true;
                        break;
                    }
                }
                
                if (!$valueExists) {
                    $availableAttributes[$attributeId]['values'][] = [
                        'id' => $attributeValue->id,
                        'value' => $attributeValue->value,
                        'display_value' => ucfirst($attributeValue->value),
                        'sub_attribute_id' => $attributeValue->sub_attribute_id,
                        'sub_attribute_name' => $attributeValue->subAttribute ? $attributeValue->subAttribute->name : null,
                        'is_available' => $variant->stock > 0 && $variant->is_active
                    ];
                }
            }
        }
        
        return array_values($availableAttributes);
    }

    /**
     * Helper method to get variant combinations for attributes
     */
    private function getVariantCombinationsForAttributes($product, $selectedAttributes)
    {
        $combinations = [];
        
        foreach ($product->variants as $variant) {
            $combination = [];
            $combinationKey = '';
            
            // Sort attributes by ID for consistent combination keys
            $sortedAttributes = $variant->attributeValues->sortBy('attribute.id');
            
            foreach ($sortedAttributes as $attributeValue) {
                $attributeId = $attributeValue->attribute->id;
                $combination[$attributeId] = [
                    'attribute_id' => $attributeId,
                    'attribute_name' => $attributeValue->attribute->name,
                    'value_id' => $attributeValue->id,
                    'value' => $attributeValue->value
                ];
                
                $combinationKey .= $attributeId . ':' . $attributeValue->id . '|';
            }
            
            if (!isset($combinations[$combinationKey])) {
                $combinations[$combinationKey] = [
                    'combination_id' => md5($combinationKey),
                    'attributes' => array_values($combination),
                    'variants' => []
                ];
            }
            
            $combinations[$combinationKey]['variants'][] = [
                'variant_id' => $variant->id,
                'sku' => $variant->sku,
                'price' => $variant->price,
                'selling_price' => $variant->selling_price,
                'stock' => $variant->stock,
                'is_in_stock' => $variant->stock > 0,
                'is_active' => $variant->is_active
            ];
        }
        
        return array_values($combinations);
    }

    /**
     * Get all available filter options for products
     */
    public function getFilterOptions()
    {
        try {
            $minPrice = (float) Product::min('selling_price');
            $maxPrice = (float) Product::max('selling_price');
            
            // Round prices to nearest 100 for better UX
            $minPrice = floor($minPrice / 100) * 100;
            $maxPrice = ceil($maxPrice / 100) * 100;

            $categories = \App\Models\Category::active()
                ->select('id', 'name', 'slug', 'image_url')
                ->withCount(['products' => function($query) {
                    $query->active();
                }])
                ->having('products_count', '>', 0)
                ->orderBy('name')
                ->get()
                ->map(function($category) {
                    return [
                        'id' => $category->id,
                        'name' => $category->name,
                        'slug' => $category->slug,
                        'image_url' => $category->image_url,
                        'count' => $category->products_count
                    ];
                });

            $segments = \App\Models\Segment::active()
                ->select('id', 'name', 'slug', 'icon')
                ->withCount(['products' => function($query) {
                    $query->active();
                }])
                ->having('products_count', '>', 0)
                ->orderBy('sort_order')
                ->orderBy('name')
                ->get()
                ->map(function($segment) {
                    return [
                        'id' => $segment->id,
                        'name' => $segment->name,
                        'slug' => $segment->slug,
                        'icon' => $segment->icon,
                        'count' => $segment->products_count
                    ];
                });

            $ratings = [
                ['value' => 4, 'label' => '4 Stars & Up', 'count' => Product::whereHas('reviews', function($q) {
                    $q->selectRaw('product_id, AVG(rating) as avg_rating')
                      ->groupBy('product_id')
                      ->having('avg_rating', '>=', 4);
                })->active()->count()],
                ['value' => 3, 'label' => '3 Stars & Up', 'count' => Product::whereHas('reviews', function($q) {
                    $q->selectRaw('product_id, AVG(rating) as avg_rating')
                      ->groupBy('product_id')
                      ->having('avg_rating', '>=', 3);
                })->active()->count()],
                ['value' => 2, 'label' => '2 Stars & Up', 'count' => Product::whereHas('reviews', function($q) {
                    $q->selectRaw('product_id, AVG(rating) as avg_rating')
                      ->groupBy('product_id')
                      ->having('avg_rating', '>=', 2);
                })->active()->count()],
                ['value' => 1, 'label' => '1 Star & Up', 'count' => Product::whereHas('reviews', function($q) {
                    $q->selectRaw('product_id, AVG(rating) as avg_rating')
                      ->groupBy('product_id')
                      ->having('avg_rating', '>=', 1);
                })->active()->count()]
            ];

            $inStockCount = Product::where('stock', '>', 0)->active()->count();
            $onSaleCount = Product::whereColumn('selling_price', '<', 'cost_price')->active()->count();

            return response()->json([
                'status' => true,
                'data' => [
                    'price_range' => [
                        'min' => $minPrice,
                        'max' => $maxPrice,
                        'currency' => '₹', // Change this based on your currency
                        'step' => 100 // Price step for sliders
                    ],
                    'categories' => $categories,
                    'segments' => $segments,
                    'ratings' => $ratings,
                    'availability' => [
                        ['key' => 'in_stock', 'label' => 'In Stock', 'count' => $inStockCount],
                        ['key' => 'on_sale', 'label' => 'On Sale', 'count' => $onSaleCount]
                    ],
                    'sort_options' => [
                        ['key' => 'newest', 'label' => 'Newest Arrivals'],
                        ['key' => 'price_asc', 'label' => 'Price: Low to High'],
                        ['key' => 'price_desc', 'label' => 'Price: High to Low'],
                        ['key' => 'popular', 'label' => 'Most Popular'],
                        ['key' => 'top_rated', 'label' => 'Top Rated']
                    ]
                ]
            ]);

        } catch (\Exception $e) {
            \Log::error('Error getting filter options: ' . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Failed to load filter options',
                'error' => config('app.debug') ? $e->getMessage() : null
            ], 500);
        }
    }

    /**
     * Get filtered products with combined filters
     */
    public function filtered(Request $request)
    {
        try {
            // Validate request parameters
            $validator = Validator::make($request->all(), [
                'per_page' => 'nullable|integer|min:1|max:100',
                'page' => 'nullable|integer|min:1',
                'sort_by' => 'nullable|in:price_asc,price_desc,newest,popular,top_rated',
                'min_price' => 'nullable|numeric|min:0',
                'max_price' => 'nullable|numeric|min:0',
                'category_id' => 'nullable|integer|exists:categories,id',
                'segment_id' => 'nullable|integer|exists:segments,id',
                'search' => 'nullable|string|max:255',
                'on_sale' => 'nullable|boolean',
                'in_stock' => 'nullable|boolean',
                'rating' => 'nullable|integer|min:1|max:5',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            $perPage = $request->get('per_page', 12);
            $sortBy = $request->get('sort_by', 'newest');
            
            // Start building the query
            $query = Product::query()
                ->with(['mainImage', 'category'])
                ->withCount('reviews')
                ->withAvg('reviews', 'rating')
                ->active();

            // Apply category filter
            if ($request->has('category_id')) {
                $query->where('category_id', $request->category_id);
            }

            // Apply segment filter
            if ($request->has('segment_id')) {
                $query->whereHas('segments', function($q) use ($request) {
                    $q->where('segments.id', $request->segment_id);
                });
            }

            // Apply price filters
            if ($request->has('min_price')) {
                $query->where('selling_price', '>=', $request->min_price);
            }
            
            if ($request->has('max_price')) {
                $query->where('selling_price', '<=', $request->max_price);
            }

            // Apply search filter
            if ($request->has('search')) {
                $search = $request->search;
                $query->where(function($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
                });
            }

            // Apply on sale filter
            if ($request->has('on_sale')) {
                $query->whereColumn('selling_price', '<', 'cost_price');
            }

            // Apply in stock filter
            if ($request->has('in_stock') && $request->in_stock) {
                $query->where('stock', '>', 0);
            }

            // Apply rating filter
            if ($request->has('rating')) {
                $query->whereHas('reviews', function($q) use ($request) {
                    $q->selectRaw('product_id, AVG(rating) as avg_rating')
                    ->groupBy('product_id')
                    ->having('avg_rating', '>=', $request->rating);
                });
            }

            // Apply sorting
            switch ($sortBy) {
                case 'price_asc':
                    $query->orderBy('selling_price');
                    break;
                case 'price_desc':
                    $query->orderBy('selling_price', 'desc');
                    break;
                case 'popular':
                    $query->withCount('orderItems as sales_count')
                        ->orderBy('sales_count', 'desc');
                    break;
                case 'top_rated':
                    $query->orderBy('reviews_avg_rating', 'desc')
                        ->orderBy('reviews_count', 'desc');
                    break;
                case 'newest':
                default:
                    $query->latest();
                    break;
            }

            // Get paginated results
            $products = $query->paginate($perPage);

            // Add additional metadata
            $response = [
                'status' => true,
                'data' => $products,
                'filters' => [
                    'applied' => $request->except(['page', 'per_page']),
                    'available' => [
                        'min_price' => (float) Product::min('selling_price'),
                        'max_price' => (float) Product::max('selling_price'),
                        'categories' => \App\Models\Category::active()->get(['id', 'name']),
                        'segments' => \App\Models\Segment::active()->get(['id', 'name']),
                    ]
                ]
            ];

            return response()->json($response);

        } catch (\Exception $e) {
            \Log::error('Error in filtered products: ' . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'An error occurred while fetching products',
                'error' => config('app.debug') ? $e->getMessage() : null
            ], 500);
        }
    }
} 