<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceComment extends Model
{
    protected $fillable = [
        'service_video_id',
        'user_id',
        'comment'
    ];

    /**
     * Get the video that owns this comment
     */
    public function video(): BelongsTo
    {
        return $this->belongsTo(ServiceVideo::class, 'service_video_id');
    }

    /**
     * Get the user that owns this comment
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(B2CUser::class, 'user_id');
    }
} 