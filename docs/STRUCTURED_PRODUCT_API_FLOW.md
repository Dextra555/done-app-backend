# Structured Product API Flow Documentation

## Overview

This document outlines the new structured API flow for handling products, attributes, and variants separately in the B2C API. The new structure provides better separation of concerns and more organized responses.

## API Structure

### 1. Product Information (Basic)
**Endpoint:** `GET /api/b2c/products/{id}`

Returns comprehensive product information with structured sections:

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
      "slug": "product-slug",
      "image_url": "main_image_url",
      "status": "active",
      "is_featured": true,
      "created_at": "2024-01-01T00:00:00.000000Z",
      "updated_at": "2024-01-01T00:00:00.000000Z",
      
      "category": {
        "id": 1,
        "name": "Category Name",
        "description": "Category description",
        "image_url": "category_image_url",
        "slug": "category-slug"
      },
      
      "pricing": {
        "selling_price": 99.99,
        "cost_price": 79.99,
        "original_price": 129.99,
        "is_on_sale": true,
        "discount_percentage": 23.08
      },
      
      "rating": {
        "average_rating": 4.5,
        "review_count": 25
      },
      
      "stock": {
        "total_stock": 150,
        "is_in_stock": true
      }
    },
    
    "attributes": {
      "summary": {
        "total_attributes": 3,
        "total_attribute_values": 12,
        "attributes_with_sub_attributes": 1
      },
      "groups": [
        {
          "id": 1,
          "name": "color",
          "display_name": "Color",
          "type": "select",
          "is_required": true,
          "total_variants_with_this_attribute": 8,
          "values": [
            {
              "id": 1,
              "value": "red",
              "display_value": "Red",
              "sub_attribute_id": null,
              "sub_attribute_name": null,
              "variant_count": 3,
              "is_available": true
            }
          ]
        }
      ]
    },
    
    "variants": {
      "summary": {
        "total_variants": 8,
        "active_variants": 8,
        "in_stock_variants": 6,
        "on_sale_variants": 2,
        "price_range": {
          "min": 89.99,
          "max": 129.99
        }
      },
      "list": [
        {
          "id": 1,
          "sku": "PROD-001-RED-L",
          "price": 99.99,
          "selling_price": 99.99,
          "original_price": 129.99,
          "cost_price": 79.99,
          "stock": 25,
          "min_stock": 5,
          "weight": 0.5,
          "dimensions": {
            "length": 10,
            "width": 5,
            "height": 2
          },
          "is_active": true,
          "is_featured": false,
          "is_in_stock": true,
          "image_url": "variant_image_url",
          "images": [
            {
              "id": 1,
              "image_url": "image_url",
              "type": "primary",
              "alt_text": "Red Large Product",
              "sort_order": 1
            }
          ],
          "attributes": [
            {
              "attribute_id": 1,
              "attribute_name": "color",
              "value_id": 1,
              "value": "red",
              "sub_attribute_id": null,
              "sub_attribute_name": null
            }
          ]
        }
      ]
    },
    
    "attribute_combinations": {
      "summary": {
        "total_combinations": 8,
        "combinations_with_stock": 6
      },
      "combinations": [
        {
          "combination_id": "abc123",
          "combination_name": "Red + Large",
          "attributes": [
            {
              "attribute_id": 1,
              "attribute_name": "color",
              "value_id": 1,
              "value": "red",
              "sub_attribute_id": null,
              "sub_attribute_name": null
            }
          ],
          "variants": [
            {
              "variant_id": 1,
              "sku": "PROD-001-RED-L",
              "price": 99.99,
              "selling_price": 99.99,
              "original_price": 129.99,
              "stock": 25,
              "is_in_stock": true,
              "image_url": "variant_image_url",
              "is_active": true
            }
          ]
        }
      ]
    },
    
    "reviews": {
      "summary": {
        "total_reviews": 25,
        "average_rating": 4.5,
        "rating_distribution": {
          "1": {"count": 0, "percentage": 0},
          "2": {"count": 1, "percentage": 4},
          "3": {"count": 2, "percentage": 8},
          "4": {"count": 8, "percentage": 32},
          "5": {"count": 14, "percentage": 56}
        },
        "verified_reviews": 20,
        "recent_reviews": 5
      },
      "list": [
        {
          "id": 1,
          "rating": 5,
          "content": "Great product!",
          "type": "review",
          "is_verified": true,
          "helpful_count": 3,
          "created_at": "2024-01-01T00:00:00.000000Z",
          "updated_at": "2024-01-01T00:00:00.000000Z",
          "user": {
            "id": 1,
            "name": "John Doe",
            "email": "john@example.com",
            "avatar": "avatar_url"
          }
        }
      ]
    }
  }
}
```

### 2. Product Attributes (Separate Endpoint)
**Endpoint:** `GET /api/b2c/products/{productId}/product-attributes`

Returns only the attributes and combinations for a product:

```json
{
  "status": true,
  "message": "Product attributes retrieved successfully",
  "data": {
    "product": {
      "id": 1,
      "name": "Product Name",
      "slug": "product-slug"
    },
    "attributes": {
      "summary": {
        "total_attributes": 3,
        "total_attribute_values": 12,
        "attributes_with_sub_attributes": 1
      },
      "groups": [
        {
          "id": 1,
          "name": "color",
          "display_name": "Color",
          "type": "select",
          "is_required": true,
          "total_variants_with_this_attribute": 8,
          "values": [
            {
              "id": 1,
              "value": "red",
              "display_value": "Red",
              "sub_attribute_id": null,
              "sub_attribute_name": null,
              "variant_count": 3,
              "is_available": true
            }
          ]
        }
      ]
    },
    "combinations": {
      "summary": {
        "total_combinations": 8,
        "combinations_with_stock": 6
      },
      "list": [
        {
          "combination_id": "abc123",
          "combination_name": "Red + Large",
          "attributes": [
            {
              "attribute_id": 1,
              "attribute_name": "color",
              "value_id": 1,
              "value": "red",
              "sub_attribute_id": null,
              "sub_attribute_name": null
            }
          ],
          "variants": [
            {
              "variant_id": 1,
              "sku": "PROD-001-RED-L",
              "price": 99.99,
              "selling_price": 99.99,
              "original_price": 129.99,
              "stock": 25,
              "is_in_stock": true,
              "image_url": "variant_image_url",
              "is_active": true
            }
          ]
        }
      ]
    }
  }
}
```

### 3. Product Variants (Separate Endpoint)
**Endpoint:** `GET /api/b2c/products/{productId}/product-variants`

Returns only the variants for a product with filtering and sorting options:

**Query Parameters:**
- `min_price` (optional): Minimum price filter
- `max_price` (optional): Maximum price filter
- `in_stock_only` (optional): Filter only in-stock variants
- `active_only` (optional): Filter only active variants
- `sort_by` (optional): Sort field (price, stock, created_at)
- `sort_order` (optional): Sort order (asc, desc)

```json
{
  "status": true,
  "message": "Product variants retrieved successfully",
  "data": {
    "product": {
      "id": 1,
      "name": "Product Name",
      "slug": "product-slug"
    },
    "filters": {
      "applied": {
        "min_price": 50,
        "max_price": 150,
        "in_stock_only": true,
        "active_only": true
      },
      "sort_by": "price",
      "sort_order": "asc"
    },
    "variants": {
      "summary": {
        "total_variants": 8,
        "active_variants": 8,
        "in_stock_variants": 6,
        "on_sale_variants": 2,
        "price_range": {
          "min": 89.99,
          "max": 129.99
        },
        "stock_range": {
          "min": 0,
          "max": 50
        }
      },
      "list": [
        {
          "id": 1,
          "sku": "PROD-001-RED-L",
          "price": 99.99,
          "selling_price": 99.99,
          "original_price": 129.99,
          "cost_price": 79.99,
          "stock": 25,
          "min_stock": 5,
          "weight": 0.5,
          "dimensions": {
            "length": 10,
            "width": 5,
            "height": 2
          },
          "is_active": true,
          "is_featured": false,
          "is_in_stock": true,
          "is_on_sale": true,
          "discount_percentage": 23.08,
          "image_url": "variant_image_url",
          "images": [
            {
              "id": 1,
              "image_url": "image_url",
              "type": "primary",
              "alt_text": "Red Large Product",
              "sort_order": 1
            }
          ],
          "attributes": [
            {
              "attribute_id": 1,
              "attribute_name": "color",
              "value_id": 1,
              "value": "red",
              "sub_attribute_id": null,
              "sub_attribute_name": null
            }
          ]
        }
      ],
      "grouped_by_attributes": [
        {
          "attribute_combination": [
            {
              "attribute_name": "color",
              "value": "red",
              "sub_attribute": null
            },
            {
              "attribute_name": "size",
              "value": "large",
              "sub_attribute": null
            }
          ],
          "variants": [
            {
              "id": 1,
              "sku": "PROD-001-RED-L",
              "price": 99.99,
              "selling_price": 99.99,
              "original_price": 129.99,
              "cost_price": 79.99,
              "stock": 25,
              "min_stock": 5,
              "weight": 0.5,
              "dimensions": {
                "length": 10,
                "width": 5,
                "height": 2
              },
              "is_active": true,
              "is_featured": false,
              "is_in_stock": true,
              "is_on_sale": true,
              "discount_percentage": 23.08,
              "image_url": "variant_image_url",
              "images": [...],
              "attributes": [...]
            }
          ]
        }
      ]
    }
  }
}
```

## Benefits of the New Structure

### 1. **Separation of Concerns**
- Product information is separate from attributes and variants
- Each endpoint has a specific purpose
- Easier to maintain and extend

### 2. **Better Performance**
- Load only what you need
- Reduced payload size for specific use cases
- Optimized queries for each endpoint

### 3. **Frontend Flexibility**
- Product listing can use basic product info
- Product detail page can load full information
- Attribute selector can load only attributes
- Variant selector can load only variants

### 4. **Structured Data**
- Clear organization of data
- Consistent response format
- Easy to understand and implement

## Usage Examples

### Frontend Implementation

#### 1. Product Listing Page
```javascript
// Load basic product information
const products = await fetch('/api/b2c/products?per_page=12');
```

#### 2. Product Detail Page
```javascript
// Load full product information
const product = await fetch('/api/b2c/products/1');
```

#### 3. Attribute Selector Component
```javascript
// Load only attributes for product configurator
const attributes = await fetch('/api/b2c/products/1/product-attributes');
```

#### 4. Variant Selector Component
```javascript
// Load only variants with filtering
const variants = await fetch('/api/b2c/products/1/product-variants?in_stock_only=true&sort_by=price&sort_order=asc');
```

#### 5. Product Configurator
```javascript
// Load attributes and combinations for configurator
const configurator = await fetch('/api/b2c/products/1/product-attributes');
// Use combinations data to show available options
```

## Migration Guide

### From Old Structure to New Structure

#### Old: Single Product Endpoint
```javascript
// Old way - everything in one response
const product = await fetch('/api/b2c/products/1');
// Large response with mixed data
```

#### New: Structured Endpoints
```javascript
// New way - load what you need
const product = await fetch('/api/b2c/products/1'); // Basic info
const attributes = await fetch('/api/b2c/products/1/product-attributes'); // Attributes only
const variants = await fetch('/api/b2c/products/1/product-variants'); // Variants only
```

### Backward Compatibility

The old endpoints are still available for backward compatibility:
- `GET /api/b2c/products/{id}` - Full product with all data
- `GET /api/b2c/products/{productId}/attributes` - Old attributes endpoint
- `GET /api/b2c/products/{productId}/variants` - Old variants endpoint

## Error Handling

All endpoints follow the same error response format:

```json
{
  "status": false,
  "message": "Error message",
  "error": "Detailed error information"
}
```

Common HTTP status codes:
- `200` - Success
- `404` - Product not found
- `422` - Validation error
- `500` - Server error

## Best Practices

### 1. **Use Appropriate Endpoints**
- Use basic product endpoint for listings
- Use full product endpoint for detail pages
- Use separate endpoints for specific features

### 2. **Implement Caching**
- Cache product basic info for listings
- Cache attributes for product configurators
- Cache variants with appropriate cache keys

### 3. **Optimize Loading**
- Load basic info first
- Load additional data on demand
- Use loading states for better UX

### 4. **Handle Errors Gracefully**
- Show fallback content on errors
- Implement retry mechanisms
- Provide user-friendly error messages

## Conclusion

The new structured API flow provides better organization, performance, and flexibility for handling products, attributes, and variants. It separates concerns while maintaining backward compatibility and provides clear, consistent responses for different use cases. 