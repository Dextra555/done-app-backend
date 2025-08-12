<?php

namespace App\Http\Controllers\Api\B2C;

use App\Http\Controllers\Controller;
use App\Models\ProductStoryMedia;
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
            
            // Helper function to ensure full URL for media
            $getMediaUrl = function($path) use ($baseUrl) {
                if (empty($path)) return null;
                if (filter_var($path, FILTER_VALIDATE_URL)) return $path;
                
                // Check if the path is already a full path
                if (strpos($path, 'http') === 0) {
                    return $path;
                }
                
                // Check if the file exists in the public directory
                if (file_exists(public_path($path))) {
                    return $baseUrl . '/' . ltrim($path, '/');
                }
                
                // Otherwise, assume it's in storage
                return $baseUrl . '/storage/' . ltrim($path, '/');
            };
            
            // Get media thumbnail URL
            $mediaThumbnail = null;
            if ($firstMedia) {
                $mediaThumbnail = $getMediaUrl($firstMedia->thumbnail_path ?: $firstMedia->media_path);
            } elseif ($story->media_path) {
                $mediaThumbnail = $getMediaUrl($story->media_path);
            }
            
            // Get product image URL
            $productImageUrl = null;
            if (!empty($story->product->image)) {
                $productImageUrl = $getMediaUrl($story->product->image);
            }
            
            return [
                'id' => $story->id,
                'product_id' => $story->product_id,
                'product_name' => $story->product->name ?? 'Unknown Product',
                'product_price' => $story->product->price ?? 0,
                'media_thumbnail' => $mediaThumbnail,
                'caption' => $story->caption ?? $story->product->caption ?? '',
                'expires_at' => $story->expires_at,
                'created_at' => $story->created_at,
                'comments_count' => (int) $story->comments_count,
                'views_count' => (int) $story->views_count,
                'viewed' => $isViewed,
                'product_image' => $productImageUrl,
                'media_type' => $firstMedia ? $firstMedia->media_type : ($story->media_type ?? 'image')
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
            'media_type' => 'required',
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
        
        $storyData = [
            'caption' => $request->caption,
            'expires_at' => now()->addHours($request->expires_in_hours),
            'media_type' => in_array('video', (array)$request->media_type) ? 'video' : 'image'
        ];

        if (!$story) {
            // Create new story if it doesn't exist
            $story = $product->stories()->create($storyData);
        } else {
            // Update existing story
            $story->update($storyData);
            
            // Media will be handled below
        }
        
        // Handle file uploads
        if ($request->hasFile('media')) {
            // Delete existing media first if any
            if ($story->media()->exists()) {
                $story->media()->delete();
            }
            
            // Create uploads directory if it doesn't exist
            $uploadPath = 'uploads/stories';
            if (!file_exists(public_path($uploadPath))) {
                mkdir(public_path($uploadPath), 0777, true);
            }
            
            // Upload new media files
            foreach ($request->file('media') as $file) {
                $mediaType = str_contains($file->getMimeType(), 'image/') ? 'image' : 'video';
                $filename = 'story_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path($uploadPath), $filename);
                
                // Save media path to product_stories table
                $story->update([
                    'media_path' => $uploadPath . '/' . $filename,
                    'media_type' => $mediaType
                ]);
                
                // Also save to media table if needed
                $media = new ProductStoryMedia();
                $media->media_path = $uploadPath . '/' . $filename;
                $media->media_type = $mediaType;
                $story->media()->save($media);
            }
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
        
        $media = $story->media->map(function($media) use ($baseUrl) {
            // Remove 'storage/' from the media path if it exists
            $mediaPath = str_replace('storage/', '', $media->media_path);
            
            return [
                'id' => $media->id,
                'url' => $baseUrl . '/' . ltrim($mediaPath, '/'),
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
