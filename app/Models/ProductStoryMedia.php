<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class ProductStoryMedia extends Model
{
    protected $fillable = [
        'product_story_id',
        'media_path',
        'thumbnail_path',
        'media_type',
        'order'
    ];
    
    protected $appends = ['media_url', 'thumbnail_url'];

    /**
     * Get the story that owns the media.
     */
    public function story()
    {
        return $this->belongsTo(ProductStory::class, 'product_story_id');
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
     * Get the full URL to the thumbnail file
     */
    public function getThumbnailUrlAttribute()
    {
        if (!$this->thumbnail_path) return $this->media_url;
        
        // If it's already a full URL, return as is
        if (filter_var($this->thumbnail_path, FILTER_VALIDATE_URL)) {
            return $this->thumbnail_path;
        }
        
        // Otherwise, build the full URL from the public path
        return asset($this->thumbnail_path);
    }

    /**
     * Handle file upload
     */
    public function uploadMedia(UploadedFile $file, $order = 0)
    {
        // Delete old files if they exist
        $this->deleteMediaFiles();

        // Create directory if it doesn't exist
        $directory = public_path('uploads/stories');
        if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
        }

        // Generate a unique filename
        $extension = $file->getClientOriginalExtension();
        $filename = 'story_media_' . time() . '_' . uniqid() . '.' . $extension;
        
        // Move the file to the public directory
        $file->move($directory, $filename);
        
        // Store the relative path
        $this->media_path = 'uploads/stories/' . $filename;
        $this->media_type = $this->getMediaType($file->getClientMimeType());
        $this->order = $order;
        
        // Generate thumbnail for images
        if ($this->media_type === 'image') {
            $this->generateThumbnail();
        }
        
        return $this;
    }
    
    /**
     * Delete associated media files
     */
    protected function deleteMediaFiles()
    {
        // Delete main media file
        if ($this->media_path && !filter_var($this->media_path, FILTER_VALIDATE_URL)) {
            $filePath = public_path($this->media_path);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
        
        // Delete thumbnail file
        if ($this->thumbnail_path && !filter_var($this->thumbnail_path, FILTER_VALIDATE_URL)) {
            $thumbnailPath = public_path($this->thumbnail_path);
            if (file_exists($thumbnailPath)) {
                unlink($thumbnailPath);
            }
        }
    }
    
    /**
     * Generate a thumbnail for the image
     */
    protected function generateThumbnail()
    {
        try {
            $sourcePath = public_path($this->media_path);
            $thumbnailPath = str_replace(basename($this->media_path), 'thumb_' . basename($this->media_path), $this->media_path);
            
            // Check if the source image exists
            if (!file_exists($sourcePath)) {
                return false;
            }
            
            // Create image instance
            $image = Image::make($sourcePath);
            
            // Resize to thumbnail size (300x300, maintaining aspect ratio)
            $image->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            
            // Save the thumbnail
            $image->save(public_path($thumbnailPath), 80);
            
            // Update the thumbnail path
            $this->thumbnail_path = $thumbnailPath;
            $this->save();
            
            return true;
        } catch (\Exception $e) {
            \Log::error('Failed to generate thumbnail: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Get media type from mime type
     */
    protected function getMediaType($mimeType)
    {
        if (strpos($mimeType, 'video/') !== false) {
            return 'video';
        }
        return 'image';
    }
}
