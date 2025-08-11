<?php

namespace App\Http\Controllers\Api\B2C;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\AttributeValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class CartController extends Controller
{
    /**
     * Get user's cart with detailed items including variants and products
     */
    public function index(Request $request)
    {
        try {
            $user = $request->user();
            $cart = $user->cart;

            if (!$cart) {
                $cart = $user->cart()->create(['user_id' => $user->id]);
                return response()->json([
                    'status' => true,
                    'message' => 'Cart is empty',
                    'data' => [
                        'cart' => [
                            'id' => $cart->id,
                            'total_items' => 0,
                            'total_price' => 0,
                            'items' => []
                        ]
                    ]
                ]);
            }

            // Load necessary relationships
            $cart->load([
                'items.product',
                'items.variant.attributeValues.attribute'
            ]);

            $baseUrl = config('app.url');
            $items = $cart->items->map(function ($item) use ($baseUrl) {
                // Initialize base item data
                $itemData = [
                    'id' => $item->id,
                    'product_id' => $item->product_id,
                    'variant_id' => $item->variant_id,
                    'quantity' => $item->quantity,
                    'unit_price' => $item->price,
                    'total_price' => $item->total_price,
                    'product' => [
                        'id' => $item->product_id,
                        'name' => 'Product not found',
                        'description' => '',
                        'price' => 0,
                        'stock' => 0,
                        'image_url' => null
                    ]
                ];

                // Add product details if exists
                if ($item->relationLoaded('product') && $item->product) {
                    $itemData['product'] = [
                        'id' => $item->product->id,
                        'name' => $item->product->name ?? 'Unnamed Product',
                        'description' => $item->product->description ?? '',
                        'price' => $item->product->selling_price ?? 0,
                        'stock' => $item->product->stock ?? 0,
                        'image_url' => $item->product->image_url 
                            ? rtrim(config('app.url'), '/') . '/' . ltrim($item->product->image_url, '/') 
                            : null
                    ];
                }

                // Add variant details if exists
                if ($item->relationLoaded('variant') && $item->variant) {
                    $attributes = [];
                    
                    if ($item->variant->relationLoaded('attributeValues')) {
                        $attributes = $item->variant->attributeValues->map(function($value) {
                            if (!$value) return null;
                            
                            return [
                                'attribute_id' => $value->attribute_id ?? null,
                                'attribute_name' => $value->relationLoaded('attribute') && $value->attribute 
                                    ? $value->attribute->name 
                                    : 'Unknown Attribute',
                                'value' => $value->value ?? ''
                            ];
                        })->filter()->values()->toArray();
                    }
                    
                    $itemData['variant'] = [
                        'id' => $item->variant->id,
                        'price' => $item->variant->main_selling_price ?? 0,
                        'stock' => $item->variant->stock ?? 0,
                        'attributes' => $attributes
                    ];
                }

                return $itemData;
            });

            return response()->json([
                'status' => true,
                'message' => 'Cart retrieved successfully',
                'data' => [
                    'cart' => [
                        'id' => $cart->id,
                        'total_items' => $items->sum('quantity'),
                        'total_price' => $items->sum('total_price'),
                        'items' => $items
                    ]
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to retrieve cart',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Add item to cart (supports both simple products and variants)
     */
    public function addItem(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'nullable|required_without:variant_id|integer|exists:products,id',
            'variant_id' => 'nullable|required_without:product_id|integer|exists:product_variants,id',
            'quantity' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        return DB::transaction(function () use ($request) {
            $user = $request->user();
            $cart = $user->cart ?: $user->cart()->create(['user_id' => $user->id]);
            $message = '';

            // Handle variant addition if variant_id is provided
            if ($request->has('variant_id')) {
                $variant = ProductVariant::with('attributeValues.attribute')
                    ->where('id', $request->variant_id)
                    ->first();

                if (!$variant) {
                    return response()->json([
                        'status' => false,
                        'message' => 'Variant not found'
                    ], 404);
                }

                // Check stock
                if ($variant->stock < $request->quantity) {
                    return response()->json([
                        'status' => false,
                        'message' => 'Only ' . $variant->stock . ' items available in stock'
                    ], 400);
                }

                // Check if variant already exists in cart
                $existingItem = $cart->items()
                    ->where('variant_id', $variant->id)
                    ->first();

                if ($existingItem) {
                    $newQty = $existingItem->quantity + $request->quantity;
                    if ($variant->stock < $newQty) {
                        return response()->json([
                            'status' => false,
                            'message' => 'Cannot add more items. Only ' . $variant->stock . ' available in stock'
                        ], 400);
                    }
                    $existingItem->update(['quantity' => $newQty]);
                    $message = 'Cart item quantity updated';
                } else {
                    $cart->items()->create([
                        'product_id' => $variant->product_id,
                        'variant_id' => $variant->id,
                        'quantity' => $request->quantity,
                        'price' => $variant->main_selling_price,
                        'attributes' => $variant->attributeValues->map(function($value) {
                            return [
                                'attribute_id' => $value->attribute_id,
                                'attribute_name' => $value->attribute->name,
                                'value_id' => $value->id,
                                'value' => $value->value
                            ];
                        })->toArray()
                    ]);
                    $message = 'Variant added to cart';
                }
            } 
            // Handle simple product addition
            else {
                $product = Product::find($request->product_id);

                if (!$product) {
                    return response()->json([
                        'status' => false,
                        'message' => 'Product not found'
                    ], 404);
                }

                // Check stock
                if ($product->stock < $request->quantity) {
                    return response()->json([
                        'status' => false,
                        'message' => 'Only ' . $product->stock . ' items available in stock'
                    ], 400);
                }

                // Check if product already exists in cart
                $existingItem = $cart->items()
                    ->where('product_id', $product->id)
                    ->whereNull('variant_id')
                    ->first();

                if ($existingItem) {
                    $newQty = $existingItem->quantity + $request->quantity;
                    if ($product->stock < $newQty) {
                        return response()->json([
                            'status' => false,
                            'message' => 'Cannot add more items. Only ' . $product->stock . ' available in stock'
                        ], 400);
                    }
                    $existingItem->update(['quantity' => $newQty]);
                    $message = 'Cart item quantity updated';
                } else {
                    $cart->items()->create([
                        'product_id' => $product->id,
                        'quantity' => $request->quantity,
                        'price' => $product->selling_price
                    ]);
                    $message = 'Product added to cart';
                }
            }

            // Reload cart with relationships
            $cart->load(['items.product', 'items.variant.attributeValues.attribute']);

            return response()->json([
                'status' => true,
                'message' => $message,
                'data' => [
                    'cart' => $cart->summary
                ]
            ]);
        });
    }

    /**
     * Update cart item quantity by item ID
     */
    public function updateItem(Request $request, $itemId)
    {
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        return DB::transaction(function () use ($request, $itemId) {
            $user = $request->user();
            $cart = $user->cart ?: $user->cart()->create(['user_id' => $user->id]);

            $cartItem = $cart->items()
                ->with(['product', 'variant.attributeValues.attribute'])
                ->find($itemId);

            if (!$cartItem) {
                return response()->json([
                    'status' => false,
                    'message' => 'Cart item not found'
                ], 404);
            }

            // Check stock based on whether it's a variant or simple product
            if ($cartItem->variant) {
                if ($cartItem->variant->stock < $request->quantity) {
                    return response()->json([
                        'status' => false,
                        'message' => 'Only ' . $cartItem->variant->stock . ' items available in stock'
                    ], 400);
                }
            } else {
                if ($cartItem->product->stock < $request->quantity) {
                    return response()->json([
                        'status' => false,
                        'message' => 'Only ' . $cartItem->product->stock . ' items available in stock'
                    ], 400);
                }
            }

            $cartItem->update(['quantity' => $request->quantity]);
            
            return response()->json([
                'status' => true,
                'message' => 'Cart item updated successfully',
                'data' => [
                    'cart' => $cart->fresh('items.product', 'items.variant.attributeValues.attribute')
                ]
            ]);
        });
    }

    /**
     * Update cart item by variant ID
     */
    public function updateByVariant(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'variant_id' => 'required|integer|exists:product_variants,id',
            'quantity' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        return DB::transaction(function () use ($request) {
            $user = $request->user();
            $cart = $user->cart ?: $user->cart()->create(['user_id' => $user->id]);

            // Get variant
            $variant = ProductVariant::find($request->variant_id);

            if (!$variant) {
                return response()->json([
                    'status' => false,
                    'message' => 'Variant not found'
                ], 404);
            }

            // Check stock
            if ($variant->stock < $request->quantity) {
                return response()->json([
                    'status' => false,
                    'message' => 'Only ' . $variant->stock . ' items available in stock'
                ], 400);
            }

            // Find cart item by variant_id
            $cartItem = $cart->items()
                ->where('variant_id', $variant->id)
                ->with(['product', 'variant.attributeValues.attribute'])
                ->first();

            if (!$cartItem) {
                return response()->json([
                    'status' => false,
                    'message' => 'Variant not found in cart'
                ], 404);
            }

            $cartItem->update(['quantity' => $request->quantity]);

            return response()->json([
                'status' => true,
                'message' => 'Cart item updated successfully',
                'data' => [
                    'cart' => $cart->fresh('items.product', 'items.variant.attributeValues.attribute')
                ]
            ]);
        });
    }

    /**
     * Remove item from cart by item ID
     */
    public function removeItem(Request $request, $itemId)
    {
        return DB::transaction(function () use ($request, $itemId) {
            $user = $request->user();
            $cart = $user->cart;

            if (!$cart) {
                return response()->json([
                    'status' => false,
                    'message' => 'Cart not found'
                ], 404);
            }

            $deleted = $cart->items()
                ->where('id', $itemId)
                ->delete();

            if ($deleted === 0) {
                return response()->json([
                    'status' => false,
                    'message' => 'Cart item not found'
                ], 404);
            }

            return response()->json([
                'status' => true,
                'message' => 'Item removed from cart',
                'data' => [
                    'cart' => $cart->fresh('items.product', 'items.variant.attributeValues.attribute')
                ]
            ]);
        });
    }

    /**
     * Remove item from cart by product and variant
     */
    /**
     * Remove item from cart by variant ID
     */
    public function removeByVariant(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'variant_id' => 'required|integer|exists:product_variants,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        return DB::transaction(function () use ($request) {
            $user = $request->user();
            $cart = $user->cart;

            if (!$cart) {
                return response()->json([
                    'status' => false,
                    'message' => 'Cart not found'
                ], 404);
            }

            // Delete cart item by variant_id
            $deleted = $cart->items()
                ->where('variant_id', $request->variant_id)
                ->delete();

            if ($deleted === 0) {
                return response()->json([
                    'status' => false,
                    'message' => 'Variant not found in cart'
                ], 404);
            }

            return response()->json([
                'status' => true,
                'message' => 'Item removed from cart',
                'data' => [
                    'cart' => $cart->fresh('items.product', 'items.variant.attributeValues.attribute')
                ]
            ]);
        });
    }

    /**
     * Clear cart
     */
    public function clear(Request $request)
    {
        return DB::transaction(function () use ($request) {
            $user = $request->user();
            $cart = $user->cart;

            if (!$cart) {
                return response()->json([
                    'status' => false,
                    'message' => 'Cart not found'
                ], 404);
            }

            $cart->items()->delete();
            $cart->load(['items.product', 'items.variant.attributeValues.attribute']);

            return response()->json([
                'status' => true,
                'message' => 'Cart cleared successfully',
                'data' => [
                    'cart' => $cart->summary
                ]
            ]);
        });
    }

    /**
     * Get cart summary
     */
    public function summary(Request $request)
    {
        try {
            $user = $request->user();
            $cart = $user->cart;

            if (!$cart) {
                return response()->json([
                    'status' => true,
                    'message' => 'Cart is empty',
                    'data' => [
                        'total_items' => 0,
                        'total_price' => 0,
                        'is_empty' => true
                    ]
                ]);
            }

            $cart->load(['items.product']);

            return response()->json([
                'status' => true,
                'message' => 'Cart summary retrieved successfully',
                'data' => [
                    'total_items' => $cart->total_items,
                    'total_price' => $cart->total_price,
                    'is_empty' => $cart->is_empty,
                    'summary' => $cart->summary
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to get cart summary',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update cart item by product ID
     */
    public function updateByProduct(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'nullable|required_without:variant_id|integer',
            'variant_id' => 'nullable|required_without:product_id|integer',
            'quantity' => 'required|integer|min:1',
        ], [
            'product_id.required_without' => 'Either product_id or variant_id is required',
            'variant_id.required_without' => 'Either product_id or variant_id is required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        return DB::transaction(function () use ($request) {
            $user = $request->user();
            $cart = $user->cart ?: $user->cart()->create(['user_id' => $user->id]);
            $isVariant = $request->has('variant_id');

            if ($isVariant) {
                // Handle variant update
                $variant = ProductVariant::with('attributeValues.attribute')
                    ->find($request->variant_id);

                if (!$variant) {
                    return response()->json([
                        'status' => false,
                        'message' => 'Variant not found'
                    ], 404);
                }

                // Check stock
                if ($variant->stock < $request->quantity) {
                    return response()->json([
                        'status' => false,
                        'message' => 'Only ' . $variant->stock . ' items available in stock'
                    ], 400);
                }

                // Find the cart item
                $cartItem = $cart->items()
                    ->where('variant_id', $request->variant_id)
                    ->first();
            } else {
                // Handle product update
                $product = Product::find($request->product_id);

                if (!$product) {
                    return response()->json([
                        'status' => false,
                        'message' => 'Product not found'
                    ], 404);
                }

                // Check stock
                if ($product->stock < $request->quantity) {
                    return response()->json([
                        'status' => false,
                        'message' => 'Only ' . $product->stock . ' items available in stock'
                    ], 400);
                }

                // Find the cart item
                $cartItem = $cart->items()
                    ->where('product_id', $request->product_id)
                    ->whereNull('variant_id')
                    ->first();
            }

            if (!$cartItem) {
                $itemType = $isVariant ? 'Variant' : 'Product';
                return response()->json([
                    'status' => false,
                    'message' => $itemType . ' not found in cart'
                ], 404);
            }

            // Update the quantity
            $cartItem->update(['quantity' => $request->quantity]);

            // Reload cart with relationships
            $cart->load(['items.product', 'items.variant.attributeValues.attribute']);

            return response()->json([
                'status' => true,
                'message' => 'Cart item updated successfully',
                'data' => [
                    'cart' => $cart->fresh('items.product', 'items.variant.attributeValues.attribute')
                ]
            ]);
        });
    }
   
    /**
     * Remove item from cart by product_id or variant_id
     */
    public function removeByProduct(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'nullable|required_without:variant_id|integer',
            'variant_id' => 'nullable|required_without:product_id|integer'
        ], [
            'product_id.required_without' => 'Either product_id or variant_id is required',
            'variant_id.required_without' => 'Either product_id or variant_id is required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        return DB::transaction(function () use ($request) {
            $user = $request->user();
            $cart = $user->cart;

            if (!$cart) {
                return response()->json([
                    'status' => false,
                    'message' => 'Cart not found'
                ], 404);
            }

            $query = $cart->items();

            if ($request->has('variant_id')) {
                $query->where('variant_id', $request->variant_id);
            } else {
                $query->where('product_id', $request->product_id)
                    ->whereNull('variant_id');
            }

            $cartItem = $query->first();

            if (!$cartItem) {
                $itemType = $request->has('variant_id') ? 'Variant' : 'Product';
                return response()->json([
                    'status' => false,
                    'message' => $itemType . ' not found in cart'
                ], 404);
            }

            $cartItem->delete();

            // Reload cart with relationships
            $cart->load(['items.product', 'items.variant.attributeValues.attribute']);

            return response()->json([
                'status' => true,
                'message' => 'Item removed from cart successfully',
                'data' => [
                    'cart' => $cart->fresh('items.product', 'items.variant.attributeValues.attribute')
                ]
            ]);
        });
    }
}