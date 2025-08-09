<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ServiceVideo extends Model
{
    protected $fillable = [
        'service_id',
        'video_url',
        'thumbnail_url',
        'title',
        'description',
        'duration',
        'views',
        'comments_count',
        'status',
        'is_story',
        'expires_at'
    ];

    protected $casts = [
        'views' => 'integer',
        'comments_count' => 'integer',
        'duration' => 'integer',
        'status' => 'boolean',
        'is_story' => 'boolean',
        'expires_at' => 'datetime'
    ];

    protected static function booted()
    {
        static::creating(function ($video) {
            if ($video->is_story && !$video->expires_at) {
                $video->expires_at = now()->addHours(24); // Default 24-hour expiration for stories
            }
        });

        static::addGlobalScope('active', function ($builder) {
            $builder->where('status', true);
        });
    }

    /**
     * Get the service that owns this video
     */
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * Get the comments for this video
     */
    public function comments(): HasMany
    {
        return $this->hasMany(ServiceComment::class, 'service_video_id');
    }

    /**
     * Get all views for this story
     */
    public function views()
    {
        return $this->hasMany(StoryView::class, 'service_video_id');
    }

    /**
     * Check if the story has been viewed by a specific user
     */
    public function viewedBy($userId): bool
    {
        return $this->views()->where('user_id', $userId)->exists();
    }

    /**
     * Mark the story as viewed by a user
     */
    public function markAsViewed($userId): void
    {
        $this->views()->firstOrCreate([
            'user_id' => $userId,
            'viewed_at' => now()
        ]);
        
        $this->increment('views');
    }

    /**
     * Scope for active stories (not expired)
     */
    public function scopeActiveStories($query)
    {
        return $query->where('is_story', true)
                    ->where('expires_at', '>', now());
    }

    /**
     * Increment view count
     */
    public function incrementViews()
    {
        $this->increment('views');
    }

    /**
     * Scope for active videos
     */
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    /**
     * Scope for featured videos
     */
    public function scopeFeatured($query)
    {
        return $query->where('status', true)
                    ->orderBy('views', 'desc')
                    ->orderBy('comments_count', 'desc');
    }
} 