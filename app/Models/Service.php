<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    protected $fillable = [
        'serviceName',
        'uploadedDate',
        'createdDate',
        'productID',
        'categoryID',
        'description',
        'image_url',
        'status'
    ];

    protected $casts = [
        'uploadedDate' => 'date',
        'createdDate' => 'date',
        'status' => 'boolean'
    ];

    /**
     * Get the videos for this service
     */
    public function videos(): HasMany
    {
        return $this->hasMany(ServiceVideo::class);
    }

    /**
     * Scope for active services
     */
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }
} 