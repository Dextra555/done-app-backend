<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductReview extends Model
{
    protected $fillable = [
        'product_id',
        'variant_id',
        'user_id',
        'type',
        'rating',
        'content',
        'title',
        'is_verified',
        'is_approved',
        'helpful_count',
        'images',
        'ip_address',
        'user_agent',
        'approved_at',
        'approved_by'
    ];

    protected $casts = [
        'rating' => 'integer',
        'is_verified' => 'boolean',
        'is_approved' => 'boolean',
        'helpful_count' => 'integer',
        'images' => 'array',
        'approved_at' => 'datetime'
    ];

    /**
     * Get the product that owns this review
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the variant that owns this review
     */
    public function variant(): BelongsTo
    {
        return $this->belongsTo(ProductVariant::class);
    }

    /**
     * Get the user that owns this review
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(B2CUser::class, 'user_id');
    }

    /**
     * Get the admin who approved this review
     */
    public function approvedBy(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'approved_by');
    }

    /**
     * Scope for reviews with ratings
     */
    public function scopeWithRating($query)
    {
        return $query->whereNotNull('rating');
    }

    /**
     * Scope for approved reviews
     */
    public function scopeApproved($query)
    {
        return $query->where('is_approved', true);
    }

    /**
     * Scope for verified reviews
     */
    public function scopeVerified($query)
    {
        return $query->where('is_verified', true);
    }

    /**
     * Scope for reviews by rating
     */
    public function scopeByRating($query, $rating)
    {
        return $query->where('rating', $rating);
    }

    /**
     * Scope for recent reviews
     */
    public function scopeRecent($query, $days = 30)
    {
        return $query->where('created_at', '>=', now()->subDays($days));
    }

    /**
     * Get review status text
     */
    public function getStatusTextAttribute()
    {
        if (!$this->is_approved) {
            return 'pending';
        }
        return 'approved';
    }

    /**
     * Check if review is helpful
     */
    public function getIsHelpfulAttribute()
    {
        return $this->helpful_count > 0;
    }
} 