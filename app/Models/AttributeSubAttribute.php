<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AttributeSubAttribute extends Model
{
    protected $fillable = [
        'attribute_id',
        'name'
    ];

    /**
     * Get the attribute that owns this sub attribute
     */
    public function attribute(): BelongsTo
    {
        return $this->belongsTo(ProductAttribute::class, 'attribute_id');
    }

    /**
     * Get the values for this sub attribute
     */
    public function values(): HasMany
    {
        return $this->hasMany(AttributeValue::class, 'sub_attribute_id');
    }
} 