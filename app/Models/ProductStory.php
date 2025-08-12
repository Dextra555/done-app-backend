<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class ProductStory extends Model
{
    protected $fillable = [
        'product_id',
        'caption',
        'expires_at',
        'media_type',
        'media_path',
        'media_url'
    ];

    protected $casts = [
        'expires_at' => 'datetime',
    ];

    protected $appends = ['full_media_url'];
    
    /**
     * Get the full URL for the media
     */
    public function getFullMediaUrlAttribute()
    {
        if (empty($this->media_path)) {
            return null;
        }
        
        // If it's already a full URL, return as is
        if (filter_var($this->media_path, FILTER_VALIDATE_URL)) {
            return $this->media_path;
        }
        
        // Otherwise, generate the full URL
        return asset('storage/' . ltrim($this->media_path, '/'));
    }

    /**
     * The "booting" method of the model.
     */
    protected static function boot()
    {
        parent::boot();

        // Delete associated media files when story is deleted
        static::deleting(function ($story) {
            foreach ($story->media as $media) {
                $media->delete();
            }
        });
    }

    /**
     * Get the media files for the story.
     */
    public function media()
    {
        return $this->hasMany(ProductStoryMedia::class)->orderBy('order');
    }

    /**
     * For backward compatibility, get the first media URL
     */
    public function getMediaUrlAttribute()
    {
        // If media_path is set on the story itself, use that
        if (!empty($this->media_path)) {
            return $this->full_media_url;
        }
        
        // Otherwise, fall back to the first media item
        $firstMedia = $this->media->first();
        return $firstMedia ? $firstMedia->media_url : null;
    }

    /**
     * For backward compatibility, get the first media type
     */
    public function getMediaTypeAttribute()
    {
        $firstMedia = $this->media->first();
        return $firstMedia ? $firstMedia->media_type : null;
    }

    /**
     * Upload multiple media files
     */
    public function uploadMultipleMedia($files)
    {
        if (!is_array($files)) {
            $files = [$files];
        }

        foreach ($files as $index => $file) {
            if ($file instanceof UploadedFile) {
                $media = new ProductStoryMedia();
                $media->uploadMedia($file, $index);
                $this->media()->save($media);
            }
        }

        return $this;
    }

    /**
     * Get media type from mime type
     */
    protected function getMediaTypeFromMime($mimeType)
    {
        if (str_contains($mimeType, 'image/')) {
            return 'image';
        } elseif (str_contains($mimeType, 'video/')) {
            return 'video';
        }
        return 'other';
    }

    /**
     * Get the product that owns the story
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get all views for the story
     */
    public function views(): MorphMany
    {
        return $this->morphMany(StoryView::class, 'story');
    }

    /**
     * Get all comments for the story
     */
    public function comments(): HasMany
    {
        return $this->hasMany(StoryComment::class, 'story_id');
    }
}
