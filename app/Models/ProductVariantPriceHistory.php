<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductVariantPriceHistory extends Model
{
    protected $table = 'product_variant_price_history';

    protected $fillable = [
        'variant_id',
        'old_price',
        'new_price',
        'change_reason',
        'changed_by'
    ];

    protected $casts = [
        'old_price' => 'decimal:2',
        'new_price' => 'decimal:2'
    ];

    /**
     * Get the variant that owns this price history
     */
    public function variant(): BelongsTo
    {
        return $this->belongsTo(ProductVariant::class, 'variant_id');
    }

    /**
     * Get the admin who made the price change
     */
    public function changedBy(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'changed_by');
    }

    /**
     * Get the price change percentage
     */
    public function getPriceChangePercentageAttribute()
    {
        if ($this->old_price && $this->old_price > 0) {
            return round((($this->new_price - $this->old_price) / $this->old_price) * 100, 2);
        }
        return 0;
    }

    /**
     * Get the price change type (increase/decrease)
     */
    public function getPriceChangeTypeAttribute()
    {
        if ($this->old_price && $this->new_price) {
            if ($this->new_price > $this->old_price) {
                return 'increase';
            } elseif ($this->new_price < $this->old_price) {
                return 'decrease';
            }
        }
        return 'no_change';
    }
} 