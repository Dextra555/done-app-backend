<?php

namespace App\Http\Controllers\Api\B2C;

use App\Http\Controllers\Controller;
use App\Models\ServiceVideo;
use App\Models\StoryView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class StoryController extends Controller
{
    /**
     * Get active stories from users that the current user follows
     */
    public function index()
    {
        try {
            $user = Auth::user();
            
            // Get stories from services that the user follows
            // Note: You'll need to implement the service following logic
            $stories = ServiceVideo::with(['service', 'views' => function($q) use ($user) {
                    $q->where('user_id', $user->id);
                }])
                ->activeStories()
                ->whereHas('service', function($q) use ($user) {
                    // Filter stories from services the user follows
                    // You'll need to implement the service following logic
                    // For now, we'll return all active stories
                })
                ->orderBy('created_at', 'desc')
                ->get()
                ->groupBy('service_id');

            $formattedStories = [];
            
            foreach ($stories as $serviceId => $serviceStories) {
                $service = $serviceStories->first()->service;
                
                $formattedStories[] = [
                    'service_id' => $service->id,
                    'service_name' => $service->serviceName,
                    'service_image' => $service->image_url,
                    'stories' => $serviceStories->map(function($story) use ($user) {
                        return [
                            'id' => $story->id,
                            'title' => $story->title,
                            'video_url' => $story->video_url,
                            'thumbnail_url' => $story->thumbnail_url,
                            'duration' => $story->duration,
                            'created_at' => $story->created_at,
                            'expires_at' => $story->expires_at,
                            'viewed' => $story->views->isNotEmpty(),
                            'view_count' => $story->views_count ?? 0
                        ];
                    })
                ];
            }

            return response()->json([
                'status' => true,
                'message' => 'Stories retrieved successfully',
                'data' => $formattedStories
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to retrieve stories',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Create a new story
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'service_id' => 'required|exists:services,id',
                'video_url' => 'required|url',
                'thumbnail_url' => 'nullable|url',
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'duration' => 'required|integer|min:1',
                'expires_in_hours' => 'nullable|integer|min:1|max:48'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation error',
                    'errors' => $validator->errors()
                ], 422);
            }

            $user = Auth::user();
            
            // Verify the user has permission to post to this service
            // You'll need to implement the service ownership/authorization logic
            
            $story = new ServiceVideo([
                'service_id' => $request->service_id,
                'video_url' => $request->video_url,
                'thumbnail_url' => $request->thumbnail_url,
                'title' => $request->title,
                'description' => $request->description,
                'duration' => $request->duration,
                'is_story' => true,
                'expires_at' => now()->addHours($request->expires_in_hours ?? 24),
                'status' => true,
                'views' => 0,
                'comments_count' => 0
            ]);

            $story->save();

            return response()->json([
                'status' => true,
                'message' => 'Story created successfully',
                'data' => [
                    'story' => [
                        'id' => $story->id,
                        'title' => $story->title,
                        'video_url' => $story->video_url,
                        'thumbnail_url' => $story->thumbnail_url,
                        'duration' => $story->duration,
                        'expires_at' => $story->expires_at,
                        'created_at' => $story->created_at
                    ]
                ]
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to create story',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * View a story and mark it as viewed by the current user
     */
    public function show(string $id)
    {
        try {
            $user = Auth::user();
            $story = ServiceVideo::activeStories()->findOrFail($id);
            
            // Mark the story as viewed by the current user
            if (!$story->viewedBy($user->id)) {
                $story->markAsViewed($user->id);
            }

            return response()->json([
                'status' => true,
                'message' => 'Story retrieved successfully',
                'data' => [
                    'story' => [
                        'id' => $story->id,
                        'title' => $story->title,
                        'description' => $story->description,
                        'video_url' => $story->video_url,
                        'thumbnail_url' => $story->thumbnail_url,
                        'duration' => $story->duration,
                        'created_at' => $story->created_at,
                        'expires_at' => $story->expires_at,
                        'view_count' => $story->views_count ?? 0,
                        'viewed' => true,
                        'service' => [
                            'id' => $story->service->id,
                            'name' => $story->service->serviceName,
                            'image_url' => $story->service->image_url
                        ]
                    ]
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to retrieve story',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get story viewers
     */
    public function viewers(string $id)
    {
        try {
            $user = Auth::user();
            $story = ServiceVideo::findOrFail($id);
            
            // Verify the user has permission to view the viewers (e.g., is the service owner)
            // You'll need to implement the authorization logic
            
            $viewers = $story->views()
                ->with('user')
                ->orderBy('viewed_at', 'desc')
                ->paginate(20);

            return response()->json([
                'status' => true,
                'message' => 'Story viewers retrieved successfully',
                'data' => [
                    'viewers' => $viewers->map(function($view) {
                        return [
                            'id' => $view->user->id,
                            'name' => $view->user->name,
                            'email' => $view->user->email,
                            'avatar' => $view->user->avatar_url, // Assuming you have this field
                            'viewed_at' => $view->viewed_at
                        ];
                    }),
                    'pagination' => [
                        'total' => $viewers->total(),
                        'per_page' => $viewers->perPage(),
                        'current_page' => $viewers->currentPage(),
                        'last_page' => $viewers->lastPage()
                    ]
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to retrieve story viewers',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
