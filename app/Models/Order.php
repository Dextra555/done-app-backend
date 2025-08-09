<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'total_amount',
        'status',
        'address',
        'latitude',
        'longitude',
        'payment_method',
        'payment_status',
        'delivery_notes'
    ];

    protected $casts = [
        'total_amount' => 'decimal:2',
        'latitude' => 'decimal:7',
        'longitude' => 'decimal:7'
    ];

    /**
     * Get the user that owns this order
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(B2CUser::class, 'user_id');
    }

    /**
     * Get the items for this order
     */
    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Get total items in order
     */
    public function getTotalItemsAttribute()
    {
        return $this->items->sum('quantity');
    }

    /**
     * Check if order is pending
     */
    public function getIsPendingAttribute()
    {
        return $this->status === 'pending';
    }

    /**
     * Check if order is completed
     */
    public function getIsCompletedAttribute()
    {
        return $this->status === 'delivered';
    }

    /**
     * Check if order is cancelled
     */
    public function getIsCancelledAttribute()
    {
        return $this->status === 'cancelled';
    }
} 