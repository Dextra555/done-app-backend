<?php

namespace App\Http\Controllers\Api\B2C;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /**
     * Get user's orders
     */
    public function index(Request $request)
    {
        try {
            $user = $request->user();
            $perPage = $request->get('per_page', 10);
            $status = $request->get('status');
    
            $query = $user->orders()->with(['items.product', 'items.variant.attributeValues.attribute']);
    
            if ($status) {
                $query->where('status', $status);
            }
    
            $orders = $query->orderBy('created_at', 'desc')->paginate($perPage);
    
            return response()->json([
                'status' => true,
                'message' => 'Orders retrieved successfully',
                'data' => [
                    'orders' => $orders->getCollection()->map(function ($order) {
                        return $this->formatOrder($order);
                    }),
                    'pagination' => [
                        'current_page' => $orders->currentPage(),
                        'last_page' => $orders->lastPage(),
                        'per_page' => $orders->perPage(),
                        'total' => $orders->total(),
                        'from' => $orders->firstItem(),
                        'to' => $orders->lastItem()
                    ]
                ]
            ]);
    
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to retrieve orders',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    

    /**
     * Get order by ID
     */
    public function show(Request $request, $id)
    {
        try {
            $user = $request->user();
            $order = $user->orders()->with(['items.product', 'items.variant.attributeValues.attribute'])->find($id);
    
            if (!$order) {
                return response()->json([
                    'status' => false,
                    'message' => 'Order not found'
                ], 404);
            }
    
            return response()->json([
                'status' => true,
                'message' => 'Order retrieved successfully',
                'data' => [
                    'order' => $this->formatOrder($order)
                ]
            ]);
    
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to retrieve order',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Create new order from cart
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'address' => 'required|string',
            'latitude' => 'sometimes|numeric',
            'longitude' => 'sometimes|numeric',
            'delivery_notes' => 'sometimes|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        DB::beginTransaction();
        try {
            $user = $request->user();
            $cart = $user->cart;

            if (!$cart || $cart->is_empty) {
                return response()->json([
                    'status' => false,
                    'message' => 'Cart is empty'
                ], 400);
            }

            // Validate stock availability
            foreach ($cart->items as $item) {
                $stockCheck = $item->variant ?? $item->product;
                if ($stockCheck->stock < $item->quantity) {
                    $itemName = $item->variant ? $item->variant->name : $item->product->name;
                    return response()->json([
                        'status' => false,
                        'message' => "Insufficient stock for item: {$itemName}"
                    ], 400);
                }
            }

            // Create order
            $order = Order::create([
                'user_id' => $user->id,
                'total_amount' => $cart->total_price,
                'status' => 'pending',
                'address' => $request->address,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'payment_status' => 'pending',
                'delivery_notes' => $request->delivery_notes
            ]);

            // Create order items and update stock
            foreach ($cart->items as $item) {
                $orderItem = [
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'variant_id' => $item->variant_id,
                    'quantity' => $item->quantity,
                    'price' => $item->variant ? $item->variant->main_selling_price : $item->product->selling_price,
                    'attributes' => $item->variant ? 
                        $item->variant->attributeValues->map(function($value) {
                            return [
                                'attribute_id' => $value->attribute_id,
                                'attribute_name' => $value->attribute->name,
                                'value_id' => $value->id,
                                'value' => $value->value
                            ];
                        })->toArray() : null
                ];

                OrderItem::create($orderItem);

                // Update stock
                if ($item->variant) {
                    $item->variant->decrement('stock', $item->quantity);
                } else {
                    $item->product->decrement('stock', $item->quantity);
                }
            }

            // Clear cart
            $cart->items()->delete();

            DB::commit();

            // Load order with relationships
            $order->load(['items.product', 'items.variant.attributeValues.attribute']);

            return response()->json([
                'status' => true,
                'message' => 'Order created successfully',
                'data' => [
                    'order' => $this->formatOrder($order)
                ]
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => 'Failed to create order',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Cancel order
     */
    public function cancel(Request $request, $id)
    {
        try {
            $user = $request->user();
            $order = $user->orders()->with('items.product')->find($id);

            if (!$order) {
                return response()->json([
                    'status' => false,
                    'message' => 'Order not found'
                ], 404);
            }

            if ($order->status !== 'pending') {
                return response()->json([
                    'status' => false,
                    'message' => 'Order cannot be cancelled'
                ], 400);
            }

            DB::beginTransaction();

            // Update order status
            $order->update(['status' => 'cancelled']);

            // Restore product stock
            foreach ($order->items as $item) {
                $item->product->increment('stock', $item->quantity);
            }

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Order cancelled successfully',
                'data' => [
                    'order' => $this->formatOrder($order)
                ]
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => 'Failed to cancel order',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Track order
     */
    public function track(Request $request, $id)
    {
        try {
            $user = $request->user();
            $order = $user->orders()->with(['items.product'])->find($id);

            if (!$order) {
                return response()->json([
                    'status' => false,
                    'message' => 'Order not found'
                ], 404);
            }

            $trackingSteps = [
                'pending' => [
                    'step' => 1,
                    'title' => 'Order Placed',
                    'description' => 'Your order has been placed successfully',
                    'completed' => true,
                    'timestamp' => $order->created_at
                ],
                'confirmed' => [
                    'step' => 2,
                    'title' => 'Order Confirmed',
                    'description' => 'Your order has been confirmed',
                    'completed' => in_array($order->status, ['confirmed', 'processing', 'shipped', 'delivered']),
                    'timestamp' => null
                ],
                'processing' => [
                    'step' => 3,
                    'title' => 'Processing',
                    'description' => 'Your order is being processed',
                    'completed' => in_array($order->status, ['processing', 'shipped', 'delivered']),
                    'timestamp' => null
                ],
                'shipped' => [
                    'step' => 4,
                    'title' => 'Shipped',
                    'description' => 'Your order has been shipped',
                    'completed' => in_array($order->status, ['shipped', 'delivered']),
                    'timestamp' => null
                ],
                'delivered' => [
                    'step' => 5,
                    'title' => 'Delivered',
                    'description' => 'Your order has been delivered',
                    'completed' => $order->status === 'delivered',
                    'timestamp' => null
                ]
            ];

            return response()->json([
                'status' => true,
                'message' => 'Order tracking retrieved successfully',
                'data' => [
                    'order' => [
                        'id' => $order->id,
                        'order_number' => 'ORD-' . str_pad($order->id, 6, '0', STR_PAD_LEFT),
                        'status' => $order->status,
                        'total_amount' => $order->total_amount,
                        'address' => $order->address,
                        'payment_status' => $order->payment_status,
                        'created_at' => $order->created_at,
                        'items' => $order->items->map(function ($item) {
                            return [
                                'id' => $item->id,
                                'product_id' => $item->product_id,
                                'quantity' => $item->quantity,
                                'price' => $item->price,
                                'total_price' => $item->total_price,
                                'product' => [
                                    'id' => $item->product->id,
                                    'name' => $item->product->name,
                                    'image_url' => $item->product->image_url
                                ]
                            ];
                        })
                    ],
                    'tracking' => [
                        'current_status' => $order->status,
                        'steps' => array_values($trackingSteps)
                    ]
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to retrieve order tracking',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get order statistics
     */
    public function statistics(Request $request)
    {
        try {
            $user = $request->user();
            
            $totalOrders = $user->orders()->count();
            $pendingOrders = $user->orders()->where('status', 'pending')->count();
            $completedOrders = $user->orders()->where('status', 'delivered')->count();
            $cancelledOrders = $user->orders()->where('status', 'cancelled')->count();
            $totalSpent = $user->orders()->where('status', 'delivered')->sum('total_amount');

            return response()->json([
                'status' => true,
                'message' => 'Order statistics retrieved successfully',
                'data' => [
                    'statistics' => [
                        'total_orders' => $totalOrders,
                        'pending_orders' => $pendingOrders,
                        'completed_orders' => $completedOrders,
                        'cancelled_orders' => $cancelledOrders,
                        'total_spent' => $totalSpent
                    ]
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to retrieve order statistics',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Format order for response
     */
    protected function formatOrder($order)
    {
        return [
            'id' => $order->id,
            'order_number' => $order->order_number,
            'total_amount' => $order->total_amount,
            'status' => $order->status,
            'payment_status' => $order->payment_status,
            'address' => $order->address,
            'created_at' => $order->created_at->toDateTimeString(),
            'items' => $order->items->map(function ($item) {
                $product = $item->product;
                $variant = $item->variant;
                
                return [
                    'id' => $item->id,
                    'product_id' => $item->product_id,
                    'variant_id' => $item->variant_id,
                    'name' => $variant ? $variant->name : $product->name,
                    'image' => $variant && $variant->image ? $variant->image : $product->image_url,
                    'price' => $item->price,
                    'quantity' => $item->quantity,
                    'total' => $item->price * $item->quantity,
                    'attributes' => $variant ? $item->attributes : null
                ];
            })
        ];
    }
} 