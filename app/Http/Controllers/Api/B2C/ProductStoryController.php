<?php

namespace App\Http\Controllers\Api\B2C;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductStory;
use App\Models\StoryView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProductStoryController extends Controller
{
    /**
     * Get all active stories
     */
    public function index()
    {
        // Get all active stories with their view and comment counts
        $stories = ProductStory::withCount(['views', 'comments'])
            ->with(['media', 'product:id,name,selling_price as price,image_url as image'])
            ->where('expires_at', '>', now())
            ->orderBy('created_at', 'desc')
            ->paginate(15);
            
        // Get viewed story IDs for the authenticated user
        $viewedStories = [];
        if ($user = Auth::user()) {
            $viewedStories = StoryView::where('user_id', $user->id)
                ->where('story_type', ProductStory::class)
                ->whereIn('story_id', $stories->pluck('id'))
                ->pluck('story_id')
                ->toArray();
        }
        
        // Base URL for storage
        $baseUrl = rtrim(config('app.url'), '/');
        
        // Map the stories and set the viewed status
        $stories->getCollection()->transform(function ($story) use ($viewedStories, $baseUrl) {
            $isViewed = in_array($story->id, $viewedStories);
            
            // Get first media item with thumbnail
            $firstMedia = $story->media->sortBy('order')->first();
            
            // Helper function to ensure full URL for product image
            $getProductImageUrl = function($path) use ($baseUrl) {
                if (empty($path)) return null;
                if (filter_var($path, FILTER_VALIDATE_URL)) return $path;
                return $baseUrl . '/storage/' . ltrim($path, '/');
            };
            
            $productImageUrl = $getProductImageUrl($story->product->image);
            
            return [
                'id' => $story->id,
                'product_id' => $story->product_id,
                'product_name' => $story->product->name ?? 'Unknown Product',
                'product_price' => $story->product->price ?? 0,
               'media_thumbnail' => url($firstMedia->thumbnail_url),
                'caption' => $story->product->caption ?? $story->caption ?? '',
                'expires_at' => $story->expires_at,
                'created_at' => $story->created_at,
                'comments_count' => (int) $story->comments_count,
                'views_count' => (int) $story->views_count,
                'viewed' => $isViewed,
                'product_image' => $productImageUrl
            ];
        });
    
        return response()->json($stories);
    }
    /**
     * Get story details by product ID
     */
    public function showByProduct($productId)
    {
        $story = ProductStory::withCount(['views', 'comments'])
            ->with(['media', 'product:id,name,selling_price as price,image_url as image'])
            ->where('product_id', $productId)
            ->where('expires_at', '>', now())
            ->first();
            
        if (!$story) {
            return response()->json([
                'message' => 'No active story found for this product',
                'story' => null
            ], 404);
        }
        
        // Check if viewed by current user
        $isViewed = false;
        if ($user = Auth::user()) {
            $isViewed = StoryView::where('user_id', $user->id)
                ->where('story_id', $story->id)
                ->where('story_type', ProductStory::class)
                ->exists();
        }
        
        $response = $this->formatStoryResponse($story);
        $response['viewed'] = $isViewed;
            
        return response()->json($response);
    }
    
    /**
     * Get story details by story ID with paginated comments and record view
     */
    public function showWithComments($storyId)
    {
        $user = Auth::user();
        
        $story = ProductStory::withCount(['views', 'comments'])
            ->with(['media', 'product:id,name,selling_price as price,image_url as image'])
            ->where('id', $storyId)
            ->where('expires_at', '>', now())
            ->first();
            
        if (!$story) {
            return response()->json([
                'message' => 'Story not found or has expired',
                'story' => null
            ], 404);
        }
        
        // Record view if user is authenticated and hasn't viewed this story yet
        $isViewed = false;
        if ($user) {
            $isViewed = StoryView::firstOrCreate(
                [
                    'user_id' => $user->id,
                    'story_id' => $story->id,
                    'story_type' => ProductStory::class
                ]
            )->wasRecentlyCreated;
            
            // No need to manually increment views_count as it's handled by the relationship count
        }
        
        // Get paginated comments with user details
        $comments = $story->comments()
            ->with(['user' => function($query) {
                $query->select('id', 'first_name', 'last_name');
            }])
            ->orderBy('created_at', 'desc')
            ->paginate(15);
            
        // Add full_name and set profile_photo_url to null for each comment's user
        $comments->getCollection()->transform(function ($comment) {
            if ($comment->user) {
                $comment->user->full_name = trim($comment->user->first_name . ' ' . $comment->user->last_name);
                $comment->user->profile_photo_url = null; // Since image_url doesn't exist
            }
            return $comment;
        });
        
        // Build the response array with full URLs
        $response = $this->formatStoryResponse($story);
        $response['viewed'] = $isViewed;
            
        return response()->json($response);
    }

    /**
     * Store a newly created story with multiple media files
     */
    public function store(Request $request, $productId)
    {
        $validator = Validator::make($request->all(), [
            'media' => 'required|array|min:1|max:10',
            'media.*' => 'file|mimes:jpeg,png,jpg,gif,mp4,mov,avi|max:10240', // 10MB max per file
            'caption' => 'nullable|string|max:255',
            'expires_in_hours' => 'required|integer|min:1|max:24',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $product = Product::findOrFail($productId);
        
        // Check if story already exists for this product
        $story = ProductStory::where('product_id', $productId)->first();
        
        if (!$story) {
            // Create new story if it doesn't exist
            $story = $product->stories()->create([
                'caption' => $request->caption,
                'expires_at' => now()->addHours($request->expires_in_hours),
            ]);
        } else {
            // Update existing story
            $story->update([
                'caption' => $request->caption,
                'expires_at' => now()->addHours($request->expires_in_hours),
            ]);
            
            // Delete existing media if needed
            if ($request->has('media')) {
                $story->media()->delete();
            }
        }
        
        // Handle file uploads
        if ($request->hasFile('media')) {
            $story->uploadMultipleMedia($request->file('media'));
        }
        
        // Load relationships for response
        $story->load(['media', 'product:id,name,selling_price as price,image_url as image']);
        $story->loadCount(['views', 'comments']);

        return response()->json([
            'message' => 'Story created/updated successfully',
            'story' => $this->formatStoryResponse($story)
        ], 201);
    }
    
    /**
     * Format story response with media
     */
    protected function formatStoryResponse($story)
    {
        $baseUrl = rtrim(config('app.url'), '/');
        
        $media = $story->media->map(function($media) {
            return [
                'id' => $media->id,
                'url' => url($media->media_url),
                'type' => $media->media_type,
                'order' => $media->order
            ];
        });
        
        return [
            'id' => $story->id,
            'product_id' => $story->product_id,
            'product_name' => $story->product->name ?? 'Unknown Product',
            'product_price' => $story->product->price ?? 0,
            'media' => $media,
            'media_type' => $story->media_type, // For backward compatibility
            'caption' => $story->caption,
            'expires_at' => $story->expires_at,
            'created_at' => $story->created_at,
            'comments_count' => $story->comments_count ?? 0,
            'views_count' => $story->views_count ?? 0,
            'product_image' => $story->product->image ? 
                (filter_var($story->product->image, FILTER_VALIDATE_URL) ? 
                    $story->product->image : 
                    $baseUrl . '/storage/' . ltrim($story->product->image, '/'))
                : null
        ];
    }

    /**
     * Record a story view
     */
    public function recordView($storyId)
    {
        $user = Auth::user();
        
        if (!$user) {
            return response()->json([
                'message' => 'Unauthenticated',
                'viewed' => false
            ], 401);
        }
        
        $story = ProductStory::find($storyId);
        
        if (!$story) {
            return response()->json([
                'message' => 'Story not found',
                'viewed' => false
            ], 404);
        }
        
        // Use firstOrCreate to ensure we don't have race conditions
        $view = StoryView::firstOrCreate(
            [
                'user_id' => $user->id,
                'story_id' => $story->id,
                'story_type' => ProductStory::class
            ],
            [
                'viewed_at' => now()
            ]
        );
        
        // If the view was just created, increment the view count
        $wasRecentlyCreated = $view->wasRecentlyCreated;
        
        if ($wasRecentlyCreated) {
            // Refresh the story to get updated view count
            $story->loadCount('views');
            
            return response()->json([
                'message' => 'View recorded',
                'viewed' => true,
                'views_count' => $story->views_count
            ]);
        }

        // If view already exists, still return the current view count
        $story->loadCount('views');
        
        return response()->json([
            'message' => 'Already viewed',
            'viewed' => true,
            'views_count' => $story->views_count
        ]);
    }

    /**
     * Check if a story has been viewed by the current user
     */
    public function checkViewStatus($storyId)
    {
        $user = Auth::user();
        
        if (!$user) {
            return response()->json([
                'message' => 'Unauthenticated',
                'viewed' => false
            ], 401);
        }
        
        $story = ProductStory::find($storyId);
        
        if (!$story) {
            return response()->json([
                'message' => 'Story not found',
                'viewed' => false
            ], 404);
        }
        
        $viewed = StoryView::where('user_id', $user->id)
            ->where('story_id', $story->id)
            ->where('story_type', ProductStory::class)
            ->exists();
            
        $story->loadCount('views');

        return response()->json([
            'viewed' => $viewed,
            'views_count' => $story->views_count,
            'story_id' => $story->id,
            'message' => $viewed ? 'Story has been viewed' : 'Story has not been viewed'
        ]);
    }
}
