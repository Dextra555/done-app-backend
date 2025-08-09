<?php

namespace App\Http\Controllers\Api\B2C;

use App\Http\Controllers\Controller;
use App\Models\Segment;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SegmentController extends Controller
{
    /**
     * Get all active segments
     */
    public function index()
    {
        $segments = Segment::active()
            ->ordered()
            ->get();

        return response()->json([
            'status' => true,
            'data' => $segments
        ]);
    }

    /**
     * Get products in a specific segment
     */
    public function products($segmentId, Request $request)
    {
        $segment = Segment::findOrFail($segmentId);
        
        // Validate request parameters
        $validator = Validator::make($request->all(), [
            'per_page' => 'nullable|integer|min:1|max:100',
            'page' => 'nullable|integer|min:1',
            'sort_by' => 'nullable|in:price_asc,price_desc,newest,popular',
            'min_price' => 'nullable|numeric|min:0',
            'max_price' => 'nullable|numeric|min:0',
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
        $query = $segment->products()
            ->with(['mainImage', 'category'])
            ->active()
            ->withCount('reviews')
            ->withAvg('reviews', 'rating');

        // Apply price filters if provided
        if ($request->has('min_price')) {
            $query->where('selling_price', '>=', $request->min_price);
        }
        
        if ($request->has('max_price')) {
            $query->where('selling_price', '<=', $request->max_price);
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
                $query->orderBy('average_rating', 'desc')
                      ->orderBy('review_count', 'desc');
                break;
            case 'newest':
            default:
                $query->latest();
                break;
        }

        // Get paginated results
        $products = $query->paginate($perPage);

        return response()->json([
            'status' => true,
            'data' => $products
        ]);
    }

    /**
     * Get combined data for home screen (categories and segments)
     */
    public function getHomeData(Request $request)
    {
        try {
            // Get all active segments with their products
            $segments = Segment::with(['products' => function($query) {
                $query->select([
                    'products.id', 'products.name', 'products.slug', 
                    'products.selling_price', 'products.image_url', 
                    'products.average_rating', 'products.review_count'
                ])
                ->where('products.status', 'active')
                ->orderBy('product_segment.sort_order')
                ->limit(5);
            }])
            ->where('is_active', true)
            ->ordered()
            ->get()
            ->map(function($segment) {
                return [
                    'label' => $segment->name,
                    'type' => 'segment',
                    'products' => $segment->products->map(function($product) {
                        return [
                            'id' => $product->id,
                            'name' => $product->name,
                            'slug' => $product->slug,
                            'price' => (float) $product->selling_price,
                            'image' => $product->image_url ? url($product->image_url) : null,
                            'rating' => (float) $product->average_rating,
                            'review_count' => (int) $product->review_count,
                            'is_favorite' => false
                        ];
                    })
                ];
            });

            // Get all active categories with their products
            $categories = Category::with(['products' => function($query) {
                $query->select([
                    'id', 'category_id', 'name', 'slug', 
                    'selling_price', 'image_url', 'average_rating', 'review_count'
                ])
                ->where('status', 'active')
                ->orderBy('created_at', 'desc')
                ->limit(5);
            }])
            ->where('status', true)
            ->orderBy('sort_order')
            ->get()
            ->map(function($category) {
                return [
                    'label' => $category->name,
                    'type' => 'category',
                    'products' => $category->products->map(function($product) {
                        return [
                            'id' => $product->id,
                            'name' => $product->name,
                            'slug' => $product->slug,
                            'price' => (float) $product->selling_price,
                            'image' => $product->image_url ? url($product->image_url) : null,
                            'rating' => (float) $product->average_rating,
                            'review_count' => (int) $product->review_count,
                            'is_favorite' => false
                        ];
                    })
                ];
            });

            // Add 'All Products' as the first item
            $allProducts = \App\Models\Product::select([
                    'id', 'name', 'slug', 'selling_price', 'image_url',
                    'average_rating', 'review_count'
                ])
                ->where('status', 'active')
                ->latest()
                ->limit(10)
                ->get()
                ->map(function($product) {
                    return [
                        'id' => $product->id,
                        'name' => $product->name,
                        'slug' => $product->slug,
                        'price' => (float) $product->selling_price,
                        'image' => $product->image_url ? url($product->image_url) : null,
                        'rating' => (float) $product->average_rating,
                        'review_count' => (int) $product->review_count,
                        'is_favorite' => false
                    ];
                });

            // Combine all sections
            $responseData = array_merge(
                [['label' => 'All', 'type' => 'all', 'products' => $allProducts]],
                $segments->toArray(),
                $categories->toArray()
            );

            return response()->json([
                'status' => true,
                'data' => $responseData
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to load home data',
                'error' => config('app.debug') ? $e->getMessage() : null
            ], 500);
        }
    }
}