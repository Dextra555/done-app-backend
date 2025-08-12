<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\ProductVariant;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'variant_id',
        'quantity',
        'price',
        'attributes'
    ];
    
    protected $casts = [
        'quantity' => 'integer',
        'price' => 'decimal:2',
        'attributes' => 'array'
    ];

    /**
     * Get the order that owns this item
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Get the product for this order item
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the variant for this order item if any
     */
    public function variant(): BelongsTo
    {
        return $this->belongsTo(ProductVariant::class, 'variant_id');
    }

    /**
     * Get the total price for this item
     */
    public function getTotalPriceAttribute()
    {
        return $this->quantity * $this->price;
    }
} 