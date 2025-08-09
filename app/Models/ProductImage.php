<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductImage extends Model
{
    protected $fillable = [
        'product_id',
        'image_url',
        'type',
        'sort_order',
        'is_active'
    ];

    protected $casts = [
        'sort_order' => 'integer',
        'is_active' => 'boolean'
    ];

    /**
     * Get the product that owns this image
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Scope for active images
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope for main images
     */
    public function scopeMain($query)
    {
        return $query->where('type', 'main');
    }

    /**
     * Scope for gallery images
     */
    public function scopeGallery($query)
    {
        return $query->where('type', 'gallery');
    }

    /**
     * Scope for thumbnail images
     */
    public function scopeThumbnail($query)
    {
        return $query->where('type', 'thumbnail');
    }

    /**
     * Scope for ordered images
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order', 'asc')->orderBy('created_at', 'asc');
    }
} 