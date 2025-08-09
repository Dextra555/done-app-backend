# Product API Test Examples

## Testing the New Separate Product API Endpoints

This document provides practical examples for testing the new separate product API endpoints.

## Prerequisites

1. Ensure your Laravel application is running
2. Have some test products in your database
3. Use a tool like Postman, curl, or any HTTP client

## Base URL
```
http://localhost:8000/api/b2c
```

## Test Examples

### 1. Get Basic Product Information

**Endpoint:** `GET /products/{id}/basic`

**Purpose:** Lightweight product data for lists and cards

```bash
curl -X GET "http://localhost:8000/api/b2c/products/1/basic" \
  -H "Accept: application/json"
```

**Expected Response:**
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
      "image_url": "http://localhost:8000/storage/products/headphones.jpg",
      "status": "active",
      "is_featured": true,
      "created_at": "2024-01-15T10:30:00Z",
      "updated_at": "2024-01-15T10:30:00Z",
      "category": {
        "id": 5,
        "name": "Electronics",
        "description": "Electronic devices and accessories",
        "image_url": "http://localhost:8000/storage/categories/electronics.jpg",
        "slug": "electronics"
      },
      "pricing": {
        "selling_price": "199.99",
        "cost_price": "150.00",
        "original_price": "249.99",
        "is_on_sale": true,
        "discount_percentage": 20.0
      },
      "rating": {
        "average_rating": "4.50",
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

### 2. Get Product Attributes

**Endpoint:** `GET /products/{id}/attributes`

**Purpose:** Product attributes for configuration interface

```bash
curl -X GET "http://localhost:8000/api/b2c/products/1/attributes" \
  -H "Accept: application/json"
```

**Expected Response:**
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
          "total_variants_with_this_attribute": 12,
          "values": [
            {
              "id": 1,
              "value": "black",
              "display_value": "Black",
              "sub_attribute_id": null,
              "sub_attribute_name": null,
              "sub_attribute_display_name": null,
              "variant_count": 4,
              "is_available": true
            },
            {
              "id": 2,
              "value": "white",
              "display_value": "White",
              "sub_attribute_id": null,
              "sub_attribute_name": null,
              "sub_attribute_display_name": null,
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
        "min": "179.99",
        "max": "249.99"
      }
    }
  }
}
```

### 3. Get Product Variants

**Endpoint:** `GET /products/{id}/variants`

**Purpose:** Detailed variant information with filtering options

```bash
# Get all variants
curl -X GET "http://localhost:8000/api/b2c/products/1/variants" \
  -H "Accept: application/json"

# Get only in-stock variants, sorted by price
curl -X GET "http://localhost:8000/api/b2c/products/1/variants?in_stock_only=true&sort_by=price&sort_order=asc" \
  -H "Accept: application/json"

# Get variants within price range
curl -X GET "http://localhost:8000/api/b2c/products/1/variants?min_price=150&max_price=200" \
  -H "Accept: application/json"
```

**Expected Response:**
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
          "min": "179.99",
          "max": "249.99"
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
          "price": "199.99",
          "selling_price": "179.99",
          "original_price": "249.99",
          "cost_price": "150.00",
          "stock": 15,
          "min_stock": 5,
          "is_active": true,
          "is_featured": false,
          "is_in_stock": true,
          "is_on_sale": true,
          "discount_percentage": 28.0,
          "image_url": "http://localhost:8000/storage/variants/headphones-black.jpg",
          "images": [
            {
              "id": 1,
              "image_url": "http://localhost:8000/storage/variants/headphones-black-1.jpg",
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

### 4. Get Product Reviews

**Endpoint:** `GET /products/{id}/reviews`

**Purpose:** Product reviews with rating statistics

```bash
curl -X GET "http://localhost:8000/api/b2c/products/1/reviews" \
  -H "Accept: application/json"
```

**Expected Response:**
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
            "avatar": "http://localhost:8000/storage/avatars/john.jpg"
          }
        }
      ]
    }
  }
}
```

### 5. Get Product Attribute Combinations

**Endpoint:** `GET /products/{id}/attribute-combinations`

**Purpose:** Attribute combinations for frontend configurator

```bash
curl -X GET "http://localhost:8000/api/b2c/products/1/attribute-combinations" \
  -H "Accept: application/json"
```

**Expected Response:**
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
          "combination_id": "abc123def456",
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
              "price": "199.99",
              "selling_price": "179.99",
              "original_price": "249.99",
              "stock": 15,
              "is_in_stock": true,
              "image_url": "http://localhost:8000/storage/variants/headphones-black.jpg",
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

**Endpoint:** `GET /products/{id}`

**Purpose:** Complete product information (original endpoint)

```bash
curl -X GET "http://localhost:8000/api/b2c/products/1" \
  -H "Accept: application/json"
```

**Expected Response:** Complete product data including all information from separate endpoints.

## Performance Comparison

### Response Size Comparison

| Endpoint | Approximate Size | Use Case |
|----------|------------------|----------|
| `/products/{id}/basic` | ~2KB | Product lists, cards |
| `/products/{id}/attributes` | ~5KB | Configuration interface |
| `/products/{id}/variants` | ~15KB | Product detail page |
| `/products/{id}/reviews` | ~8KB | Review section |
| `/products/{id}/attribute-combinations` | ~10KB | Product configurator |
| `/products/{id}` (complete) | ~40KB | Full product data |

### Loading Time Comparison

| Endpoint | Database Queries | Response Time |
|----------|------------------|---------------|
| `/products/{id}/basic` | 2-3 queries | ~50ms |
| `/products/{id}/attributes` | 4-5 queries | ~80ms |
| `/products/{id}/variants` | 6-8 queries | ~120ms |
| `/products/{id}/reviews` | 3-4 queries | ~70ms |
| `/products/{id}/attribute-combinations` | 5-6 queries | ~100ms |
| `/products/{id}` (complete) | 15-20 queries | ~300ms |

## Error Testing

### 1. Product Not Found

```bash
curl -X GET "http://localhost:8000/api/b2c/products/99999/basic" \
  -H "Accept: application/json"
```

**Expected Response:**
```json
{
  "status": false,
  "message": "Product not found"
}
```

### 2. Invalid Product ID

```bash
curl -X GET "http://localhost:8000/api/b2c/products/invalid/basic" \
  -H "Accept: application/json"
```

**Expected Response:**
```json
{
  "status": false,
  "message": "Product not found"
}
```

## JavaScript Examples

### Progressive Loading Example

```javascript
class ProductLoader {
  constructor(productId) {
    this.productId = productId;
    this.baseUrl = '/api/b2c/products';
  }

  // Load basic info first
  async loadBasicInfo() {
    const response = await fetch(`${this.baseUrl}/${this.productId}/basic`);
    const data = await response.json();
    return data.data.product;
  }

  // Load attributes when needed
  async loadAttributes() {
    const response = await fetch(`${this.baseUrl}/${this.productId}/attributes`);
    const data = await response.json();
    return data.data.attributes;
  }

  // Load variants with filters
  async loadVariants(filters = {}) {
    const params = new URLSearchParams(filters);
    const response = await fetch(`${this.baseUrl}/${this.productId}/variants?${params}`);
    const data = await response.json();
    return data.data.variants;
  }

  // Load reviews when user scrolls to review section
  async loadReviews() {
    const response = await fetch(`${this.baseUrl}/${this.productId}/reviews`);
    const data = await response.json();
    return data.data.reviews;
  }

  // Load attribute combinations for configurator
  async loadAttributeCombinations() {
    const response = await fetch(`${this.baseUrl}/${this.productId}/attribute-combinations`);
    const data = await response.json();
    return data.data.combinations;
  }
}

// Usage example
const productLoader = new ProductLoader(1);

// Progressive loading
async function loadProductPage() {
  // 1. Load basic info immediately
  const basicInfo = await productLoader.loadBasicInfo();
  displayBasicInfo(basicInfo);

  // 2. Load attributes for configuration
  const attributes = await productLoader.loadAttributes();
  displayAttributes(attributes);

  // 3. Load variants when user interacts
  const variants = await productLoader.loadVariants({ in_stock_only: true });
  displayVariants(variants);

  // 4. Load reviews when user scrolls to review section
  const reviews = await productLoader.loadReviews();
  displayReviews(reviews);
}
```

### React Hook Example

```javascript
import { useState, useEffect } from 'react';

function useProductData(productId) {
  const [basicInfo, setBasicInfo] = useState(null);
  const [attributes, setAttributes] = useState(null);
  const [variants, setVariants] = useState(null);
  const [reviews, setReviews] = useState(null);
  const [loading, setLoading] = useState({});
  const [error, setError] = useState(null);

  const baseUrl = `/api/b2c/products/${productId}`;

  const fetchData = async (endpoint, setData, setLoadingKey) => {
    try {
      setLoading(prev => ({ ...prev, [setLoadingKey]: true }));
      const response = await fetch(`${baseUrl}${endpoint}`);
      const data = await response.json();
      
      if (data.status) {
        setData(data.data);
      } else {
        setError(data.message);
      }
    } catch (err) {
      setError(err.message);
    } finally {
      setLoading(prev => ({ ...prev, [setLoadingKey]: false }));
    }
  };

  useEffect(() => {
    if (productId) {
      // Load basic info on mount
      fetchData('/basic', setBasicInfo, 'basicInfo');
    }
  }, [productId]);

  const loadAttributes = () => {
    fetchData('/attributes', setAttributes, 'attributes');
  };

  const loadVariants = (filters = {}) => {
    const params = new URLSearchParams(filters);
    fetchData(`/variants?${params}`, setVariants, 'variants');
  };

  const loadReviews = () => {
    fetchData('/reviews', setReviews, 'reviews');
  };

  return {
    basicInfo,
    attributes,
    variants,
    reviews,
    loading,
    error,
    loadAttributes,
    loadVariants,
    loadReviews
  };
}

// Usage in component
function ProductDetail({ productId }) {
  const {
    basicInfo,
    attributes,
    variants,
    reviews,
    loading,
    error,
    loadAttributes,
    loadVariants,
    loadReviews
  } = useProductData(productId);

  useEffect(() => {
    // Load attributes when component mounts
    loadAttributes();
  }, []);

  if (error) return <div>Error: {error}</div>;
  if (!basicInfo) return <div>Loading...</div>;

  return (
    <div>
      <h1>{basicInfo.name}</h1>
      <p>{basicInfo.description}</p>
      
      {/* Attributes section */}
      {attributes && (
        <div>
          <h2>Product Options</h2>
          {/* Render attributes */}
        </div>
      )}
      
      {/* Variants section */}
      {variants && (
        <div>
          <h2>Available Variants</h2>
          {/* Render variants */}
        </div>
      )}
      
      {/* Reviews section - load on scroll */}
      <div onScroll={() => !reviews && loadReviews()}>
        <h2>Reviews</h2>
        {reviews ? (
          /* Render reviews */
          <div>Reviews loaded</div>
        ) : (
          <button onClick={loadReviews}>Load Reviews</button>
        )}
      </div>
    </div>
  );
}
```

## Testing Checklist

- [ ] Test all endpoints with valid product IDs
- [ ] Test error handling with invalid product IDs
- [ ] Test filtering and sorting on variants endpoint
- [ ] Test progressive loading scenarios
- [ ] Compare response times between endpoints
- [ ] Verify data consistency across endpoints
- [ ] Test with products that have no variants/reviews
- [ ] Test with products that have complex attribute structures
- [ ] Verify backward compatibility with original endpoint
- [ ] Test rate limiting and caching behavior 