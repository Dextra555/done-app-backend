<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class AttributeValue extends Model
{
    protected $fillable = [
        'attribute_id',
        'sub_attribute_id',
        'value'
    ];

    /**
     * Get the attribute that owns this value
     */
    public function attribute(): BelongsTo
    {
        return $this->belongsTo(ProductAttribute::class, 'attribute_id');
    }

    /**
     * Get the sub attribute that owns this value
     */
    public function subAttribute(): BelongsTo
    {
        return $this->belongsTo(AttributeSubAttribute::class, 'sub_attribute_id');
    }

    /**
     * Get the variants that use this attribute value
     */
    public function variants(): BelongsToMany
    {
        return $this->belongsToMany(ProductVariant::class, 'variant_attribute_values', 'attribute_value_id', 'variant_id');
    }
} 