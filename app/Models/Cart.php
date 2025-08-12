<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Cart extends Model
{
    protected $fillable = [
        'user_id'
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = [
        'items',
        'items.product',
        'items.variant.attributeValues.attribute'
    ];

    /**
     * Get the user that owns this cart
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(B2CUser::class, 'user_id');
    }

    /**
     * Get the items for this cart
     */
    public function items(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }

    /**
     * Get total items in cart
     */
    public function getTotalItemsAttribute()
    {
        return $this->items->sum('quantity');
    }

    /**
     * Get total price of cart
     */
    public function getTotalPriceAttribute()
    {
        return $this->items->sum(function ($item) {
            return $item->total_price;
        });
    }

    /**
     * Get total discount amount in cart
     */
    public function getTotalDiscountAttribute()
    {
        return $this->items->sum(function ($item) {
            if ($item->variant && $item->variant->is_on_sale) {
                return ($item->variant->original_price - $item->variant->selling_price) * $item->quantity;
            }
            return 0;
        });
    }

    /**
     * Check if cart is empty
     */
    public function getIsEmptyAttribute()
    {
        return $this->items->count() === 0;
    }

    /**
     * Get cart item by product ID and variant ID
     */
    public function getItem($productId, $variantId = null)
    {
        $query = $this->items()->where('product_id', $productId);
        
        if ($variantId) {
            $query->where('variant_id', $variantId);
        } else {
            $query->whereNull('variant_id');
        }
        
        return $query->first();
    }

    /**
     * Check if product (with optional variant) exists in cart
     */
    public function hasItem($productId, $variantId = null)
    {
        $query = $this->items()->where('product_id', $productId);
        
        if ($variantId) {
            $query->where('variant_id', $variantId);
        } else {
            $query->whereNull('variant_id');
        }
        
        return $query->exists();
    }

    /**
     * Add an item to the cart
     */
    public function addItem($product, $quantity = 1, $variant = null, $attributes = [])
    {
        // Start a database transaction
        return DB::transaction(function () use ($product, $quantity, $variant, $attributes) {
            $item = $this->getItem($product->id, $variant ? $variant->id : null);
            
            if ($item) {
                // Update quantity if item already exists
                $item->increment('quantity', $quantity);
            } else {
                // Create new cart item
                $item = $this->items()->create([
                    'product_id' => $product->id,
                    'variant_id' => $variant ? $variant->id : null,
                    'quantity' => $quantity,
                    'price' => $variant ? $variant->main_selling_price : $product->selling_price,
                    'attributes' => $attributes
                ]);
            }
            
            return $item;
        });
    }

    /**
     * Update cart item quantity
     */
    public function updateItem($itemId, $quantity)
    {
        $item = $this->items()->findOrFail($itemId);
        
        // Check stock if it's a variant
        if ($item->variant && $item->variant->stock < $quantity) {
            throw new \Exception('Insufficient stock available');
        }
        
        $item->update(['quantity' => $quantity]);
        
        return $item;
    }

    /**
     * Remove an item from the cart
     */
    public function removeItem($itemId)
    {
        return $this->items()->where('id', $itemId)->delete();
    }

    /**
     * Get cart summary
     */
    public function getSummaryAttribute()
    {
        return [
            'total_items' => $this->total_items,
            'total_price' => $this->total_price,
            'total_discount' => $this->total_discount,
            'item_count' => $this->items->count(),
            'is_empty' => $this->is_empty,
            'items' => $this->items->map(function($item) {
                return [
                    'id' => $item->id,
                    'product_id' => $item->product_id,
                    'variant_id' => $item->variant_id,
                    'name' => $item->item_name,
                    'price' => $item->item_price,
                    'quantity' => $item->quantity,
                    'total_price' => $item->total_price,
                    'image' => $this->getItemImage($item),
                    'attributes' => $item->variant 
                        ? $item->variant->attributeValues->map(function($value) {
                            return [
                                'name' => $value->attribute->name,
                                'value' => $value->value
                            ];
                        })
                        : []
                ];
            })
        ];
    }

    /**
     * Clear all items from cart
     */
    /**
     * Clear all items from cart
     */
    public function clear()
    {
        return $this->items()->delete();
    }

    /**
     * Get the image URL for a cart item
     * 
     * @param CartItem $item
     * @return string|null
     */
    protected function getItemImage($item)
    {
        // Check if variant exists and has an image
        if ($item->relationLoaded('variant') && $item->variant) {
            if ($item->variant->relationLoaded('mainImage') && $item->variant->mainImage) {
                return $item->variant->mainImage->image_url ?? null;
            }
        }
        
        // Fall back to product image
        if ($item->relationLoaded('product') && $item->product) {
            return $item->product->image_url ?? null;
        }
        
        return null;
    }
}