# Product API Separate Endpoints Flow

## Overview

The product API has been restructured to provide separate, focused endpoints instead of a single comprehensive endpoint. This approach offers better performance, modularity, and allows clients to fetch only the data they need.

## API Endpoints Structure

### 1. Basic Product Information
**Endpoint:** `GET /api/b2c/products/{id}/basic`

**Purpose:** Get lightweight product information for list views, search results, or basic product cards.

**Response includes:**
- Product basic details (id, name, description, key_features, slug)
- Category information
- Pricing information (selling_price, cost_price, original_price, discount_percentage)
- Rating summary (average_rating, review_count)
- Stock information
- Tags

**Use cases:**
- Product listing pages
- Search results
- Related products
- Featured products
- Category product lists

**Example Response:**
```json
{
  "status": true,
  "message": "Product basic information retrieved successfully",
  "data": {
    "product": {
      "id": 1,
      "name": "Premium Wireless Headphones",
      "description": "High-quality wireless headphones with noise cancellation",
      "key_features": "Bluetooth 5.0, 30-hour battery, Active noise cancellation",
      "slug": "premium-wireless-headphones",
      "image_url": "https://example.com/images/headphones.jpg",
      "status": "active",
      "is_featured": true,
      "created_at": "2024-01-15T10:30:00Z",
      "updated_at": "2024-01-15T10:30:00Z",
      "category": {
        "id": 5,
        "name": "Electronics",
        "description": "Electronic devices and accessories",
        "image_url": "https://example.com/images/electronics.jpg",
        "slug": "electronics"
      },
      "pricing": {
        "selling_price": 199.99,
        "cost_price": 150.00,
        "original_price": 249.99,
        "is_on_sale": true,
        "discount_percentage": 20.0
      },
      "rating": {
        "average_rating": 4.5,
        "review_count": 127
      },
      "stock": {
        "total_stock": 45,
        "is_in_stock": true
      },
      "tags": [
        {
          "id": 1,
          "name": "Wireless"
        },
        {
          "id": 2,
          "name": "Premium"
        }
      ]
    }
  }
}
```

### 2. Product Attributes
**Endpoint:** `GET /api/b2c/products/{id}/attributes`

**Purpose:** Get product attributes and variants summary for product configuration.

**Response includes:**
- Product basic info
- Attribute groups with values
- Availability status for each attribute value
- Variants summary (total, active, in stock, on sale, price range)

**Use cases:**
- Product configuration interface
- Attribute selection
- Variant availability checking
- Product customization

**Example Response:**
```json
{
  "status": true,
  "message": "Product attributes retrieved successfully",
  "data": {
    "product": {
      "id": 1,
      "name": "Premium Wireless Headphones",
      "slug": "premium-wireless-headphones"
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
          "values": [
            {
              "id": 1,
              "value": "black",
              "display_value": "Black",
              "sub_attribute_id": null,
              "sub_attribute_name": null,
              "variant_count": 4,
              "is_available": true
            },
            {
              "id": 2,
              "value": "white",
              "display_value": "White",
              "sub_attribute_id": null,
              "sub_attribute_name": null,
              "variant_count": 3,
              "is_available": true
            }
          ]
        }
      ]
    },
    "variants_summary": {
      "total_variants": 12,
      "active_variants": 10,
      "in_stock_variants": 8,
      "on_sale_variants": 3,
      "price_range": {
        "min": 179.99,
        "max": 249.99
      }
    }
  }
}
```

### 3. Product Variants
**Endpoint:** `GET /api/b2c/products/{id}/variants`

**Purpose:** Get detailed variant information with images and attributes.

**Query Parameters:**
- `min_price` (optional): Filter by minimum price
- `max_price` (optional): Filter by maximum price
- `in_stock_only` (optional): Show only in-stock variants
- `active_only` (optional): Show only active variants
- `sort_by` (optional): Sort by field (price, stock, etc.)
- `sort_order` (optional): Sort order (asc, desc)

**Response includes:**
- Product basic info
- Applied filters
- Variants summary
- Complete variant list with images and attributes

**Use cases:**
- Product detail page
- Variant selection
- Stock checking
- Price comparison

**Example Response:**
```json
{
  "status": true,
  "message": "Product variants retrieved successfully",
  "data": {
    "product": {
      "id": 1,
      "name": "Premium Wireless Headphones",
      "slug": "premium-wireless-headphones"
    },
    "filters": {
      "applied": {
        "in_stock_only": true
      },
      "sort_by": "price",
      "sort_order": "asc"
    },
    "variants": {
      "summary": {
        "total_variants": 8,
        "active_variants": 8,
        "in_stock_variants": 8,
        "on_sale_variants": 3,
        "price_range": {
          "min": 179.99,
          "max": 249.99
        },
        "stock_range": {
          "min": 5,
          "max": 25
        }
      },
      "list": [
        {
          "id": 1,
          "sku": "HP-BLK-001",
          "price": 199.99,
          "selling_price": 179.99,
          "original_price": 249.99,
          "cost_price": 150.00,
          "stock": 15,
          "min_stock": 5,
          "is_active": true,
          "is_featured": false,
          "is_in_stock": true,
          "is_on_sale": true,
          "discount_percentage": 28.0,
          "image_url": "https://example.com/images/headphones-black.jpg",
          "images": [
            {
              "id": 1,
              "image_url": "https://example.com/images/headphones-black-1.jpg",
              "type": "main",
              "alt_text": "Black headphones front view",
              "sort_order": 1
            }
          ],
          "attributes": [
            {
              "attribute_id": 1,
              "attribute_name": "color",
              "value_id": 1,
              "value": "black",
              "sub_attribute_id": null,
              "sub_attribute_name": null
            }
          ]
        }
      ]
    }
  }
}
```

### 4. Product Reviews
**Endpoint:** `GET /api/b2c/products/{id}/reviews`

**Purpose:** Get product reviews with rating statistics.

**Response includes:**
- Product basic info
- Review summary (total, average rating, rating distribution)
- Complete review list with user information

**Use cases:**
- Product review section
- Rating display
- Review filtering
- User feedback

**Example Response:**
```json
{
  "status": true,
  "message": "Product reviews retrieved successfully",
  "data": {
    "product": {
      "id": 1,
      "name": "Premium Wireless Headphones",
      "slug": "premium-wireless-headphones"
    },
    "reviews": {
      "summary": {
        "total_reviews": 127,
        "average_rating": 4.5,
        "rating_distribution": {
          "5": {
            "count": 65,
            "percentage": 51.2
          },
          "4": {
            "count": 35,
            "percentage": 27.6
          },
          "3": {
            "count": 15,
            "percentage": 11.8
          },
          "2": {
            "count": 8,
            "percentage": 6.3
          },
          "1": {
            "count": 4,
            "percentage": 3.1
          }
        },
        "verified_reviews": 89,
        "recent_reviews": 5
      },
      "list": [
        {
          "id": 1,
          "rating": 5,
          "title": "Excellent sound quality",
          "content": "These headphones exceeded my expectations. The sound quality is amazing!",
          "images": [],
          "is_verified": true,
          "helpful_count": 12,
          "created_at": "2024-01-10T15:30:00Z",
          "updated_at": "2024-01-10T15:30:00Z",
          "user": {
            "id": 1,
            "name": "John Doe",
            "avatar": "https://example.com/avatars/john.jpg"
          }
        }
      ]
    }
  }
}
```

### 5. Product Attribute Combinations
**Endpoint:** `GET /api/b2c/products/{id}/attribute-combinations`

**Purpose:** Get attribute combinations for frontend product configurator.

**Response includes:**
- Product basic info
- Attribute combinations with associated variants
- Stock and pricing information for each combination

**Use cases:**
- Product configurator
- Dynamic variant selection
- Real-time price updates
- Stock availability checking

**Example Response:**
```json
{
  "status": true,
  "message": "Product attribute combinations retrieved successfully",
  "data": {
    "product": {
      "id": 1,
      "name": "Premium Wireless Headphones",
      "slug": "premium-wireless-headphones"
    },
    "combinations": {
      "summary": {
        "total_combinations": 12,
        "combinations_with_stock": 8
      },
      "list": [
        {
          "combination_id": "abc123",
          "combination_name": "Black + Large + Premium",
          "attributes": [
            {
              "attribute_id": 1,
              "attribute_name": "color",
              "attribute_display_name": "Color",
              "value_id": 1,
              "value": "black",
              "display_value": "Black",
              "sub_attribute_id": null,
              "sub_attribute_name": null,
              "sub_attribute_display_name": null
            }
          ],
          "variants": [
            {
              "variant_id": 1,
              "sku": "HP-BLK-001",
              "price": 199.99,
              "selling_price": 179.99,
              "original_price": 249.99,
              "stock": 15,
              "is_in_stock": true,
              "image_url": "https://example.com/images/headphones-black.jpg",
              "is_active": true
            }
          ]
        }
      ]
    }
  }
}
```

### 6. Complete Product Details (Legacy)
**Endpoint:** `GET /api/b2c/products/{id}`

**Purpose:** Get complete product information (original comprehensive endpoint).

**Response includes:** Everything from all separate endpoints combined.

**Use cases:**
- Backward compatibility
- When all data is needed at once
- Single-page applications that need complete data

## Implementation Benefits

### 1. Performance Optimization
- **Reduced payload size:** Clients fetch only needed data
- **Faster response times:** Smaller queries and responses
- **Better caching:** Different endpoints can have different cache strategies
- **Reduced server load:** Less data processing per request

### 2. Modularity
- **Independent updates:** Each endpoint can be optimized separately
- **Easier maintenance:** Focused functionality per endpoint
- **Better testing:** Smaller, focused test cases
- **Version control:** Independent versioning per endpoint

### 3. Client Flexibility
- **Progressive loading:** Load basic info first, then details as needed
- **Conditional loading:** Load reviews only when user scrolls to review section
- **Optimized for different devices:** Mobile can load less data
- **Better user experience:** Faster initial page loads

### 4. Scalability
- **Horizontal scaling:** Different endpoints can be scaled independently
- **Database optimization:** Targeted queries for specific data
- **CDN optimization:** Different caching strategies per endpoint
- **API rate limiting:** Different limits for different endpoints

## Usage Patterns

### 1. Product Listing Page
```javascript
// Load basic product information for list
const products = await fetch('/api/b2c/products?per_page=20');
```

### 2. Product Detail Page
```javascript
// Progressive loading approach
// 1. Load basic info first
const basicInfo = await fetch(`/api/b2c/products/${productId}/basic`);

// 2. Load attributes for configuration
const attributes = await fetch(`/api/b2c/products/${productId}/attributes`);

// 3. Load variants when user selects attributes
const variants = await fetch(`/api/b2c/products/${productId}/variants?in_stock_only=true`);

// 4. Load reviews when user scrolls to review section
const reviews = await fetch(`/api/b2c/products/${productId}/reviews`);
```

### 3. Product Configurator
```javascript
// Load attribute combinations for dynamic configuration
const combinations = await fetch(`/api/b2c/products/${productId}/attribute-combinations`);

// Update variant selection based on user choices
const selectedVariant = combinations.find(combo => 
  combo.attributes.every(attr => 
    selectedAttributes.includes(attr.value_id)
  )
);
```

## Migration Guide

### For Existing Clients

1. **Immediate:** Continue using the original `/products/{id}` endpoint
2. **Gradual:** Start using specific endpoints for new features
3. **Complete:** Migrate to separate endpoints for better performance

### For New Clients

1. **Start with basic endpoint:** Use `/products/{id}/basic` for lists
2. **Add detail endpoints:** Use specific endpoints as needed
3. **Implement progressive loading:** Load data progressively for better UX

## Error Handling

All endpoints follow the same error handling pattern:

```json
{
  "status": false,
  "message": "Error description",
  "error": "Detailed error message (in development)"
}
```

Common HTTP status codes:
- `200`: Success
- `404`: Product not found
- `422`: Validation error
- `500`: Server error

## Rate Limiting

Different endpoints may have different rate limits:
- Basic info: Higher limits (frequently accessed)
- Reviews: Moderate limits (user-generated content)
- Variants: Standard limits
- Complete details: Lower limits (heavy endpoint)

## Caching Strategy

- **Basic info:** Long cache (1 hour) - rarely changes
- **Attributes:** Medium cache (30 minutes) - occasionally changes
- **Variants:** Short cache (10 minutes) - stock changes frequently
- **Reviews:** Medium cache (15 minutes) - new reviews added regularly
- **Combinations:** Long cache (1 hour) - structure rarely changes 