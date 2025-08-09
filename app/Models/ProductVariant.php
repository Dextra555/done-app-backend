<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProductVariant extends Model
{
    protected $fillable = [
        'product_id',
        'sku',
        'stock',
        'price',
        'image_url',
        'selling_price',
        'original_price',
        'cost_price',
        'weight',
        'length',
        'width',
        'height',
        'is_active',
        'is_featured',
        'min_stock',
        'average_rating',
        'review_count',
        'meta_title',
        'meta_description',
        'slug'
    ];

    protected $casts = [
        'stock' => 'integer',
        'price' => 'decimal:2',
        'selling_price' => 'decimal:2',
        'original_price' => 'decimal:2',
        'cost_price' => 'decimal:2',
        'weight' => 'decimal:2',
        'length' => 'decimal:2',
        'width' => 'decimal:2',
        'height' => 'decimal:2',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'min_stock' => 'integer',
        'average_rating' => 'decimal:2',
        'review_count' => 'integer'
    ];

    /**
     * Get the product that owns this variant
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the images for this variant
     */
    public function images(): HasMany
    {
        return $this->hasMany(ProductVariantImage::class, 'variant_id')->active()->ordered();
    }

    /**
     * Get the main image for this variant
     */
    public function mainImage()
    {
        return $this->hasOne(ProductVariantImage::class, 'variant_id')->where('type', 'main')->active();
    }

    /**
     * Get the gallery images for this variant
     */
    public function otherImages()
    {
        return $this->hasMany(ProductVariantImage::class, 'variant_id')->where('type', 'other')->active()->ordered();
    }

    /**
     * Get all images for this variant (main + other)
     */
    public function all_images()
    {
        $images = collect();
        
        // Add main image
        if ($this->mainImage) {
            $images = $images->push($this->mainImage);
        }
        
        // Add other images
        $images = $images->merge($this->otherImages);
        
        return $images->sortBy('sort_order');
    }

    /**
     * Get the attribute values for this variant
     */
    public function attributeValues(): BelongsToMany
    {
        return $this->belongsToMany(AttributeValue::class, 'variant_attribute_values', 'variant_id', 'attribute_value_id');
    }

    /**
     * Get the reviews for this variant
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(ProductReview::class, 'variant_id');
    }

    /**
     * Get the price history for this variant
     */
    public function priceHistory(): HasMany
    {
        return $this->hasMany(ProductVariantPriceHistory::class, 'variant_id');
    }

    /**
     * Get the inventory logs for this variant
     */
    public function inventoryLogs(): HasMany
    {
        return $this->hasMany(ProductVariantInventoryLog::class, 'variant_id');
    }

    /**
     * Get the tags that belong to this variant
     */
    public function tags(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'variant_tags', 'variant_id', 'tag_id');
    }

    /**
     * Check if variant is in stock
     */
    public function getIsInStockAttribute()
    {
        return $this->stock > 0;
    }

    /**
     * Check if variant is on sale
     */
    public function getIsOnSaleAttribute()
    {
        return $this->original_price && $this->selling_price < $this->original_price;
    }

    /**
     * Get discount percentage
     */
    public function getDiscountPercentageAttribute()
    {
        if ($this->original_price && $this->selling_price < $this->original_price) {
            return round((($this->original_price - $this->selling_price) / $this->original_price) * 100, 2);
        }
        return 0;
    }

    /**
     * Check if variant is low on stock
     */
    public function getIsLowStockAttribute()
    {
        return $this->stock <= $this->min_stock;
    }

    /**
     * Get the main selling price (selling_price or price)
     */
    public function getMainSellingPriceAttribute()
    {
        return $this->selling_price ?: $this->price;
    }

    /**
     * Scope for active variants
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope for featured variants
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Scope for variants in stock
     */
    public function scopeInStock($query)
    {
        return $query->where('stock', '>', 0);
    }

    /**
     * Scope for variants on sale
     */
    public function scopeOnSale($query)
    {
        return $query->whereNotNull('original_price')
                    ->whereRaw('selling_price < original_price');
    }

    /**
     * Scope for low stock variants
     */
    public function scopeLowStock($query)
    {
        return $query->whereRaw('stock <= min_stock');
    }
} 