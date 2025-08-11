<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class StoryView extends Model
{
    protected $fillable = [
        'user_id',
        'story_id',
        'story_type',
        'viewed_at'
    ];

    protected $casts = [
        'viewed_at' => 'datetime',
    ];
    
    /**
     * The "booting" method of the model.
     */
    protected static function boot()
    {
        parent::boot();

        // Set viewed_at when creating a new view
        static::creating(function ($model) {
            if (empty($model->viewed_at)) {
                $model->viewed_at = now();
            }
        });
    }

    /**
     * Get the user that viewed the story
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the parent story model (ServiceVideo or ProductStory)
     */
    public function story(): MorphTo
    {
        return $this->morphTo();
    }
}
