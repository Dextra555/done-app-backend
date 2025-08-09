<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StoryView extends Model
{
    protected $fillable = [
        'user_id',
        'service_video_id',
        'viewed_at'
    ];

    protected $casts = [
        'viewed_at' => 'datetime',
    ];

    /**
     * Get the user that viewed the story
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the story that was viewed
     */
    public function story(): BelongsTo
    {
        return $this->belongsTo(ServiceVideo::class, 'service_video_id');
    }
}
