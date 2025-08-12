<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
        return $this->media_path ? Storage::url($this->media_path) : null;
    }

    /**
     * Get the full URL to the thumbnail
     */
    public function getThumbnailUrlAttribute()
    {
        return $this->thumbnail_path ? Storage::url($this->thumbnail_path) : $this->media_url;
    }

    /**
     * Upload media file and create thumbnail
     */
    public function uploadMedia(UploadedFile $file, $type = 'image')
    {
        $path = 'product-stories/' . date('Y/m/d');
        
        // Store the original file
        $filename = Str::random(40) . '.' . $file->getClientOriginalExtension();
        $filePath = $file->storeAs($path, $filename, 'public');
        
        // For images, create a thumbnail using GD
        if ($type === 'image') {
            $thumbnailPath = $this->createThumbnail($file, $path);
        } else {
            $thumbnailPath = null;
        }

        $this->media_path = $filePath;
        $this->thumbnail_path = $thumbnailPath;
        $this->media_type = $type;
        
        return $this;
    }

    /**
     * Create a thumbnail using GD
     */
    protected function createThumbnail($file, $path)
    {
        $sourcePath = $file->getPathname();
        $filename = 'thumb_' . Str::random(40) . '.jpg';
        $thumbnailPath = $path . '/' . $filename;
        $destinationPath = storage_path('app/public/' . $thumbnailPath);

        // Get the image dimensions
        list($width, $height, $type) = getimagesize($sourcePath);

        // Create a new image from file
        switch ($type) {
            case IMAGETYPE_JPEG:
                $source = imagecreatefromjpeg($sourcePath);
                break;
            case IMAGETYPE_PNG:
                $source = imagecreatefrompng($sourcePath);
                break;
            case IMAGETYPE_GIF:
                $source = imagecreatefromgif($sourcePath);
                break;
            default:
                return null;
        }

        // Calculate thumbnail dimensions (200px width, maintain aspect ratio)
        $thumbWidth = 200;
        $thumbHeight = floor($height * ($thumbWidth / $width));

        // Create the thumbnail
        $thumb = imagecreatetruecolor($thumbWidth, $thumbHeight);
        
        // Preserve transparency for PNG and GIF
        if ($type == IMAGETYPE_PNG || $type == IMAGETYPE_GIF) {
            imagecolortransparent($thumb, imagecolorallocatealpha($thumb, 0, 0, 0, 127));
            imagealphablending($thumb, false);
            imagesavealpha($thumb, true);
        }

        // Resize the image
        imagecopyresampled(
            $thumb, $source,
            0, 0, 0, 0,
            $thumbWidth, $thumbHeight,
            $width, $height
        );

        // Save the thumbnail
        imagejpeg($thumb, $destinationPath, 85);
        imagedestroy($thumb);
        imagedestroy($source);

        return $thumbnailPath;
    }
}