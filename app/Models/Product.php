<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\AttributeValue;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'key_features',
        'cost_price',
        'selling_price',
        'stock',
        'status',
        'average_rating',
        'review_count',
        'image_url',
        'slug'
    ];

    protected $casts = [
        'cost_price' => 'decimal:2',
        'selling_price' => 'decimal:2',
        'stock' => 'integer',
        'average_rating' => 'decimal:2',
        'review_count' => 'integer',
        'status' => 'string'
    ];

    /**
     * Get the category that owns this product
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * The segments that belong to the product.
     */
    public function segments(): BelongsToMany
    {
        return $this->belongsToMany(Segment::class, 'product_segment')
            ->withPivot('sort_order')
            ->withTimestamps()
            ->orderBy('product_segment.sort_order');
    }

    /**
     * Scope a query to only include products in a specific segment.
     */
    public function scopeInSegment($query, $segmentId)
    {
        return $query->whereHas('segments', function($q) use ($segmentId) {
            $q->where('segments.id', $segmentId);
        });
    }

    /**
     * Get the variants for this product
     */
    public function variants(): HasMany
    {
        return $this->hasMany(ProductVariant::class);
    }

    /**
     * Get the reviews for this product
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(ProductReview::class);
    }

    /**
     * Get the main variant for this product
     */
    public function mainVariant(): HasOne
    {
        return $this->hasOne(ProductVariant::class)->oldest();
    }

    /**
     * Get the images for this product
     */
    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class)->active()->ordered();
    }

    /**
     * Get the main image for this product
     */
    public function mainImage()
    {
        return $this->hasOne(ProductImage::class)->where('type', 'main')->active();
    }

    /**
     * Get the gallery images for this product
     */
    public function otherImages()
    {
        return $this->hasMany(ProductImage::class)->where('type', 'other')->active()->ordered();
    }

    /**
     * Get the thumbnail images for this product
     */
    public function thumbnailImages(): HasMany
    {
        return $this->hasMany(ProductImage::class)->where('type', 'thumbnail')->active()->ordered();
    }

    /**
     * Get the tags that belong to this product
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'product_tags', 'product_id', 'tag_id');
    }

    /**
     * Get the attribute values that belong to this product
     */
    public function attributeValues(): BelongsToMany
    {
        return $this->belongsToMany(AttributeValue::class, 'product_attribute_values', 'product_id', 'attribute_value_id');
    }

    /**
     * Get all product attribute values directly assigned to the product via the product_attribute_values table.
     */
    public function productAttributeValues()
    {
        return $this->hasMany(\App\Models\ProductAttributeValue::class, 'product_id');
    }

    /**
     * Scope for active products
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Scope for products in stock
     */
    public function scopeInStock($query)
    {
        return $query->where('stock', '>', 0);
    }

    /**
     * Scope for featured products
     */
    public function scopeFeatured($query)
    {
        return $query->where('average_rating', '>=', 4.0)
                    ->where('review_count', '>=', 5);
    }

    /**
     * Scope for products by price range
     */
    public function scopePriceRange($query, $minPrice, $maxPrice)
    {
        if ($minPrice) {
            $query->where('selling_price', '>=', $minPrice);
        }
        if ($maxPrice) {
            $query->where('selling_price', '<=', $maxPrice);
        }
        return $query;
    }

    /**
     * Scope for products by rating
     */
    public function scopeByRating($query, $rating)
    {
        return $query->where('average_rating', '>=', $rating);
    }

    /**
     * Get discounted price if any
     */
    public function getDiscountedPriceAttribute()
    {
        if ($this->cost_price && $this->selling_price < $this->cost_price) {
            return $this->selling_price;
        }
        return null;
    }

    /**
     * Get discount percentage
     */
    public function getDiscountPercentageAttribute()
    {
        if ($this->cost_price && $this->selling_price < $this->cost_price) {
            return round((($this->cost_price - $this->selling_price) / $this->cost_price) * 100, 2);
        }
        return 0;
    }

    /**
     * Check if product is on sale
     */
    public function getIsOnSaleAttribute()
    {
        return $this->cost_price && $this->selling_price < $this->cost_price;
    }

    /**
     * Get main image URL
     */
    public function getMainImageUrlAttribute()
    {
        // First try to get from product images
        if ($this->mainImage) {
            return $this->mainImage->image_url;
        }
        
        // Fallback to legacy image_url field
        if ($this->image_url) {
            return $this->image_url;
        }
        
        // Finally fallback to main variant image
        if ($this->mainVariant && $this->mainVariant->image_url) {
            return $this->mainVariant->image_url;
        }
        
        return null;
    }

    /**
     * Get all images for this product
     */
    public function getAllImagesAttribute()
    {
        $images = collect();
        
        // Add main image if exists
        if ($this->mainImage) {
            $images->push($this->mainImage);
        }
        
        // Add gallery images
        $images = $images->merge($this->otherImages);
        
        // Add thumbnail images
        $images = $images->merge($this->thumbnailImages);
        
        return $images->sortBy('sort_order');
    }

    public function stories()
    {
        return $this->hasMany(ProductStory::class);
    }
} 