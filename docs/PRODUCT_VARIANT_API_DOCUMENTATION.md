# Product & Product Variant API Documentation

## Overview

This document provides comprehensive documentation for the Product and Product Variant APIs in the B2C system. These APIs allow clients to retrieve product information, filter products, and manage product variants with their attributes.

## Base URL

```
/api/b2c
```

## Authentication

Most product endpoints are public and don't require authentication. However, some endpoints like adding reviews require user authentication.

## Product API Endpoints

### 1. Get All Products

**Endpoint:** `GET /products`

**Description:** Retrieve all active products with pagination and filtering options.

**Query Parameters:**
- `per_page` (optional): Number of products per page (default: 12, max: 100)
- `sort_by` (optional): Sort field (default: created_at)
  - Options: `created_at`, `selling_price`, `average_rating`, `review_count`
- `sort_order` (optional): Sort direction (default: desc)
  - Options: `asc`, `desc`
- `category_id` (optional): Filter by category ID
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
          "name": "Category Name"
        },
        "main_variant": {
          "id": 1,
          "sku": "PROD-001",
          "price": "99.99",
          "stock": 50,
          "image_url": "https://example.com/variant-image.jpg"
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

**Endpoint:** `GET /products/featured`

**Description:** Retrieve featured products (highly rated products with sufficient reviews).

**Query Parameters:**
- `limit` (optional): Number of products to return (default: 8)

**Response:**
```json
{
  "status": true,
  "message": "Featured products retrieved successfully",
  "data": {
    "products": [...]
  }
}
```

### 3. Get Products on Sale

**Endpoint:** `GET /products/on-sale`

**Description:** Retrieve products that are currently on sale (discounted).

**Query Parameters:**
- `per_page` (optional): Number of products per page (default: 12)
- `sort_by` (optional): Sort field (default: discount_percentage)
- `sort_order` (optional): Sort direction (default: desc)

**Response:**
```json
{
  "status": true,
  "message": "Products on sale retrieved successfully",
  "data": {
    "products": [
      {
        "id": 1,
        "name": "Product Name",
        "selling_price": "79.99",
        "is_on_sale": true,
        "discount_percentage": 20,
        "original_price": "99.99",
        ...
      }
    ],
    "pagination": {...}
  }
}
```

### 4. Search Products

**Endpoint:** `GET /products/search`

**Description:** Search products by name, description, or key features.

**Query Parameters:**
- `query` (required): Search term (minimum 2 characters)
- `per_page` (optional): Number of products per page (default: 12)

**Response:**
```json
{
  "status": true,
  "message": "Search completed successfully",
  "data": {
    "query": "search term",
    "products": [...],
    "pagination": {...}
  }
}
```

### 5. Get Product by ID

**Endpoint:** `GET /products/{id}`

**Description:** Retrieve detailed information about a specific product including variants and reviews.

**Response:**
```json
{
  "status": true,
  "message": "Product retrieved successfully",
  "data": {
    "product": {
      "id": 1,
      "name": "Product Name",
      "description": "Product description",
      "key_features": "Key features text",
      "selling_price": "99.99",
      "cost_price": "80.00",
      "image_url": "https://example.com/image.jpg",
      "average_rating": "4.5",
      "review_count": 10,
      "stock": 50,
      "is_on_sale": false,
      "discount_percentage": 0,
      "category": {
        "id": 1,
        "name": "Category Name"
      },
      "variants": [
        {
          "id": 1,
          "sku": "PROD-001-RED-L",
          "price": "99.99",
          "stock": 25,
          "image_url": "https://example.com/variant-image.jpg",
          "images": [
            {
              "id": 1,
              "image_url": "https://example.com/image1.jpg",
              "type": "primary",
              "is_primary": true
            }
          ]
        }
      ],
      "reviews": [
        {
          "id": 1,
          "rating": 5,
          "content": "Great product!",
          "type": "review",
          "created_at": "2024-01-01T00:00:00.000000Z",
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

**Endpoint:** `GET /products/{id}/related`

**Description:** Retrieve products related to the specified product (same category).

**Response:**
```json
{
  "status": true,
  "message": "Related products retrieved successfully",
  "data": {
    "products": [...]
  }
}
```

### 7. Get Products by Category

**Endpoint:** `GET /products/category/{categoryId}`

**Description:** Retrieve products filtered by category with additional filtering options.

**Query Parameters:**
- `per_page` (optional): Number of products per page (default: 12)
- `sort_by` (optional): Sort field (default: created_at)
- `sort_order` (optional): Sort direction (default: desc)
- `min_price` (optional): Minimum price filter
- `max_price` (optional): Maximum price filter
- `rating` (optional): Minimum rating filter

**Response:**
```json
{
  "status": true,
  "message": "Products by category retrieved successfully",
  "data": {
    "category_id": 1,
    "products": [...],
    "pagination": {...}
  }
}
```

### 8. Get Products by Price Range

**Endpoint:** `GET /products/price-range`

**Description:** Retrieve products within a specific price range.

**Query Parameters:**
- `min_price` (required): Minimum price
- `max_price` (required): Maximum price
- `per_page` (optional): Number of products per page (default: 12)
- `sort_by` (optional): Sort field (default: selling_price)
- `sort_order` (optional): Sort direction (default: asc)

**Response:**
```json
{
  "status": true,
  "message": "Products by price range retrieved successfully",
  "data": {
    "filters": {
      "min_price": 50,
      "max_price": 100,
      "sort_by": "selling_price",
      "sort_order": "asc"
    },
    "products": [...],
    "pagination": {...}
  }
}
```

### 9. Get Products by Rating

**Endpoint:** `GET /products/by-rating`

**Description:** Retrieve products with a minimum rating.

**Query Parameters:**
- `rating` (required): Minimum rating (1-5)
- `per_page` (optional): Number of products per page (default: 12)
- `sort_by` (optional): Sort field (default: average_rating)
- `sort_order` (optional): Sort direction (default: desc)

**Response:**
```json
{
  "status": true,
  "message": "Products by rating retrieved successfully",
  "data": {
    "filters": {
      "rating": 4,
      "sort_by": "average_rating",
      "sort_order": "desc"
    },
    "products": [...],
    "pagination": {...}
  }
}
```

### 10. Get Product Statistics

**Endpoint:** `GET /products/statistics`

**Description:** Retrieve overall product statistics and analytics.

**Response:**
```json
{
  "status": true,
  "message": "Product statistics retrieved successfully",
  "data": {
    "overview": {
      "total_products": 150,
      "in_stock_products": 120,
      "on_sale_products": 25,
      "featured_products": 30
    },
    "price_ranges": {
      "under_50": 20,
      "50_to_100": 35,
      "100_to_200": 45,
      "200_to_500": 30,
      "above_500": 20
    },
    "rating_ranges": {
      "5_star": 40,
      "4_star": 60,
      "3_star": 30,
      "below_3": 20
    }
  }
}
```

### 11. Add Product Review (Authenticated)

**Endpoint:** `POST /products/{id}/reviews`

**Description:** Add a review or comment to a product (requires authentication).

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
      "created_at": "2024-01-01T00:00:00.000000Z"
    }
  }
}
```

## Product Variant API Endpoints

### 1. Get Product Variants

**Endpoint:** `GET /products/{productId}/variants`

**Description:** Retrieve all variants for a specific product.

**Response:**
```json
{
  "status": true,
  "message": "Product variants retrieved successfully",
  "data": {
    "product": {
      "id": 1,
      "name": "Product Name",
      "slug": "product-name"
    },
    "variants": [
      {
        "id": 1,
        "sku": "PROD-001-RED-L",
        "price": "99.99",
        "stock": 25,
        "is_in_stock": true,
        "image_url": "https://example.com/variant-image.jpg",
        "attributes": [
          {
            "attribute_id": 1,
            "attribute_name": "Color",
            "value_id": 1,
            "value_name": "Red",
            "sub_attribute": {
              "id": 1,
              "name": "Primary"
            }
          },
          {
            "attribute_id": 2,
            "attribute_name": "Size",
            "value_id": 3,
            "value_name": "Large",
            "sub_attribute": null
          }
        ]
      }
    ]
  }
}
```

### 2. Get Specific Variant

**Endpoint:** `GET /products/{productId}/variants/{variantId}`

**Description:** Retrieve detailed information about a specific variant.

**Response:**
```json
{
  "status": true,
  "message": "Product variant retrieved successfully",
  "data": {
    "product": {
      "id": 1,
      "name": "Product Name",
      "slug": "product-name"
    },
    "variant": {
      "id": 1,
      "sku": "PROD-001-RED-L",
      "price": "99.99",
      "stock": 25,
      "is_in_stock": true,
      "image_url": "https://example.com/variant-image.jpg",
      "attributes": [...],
      "images": [
        {
          "id": 1,
          "image_url": "https://example.com/image1.jpg",
          "type": "primary",
          "is_primary": true
        },
        {
          "id": 2,
          "image_url": "https://example.com/image2.jpg",
          "type": "secondary",
          "is_primary": false
        }
      ]
    }
  }
}
```

### 3. Get Variants by Attributes

**Endpoint:** `GET /products/{productId}/variants/by-attributes`

**Description:** Retrieve variants filtered by specific attribute combinations.

**Query Parameters:**
- `attributes` (required): Array of attribute filters

**Request Body:**
```json
{
  "attributes": [
    {
      "attribute_id": 1,
      "value_id": 1
    },
    {
      "attribute_id": 2,
      "value_id": 3
    }
  ]
}
```

**Response:**
```json
{
  "status": true,
  "message": "Product variants retrieved successfully",
  "data": {
    "product": {
      "id": 1,
      "name": "Product Name",
      "slug": "product-name"
    },
    "variants": [...]
  }
}
```

### 4. Get Attribute Combinations

**Endpoint:** `GET /products/{productId}/variants/attribute-combinations`

**Description:** Retrieve all available attribute combinations for a product.

**Response:**
```json
{
  "status": true,
  "message": "Attribute combinations retrieved successfully",
  "data": {
    "product": {
      "id": 1,
      "name": "Product Name",
      "slug": "product-name"
    },
    "attributes": [
      {
        "id": 1,
        "name": "Color",
        "values": [
          {
            "id": 1,
            "name": "Red"
          },
          {
            "id": 2,
            "name": "Blue"
          }
        ]
      },
      {
        "id": 2,
        "name": "Size",
        "values": [
          {
            "id": 3,
            "name": "Small"
          },
          {
            "id": 4,
            "name": "Large"
          }
        ]
      }
    ],
    "combinations": [
      {
        "variant_id": 1,
        "sku": "PROD-001-RED-L",
        "price": "99.99",
        "stock": 25,
        "image_url": "https://example.com/variant-image.jpg",
        "combination": [
          {
            "attribute_id": 1,
            "attribute_name": "Color",
            "value_id": 1,
            "value_name": "Red"
          },
          {
            "attribute_id": 2,
            "attribute_name": "Size",
            "value_id": 4,
            "value_name": "Large"
          }
        ]
      }
    ]
  }
}
```

### 5. Get Variants by Price Range

**Endpoint:** `GET /products/{productId}/variants/by-price-range`

**Description:** Retrieve variants within a specific price range.

**Query Parameters:**
- `min_price` (optional): Minimum price
- `max_price` (optional): Maximum price
- `sort_by` (optional): Sort field (default: price)
  - Options: `price`, `stock`, `created_at`
- `sort_order` (optional): Sort direction (default: asc)

**Response:**
```json
{
  "status": true,
  "message": "Product variants retrieved successfully",
  "data": {
    "product": {
      "id": 1,
      "name": "Product Name",
      "slug": "product-name"
    },
    "filters": {
      "min_price": 50,
      "max_price": 100,
      "sort_by": "price",
      "sort_order": "asc"
    },
    "variants": [...]
  }
}
```

### 6. Get Variant Stock Status

**Endpoint:** `GET /products/{productId}/variants/{variantId}/stock-status`

**Description:** Retrieve stock status information for a specific variant.

**Response:**
```json
{
  "status": true,
  "message": "Stock status retrieved successfully",
  "data": {
    "variant_id": 1,
    "sku": "PROD-001-RED-L",
    "stock": 25,
    "is_in_stock": true,
    "stock_status": "in_stock"
  }
}
```

## Error Responses

All endpoints return consistent error responses:

### Validation Error (422)
```json
{
  "status": false,
  "message": "Validation failed",
  "errors": {
    "field_name": ["Error message"]
  }
}
```

### Not Found Error (404)
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
  "error": "Error details"
}
```

## Rate Limiting

- Public endpoints: 60 requests per minute
- Authenticated endpoints: 120 requests per minute

## Pagination

All list endpoints support pagination with the following parameters:
- `per_page`: Number of items per page (default: 12, max: 100)
- `page`: Page number (default: 1)

Pagination metadata is included in the response:
```json
{
  "pagination": {
    "current_page": 1,
    "last_page": 5,
    "per_page": 12,
    "total": 60,
    "from": 1,
    "to": 12
  }
}
```

## Filtering and Sorting

### Product Filtering Options:
- Category filtering
- Price range filtering
- Rating filtering
- Stock availability
- Sale status

### Product Sorting Options:
- `created_at` (newest/oldest)
- `selling_price` (low to high/high to low)
- `average_rating` (highest/lowest)
- `review_count` (most/least reviewed)

### Variant Filtering Options:
- Attribute combinations
- Price range
- Stock availability

### Variant Sorting Options:
- `price` (low to high/high to low)
- `stock` (most/least in stock)
- `created_at` (newest/oldest)

## Best Practices

1. **Use pagination** for large datasets to improve performance
2. **Implement caching** for frequently accessed data
3. **Use specific endpoints** rather than filtering large datasets
4. **Handle errors gracefully** and provide user-friendly messages
5. **Validate input data** before making API calls
6. **Use appropriate HTTP status codes** for different scenarios
7. **Implement rate limiting** to prevent abuse
8. **Cache attribute combinations** as they don't change frequently
9. **Use stock status endpoints** for real-time inventory checks
10. **Implement proper error logging** for debugging

## Examples

### Example 1: Get Products with Filters
```bash
GET /api/b2c/products?category_id=1&min_price=50&max_price=100&sort_by=selling_price&sort_order=asc&per_page=20
```

### Example 2: Search Products
```bash
GET /api/b2c/products/search?query=wireless&per_page=10
```

### Example 3: Get Product Variants by Attributes
```bash
POST /api/b2c/products/1/variants/by-attributes
Content-Type: application/json

{
  "attributes": [
    {"attribute_id": 1, "value_id": 1},
    {"attribute_id": 2, "value_id": 3}
  ]
}
```

### Example 4: Get Variant Stock Status
```bash
GET /api/b2c/products/1/variants/5/stock-status
```

This comprehensive API provides all the functionality needed for a modern e-commerce application with flexible product and variant management. 