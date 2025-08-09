# API Attributes Flow Documentation

## Overview
This document describes the complete attributes flow API system for the Done App, including both B2C and B2B endpoints for managing product attributes, variants, and their relationships.

## Base URLs
- **B2C API**: `/api/b2c`
- **B2B API**: `/api/b2b`

## Authentication
- Most attribute endpoints are public (no authentication required)
- Some endpoints may require authentication for business-specific features

## Core Models

### 1. ProductAttribute
- **Purpose**: Defines main attributes (e.g., Color, Size, Material)
- **Key Fields**: `id`, `name`

### 2. AttributeSubAttribute
- **Purpose**: Defines specific options for each attribute (e.g., Red, Blue, Green for Color)
- **Key Fields**: `id`, `attribute_id`, `name`

### 3. AttributeValue
- **Purpose**: Links attributes with their sub-attributes and provides actual values
- **Key Fields**: `id`, `attribute_id`, `sub_attribute_id`, `value`

### 4. ProductVariant
- **Purpose**: Individual product variants with specific characteristics
- **Key Fields**: `id`, `product_id`, `sku`, `price`, `stock`, `image_url`

## B2C API Endpoints

### General Attribute Endpoints

#### 1. Get All Attributes
```http
GET /api/b2c/attributes
```

**Response:**
```json
{
    "status": true,
    "message": "Attributes retrieved successfully",
    "data": [
        {
            "id": 1,
            "name": "Color",
            "sub_attributes": [
                {
                    "id": 1,
                    "name": "Red"
                },
                {
                    "id": 2,
                    "name": "Blue"
                }
            ],
            "values": [
                {
                    "id": 1,
                    "value": "Red",
                    "sub_attribute_id": 1,
                    "sub_attribute_name": "Red"
                }
            ]
        }
    ]
}
```

#### 2. Get Specific Attribute
```http
GET /api/b2c/attributes/{id}
```

#### 3. Get Attribute Values
```http
GET /api/b2c/attributes/{attributeId}/values
```

#### 4. Get Sub-Attributes
```http
GET /api/b2c/attributes/{attributeId}/sub-attributes
```

#### 5. Search Attributes
```http
GET /api/b2c/attributes/search?query=color
```

#### 6. Get Attribute Combinations
```http
POST /api/b2c/attributes/combinations
Content-Type: application/json

{
    "attribute_ids": [1, 2, 3]
}
```

### Product-Specific Attribute Endpoints

#### 1. Get Product Attributes
```http
GET /api/b2c/products/{productId}/attributes
```

**Response:**
```json
{
    "status": true,
    "message": "Product attributes retrieved successfully",
    "data": {
        "product_id": 1,
        "attributes": [
            {
                "id": 1,
                "name": "Color",
                "values": [
                    {
                        "id": 1,
                        "value": "Red",
                        "sub_attribute_id": 1,
                        "sub_attribute_name": "Red"
                    }
                ]
            }
        ]
    }
}
```

#### 2. Get Variants by Attributes
```http
GET /api/b2c/products/{productId}/variants/by-attributes?attribute_values[]=1&attribute_values[]=2
```

**Response:**
```json
{
    "status": true,
    "message": "Variants by attributes retrieved successfully",
    "data": {
        "product_id": 1,
        "selected_attributes": [1, 2],
        "variants": [
            {
                "id": 1,
                "sku": "PROD-001-RED-L",
                "price": 29.99,
                "stock": 10,
                "image_url": "https://example.com/image.jpg",
                "images": [
                    {
                        "id": 1,
                        "image_url": "https://example.com/image1.jpg",
                        "type": "main"
                    }
                ],
                "attributes": [
                    {
                        "attribute_id": 1,
                        "attribute_name": "Color",
                        "value_id": 1,
                        "value": "Red",
                        "sub_attribute_id": 1,
                        "sub_attribute_name": "Red"
                    }
                ]
            }
        ]
    }
}
```

#### 3. Get Attribute Combinations
```http
GET /api/b2c/products/{productId}/attribute-combinations
```

**Response:**
```json
{
    "status": true,
    "message": "Attribute combinations retrieved successfully",
    "data": {
        "product_id": 1,
        "attribute_groups": [
            {
                "attribute_id": 1,
                "attribute_name": "Color",
                "values": [
                    {
                        "value_id": 1,
                        "value": "Red",
                        "sub_attribute_id": 1,
                        "sub_attribute_name": "Red"
                    }
                ]
            }
        ],
        "combinations": [
            {
                "variant_id": 1,
                "sku": "PROD-001-RED-L",
                "price": 29.99,
                "stock": 10,
                "attributes": [
                    {
                        "attribute_id": 1,
                        "attribute_name": "Color",
                        "value_id": 1,
                        "value": "Red",
                        "sub_attribute_id": 1,
                        "sub_attribute_name": "Red"
                    }
                ]
            }
        ]
    }
}
```

#### 4. Filter Products by Attributes
```http
POST /api/b2c/products/filter-by-attributes
Content-Type: application/json

{
    "attribute_values": [1, 2, 3],
    "per_page": 12,
    "sort_by": "selling_price",
    "sort_order": "asc"
}
```

## B2B API Endpoints

### Additional B2B-Specific Endpoints

#### 1. Get Attributes with Usage Statistics
```http
GET /api/b2b/attributes/with-usage-stats
```

**Response:**
```json
{
    "status": true,
    "message": "Attributes with usage statistics retrieved successfully",
    "data": [
        {
            "id": 1,
            "name": "Color",
            "usage_count": 15,
            "sub_attributes": [...],
            "values": [...]
        }
    ]
}
```

#### 2. Get Popular Attributes
```http
GET /api/b2b/attributes/popular
```

**Response:**
```json
{
    "status": true,
    "message": "Popular attributes retrieved successfully",
    "data": [
        {
            "id": 1,
            "name": "Color",
            "usage_count": 15,
            "sub_attributes": [...],
            "values": [...]
        }
    ]
}
```

## Usage Examples

### 1. Product Variant Selection Flow

#### Step 1: Get Product Attributes
```javascript
// Get available attributes for a product
const response = await fetch('/api/b2c/products/1/attributes');
const data = await response.json();
console.log('Available attributes:', data.data.attributes);
```

#### Step 2: Get Attribute Combinations
```javascript
// Get all possible combinations
const response = await fetch('/api/b2c/products/1/attribute-combinations');
const data = await response.json();
console.log('Available combinations:', data.data.combinations);
```

#### Step 3: Select Attributes and Get Variant
```javascript
// User selects Color=Red, Size=Large
const selectedAttributes = [1, 5]; // attribute_value IDs
const response = await fetch(`/api/b2c/products/1/variants/by-attributes?${selectedAttributes.map(id => `attribute_values[]=${id}`).join('&')}`);
const data = await response.json();
console.log('Selected variant:', data.data.variants[0]);
```

### 2. Product Filtering by Attributes

```javascript
// Filter products by specific attributes
const response = await fetch('/api/b2c/products/filter-by-attributes', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
    },
    body: JSON.stringify({
        attribute_values: [1, 2, 3], // Red, Blue, Green colors
        per_page: 12,
        sort_by: 'selling_price',
        sort_order: 'asc'
    })
});
const data = await response.json();
console.log('Filtered products:', data.data.products);
```

### 3. B2B Analytics

```javascript
// Get attributes with usage statistics for business insights
const response = await fetch('/api/b2b/attributes/with-usage-stats');
const data = await response.json();
console.log('Attribute usage:', data.data);

// Get popular attributes
const popularResponse = await fetch('/api/b2b/attributes/popular');
const popularData = await popularResponse.json();
console.log('Popular attributes:', popularData.data);
```

## Error Handling

All endpoints return consistent error responses:

```json
{
    "status": false,
    "message": "Error description",
    "error": "Detailed error message"
}
```

### Common HTTP Status Codes
- `200`: Success
- `400`: Bad Request (validation errors)
- `404`: Not Found
- `422`: Validation Error
- `500`: Internal Server Error

## Best Practices

### 1. Attribute Naming
- Use descriptive, consistent names
- Avoid abbreviations
- Use singular form (Color, not Colors)

### 2. Performance Optimization
- Use pagination for large datasets
- Implement caching for frequently accessed attributes
- Use eager loading for related data

### 3. Data Validation
- Always validate attribute_value IDs before filtering
- Check for required parameters
- Handle empty result sets gracefully

### 4. Frontend Integration
- Cache attribute data on the client side
- Implement progressive loading for large attribute sets
- Provide fallback options for missing attributes

## Database Relationships

```
ProductAttribute (1) → (N) AttributeSubAttribute
ProductAttribute (1) → (N) AttributeValue
AttributeSubAttribute (1) → (N) AttributeValue
AttributeValue (N) → (N) ProductVariant (via variant_attribute_values)
ProductVariant (N) → (1) Product
```

## Migration and Seeding

### Required Seeders
1. `ProductAttributeSeeder` - Creates main attributes
2. `AttributeSubAttributeSeeder` - Creates sub-attributes
3. `AttributeValueSeeder` - Creates attribute values

### Running Seeders
```bash
php artisan db:seed --class=ProductAttributeSeeder
php artisan db:seed --class=AttributeSubAttributeSeeder
php artisan db:seed --class=AttributeValueSeeder
```

## Testing

### Example Test Cases
1. Get all attributes returns correct structure
2. Product attributes include only relevant values
3. Variant filtering works with multiple attributes
4. Attribute combinations are unique
5. Error handling for invalid attribute IDs

### Running Tests
```bash
php artisan test --filter=AttributeTest
```

## Security Considerations

1. **Input Validation**: All user inputs are validated
2. **SQL Injection**: Uses Eloquent ORM with parameterized queries
3. **Rate Limiting**: Implement rate limiting for search endpoints
4. **Data Exposure**: Only expose necessary attribute information

## Future Enhancements

1. **Attribute Hierarchies**: Support for nested attributes
2. **Dynamic Pricing**: Price variations based on attribute combinations
3. **Attribute Analytics**: Advanced usage statistics and trends
4. **Bulk Operations**: Batch attribute management
5. **Attribute Templates**: Reusable attribute configurations 