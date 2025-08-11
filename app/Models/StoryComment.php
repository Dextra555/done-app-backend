<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StoryComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'story_id',
        'user_id',
        'content'
    ];

    /**
     * Get the story that owns the comment
     */
    public function story(): BelongsTo
    {
        return $this->belongsTo(ProductStory::class, 'story_id');
    }

    /**
     * Get the user that made the comment
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(B2CUser::class, 'user_id');
    }
}
