<?php

namespace App\Http\Controllers\Api\B2C;

use App\Http\Controllers\Controller;
use App\Models\ProductStory;
use App\Models\StoryComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class StoryCommentController extends Controller
{
    /**
     * Get all comments for a story
     */
    public function index($storyId)
    {
        $story = ProductStory::findOrFail($storyId);
        
        $comments = $story->comments()
            ->with(['user' => function($query) {
                $query->select('id', 'first_name', 'last_name');
            }])
            ->latest()
            ->paginate(15);
            
        return response()->json($comments);
    }

    /**
     * Add a comment to a story
     */
    public function store(Request $request, $storyId)
    {
        $user = Auth::user();
        $story = ProductStory::findOrFail($storyId);
        
        $validator = Validator::make($request->all(), [
            'content' => 'required|string|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $comment = $story->comments()->create([
            'user_id' => $user->id,
            'content' => $request->content,
        ]);
        
        // Load user relationship for the response with full name
        $comment->load(['user' => function($query) {
            $query->select('id', 'first_name', 'last_name');
        }]);
        
        // Add full_name to the user object
        if ($comment->user) {
            $comment->user->full_name = trim($comment->user->first_name . ' ' . $comment->user->last_name);
            $comment->user->profile_photo_url = null; // Since image_url doesn't exist
        }
        
        return response()->json([
            'message' => 'Comment added successfully',
            'comment' => $comment
        ], 201);
    }

    /**
     * Update a comment
     */
    public function update(Request $request, $commentId)
    {
        $user = Auth::user();
        $comment = StoryComment::where('user_id', $user->id)
            ->findOrFail($commentId);
            
        $validator = Validator::make($request->all(), [
            'content' => 'required|string|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        
        $comment->update([
            'content' => $request->content
        ]);
        
        return response()->json([
            'message' => 'Comment updated successfully',
            'comment' => $comment
        ]);
    }

    /**
     * Delete a comment
     */
    public function destroy($commentId)
    {
        $user = Auth::user();
        $comment = StoryComment::where('user_id', $user->id)
            ->findOrFail($commentId);
            
        $comment->delete();
        
        return response()->json([
            'message' => 'Comment deleted successfully'
        ]);
    }
}
