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
        'media_path',
        'media_url',
        'media_type',
        'caption',
        'expires_at'
    ];

    protected $casts = [
        'expires_at' => 'datetime',
    ];

    protected $appends = ['media_url'];

    /**
     * The "booting" method of the model.
     */
    protected static function boot()
    {
        parent::boot();

        // Delete associated file when story is deleted
        static::deleting(function ($story) {
            if ($story->media_path && !filter_var($story->media_path, FILTER_VALIDATE_URL)) {
                $filePath = public_path($story->media_path);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
        });
    }

    /**
     * Get the full URL to the media file
     */
    public function getMediaUrlAttribute()
    {
        if (!$this->media_path) return null;
        
        // If it's already a full URL, return as is
        if (filter_var($this->media_path, FILTER_VALIDATE_URL)) {
            return $this->media_path;
        }
        
        // Otherwise, build the full URL from the public path
        return asset($this->media_path);
    }

    /**
     * Handle file upload
     */
    public function uploadMedia(UploadedFile $file)
    {
        // Delete old file if exists
        if ($this->media_path && !filter_var($this->media_path, FILTER_VALIDATE_URL)) {
            $oldFilePath = public_path($this->media_path);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }

        // Create directory if it doesn't exist
        $directory = public_path('uploads/stories');
        if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
        }

        // Generate a unique filename
        $extension = $file->getClientOriginalExtension();
        $filename = 'story_' . time() . '_' . uniqid() . '.' . $extension;
        
        // Move the file to the public directory
        $file->move($directory, $filename);
        
        // Store the relative path
        $this->media_path = 'uploads/stories/' . $filename;
        $this->media_type = $this->getMediaType($file->getClientMimeType());
        
        return $this;
    }

    /**
     * Get media type from mime type
     */
    protected function getMediaType($mimeType)
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
