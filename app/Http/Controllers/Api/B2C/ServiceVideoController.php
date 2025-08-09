<?php

namespace App\Http\Controllers\Api\B2C;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceVideo;
use App\Models\ServiceComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServiceVideoController extends Controller
{
    /**
     * Get all services with videos
     */
    public function index(Request $request)
    {
        try {
            $perPage = $request->get('per_page', 12);
            $categoryId = $request->get('category_id');

            $query = Service::with(['videos' => function ($q) {
                $q->active()->orderBy('created_at', 'desc');
            }])
            ->active();

            if ($categoryId) {
                $query->where('categoryID', $categoryId);
            }

            $services = $query->paginate($perPage);

            return response()->json([
                'status' => true,
                'message' => 'Services retrieved successfully',
                'data' => [
                    'services' => $services->getCollection()->map(function ($service) {
                        return [
                            'id' => $service->id,
                            'name' => $service->serviceName,
                            'description' => $service->description,
                            'image_url' => $service->image_url,
                            'uploaded_date' => $service->uploadedDate,
                            'created_date' => $service->createdDate,
                            'videos_count' => $service->videos->count(),
                            'videos' => $service->videos->map(function ($video) {
                                return [
                                    'id' => $video->id,
                                    'title' => $video->title,
                                    'description' => $video->description,
                                    'video_url' => $video->video_url,
                                    'thumbnail_url' => $video->thumbnail_url,
                                    'duration' => $video->duration,
                                    'views' => $video->views,
                                    'comments_count' => $video->comments_count,
                                    'created_at' => $video->created_at
                                ];
                            })
                        ];
                    }),
                    'pagination' => [
                        'current_page' => $services->currentPage(),
                        'last_page' => $services->lastPage(),
                        'per_page' => $services->perPage(),
                        'total' => $services->total(),
                        'from' => $services->firstItem(),
                        'to' => $services->lastItem()
                    ]
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to retrieve services',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get service by ID with videos
     */
    public function show(Request $request, $id)
    {
        try {
            $service = Service::with(['videos' => function ($q) {
                $q->active()->orderBy('created_at', 'desc');
            }])
            ->active()
            ->find($id);

            if (!$service) {
                return response()->json([
                    'status' => false,
                    'message' => 'Service not found'
                ], 404);
            }

            return response()->json([
                'status' => true,
                'message' => 'Service retrieved successfully',
                'data' => [
                    'service' => [
                        'id' => $service->id,
                        'name' => $service->serviceName,
                        'description' => $service->description,
                        'image_url' => $service->image_url,
                        'uploaded_date' => $service->uploadedDate,
                        'created_date' => $service->createdDate,
                        'videos_count' => $service->videos->count(),
                        'videos' => $service->videos->map(function ($video) {
                            return [
                                'id' => $video->id,
                                'title' => $video->title,
                                'description' => $video->description,
                                'video_url' => $video->video_url,
                                'thumbnail_url' => $video->thumbnail_url,
                                'duration' => $video->duration,
                                'views' => $video->views,
                                'comments_count' => $video->comments_count,
                                'created_at' => $video->created_at
                            ];
                        })
                    ]
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to retrieve service',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get video by ID with comments
     */
    public function showVideo(Request $request, $serviceId, $videoId)
    {
        try {
            $video = ServiceVideo::with(['service', 'comments' => function ($q) {
                $q->approved()->with('user')->orderBy('created_at', 'desc');
            }])
            ->where('service_id', $serviceId)
            ->active()
            ->find($videoId);

            if (!$video) {
                return response()->json([
                    'status' => false,
                    'message' => 'Video not found'
                ], 404);
            }

            // Increment view count
            $video->incrementViews();

            return response()->json([
                'status' => true,
                'message' => 'Video retrieved successfully',
                'data' => [
                    'video' => [
                        'id' => $video->id,
                        'title' => $video->title,
                        'description' => $video->description,
                        'video_url' => $video->video_url,
                        'thumbnail_url' => $video->thumbnail_url,
                        'duration' => $video->duration,
                        'views' => $video->views + 1, // Include the current view
                        'comments_count' => $video->comments_count,
                        'created_at' => $video->created_at,
                        'service' => [
                            'id' => $video->service->id,
                            'name' => $video->service->serviceName,
                            'description' => $video->service->description
                        ],
                        'comments' => $video->comments->map(function ($comment) {
                            return [
                                'id' => $comment->id,
                                'comment' => $comment->comment,
                                'created_at' => $comment->created_at,
                                'user' => [
                                    'id' => $comment->user->id,
                                    'name' => $comment->user->full_name
                                ]
                            ];
                        })
                    ]
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to retrieve video',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Add comment to video
     */
    public function addComment(Request $request, $serviceId, $videoId)
    {
        $validator = Validator::make($request->all(), [
            'comment' => 'required|string|min:3|max:500',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $video = ServiceVideo::where('service_id', $serviceId)
                ->active()
                ->find($videoId);

            if (!$video) {
                return response()->json([
                    'status' => false,
                    'message' => 'Video not found'
                ], 404);
            }

            $user = $request->user();

            $comment = ServiceComment::create([
                'service_video_id' => $videoId,
                'user_id' => $user->id,
                'user_type' => 'b2c',
                'comment' => $request->comment,
                'status' => 'pending' // Will be approved by admin
            ]);

            // Update comments count
            $video->increment('comments_count');

            return response()->json([
                'status' => true,
                'message' => 'Comment added successfully',
                'data' => [
                    'comment' => [
                        'id' => $comment->id,
                        'comment' => $comment->comment,
                        'status' => $comment->status,
                        'created_at' => $comment->created_at,
                        'user' => [
                            'id' => $user->id,
                            'name' => $user->full_name
                        ]
                    ]
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to add comment',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get featured videos
     */
    public function featured(Request $request)
    {
        try {
            $limit = $request->get('limit', 8);

            $videos = ServiceVideo::with(['service'])
                ->active()
                ->orderBy('views', 'desc')
                ->orderBy('comments_count', 'desc')
                ->limit($limit)
                ->get();

            return response()->json([
                'status' => true,
                'message' => 'Featured videos retrieved successfully',
                'data' => [
                    'videos' => $videos->map(function ($video) {
                        return [
                            'id' => $video->id,
                            'title' => $video->title,
                            'description' => $video->description,
                            'video_url' => $video->video_url,
                            'thumbnail_url' => $video->thumbnail_url,
                            'duration' => $video->duration,
                            'views' => $video->views,
                            'comments_count' => $video->comments_count,
                            'created_at' => $video->created_at,
                            'service' => [
                                'id' => $video->service->id,
                                'name' => $video->service->serviceName
                            ]
                        ];
                    })
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to retrieve featured videos',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Search services and videos
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

            $services = Service::with(['videos' => function ($q) {
                $q->active()->orderBy('created_at', 'desc');
            }])
            ->active()
            ->where(function ($q) use ($query) {
                $q->where('serviceName', 'LIKE', "%{$query}%")
                  ->orWhere('description', 'LIKE', "%{$query}%");
            })
            ->orWhereHas('videos', function ($q) use ($query) {
                $q->where('title', 'LIKE', "%{$query}%")
                  ->orWhere('description', 'LIKE', "%{$query}%");
            })
            ->paginate($perPage);

            return response()->json([
                'status' => true,
                'message' => 'Search completed successfully',
                'data' => [
                    'query' => $query,
                    'services' => $services->getCollection()->map(function ($service) {
                        return [
                            'id' => $service->id,
                            'name' => $service->serviceName,
                            'description' => $service->description,
                            'image_url' => $service->image_url,
                            'videos_count' => $service->videos->count(),
                            'videos' => $service->videos->map(function ($video) {
                                return [
                                    'id' => $video->id,
                                    'title' => $video->title,
                                    'description' => $video->description,
                                    'video_url' => $video->video_url,
                                    'thumbnail_url' => $video->thumbnail_url,
                                    'duration' => $video->duration,
                                    'views' => $video->views,
                                    'comments_count' => $video->comments_count,
                                    'created_at' => $video->created_at
                                ];
                            })
                        ];
                    }),
                    'pagination' => [
                        'current_page' => $services->currentPage(),
                        'last_page' => $services->lastPage(),
                        'per_page' => $services->perPage(),
                        'total' => $services->total(),
                        'from' => $services->firstItem(),
                        'to' => $services->lastItem()
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
} 