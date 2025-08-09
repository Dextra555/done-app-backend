<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CartItem extends Model
{
    protected $fillable = [
        'cart_id',
        'product_id',
        'variant_id',
        'quantity'
    ];

    protected $casts = [
        'quantity' => 'integer'
    ];

    /**
     * Get the cart that owns this item
     */
    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }

    /**
     * Get the product for this cart item
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the variant for this cart item
     */
    public function variant()
    {
        return $this->belongsTo(ProductVariant::class, 'variant_id');
    }

    /**
     * Get the total price for this item
     * 
     * @return float
     */
    public function getTotalPriceAttribute()
    {
        return $this->quantity * $this->item_price;
    }

    /**
     * Get the item's price (variant price or product price)
     * 
     * @return float
     */
    public function getItemPriceAttribute()
    {
        if ($this->relationLoaded('variant') && $this->variant && $this->variant->is_active) {
            return (float) $this->variant->main_selling_price;
        }
        
        if ($this->relationLoaded('product') && $this->product) {
            return (float) $this->product->selling_price;
        }
        
        // If we get here, neither variant nor product is loaded or available
        return 0.00;
    }

    /**
     * Get the item's name (with variant attributes if available)
     * 
     * @return string
     */
    public function getItemNameAttribute()
    {
        // Check if product is loaded and available
        if (!$this->relationLoaded('product') || !$this->product) {
            return 'Product not available';
        }
        
        $name = $this->product->name;
        
        // Check if variant is loaded and has attributes
        if ($this->relationLoaded('variant') && $this->variant) {
            if ($this->variant->relationLoaded('attributeValues') && $this->variant->attributeValues->isNotEmpty()) {
                $attributes = $this->variant->attributeValues->map(function($value) {
                    return $value->value ?? '';
                })->filter()->implode(', ');
                
                if (!empty($attributes)) {
                    $name .= ' - ' . $attributes;
                }
            }
        }
        
        return $name;
    }
}