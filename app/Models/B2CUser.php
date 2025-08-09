<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class B2CUser extends Authenticatable
{
    use HasApiTokens;
    
    protected $table = 'b2c_users';

    protected $fillable = [
        'first_name', 
        'last_name', 
        'phone_number', 
        'email', 
        'password',
        'is_login',
        'email_otp',
        'email_verified_at'
    ];

    protected $hidden = [
        'password',
        'email_otp',
        'remember_token'
    ];

    protected $casts = [
        'is_login' => 'boolean',
        'email_verified_at' => 'datetime'
    ];

    /**
     * Get the cart for this user
     */
    public function cart(): HasOne
    {
        return $this->hasOne(Cart::class, 'user_id');
    }

    /**
     * Get the orders for this user
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'user_id');
    }

    /**
     * Get the reviews for this user
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(ProductReview::class, 'user_id');
    }

    /**
     * Get the comments for this user
     */
    public function comments(): HasMany
    {
        return $this->hasMany(ServiceComment::class, 'user_id');
    }

    /**
     * Get the notifications for this user
     */
    public function notifications(): HasMany
    {
        return $this->hasMany(Notification::class, 'user_id');
    }

    /**
     * Get the full name of the user
     */
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * Check if user is logged in
     */
    public function getIsLoggedInAttribute()
    {
        return $this->is_login;
    }

    /**
     * Check if email is verified
     */
    public function getIsEmailVerifiedAttribute()
    {
        return !is_null($this->email_verified_at);
    }
}
