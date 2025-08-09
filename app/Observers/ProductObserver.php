<?php

namespace App\Observers;

use App\Models\Product;
use App\Models\Notification;
use Carbon\Carbon;

class ProductObserver
{

public function created(Product $product)
{
    Notification::create([
        'title' => 'New Product: ' . $product->name,
        'message' => $product->description ?? 'A new product has been added.',
        'type' => 'product_created',
        'data' => [
            'product_id' => $product->id,
            'product_name' => $product->name,
            'image_url' => $product->image_url,
            'price' => $product->selling_price
        ],
        'status' => 'unread'
    ]);
}

public function updated(Product $product)
{
    if ($product->isDirty('selling_price')) {
        Notification::create([
            'title' => 'Price Updated: ' . $product->name,
            'message' => 'New price: $' . $product->selling_price,
            'type' => 'price_updated',
            'data' => [
                'product_id' => $product->id,
                'product_name' => $product->name,
                'old_price' => $product->getOriginal('selling_price'),
                'new_price' => $product->selling_price,
                'image_url' => $product->image_url
            ],
            'status' => 'unread'
        ]);
    }
}

    
    public function deleted(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "restored" event.
     */
    public function restored(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     */
    public function forceDeleted(Product $product): void
    {
        //
    }
}
