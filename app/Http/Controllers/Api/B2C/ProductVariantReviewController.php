<?php

namespace App\Http\Controllers\Api\B2C;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductVariantReviewController extends Controller
{
    /**
     * Get reviews for a specific variant
     */
    public function index(Request $request, $productId, $variantId)
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

            $perPage = $request->get('per_page', 10);
            $sortBy = $request->get('sort_by', 'created_at');
            $sortOrder = $request->get('sort_order', 'desc');
            $rating = $request->get('rating');

            $query = $variant->reviews()
                ->with(['user'])
                ->approved();

            // Apply rating filter
            if ($rating) {
                $query->byRating($rating);
            }

            // Apply sorting
            $query->orderBy($sortBy, $sortOrder);

            $reviews = $query->paginate($perPage);

            // Calculate rating statistics
            $ratingStats = $this->calculateRatingStats($variant->reviews()->approved());

            return response()->json([
                'status' => true,
                'message' => 'Variant reviews retrieved successfully',
                'data' => [
                    'product' => [
                        'id' => $product->id,
                        'name' => $product->name,
                        'slug' => $product->slug
                    ],
                    'variant' => [
                        'id' => $variant->id,
                        'sku' => $variant->sku,
                        'name' => $this->generateVariantName($variant)
                    ],
                    'rating_statistics' => $ratingStats,
                    'reviews' => $reviews->getCollection()->map(function ($review) {
                        return $this->formatReview($review);
                    }),
                    'pagination' => [
                        'current_page' => $reviews->currentPage(),
                        'last_page' => $reviews->lastPage(),
                        'per_page' => $reviews->perPage(),
                        'total' => $reviews->total(),
                        'from' => $reviews->firstItem(),
                        'to' => $reviews->lastItem()
                    ]
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to retrieve variant reviews',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Add a review for a specific variant
     */
    public function store(Request $request, $productId, $variantId)
    {
        $validator = Validator::make($request->all(), [
            'rating' => 'required|integer|between:1,5',
            'title' => 'nullable|string|max:255',
            'content' => 'required|string|min:10',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:5120' // 5MB max per image
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

            $variant = $product->variants()->find($variantId);
            
            if (!$variant) {
                return response()->json([
                    'status' => false,
                    'message' => 'Product variant not found'
                ], 404);
            }

            $user = $request->user();

            // Check if user already reviewed this variant
            $existingReview = ProductReview::where('variant_id', $variantId)
                ->where('user_id', $user->id)
                ->first();

            if ($existingReview) {
                return response()->json([
                    'status' => false,
                    'message' => 'You have already reviewed this variant'
                ], 400);
            }

            // Handle image uploads
            $imageUrls = [];
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $imageName = time() . '_' . $image->getClientOriginalName();
                    $imagePath = 'reviews/' . $imageName;
                    
                    // Create reviews directory if it doesn't exist
                    $uploadPath = public_path('reviews');
                    if (!file_exists($uploadPath)) {
                        mkdir($uploadPath, 0755, true);
                    }
                    
                    // Move uploaded file
                    $image->move($uploadPath, $imageName);
                    $imageUrls[] = '/' . $imagePath;
                }
            }

            $review = ProductReview::create([
                'product_id' => $productId,
                'variant_id' => $variantId,
                'user_id' => $user->id,
                'type' => 'review',
                'rating' => $request->rating,
                'title' => $request->title,
                'content' => $request->content,
                'images' => $imageUrls,
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'is_verified' => false,
                'is_approved' => true // Auto-approve for now, can be changed to false for moderation
            ]);

            // Update variant rating statistics
            $this->updateVariantRatingStats($variant);

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
     * Get a specific review
     */
    public function show(Request $request, $productId, $variantId, $reviewId)
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

            $review = $variant->reviews()
                ->with(['user'])
                ->approved()
                ->find($reviewId);

            if (!$review) {
                return response()->json([
                    'status' => false,
                    'message' => 'Review not found'
                ], 404);
            }

            return response()->json([
                'status' => true,
                'message' => 'Review retrieved successfully',
                'data' => [
                    'product' => [
                        'id' => $product->id,
                        'name' => $product->name,
                        'slug' => $product->slug
                    ],
                    'variant' => [
                        'id' => $variant->id,
                        'sku' => $variant->sku,
                        'name' => $this->generateVariantName($variant)
                    ],
                    'review' => $this->formatReview($review)
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to retrieve review',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update a review
     */
    public function update(Request $request, $productId, $variantId, $reviewId)
    {
        $validator = Validator::make($request->all(), [
            'rating' => 'sometimes|integer|between:1,5',
            'title' => 'nullable|string|max:255',
            'content' => 'sometimes|string|min:10'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $user = $request->user();
            
            $review = ProductReview::where('variant_id', $variantId)
                ->where('user_id', $user->id)
                ->find($reviewId);

            if (!$review) {
                return response()->json([
                    'status' => false,
                    'message' => 'Review not found or you are not authorized to edit it'
                ], 404);
            }

            $review->update($request->only(['rating', 'title', 'content']));

            // Update variant rating statistics
            $variant = $review->variant;
            $this->updateVariantRatingStats($variant);

            return response()->json([
                'status' => true,
                'message' => 'Review updated successfully',
                'data' => [
                    'review' => $this->formatReview($review->fresh())
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to update review',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Delete a review
     */
    public function destroy(Request $request, $productId, $variantId, $reviewId)
    {
        try {
            $user = $request->user();
            
            $review = ProductReview::where('variant_id', $variantId)
                ->where('user_id', $user->id)
                ->find($reviewId);

            if (!$review) {
                return response()->json([
                    'status' => false,
                    'message' => 'Review not found or you are not authorized to delete it'
                ], 404);
            }

            $variant = $review->variant;
            $review->delete();

            // Update variant rating statistics
            $this->updateVariantRatingStats($variant);

            return response()->json([
                'status' => true,
                'message' => 'Review deleted successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to delete review',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Mark a review as helpful
     */
    public function markHelpful(Request $request, $productId, $variantId, $reviewId)
    {
        try {
            $user = $request->user();
            
            $review = ProductReview::where('variant_id', $variantId)
                ->approved()
                ->find($reviewId);

            if (!$review) {
                return response()->json([
                    'status' => false,
                    'message' => 'Review not found'
                ], 404);
            }

            // Increment helpful count
            $review->increment('helpful_count');

            return response()->json([
                'status' => true,
                'message' => 'Review marked as helpful',
                'data' => [
                    'helpful_count' => $review->fresh()->helpful_count
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to mark review as helpful',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Calculate rating statistics for a variant
     */
    private function calculateRatingStats($reviews)
    {
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

        return [
            'total_reviews' => $totalReviews,
            'average_rating' => round($averageRating, 1),
            'rating_distribution' => $ratingDistribution
        ];
    }

    /**
     * Update variant rating statistics
     */
    private function updateVariantRatingStats($variant)
    {
        $reviews = $variant->reviews()->approved();
        $totalReviews = $reviews->count();
        $averageRating = $totalReviews > 0 ? $reviews->avg('rating') : 0;

        $variant->update([
            'average_rating' => round($averageRating, 2),
            'review_count' => $totalReviews
        ]);
    }

    /**
     * Generate variant name from attributes
     */
    private function generateVariantName($variant)
    {
        $attributes = $variant->attributeValues->map(function ($attributeValue) {
            $name = ucfirst($attributeValue->value);
            if ($attributeValue->subAttribute) {
                $name .= ' ' . ucfirst($attributeValue->subAttribute->name);
            }
            return $name;
        });

        return $attributes->implode(' - ');
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
            'type' => $review->type,
            'is_verified' => $review->is_verified,
            'helpful_count' => $review->helpful_count,
            'images' => $review->images ?: [],
            'created_at' => $review->created_at,
            'updated_at' => $review->updated_at,
            'user' => [
                'id' => $review->user->id,
                'name' => $review->user->full_name,
                'avatar' => $review->user->avatar
            ]
        ];
    }
} 