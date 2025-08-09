<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductVariantImage extends Model
{
    protected $fillable = [
        'variant_id',
        'image_url',
        'type',
        'sort_order',
        'is_active'
    ];

    protected $casts = [
        'type' => 'string',
        'sort_order' => 'integer',
        'is_active' => 'boolean'
    ];

    /**
     * Get the variant that owns this image
     */
    public function variant(): BelongsTo
    {
        return $this->belongsTo(ProductVariant::class, 'variant_id');
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
     * Scope for ordered images
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order', 'asc')->orderBy('created_at', 'asc');
    }
} 