# Enhanced Product Show Route Documentation

## Route Information

### B2C API Route
```
GET /api/b2c/products/{id}
```

### Route Definition
```php
Route::get('/products/{id}', [ProductController::class, 'show']);
```

### Controller Method
- **Controller**: `App\Http\Controllers\Api\B2C\ProductController`
- **Method**: `show(Request $request, $id)`
- **Authentication**: Public (no authentication required)

## Request Parameters

### Path Parameters
| Parameter | Type | Required | Description |
|-----------|------|----------|-------------|
| `id` | integer | Yes | Product ID |

### Query Parameters
| Parameter | Type | Required | Description |
|-----------|------|----------|-------------|
| `include_reviews` | boolean | No | Include detailed review information (default: true) |
| `include_variants` | boolean | No | Include all variant details (default: true) |
| `include_attributes` | boolean | No | Include attribute combinations (default: true) |

## Response Format

### Success Response (200)
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
            "cost_price": 50.00,
            "original_price": 100.00,
            "is_featured": true,
            "status": "active",
            "created_at": "2024-01-01T00:00:00.000000Z",
            "updated_at": "2024-01-01T00:00:00.000000Z",
            "category": {
                "id": 1,
                "name": "Category Name",
                "description": "Category description",
                "image_url": "https://example.com/category.jpg",
                "slug": "category-slug"
            },
            "main_variant": {
                "id": 1,
                "sku": "PROD-001",
                "price": 100.00,
                "selling_price": 80.00,
                "stock": 50,
                "image_url": "https://example.com/image.jpg"
            },
            "attributes": [
                {
                    "id": 1,
                    "name": "Color",
                    "values": [
                        {
                            "id": 1,
                            "value": "Red",
                            "sub_attribute_id": null,
                            "sub_attribute_name": null
                        },
                        {
                            "id": 2,
                            "value": "Blue",
                            "sub_attribute_id": null,
                            "sub_attribute_name": null
                        }
                    ]
                }
            ],
            "variant_count": 3,
            "variants": [
                {
                    "id": 1,
                    "sku": "PROD-001-RED",
                    "price": 100.00,
                    "selling_price": 80.00,
                    "original_price": 100.00,
                    "cost_price": 50.00,
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
                    "image_url": "https://example.com/red-variant.jpg",
                    "images": [
                        {
                            "id": 1,
                            "image_url": "https://example.com/red-variant-1.jpg",
                            "type": "main",
                            "alt_text": "Red variant main image",
                            "sort_order": 1
                        }
                    ],
                    "attributes": [
                        {
                            "attribute_id": 1,
                            "attribute_name": "Color",
                            "value_id": 1,
                            "value": "Red",
                            "sub_attribute_id": null,
                            "sub_attribute_name": null
                        }
                    ]
                }
            ],
            "reviews": [
                {
                    "id": 1,
                    "rating": 5,
                    "content": "Great product!",
                    "type": "verified",
                    "is_verified": true,
                    "helpful_count": 10,
                    "created_at": "2024-01-01T00:00:00.000000Z",
                    "updated_at": "2024-01-01T00:00:00.000000Z",
                    "user": {
                        "id": 1,
                        "name": "John Doe",
                        "email": "john@example.com",
                        "avatar": "https://example.com/avatar.jpg"
                    }
                }
            ],
            "review_statistics": {
                "total_reviews": 25,
                "average_rating": 4.2,
                "rating_distribution": {
                    "1": {"count": 1, "percentage": 4.0},
                    "2": {"count": 2, "percentage": 8.0},
                    "3": {"count": 3, "percentage": 12.0},
                    "4": {"count": 10, "percentage": 40.0},
                    "5": {"count": 9, "percentage": 36.0}
                },
                "verified_reviews": 20,
                "recent_reviews": 5
            },
            "available_attributes": [
                {
                    "id": 1,
                    "name": "Color",
                    "values": [
                        {
                            "id": 1,
                            "value": "Red",
                            "sub_attribute_id": null,
                            "sub_attribute_name": null
                        },
                        {
                            "id": 2,
                            "value": "Blue",
                            "sub_attribute_id": null,
                            "sub_attribute_name": null
                        }
                    ]
                }
            ],
            "attribute_combinations": [
                {
                    "variant_id": 1,
                    "sku": "PROD-001-RED",
                    "price": 100.00,
                    "selling_price": 80.00,
                    "stock": 25,
                    "image_url": "https://example.com/red-variant.jpg",
                    "attributes": [
                        {
                            "attribute_id": 1,
                            "attribute_name": "Color",
                            "value_id": 1,
                            "value": "Red",
                            "sub_attribute_id": null,
                            "sub_attribute_name": null
                        }
                    ]
                }
            ],
            "statistics": {
                "total_variants": 3,
                "active_variants": 3,
                "in_stock_variants": 2,
                "on_sale_variants": 1,
                "total_images": 6,
                "price_range": {
                    "min": 80.00,
                    "max": 120.00
                }
            }
        }
    }
}
```

### Error Responses

#### Product Not Found (404)
```json
{
    "status": false,
    "message": "Product not found",
    "error": "Product with ID 999 does not exist"
}
```

#### Validation Error (422)
```json
{
    "status": false,
    "message": "Validation failed",
    "errors": {
        "id": ["The id must be a valid integer."]
    }
}
```

#### Server Error (500)
```json
{
    "status": false,
    "message": "An error occurred while retrieving the product",
    "error": "Internal server error"
}
```

## Features

### 1. Comprehensive Product Information
- Basic product details (name, description, key features)
- Pricing information (cost, original, selling prices)
- Product status and featured flags
- Creation and update timestamps

### 2. Enhanced Category Details
- Complete category information including description and image
- Category slug for SEO-friendly URLs

### 3. Detailed Variant Information
- All variant details including SKU, pricing, stock levels
- Physical dimensions and weight
- Active/featured status flags
- Complete image gallery for each variant
- Full attribute mapping for each variant

### 4. Comprehensive Review System
- Detailed review information with user details
- Review verification status
- Helpful count tracking
- Review statistics including:
  - Total review count
  - Average rating
  - Rating distribution (1-5 stars with percentages)
  - Verified review count
  - Recent review count

### 5. Attribute Management
- Available attributes for the product
- All attribute values with sub-attribute support
- Unique attribute combinations
- Variant-to-attribute mapping

### 6. Product Statistics
- Total and active variant counts
- Stock availability statistics
- Sale status tracking
- Total image count
- Price range across all variants

## Usage Examples

### Basic Product Details
```bash
curl -X GET "https://api.example.com/api/b2c/products/1"
```

### Product with Specific Includes
```bash
curl -X GET "https://api.example.com/api/b2c/products/1?include_reviews=true&include_variants=true&include_attributes=true"
```

### JavaScript/Fetch Example
```javascript
fetch('/api/b2c/products/1')
    .then(response => response.json())
    .then(data => {
        if (data.status) {
            const product = data.data.product;
            console.log('Product:', product.name);
            console.log('Variants:', product.variants.length);
            console.log('Average Rating:', product.review_statistics.average_rating);
        }
    })
    .catch(error => console.error('Error:', error));
```

## Performance Considerations

### Eager Loading
The endpoint uses Laravel's eager loading to optimize database queries:
- `category` - Product category information
- `variants.images` - All variant images
- `variants.attributeValues.attribute` - Variant attributes
- `variants.attributeValues.subAttribute` - Sub-attributes
- `reviews.user` - Review user information

### Caching Recommendations
- Consider caching product details for frequently accessed products
- Implement cache invalidation when product data changes
- Use Redis or similar for high-performance caching

## Related Routes

### Product Listing
- `GET /api/b2c/products` - Enhanced product listing with filtering

### Product Variants
- `GET /api/b2c/products/{productId}/variants` - Product variants
- `GET /api/b2c/products/{productId}/variants/{variantId}` - Specific variant

### Product Attributes
- `GET /api/b2c/products/{productId}/attributes` - Product attributes
- `GET /api/b2c/products/{productId}/attribute-combinations` - Attribute combinations

### Product Reviews
- `POST /api/b2c/products/{id}/reviews` - Add product review (authenticated)

## Error Handling

The endpoint includes comprehensive error handling:
- Product existence validation
- Input parameter validation
- Database query error handling
- Graceful fallbacks for missing relationships

## Security Considerations

- Public endpoint (no authentication required)
- Input validation and sanitization
- SQL injection prevention through Laravel's query builder
- XSS protection through proper JSON encoding 