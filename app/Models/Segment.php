<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Segment extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'is_active',
        'sort_order',
        'icon'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer'
    ];

    /**
     * The products that belong to the segment.
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_segment')
            ->withPivot('sort_order')
            ->withTimestamps()
            ->orderBy('product_segment.sort_order');
    }

    /**
     * Scope a query to only include active segments.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope a query to order segments by sort order.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('name');
    }
}
