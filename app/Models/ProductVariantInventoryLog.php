<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductVariantInventoryLog extends Model
{
    protected $fillable = [
        'variant_id',
        'old_stock',
        'new_stock',
        'change_reason',
        'changed_by',
        'notes'
    ];

    protected $casts = [
        'old_stock' => 'integer',
        'new_stock' => 'integer'
    ];

    /**
     * Get the variant that owns this inventory log
     */
    public function variant(): BelongsTo
    {
        return $this->belongsTo(ProductVariant::class, 'variant_id');
    }

    /**
     * Get the admin who made the inventory change
     */
    public function changedBy(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'changed_by');
    }

    /**
     * Get the stock change amount
     */
    public function getStockChangeAttribute()
    {
        return $this->new_stock - $this->old_stock;
    }

    /**
     * Get the stock change type (increase/decrease)
     */
    public function getStockChangeTypeAttribute()
    {
        if ($this->stock_change > 0) {
            return 'increase';
        } elseif ($this->stock_change < 0) {
            return 'decrease';
        }
        return 'no_change';
    }

    /**
     * Scope for stock increases
     */
    public function scopeIncreases($query)
    {
        return $query->whereRaw('new_stock > old_stock');
    }

    /**
     * Scope for stock decreases
     */
    public function scopeDecreases($query)
    {
        return $query->whereRaw('new_stock < old_stock');
    }

    /**
     * Scope for specific change reasons
     */
    public function scopeByReason($query, $reason)
    {
        return $query->where('change_reason', $reason);
    }
} 