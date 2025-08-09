<?php

namespace App\Http\Controllers\Api\B2C;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NotificationController extends Controller
{
    /**
     * Get user's notifications
     */
    public function index(Request $request)
    {
        try {
            $user = $request->user();
            $perPage = $request->get('per_page', 20);
            $type = $request->get('type'); // all, unread, read

            $query = $user->notifications();

            if ($type === 'unread') {
                $query->unread();
            } elseif ($type === 'read') {
                $query->read();
            }

            $notifications = $query->orderBy('created_at', 'desc')->paginate($perPage);

            return response()->json([
                'status' => true,
                'message' => 'Notifications retrieved successfully',
                'data' => [
                    'notifications' => $notifications->getCollection()->map(function ($notification) {
                        return [
                            'id' => $notification->id,
                            'title' => $notification->title,
                            'message' => $notification->message,
                            'type' => $notification->type,
                            'data' => $notification->data,
                            'is_read' => $notification->is_read,
                            'read_at' => $notification->read_at,
                            'created_at' => $notification->created_at
                        ];
                    }),
                    'pagination' => [
                        'current_page' => $notifications->currentPage(),
                        'last_page' => $notifications->lastPage(),
                        'per_page' => $notifications->perPage(),
                        'total' => $notifications->total(),
                        'from' => $notifications->firstItem(),
                        'to' => $notifications->lastItem()
                    ]
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to retrieve notifications',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Mark notification as read
     */
    public function markAsRead(Request $request, $id)
    {
        try {
            $user = $request->user();
            $notification = $user->notifications()->find($id);

            if (!$notification) {
                return response()->json([
                    'status' => false,
                    'message' => 'Notification not found'
                ], 404);
            }

            $notification->markAsRead();

            return response()->json([
                'status' => true,
                'message' => 'Notification marked as read successfully',
                'data' => [
                    'notification' => [
                        'id' => $notification->id,
                        'title' => $notification->title,
                        'message' => $notification->message,
                        'type' => $notification->type,
                        'data' => $notification->data,
                        'is_read' => true,
                        'read_at' => $notification->read_at,
                        'created_at' => $notification->created_at
                    ]
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to mark notification as read',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Mark all notifications as read
     */
    public function markAllAsRead(Request $request)
    {
        try {
            $user = $request->user();
            $unreadNotifications = $user->notifications()->unread()->get();

            foreach ($unreadNotifications as $notification) {
                $notification->markAsRead();
            }

            return response()->json([
                'status' => true,
                'message' => 'All notifications marked as read successfully',
                'data' => [
                    'marked_count' => $unreadNotifications->count()
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to mark all notifications as read',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Delete notification
     */
    public function destroy(Request $request, $id)
    {
        try {
            $user = $request->user();
            $notification = $user->notifications()->find($id);

            if (!$notification) {
                return response()->json([
                    'status' => false,
                    'message' => 'Notification not found'
                ], 404);
            }

            $notification->delete();

            return response()->json([
                'status' => true,
                'message' => 'Notification deleted successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to delete notification',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Clear all notifications
     */
    public function clearAll(Request $request)
    {
        try {
            $user = $request->user();
            $deletedCount = $user->notifications()->delete();

            return response()->json([
                'status' => true,
                'message' => 'All notifications cleared successfully',
                'data' => [
                    'deleted_count' => $deletedCount
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to clear all notifications',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get notification statistics
     */
    public function statistics(Request $request)
    {
        try {
            $user = $request->user();
            
            $totalNotifications = $user->notifications()->count();
            $unreadNotifications = $user->notifications()->unread()->count();
            $readNotifications = $user->notifications()->read()->count();

            return response()->json([
                'status' => true,
                'message' => 'Notification statistics retrieved successfully',
                'data' => [
                    'statistics' => [
                        'total_notifications' => $totalNotifications,
                        'unread_notifications' => $unreadNotifications,
                        'read_notifications' => $readNotifications
                    ]
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to retrieve notification statistics',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get notification by ID
     */
    public function show(Request $request, $id)
    {
        try {
            $user = $request->user();
            $notification = $user->notifications()->find($id);

            if (!$notification) {
                return response()->json([
                    'status' => false,
                    'message' => 'Notification not found'
                ], 404);
            }

            // Mark as read if not already read
            if (!$notification->is_read) {
                $notification->markAsRead();
            }

            return response()->json([
                'status' => true,
                'message' => 'Notification retrieved successfully',
                'data' => [
                    'notification' => [
                        'id' => $notification->id,
                        'title' => $notification->title,
                        'message' => $notification->message,
                        'type' => $notification->type,
                        'data' => $notification->data,
                        'is_read' => $notification->is_read,
                        'read_at' => $notification->read_at,
                        'created_at' => $notification->created_at
                    ]
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to retrieve notification',
                'error' => $e->getMessage()
            ], 500);
        }
    }
} 