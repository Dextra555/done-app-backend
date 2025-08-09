# B2C API Documentation

## Overview
This document provides comprehensive documentation for the B2C (Business-to-Consumer) API endpoints for the Done App platform.

## Base URL
```
https://your-domain.com/api/b2c
```

## Authentication
The API uses Laravel Sanctum for authentication. Include the Bearer token in the Authorization header:
```
Authorization: Bearer {your-token}
```

## Response Format
All API responses follow this standard format:
```json
{
    "status": true/false,
    "message": "Response message",
    "data": {
        // Response data
    }
}
```

---

## Authentication Endpoints

### 1. Register User
**POST** `/register`

**Request Body:**
```json
{
    "first_name": "John",
    "last_name": "Doe",
    "phone_number": "9876543210",
    "email": "john.doe@example.com",
    "password": "password123",
    "password_confirmation": "password123"
}
```

**Response:**
```json
{
    "status": true,
    "message": "User registered successfully",
    "data": {
        "user": {
            "id": 1,
            "first_name": "John",
            "last_name": "Doe",
            "email": "john.doe@example.com",
            "phone_number": "9876543210",
            "full_name": "John Doe"
        },
        "token": "1|abc123..."
    }
}
```

### 2. Login User
**POST** `/login`

**Request Body:**
```json
{
    "email": "john.doe@example.com",
    "password": "password123"
}
```

**Response:**
```json
{
    "status": true,
    "message": "Login successful",
    "data": {
        "user": {
            "id": 1,
            "first_name": "John",
            "last_name": "Doe",
            "email": "john.doe@example.com",
            "phone_number": "9876543210",
            "full_name": "John Doe",
            "is_email_verified": false
        },
        "token": "1|abc123..."
    }
}
```

### 3. Get Profile (Protected)
**POST** `/profile`

**Headers:**
```
Authorization: Bearer {your-token}
```

**Response:**
```json
{
    "status": true,
    "message": "Profile retrieved successfully",
    "data": {
        "user": {
            "id": 1,
            "first_name": "John",
            "last_name": "Doe",
            "email": "john.doe@example.com",
            "phone_number": "9876543210",
            "full_name": "John Doe",
            "is_email_verified": false,
            "created_at": "2025-01-01T00:00:00.000000Z"
        }
    }
}
```

### 4. Edit Profile (Protected)
**POST** `/edit-profile`

**Headers:**
```
Authorization: Bearer {your-token}
```

**Request Body:**
```json
{
    "first_name": "John",
    "last_name": "Smith",
    "phone_number": "9876543211"
}
```

**Response:**
```json
{
    "status": true,
    "message": "Profile updated successfully",
    "data": {
        "user": {
            "id": 1,
            "first_name": "John",
            "last_name": "Smith",
            "email": "john.doe@example.com",
            "phone_number": "9876543211",
            "full_name": "John Smith"
        }
    }
}
```

### 5. Forgot Password
**POST** `/forgot-password`

**Request Body:**
```json
{
    "email": "john.doe@example.com"
}
```

**Response:**
```json
{
    "status": true,
    "message": "OTP sent successfully",
    "data": {
        "email": "john.doe@example.com",
        "otp": "1234"
    }
}
```

### 6. Verify OTP
**POST** `/verify-otp`

**Request Body:**
```json
{
    "email": "john.doe@example.com",
    "otp": "1234"
}
```

**Response:**
```json
{
    "status": true,
    "message": "OTP verified successfully",
    "data": {
        "email": "john.doe@example.com"
    }
}
```

### 7. Reset Password
**POST** `/reset-password`

**Request Body:**
```json
{
    "email": "john.doe@example.com",
    "password": "newpassword123",
    "password_confirmation": "newpassword123"
}
```

**Response:**
```json
{
    "status": true,
    "message": "Password reset successfully"
}
```

### 8. Logout (Protected)
**POST** `/logout`

**Headers:**
```
Authorization: Bearer {your-token}
```

**Response:**
```json
{
    "status": true,
    "message": "Logged out successfully"
}
```

---

## Product Endpoints

### 1. Get All Products
**GET** `/products`

**Query Parameters:**
- `per_page` (optional): Number of items per page (default: 12)
- `sort_by` (optional): Sort field (created_at, name, price, rating) (default: created_at)
- `sort_order` (optional): Sort direction (asc/desc, default: desc)
- `category_id` (optional): Filter by category
- `subcategory_id` (optional): Filter by subcategory
- `min_price` (optional): Minimum price filter
- `max_price` (optional): Maximum price filter

**Response:**
```json
{
    "status": true,
    "message": "Products retrieved successfully",
    "data": {
        "products": [
            {
                "id": 1,
                "name": "Product Name",
                "description": "Product description",
                "selling_price": "99.99",
                "image_url": "https://example.com/image.jpg",
                "average_rating": "4.5",
                "review_count": 10,
                "stock": 50,
                "is_on_sale": false,
                "discount_percentage": 0,
                "category": {
                    "id": 1,
                    "name": "Electronics"
                },
                "subcategory": {
                    "id": 1,
                    "name": "Smartphones"
                },
                "main_variant": {
                    "id": 1,
                    "sku": "PROD-001",
                    "price": "99.99",
                    "stock": 50,
                    "image_url": "https://example.com/variant.jpg"
                }
            }
        ],
        "pagination": {
            "current_page": 1,
            "last_page": 5,
            "per_page": 12,
            "total": 60,
            "from": 1,
            "to": 12
        }
    }
}
```

### 2. Get Featured Products
**GET** `/products/featured`

**Query Parameters:**
- `limit` (optional): Number of products (default: 8)

**Response:**
```json
{
    "status": true,
    "message": "Featured products retrieved successfully",
    "data": {
        "products": [
            {
                "id": 1,
                "name": "Featured Product",
                "description": "High-rated product",
                "selling_price": "99.99",
                "image_url": "https://example.com/image.jpg",
                "average_rating": "4.8",
                "review_count": 25,
                "stock": 50,
                "is_on_sale": false,
                "discount_percentage": 0,
                "category": {
                    "id": 1,
                    "name": "Electronics"
                },
                "subcategory": {
                    "id": 1,
                    "name": "Smartphones"
                }
            }
        ]
    }
}
```

### 3. Get Products on Sale
**GET** `/products/on-sale`

**Query Parameters:**
- `per_page` (optional): Number of items per page (default: 12)
- `sort_by` (optional): Sort field (discount_percentage, created_at, name) (default: discount_percentage)
- `sort_order` (optional): Sort direction (asc/desc, default: desc)

**Response:**
```json
{
    "status": true,
    "message": "Products on sale retrieved successfully",
    "data": {
        "products": [
            {
                "id": 1,
                "name": "Product on Sale",
                "description": "Discounted product",
                "selling_price": "79.99",
                "original_price": "99.99",
                "discount_percentage": 20.0,
                "is_on_sale": true,
                "image_url": "https://example.com/image.jpg",
                "average_rating": "4.5",
                "review_count": 10,
                "stock": 50,
                "category": {
                    "id": 1,
                    "name": "Electronics"
                },
                "subcategory": {
                    "id": 1,
                    "name": "Smartphones"
                }
            }
        ],
        "pagination": {
            "current_page": 1,
            "last_page": 3,
            "per_page": 12,
            "total": 35
        }
    }
}
```

### 4. Search Products
**GET** `/products/search`

**Query Parameters:**
- `query` (required): Search term
- `per_page` (optional): Number of items per page (default: 12)

**Response:**
```json
{
    "status": true,
    "message": "Search completed successfully",
    "data": {
        "query": "smartphone",
        "products": [
            {
                "id": 1,
                "name": "Smartphone Pro",
                "description": "Latest smartphone model",
                "selling_price": "999.99",
                "image_url": "https://example.com/image.jpg",
                "average_rating": "4.5",
                "review_count": 10,
                "stock": 50,
                "is_on_sale": false,
                "discount_percentage": 0,
                "category": {
                    "id": 1,
                    "name": "Electronics"
                },
                "subcategory": {
                    "id": 1,
                    "name": "Smartphones"
                }
            }
        ],
        "pagination": {
            "current_page": 1,
            "last_page": 2,
            "per_page": 12,
            "total": 15
        }
    }
}
```

### 5. Get Product Details
**GET** `/products/{id}`

**Response:**
```json
{
    "status": true,
    "message": "Product retrieved successfully",
    "data": {
        "product": {
            "id": 1,
            "name": "Product Name",
            "description": "Detailed product description",
            "key_features": "Feature 1, Feature 2, Feature 3",
            "cost_price": "89.99",
            "selling_price": "99.99",
            "image_url": "https://example.com/image.jpg",
            "average_rating": "4.5",
            "review_count": 10,
            "stock": 50,
            "is_on_sale": false,
            "discount_percentage": 0,
            "category": {
                "id": 1,
                "name": "Electronics"
            },
            "subcategory": {
                "id": 1,
                "name": "Smartphones"
            },
            "variants": [
                {
                    "id": 1,
                    "sku": "PROD-001-BLK",
                    "price": "99.99",
                    "stock": 25,
                    "image_url": "https://example.com/black.jpg",
                    "images": [
                        {
                            "id": 1,
                            "image_url": "https://example.com/black1.jpg",
                            "type": "main"
                        }
                    ]
                }
            ],
            "reviews": [
                {
                    "id": 1,
                    "rating": 5,
                    "content": "Great product! Highly recommended.",
                    "type": "review",
                    "created_at": "2025-01-01T00:00:00.000000Z",
                    "user": {
                        "id": 1,
                        "name": "John Doe"
                    }
                }
            ]
        }
    }
}
```

### 6. Get Related Products
**GET** `/products/{id}/related`

**Response:**
```json
{
    "status": true,
    "message": "Related products retrieved successfully",
    "data": {
        "products": [
            {
                "id": 2,
                "name": "Related Product",
                "description": "Similar product",
                "selling_price": "89.99",
                "image_url": "https://example.com/image.jpg",
                "average_rating": "4.3",
                "review_count": 8,
                "stock": 30,
                "is_on_sale": false,
                "discount_percentage": 0,
                "category": {
                    "id": 1,
                    "name": "Electronics"
                },
                "subcategory": {
                    "id": 1,
                    "name": "Smartphones"
                }
            }
        ]
    }
}
```

### 7. Add Product Review (Protected)
**POST** `/products/{id}/reviews`

**Headers:**
```
Authorization: Bearer {your-token}
```

**Request Body:**
```json
{
    "rating": 5,
    "content": "Great product! Highly recommended.",
    "type": "review"
}
```

**Response:**
```json
{
    "status": true,
    "message": "Review added successfully",
    "data": {
        "review": {
            "id": 1,
            "rating": 5,
            "content": "Great product! Highly recommended.",
            "type": "review",
            "created_at": "2025-01-01T00:00:00.000000Z"
        }
    }
}
```

---

## Category Endpoints

### 1. Get All Categories
**GET** `/categories`

**Response:**
```json
{
    "status": true,
    "message": "Categories retrieved successfully",
    "data": {
        "categories": [
            {
                "id": 1,
                "name": "Electronics",
                "description": "Electronic devices and gadgets",
                "image_url": "https://example.com/electronics.jpg",
                "subcategories": [
                    {
                        "id": 1,
                        "name": "Smartphones",
                        "description": "Mobile phones",
                        "image_url": "https://example.com/smartphones.jpg"
                    }
                ]
            }
        ]
    }
}
```

### 2. Get Category Details
**GET** `/categories/{id}`

**Response:**
```json
{
    "status": true,
    "message": "Category retrieved successfully",
    "data": {
        "category": {
            "id": 1,
            "name": "Electronics",
            "description": "Electronic devices and gadgets",
            "image_url": "https://example.com/electronics.jpg",
            "subcategories": [
                {
                    "id": 1,
                    "name": "Smartphones",
                    "description": "Mobile phones",
                    "image_url": "https://example.com/smartphones.jpg"
                }
            ],
            "products": [
                {
                    "id": 1,
                    "name": "Product Name",
                    "description": "Product description",
                    "selling_price": "99.99",
                    "image_url": "https://example.com/image.jpg",
                    "average_rating": "4.5",
                    "review_count": 10,
                    "category": {
                        "id": 1,
                        "name": "Electronics"
                    },
                    "subcategory": {
                        "id": 1,
                        "name": "Smartphones"
                    }
                }
            ]
        }
    }
}
```

### 3. Get Subcategory Details
**GET** `/categories/{categoryId}/subcategories/{subcategoryId}`

**Response:**
```json
{
    "status": true,
    "message": "Subcategory retrieved successfully",
    "data": {
        "subcategory": {
            "id": 1,
            "name": "Smartphones",
            "description": "Mobile phones",
            "image_url": "https://example.com/smartphones.jpg",
            "category": {
                "id": 1,
                "name": "Electronics"
            },
            "products": [
                {
                    "id": 1,
                    "name": "Product Name",
                    "description": "Product description",
                    "selling_price": "99.99",
                    "image_url": "https://example.com/image.jpg",
                    "average_rating": "4.5",
                    "review_count": 10,
                    "category": {
                        "id": 1,
                        "name": "Electronics"
                    },
                    "subcategory": {
                        "id": 1,
                        "name": "Smartphones"
                    }
                }
            ]
        }
    }
}
```

### 4. Search Categories
**GET** `/categories/search`

**Query Parameters:**
- `query` (required): Search term

**Response:**
```json
{
    "status": true,
    "message": "Search completed successfully",
    "data": {
        "query": "electronics",
        "categories": [
            {
                "id": 1,
                "name": "Electronics",
                "description": "Electronic devices and gadgets",
                "image_url": "https://example.com/electronics.jpg",
                "subcategories": [
                    {
                        "id": 1,
                        "name": "Smartphones",
                        "description": "Mobile phones",
                        "image_url": "https://example.com/smartphones.jpg"
                    }
                ]
            }
        ]
    }
}
```

---

## Cart Endpoints (Protected)

### 1. Get Cart
**GET** `/cart`

**Headers:**
```
Authorization: Bearer {your-token}
```

**Response:**
```json
{
    "status": true,
    "message": "Cart retrieved successfully",
    "data": {
        "cart": {
            "id": 1,
            "total_items": 3,
            "total_price": "299.97",
            "is_empty": false,
            "items": [
                {
                    "id": 1,
                    "product_id": 1,
                    "quantity": 2,
                    "total_price": "199.98",
                    "product": {
                        "id": 1,
                        "name": "Product Name",
                        "description": "Product description",
                        "selling_price": "99.99",
                        "image_url": "https://example.com/image.jpg",
                        "stock": 50,
                        "category": {
                            "id": 1,
                            "name": "Electronics"
                        },
                        "subcategory": {
                            "id": 1,
                            "name": "Smartphones"
                        }
                    }
                }
            ]
        }
    }
}
```

### 2. Add Item to Cart
**POST** `/cart/items`

**Headers:**
```
Authorization: Bearer {your-token}
```

**Request Body:**
```json
{
    "product_id": 1,
    "quantity": 2
}
```

**Response:**
```json
{
    "status": true,
    "message": "Item added to cart successfully",
    "data": {
        "cart": {
            "id": 1,
            "total_items": 3,
            "total_price": "299.97",
            "is_empty": false,
            "summary": {
                "total_items": 3,
                "total_price": "299.97",
                "item_count": 2,
                "is_empty": false
            }
        }
    }
}
```

### 3. Update Cart Item
**PUT** `/cart/items/{itemId}`

**Headers:**
```
Authorization: Bearer {your-token}
```

**Request Body:**
```json
{
    "quantity": 3
}
```

**Response:**
```json
{
    "status": true,
    "message": "Cart item updated successfully",
    "data": {
        "cart": {
            "id": 1,
            "total_items": 4,
            "total_price": "399.96",
            "is_empty": false,
            "items": [
                {
                    "id": 1,
                    "product_id": 1,
                    "quantity": 3,
                    "total_price": "299.97",
                    "product": {
                        "id": 1,
                        "name": "Product Name",
                        "selling_price": "99.99",
                        "image_url": "https://example.com/image.jpg",
                        "stock": 50
                    }
                }
            ]
        }
    }
}
```

### 4. Remove Cart Item
**DELETE** `/cart/items/{itemId}`

**Headers:**
```
Authorization: Bearer {your-token}
```

**Response:**
```json
{
    "status": true,
    "message": "Cart item removed successfully",
    "data": {
        "cart": {
            "id": 1,
            "total_items": 1,
            "total_price": "99.99",
            "is_empty": false
        }
    }
}
```

### 5. Clear Cart
**DELETE** `/cart`

**Headers:**
```
Authorization: Bearer {your-token}
```

**Response:**
```json
{
    "status": true,
    "message": "Cart cleared successfully",
    "data": {
        "cart": {
            "id": 1,
            "total_items": 0,
            "total_price": "0.00",
            "is_empty": true
        }
    }
}
```

### 6. Get Cart Summary
**GET** `/cart/summary`

**Headers:**
```
Authorization: Bearer {your-token}
```

**Response:**
```json
{
    "status": true,
    "message": "Cart summary retrieved successfully",
    "data": {
        "summary": {
            "total_items": 3,
            "total_price": "299.97",
            "item_count": 2,
            "is_empty": false
        }
    }
}
```

---

## Order Endpoints (Protected)

### 1. Get Orders
**GET** `/orders`

**Headers:**
```
Authorization: Bearer {your-token}
```

**Query Parameters:**
- `per_page` (optional): Number of items per page (default: 10)
- `status` (optional): Filter by status (pending, confirmed, processing, shipped, delivered, cancelled)

**Response:**
```json
{
    "status": true,
    "message": "Orders retrieved successfully",
    "data": {
        "orders": [
            {
                "id": 1,
                "total_amount": "299.97",
                "status": "pending",
                "address": "123 Main St, City, State 12345",
                "latitude": 12.3456789,
                "longitude": 98.7654321,
                "payment_method": "cash",
                "payment_status": "pending",
                "delivery_notes": "Please deliver in the evening",
                "total_items": 3,
                "is_pending": true,
                "is_completed": false,
                "is_cancelled": false,
                "created_at": "2025-01-01T00:00:00.000000Z",
                "items": [
                    {
                        "id": 1,
                        "product_id": 1,
                        "quantity": 2,
                        "price": "99.99",
                        "product": {
                            "id": 1,
                            "name": "Product Name",
                            "image_url": "https://example.com/image.jpg"
                        }
                    }
                ]
            }
        ],
        "pagination": {
            "current_page": 1,
            "last_page": 2,
            "per_page": 10,
            "total": 15
        }
    }
}
```

### 2. Create Order
**POST** `/orders`

**Headers:**
```
Authorization: Bearer {your-token}
```

**Request Body:**
```json
{
    "address": "123 Main St, City, State 12345",
    "latitude": 12.3456789,
    "longitude": 98.7654321,
    "payment_method": "cash",
    "delivery_notes": "Please deliver in the evening"
}
```

**Response:**
```json
{
    "status": true,
    "message": "Order created successfully",
    "data": {
        "order": {
            "id": 1,
            "total_amount": "299.97",
            "status": "pending",
            "address": "123 Main St, City, State 12345",
            "latitude": 12.3456789,
            "longitude": 98.7654321,
            "payment_method": "cash",
            "payment_status": "pending",
            "delivery_notes": "Please deliver in the evening",
            "total_items": 3,
            "created_at": "2025-01-01T00:00:00.000000Z",
            "items": [
                {
                    "id": 1,
                    "product_id": 1,
                    "quantity": 2,
                    "price": "99.99",
                    "product": {
                        "id": 1,
                        "name": "Product Name",
                        "category": {
                            "id": 1,
                            "name": "Electronics"
                        },
                        "subcategory": {
                            "id": 1,
                            "name": "Smartphones"
                        }
                    }
                }
            ]
        }
    }
}
```

### 3. Get Order Details
**GET** `/orders/{id}`

**Headers:**
```
Authorization: Bearer {your-token}
```

**Response:**
```json
{
    "status": true,
    "message": "Order retrieved successfully",
    "data": {
        "order": {
            "id": 1,
            "total_amount": "299.97",
            "status": "pending",
            "address": "123 Main St, City, State 12345",
            "latitude": 12.3456789,
            "longitude": 98.7654321,
            "payment_method": "cash",
            "payment_status": "pending",
            "delivery_notes": "Please deliver in the evening",
            "total_items": 3,
            "is_pending": true,
            "is_completed": false,
            "is_cancelled": false,
            "created_at": "2025-01-01T00:00:00.000000Z",
            "items": [
                {
                    "id": 1,
                    "product_id": 1,
                    "quantity": 2,
                    "price": "99.99",
                    "product": {
                        "id": 1,
                        "name": "Product Name",
                        "image_url": "https://example.com/image.jpg",
                        "category": {
                            "id": 1,
                            "name": "Electronics"
                        },
                        "subcategory": {
                            "id": 1,
                            "name": "Smartphones"
                        }
                    }
                }
            ]
        }
    }
}
```

### 4. Cancel Order
**POST** `/orders/{id}/cancel`

**Headers:**
```
Authorization: Bearer {your-token}
```

**Response:**
```json
{
    "status": true,
    "message": "Order cancelled successfully",
    "data": {
        "order": {
            "id": 1,
            "status": "cancelled",
            "is_cancelled": true
        }
    }
}
```

### 5. Track Order
**GET** `/orders/{id}/track`

**Headers:**
```
Authorization: Bearer {your-token}
```

**Response:**
```json
{
    "status": true,
    "message": "Order tracking retrieved successfully",
    "data": {
        "tracking": {
            "order_id": 1,
            "status": "processing",
            "current_status": "Order is being processed",
            "timeline": [
                {
                    "status": "pending",
                    "message": "Order placed",
                    "timestamp": "2025-01-01T00:00:00.000000Z"
                },
                {
                    "status": "confirmed",
                    "message": "Order confirmed",
                    "timestamp": "2025-01-01T01:00:00.000000Z"
                },
                {
                    "status": "processing",
                    "message": "Order is being processed",
                    "timestamp": "2025-01-01T02:00:00.000000Z"
                }
            ]
        }
    }
}
```

### 6. Get Order Statistics
**GET** `/orders/statistics`

**Headers:**
```
Authorization: Bearer {your-token}
```

**Response:**
```json
{
    "status": true,
    "message": "Order statistics retrieved successfully",
    "data": {
        "statistics": {
            "total_orders": 15,
            "pending_orders": 3,
            "completed_orders": 10,
            "cancelled_orders": 2,
            "total_spent": "1499.85",
            "average_order_value": "99.99"
        }
    }
}
```

---

## Service Endpoints

### 1. Get All Services
**GET** `/services`

**Query Parameters:**
- `per_page` (optional): Number of items per page (default: 12)
- `category_id` (optional): Filter by category

**Response:**
```json
{
    "status": true,
    "message": "Services retrieved successfully",
    "data": {
        "services": [
            {
                "id": 1,
                "name": "Service Name",
                "description": "Service description",
                "image_url": "https://example.com/service.jpg",
                "uploaded_date": "2025-01-01",
                "created_date": "2025-01-01",
                "videos_count": 5,
                "videos": [
                    {
                        "id": 1,
                        "title": "Video Title",
                        "description": "Video description",
                        "video_url": "https://example.com/video.mp4",
                        "thumbnail_url": "https://example.com/thumbnail.jpg",
                        "duration": 300,
                        "views": 1000,
                        "comments_count": 25,
                        "created_at": "2025-01-01T00:00:00.000000Z"
                    }
                ]
            }
        ],
        "pagination": {
            "current_page": 1,
            "last_page": 3,
            "per_page": 12,
            "total": 35
        }
    }
}
```

### 2. Get Featured Services
**GET** `/services/featured`

**Response:**
```json
{
    "status": true,
    "message": "Featured services retrieved successfully",
    "data": {
        "services": [
            {
                "id": 1,
                "name": "Featured Service",
                "description": "Popular service",
                "image_url": "https://example.com/service.jpg",
                "uploaded_date": "2025-01-01",
                "created_date": "2025-01-01",
                "videos_count": 5,
                "videos": [
                    {
                        "id": 1,
                        "title": "Video Title",
                        "description": "Video description",
                        "video_url": "https://example.com/video.mp4",
                        "thumbnail_url": "https://example.com/thumbnail.jpg",
                        "duration": 300,
                        "views": 1000,
                        "comments_count": 25,
                        "created_at": "2025-01-01T00:00:00.000000Z"
                    }
                ]
            }
        ]
    }
}
```

### 3. Search Services
**GET** `/services/search`

**Query Parameters:**
- `query` (required): Search term

**Response:**
```json
{
    "status": true,
    "message": "Search completed successfully",
    "data": {
        "query": "tutorial",
        "services": [
            {
                "id": 1,
                "name": "Tutorial Service",
                "description": "Educational tutorials",
                "image_url": "https://example.com/service.jpg",
                "uploaded_date": "2025-01-01",
                "created_date": "2025-01-01",
                "videos_count": 5,
                "videos": [
                    {
                        "id": 1,
                        "title": "Tutorial Video",
                        "description": "How to use the product",
                        "video_url": "https://example.com/video.mp4",
                        "thumbnail_url": "https://example.com/thumbnail.jpg",
                        "duration": 300,
                        "views": 1000,
                        "comments_count": 25,
                        "created_at": "2025-01-01T00:00:00.000000Z"
                    }
                ]
            }
        ]
    }
}
```

### 4. Get Service Details
**GET** `/services/{id}`

**Response:**
```json
{
    "status": true,
    "message": "Service retrieved successfully",
    "data": {
        "service": {
            "id": 1,
            "name": "Service Name",
            "description": "Detailed service description",
            "image_url": "https://example.com/service.jpg",
            "uploaded_date": "2025-01-01",
            "created_date": "2025-01-01",
            "videos_count": 5,
            "videos": [
                {
                    "id": 1,
                    "title": "Video Title",
                    "description": "Video description",
                    "video_url": "https://example.com/video.mp4",
                    "thumbnail_url": "https://example.com/thumbnail.jpg",
                    "duration": 300,
                    "views": 1000,
                    "comments_count": 25,
                    "created_at": "2025-01-01T00:00:00.000000Z"
                }
            ]
        }
    }
}
```

### 5. Get Video Details
**GET** `/services/{serviceId}/videos/{videoId}`

**Response:**
```json
{
    "status": true,
    "message": "Video retrieved successfully",
    "data": {
        "video": {
            "id": 1,
            "title": "Video Title",
            "description": "Detailed video description",
            "video_url": "https://example.com/video.mp4",
            "thumbnail_url": "https://example.com/thumbnail.jpg",
            "duration": 300,
            "views": 1000,
            "comments_count": 25,
            "created_at": "2025-01-01T00:00:00.000000Z",
            "service": {
                "id": 1,
                "name": "Service Name"
            },
            "comments": [
                {
                    "id": 1,
                    "comment": "Great video! Very helpful.",
                    "created_at": "2025-01-01T00:00:00.000000Z",
                    "user": {
                        "id": 1,
                        "name": "John Doe"
                    }
                }
            ]
        }
    }
}
```

### 6. Add Video Comment (Protected)
**POST** `/services/{serviceId}/videos/{videoId}/comments`

**Headers:**
```
Authorization: Bearer {your-token}
```

**Request Body:**
```json
{
    "comment": "Great video! Very helpful."
}
```

**Response:**
```json
{
    "status": true,
    "message": "Comment added successfully",
    "data": {
        "comment": {
            "id": 1,
            "comment": "Great video! Very helpful.",
            "created_at": "2025-01-01T00:00:00.000000Z"
        }
    }
}
```

---

## Notification Endpoints (Protected)

### 1. Get Notifications
**GET** `/notifications`

**Headers:**
```
Authorization: Bearer {your-token}
```

**Query Parameters:**
- `per_page` (optional): Number of items per page (default: 20)
- `type` (optional): Filter by type (all, unread, read)

**Response:**
```json
{
    "status": true,
    "message": "Notifications retrieved successfully",
    "data": {
        "notifications": [
            {
                "id": 1,
                "title": "New Product Available",
                "message": "Check out our latest product!",
                "type": "product",
                "data": {
                    "product_id": 1,
                    "product_name": "New Product"
                },
                "is_read": false,
                "read_at": null,
                "created_at": "2025-01-01T00:00:00.000000Z"
            }
        ],
        "pagination": {
            "current_page": 1,
            "last_page": 2,
            "per_page": 20,
            "total": 35
        }
    }
}
```

### 2. Get Notification Details
**GET** `/notifications/{id}`

**Headers:**
```
Authorization: Bearer {your-token}
```

**Response:**
```json
{
    "status": true,
    "message": "Notification retrieved successfully",
    "data": {
        "notification": {
            "id": 1,
            "title": "New Product Available",
            "message": "Check out our latest product!",
            "type": "product",
            "data": {
                "product_id": 1,
                "product_name": "New Product"
            },
            "is_read": true,
            "read_at": "2025-01-01T01:00:00.000000Z",
            "created_at": "2025-01-01T00:00:00.000000Z"
        }
    }
}
```

### 3. Mark Notification as Read
**POST** `/notifications/{id}/read`

**Headers:**
```
Authorization: Bearer {your-token}
```

**Response:**
```json
{
    "status": true,
    "message": "Notification marked as read successfully",
    "data": {
        "notification": {
            "id": 1,
            "title": "New Product Available",
            "message": "Check out our latest product!",
            "type": "product",
            "data": {
                "product_id": 1,
                "product_name": "New Product"
            },
            "is_read": true,
            "read_at": "2025-01-01T01:00:00.000000Z",
            "created_at": "2025-01-01T00:00:00.000000Z"
        }
    }
}
```

### 4. Mark All Notifications as Read
**POST** `/notifications/read-all`

**Headers:**
```
Authorization: Bearer {your-token}
```

**Response:**
```json
{
    "status": true,
    "message": "All notifications marked as read successfully",
    "data": {
        "marked_count": 5
    }
}
```

### 5. Delete Notification
**DELETE** `/notifications/{id}`

**Headers:**
```
Authorization: Bearer {your-token}
```

**Response:**
```json
{
    "status": true,
    "message": "Notification deleted successfully"
}
```

### 6. Clear All Notifications
**DELETE** `/notifications`

**Headers:**
```
Authorization: Bearer {your-token}
```

**Response:**
```json
{
    "status": true,
    "message": "All notifications cleared successfully",
    "data": {
        "deleted_count": 10
    }
}
```

### 7. Get Notification Statistics
**GET** `/notifications/statistics`

**Headers:**
```
Authorization: Bearer {your-token}
```

**Response:**
```json
{
    "status": true,
    "message": "Notification statistics retrieved successfully",
    "data": {
        "statistics": {
            "total_notifications": 25,
            "unread_notifications": 5,
            "read_notifications": 20
        }
    }
}
```

---

## Error Responses

### Validation Error (422)
```json
{
    "status": false,
    "message": "Validation failed",
    "errors": {
        "email": ["The email field is required."],
        "password": ["The password must be at least 6 characters."]
    }
}
```

### Unauthorized (401)
```json
{
    "status": false,
    "message": "Unauthorized access"
}
```

### Not Found (404)
```json
{
    "status": false,
    "message": "Product not found"
}
```

### Server Error (500)
```json
{
    "status": false,
    "message": "Failed to retrieve products",
    "error": "Database connection error"
}
```

---

## Status Codes

- **200**: Success
- **201**: Created
- **400**: Bad Request
- **401**: Unauthorized
- **403**: Forbidden
- **404**: Not Found
- **422**: Validation Error
- **500**: Internal Server Error

---

## Rate Limiting

The API implements rate limiting to prevent abuse:
- **Public endpoints**: 60 requests per minute
- **Protected endpoints**: 120 requests per minute

---

## Pagination

All list endpoints support pagination with the following parameters:
- `per_page`: Number of items per page (default varies by endpoint)
- `page`: Page number (default: 1)

Pagination response includes:
```json
{
    "current_page": 1,
    "last_page": 5,
    "per_page": 12,
    "total": 60,
    "from": 1,
    "to": 12
}
```

---

## File Upload

For file uploads (if applicable), use `multipart/form-data` content type.

---
