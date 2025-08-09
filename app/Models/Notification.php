<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notification extends Model
{
    protected $fillable = [
        'user_id',
        'user_type',
        'title',
        'message',
        'type',
        'data',
        'read_at',
        'status'
    ];

    protected $casts = [
        'data' => 'array',
        'read_at' => 'datetime',
        'status' => 'string'
    ];

    /**
     * Get the user that owns this notification
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(B2CUser::class, 'user_id');
    }

    /**
     * Mark notification as read
     */
    public function markAsRead()
    {
        $this->update(['read_at' => now()]);
    }

    /**
     * Check if notification is read
     */
    public function getIsReadAttribute()
    {
        return !is_null($this->read_at);
    }

    /**
     * Scope for unread notifications
     */
    public function scopeUnread($query)
    {
        return $query->whereNull('read_at');
    }

    /**
     * Scope for read notifications
     */
    public function scopeRead($query)
    {
        return $query->whereNotNull('read_at');
    }
} 