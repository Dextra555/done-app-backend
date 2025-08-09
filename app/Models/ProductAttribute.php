<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductAttribute extends Model
{
    protected $fillable = [
        'name'
    ];

    /**
     * Get the sub attributes for this attribute
     */
    public function subAttributes(): HasMany
    {
        return $this->hasMany(AttributeSubAttribute::class, 'attribute_id');
    }

    /**
     * Get the values for this attribute
     */
    public function values(): HasMany
    {
        return $this->hasMany(AttributeValue::class, 'attribute_id');
    }
} 