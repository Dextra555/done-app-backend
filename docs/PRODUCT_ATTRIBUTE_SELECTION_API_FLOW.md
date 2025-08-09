# Product Attribute Selection API Flow

## Overview

This API flow is designed to support dynamic product configuration interfaces like the one shown in the image, where users can select product attributes (Color, Size, etc.) and see real-time updates to available variants, pricing, and stock information.

## API Endpoints

### 1. Get Product Configuration
**Endpoint:** `POST /api/b2c/products/{productId}/configuration`

**Purpose:** Get complete product configuration with all available attributes and current selection state.

**Request Body:**
```json
{
  "selected_attributes": [
    {
      "attribute_id": 1,
      "value_id": 2
    },
    {
      "attribute_id": 2,
      "value_id": 5
    }
  ]
}
```

**Response:**
```json
{
  "status": true,
  "message": "Product configuration retrieved successfully",
  "data": {
    "product": {
      "id": 1,
      "name": "Outer Woll Premium Fendi",
      "slug": "outer-woll-premium-fendi",
      "description": "Experience unparalleled comfort and style...",
      "key_features": "Luxurious Upholstery: Crafted with soft, high-quality fabric...",
      "image_url": "https://example.com/images/product.jpg",
      "rating": {
        "average_rating": 4.9,
        "review_count": 800
      },
      "pricing": {
        "selling_price": 349.99,
        "original_price": 439.99,
        "is_on_sale": true,
        "discount_percentage": 20.0
      }
    },
    "configuration": {
      "selected_attributes": [
        {
          "attribute_id": 1,
          "value_id": 2
        }
      ],
      "recommended_selection": [
        {
          "attribute_id": 1,
          "attribute_name": "color",
          "value_id": 1,
          "value": "beige"
        },
        {
          "attribute_id": 2,
          "attribute_name": "size",
          "value_id": 3,
          "value": "large"
        }
      ],
      "available_attributes": [
        {
          "attribute": {
            "id": 1,
            "name": "color",
            "display_name": "Color",
            "type": "select"
          },
          "available_values": [
            {
              "id": 1,
              "value": "beige",
              "display_value": "Beige",
              "sub_attribute_id": null,
              "sub_attribute_name": null,
              "is_available": true
            },
            {
              "id": 2,
              "value": "brown",
              "display_value": "Brown",
              "sub_attribute_id": null,
              "sub_attribute_name": null,
              "is_available": true
            },
            {
              "id": 3,
              "value": "black",
              "display_value": "Black",
              "sub_attribute_id": null,
              "sub_attribute_name": null,
              "is_available": false
            }
          ]
        },
        {
          "attribute": {
            "id": 2,
            "name": "size",
            "display_name": "Size",
            "type": "select"
          },
          "available_values": [
            {
              "id": 3,
              "value": "large",
              "display_value": "Large",
              "sub_attribute_id": null,
              "sub_attribute_name": null,
              "is_available": true
            },
            {
              "id": 4,
              "value": "medium",
              "display_value": "Medium",
              "sub_attribute_id": null,
              "sub_attribute_name": null,
              "is_available": true
            }
          ]
        }
      ],
      "matching_variants_count": 4
    },
    "current_variants": [
      {
        "id": 1,
        "sku": "OWF-BEI-LAR-001",
        "price": 349.99,
        "selling_price": 349.99,
        "original_price": 439.99,
        "stock": 110,
        "is_in_stock": true,
        "is_on_sale": true,
        "discount_percentage": 20.0,
        "image_url": "https://example.com/images/variant-beige-large.jpg",
        "attributes": [
          {
            "attribute_id": 1,
            "attribute_name": "color",
            "value_id": 1,
            "value": "beige",
            "sub_attribute_id": null,
            "sub_attribute_name": null
          },
          {
            "attribute_id": 2,
            "attribute_name": "size",
            "value_id": 3,
            "value": "large",
            "sub_attribute_id": null,
            "sub_attribute_name": null
          }
        ]
      }
    ]
  }
}
```

### 2. Get Variants by Selected Attributes
**Endpoint:** `POST /api/b2c/products/{productId}/variants/by-selected-attributes`

**Purpose:** Get variants that match the selected attributes with filtering options.

**Request Body:**
```json
{
  "selected_attributes": [
    {
      "attribute_id": 1,
      "value_id": 2
    }
  ],
  "include_out_of_stock": false,
  "include_inactive": false
}
```

**Response:**
```json
{
  "status": true,
  "message": "Product variants by selected attributes retrieved successfully",
  "data": {
    "product": {
      "id": 1,
      "name": "Outer Woll Premium Fendi",
      "slug": "outer-woll-premium-fendi"
    },
    "selected_attributes": [
      {
        "attribute_id": 1,
        "value_id": 2
      }
    ],
    "filters": {
      "include_out_of_stock": false,
      "include_inactive": false
    },
    "variants": {
      "summary": {
        "total_matching_variants": 3,
        "in_stock_variants": 2,
        "active_variants": 3,
        "price_range": {
          "min": 299.99,
          "max": 399.99
        }
      },
      "list": [
        {
          "id": 2,
          "sku": "OWF-BRO-MED-001",
          "price": 349.99,
          "selling_price": 299.99,
          "original_price": 399.99,
          "cost_price": 250.00,
          "stock": 45,
          "min_stock": 5,
          "is_active": true,
          "is_featured": false,
          "is_in_stock": true,
          "is_on_sale": true,
          "discount_percentage": 25.0,
          "image_url": "https://example.com/images/variant-brown-medium.jpg",
          "images": [
            {
              "id": 1,
              "image_url": "https://example.com/images/variant-brown-medium-1.jpg",
              "type": "main",
              "alt_text": "Brown medium size chair",
              "sort_order": 1
            }
          ],
          "attributes": [
            {
              "attribute_id": 1,
              "attribute_name": "color",
              "value_id": 2,
              "value": "brown",
              "sub_attribute_id": null,
              "sub_attribute_name": null
            },
            {
              "attribute_id": 2,
              "attribute_name": "size",
              "value_id": 4,
              "value": "medium",
              "sub_attribute_id": null,
              "sub_attribute_name": null
            }
          ]
        }
      ]
    },
    "available_attributes": [
      {
        "id": 2,
        "name": "size",
        "display_name": "Size",
        "values": [
          {
            "id": 3,
            "value": "large",
            "display_value": "Large",
            "sub_attribute_id": null,
            "sub_attribute_name": null,
            "is_available": true
          },
          {
            "id": 4,
            "value": "medium",
            "display_value": "Medium",
            "sub_attribute_id": null,
            "sub_attribute_name": null,
            "is_available": true
          }
        ]
      }
    ],
    "variant_combinations": [
      {
        "combination_id": "abc123",
        "attributes": [
          {
            "attribute_id": 1,
            "attribute_name": "color",
            "value_id": 2,
            "value": "brown"
          },
          {
            "attribute_id": 2,
            "attribute_name": "size",
            "value_id": 4,
            "value": "medium"
          }
        ],
        "variants": [
          {
            "variant_id": 2,
            "sku": "OWF-BRO-MED-001",
            "price": 349.99,
            "selling_price": 299.99,
            "stock": 45,
            "is_in_stock": true,
            "is_active": true
          }
        ]
      }
    ]
  }
}
```

### 3. Get Available Attribute Values
**Endpoint:** `POST /api/b2c/products/{productId}/available-attribute-values`

**Purpose:** Get available values for a specific attribute based on current selection.

**Request Body:**
```json
{
  "selected_attributes": [
    {
      "attribute_id": 1,
      "value_id": 2
    }
  ],
  "target_attribute_id": 2
}
```

**Response:**
```json
{
  "status": true,
  "message": "Available attribute values retrieved successfully",
  "data": {
    "product": {
      "id": 1,
      "name": "Outer Woll Premium Fendi",
      "slug": "outer-woll-premium-fendi"
    },
    "selected_attributes": [
      {
        "attribute_id": 1,
        "value_id": 2
      }
    ],
    "target_attribute_id": 2,
    "available_values": [
      {
        "id": 3,
        "value": "large",
        "display_value": "Large",
        "sub_attribute_id": null,
        "sub_attribute_name": null,
        "is_available": true
      },
      {
        "id": 4,
        "value": "medium",
        "display_value": "Medium",
        "sub_attribute_id": null,
        "sub_attribute_name": null,
        "is_available": true
      }
    ],
    "matching_variants_count": 3
  }
}
```

### 4. Get Variant by Exact Attributes
**Endpoint:** `POST /api/b2c/products/{productId}/variant/by-exact-attributes`

**Purpose:** Get a specific variant that exactly matches the requested attribute combination.

**Request Body:**
```json
{
  "attributes": [
    {
      "attribute_id": 1,
      "value_id": 2
    },
    {
      "attribute_id": 2,
      "value_id": 4
    }
  ]
}
```

**Response:**
```json
{
  "status": true,
  "message": "Product variant retrieved successfully",
  "data": {
    "product": {
      "id": 1,
      "name": "Outer Woll Premium Fendi",
      "slug": "outer-woll-premium-fendi"
    },
    "requested_attributes": [
      {
        "attribute_id": 1,
        "value_id": 2
      },
      {
        "attribute_id": 2,
        "value_id": 4
      }
    ],
    "variant": {
      "id": 2,
      "sku": "OWF-BRO-MED-001",
      "price": 349.99,
      "selling_price": 299.99,
      "original_price": 399.99,
      "cost_price": 250.00,
      "stock": 45,
      "min_stock": 5,
      "is_active": true,
      "is_featured": false,
      "is_in_stock": true,
      "is_on_sale": true,
      "discount_percentage": 25.0,
      "image_url": "https://example.com/images/variant-brown-medium.jpg",
      "images": [
        {
          "id": 1,
          "image_url": "https://example.com/images/variant-brown-medium-1.jpg",
          "type": "main",
          "alt_text": "Brown medium size chair",
          "sort_order": 1
        }
      ],
      "attributes": [
        {
          "attribute_id": 1,
          "attribute_name": "color",
          "value_id": 2,
          "value": "brown",
          "sub_attribute_id": null,
          "sub_attribute_name": null
        },
        {
          "attribute_id": 2,
          "attribute_name": "size",
          "value_id": 4,
          "value": "medium",
          "sub_attribute_id": null,
          "sub_attribute_name": null
        }
      ]
    }
  }
}
```

## Usage Flow for Product Configurator

### Step 1: Load Initial Configuration
```javascript
// Load product configuration with no selected attributes
const response = await fetch('/api/b2c/products/1/configuration', {
  method: 'POST',
  headers: {
    'Content-Type': 'application/json',
    'Accept': 'application/json'
  },
  body: JSON.stringify({
    selected_attributes: []
  })
});

const config = await response.json();
// Display product info and all available attributes
```

### Step 2: User Selects First Attribute (Color)
```javascript
// User selects brown color
const selectedAttributes = [
  { attribute_id: 1, value_id: 2 } // Brown color
];

const response = await fetch('/api/b2c/products/1/variants/by-selected-attributes', {
  method: 'POST',
  headers: {
    'Content-Type': 'application/json',
    'Accept': 'application/json'
  },
  body: JSON.stringify({
    selected_attributes: selectedAttributes,
    include_out_of_stock: false,
    include_inactive: false
  })
});

const variants = await response.json();
// Update UI with matching variants and available sizes for brown color
```

### Step 3: User Selects Second Attribute (Size)
```javascript
// User selects medium size
const selectedAttributes = [
  { attribute_id: 1, value_id: 2 }, // Brown color
  { attribute_id: 2, value_id: 4 }  // Medium size
];

const response = await fetch('/api/b2c/products/1/variant/by-exact-attributes', {
  method: 'POST',
  headers: {
    'Content-Type': 'application/json',
    'Accept': 'application/json'
  },
  body: JSON.stringify({
    attributes: selectedAttributes
  })
});

const variant = await response.json();
// Display specific variant details, pricing, stock, and add to cart button
```

### Step 4: Dynamic Attribute Updates
```javascript
// When user changes color, get available sizes for that color
const response = await fetch('/api/b2c/products/1/available-attribute-values', {
  method: 'POST',
  headers: {
    'Content-Type': 'application/json',
    'Accept': 'application/json'
  },
  body: JSON.stringify({
    selected_attributes: [{ attribute_id: 1, value_id: 3 }], // Black color
    target_attribute_id: 2 // Get available sizes
  })
});

const availableSizes = await response.json();
// Update size options based on available sizes for black color
```

## Frontend Implementation Example

### React Component for Product Configurator
```javascript
import React, { useState, useEffect } from 'react';

function ProductConfigurator({ productId }) {
  const [configuration, setConfiguration] = useState(null);
  const [selectedAttributes, setSelectedAttributes] = useState([]);
  const [currentVariant, setCurrentVariant] = useState(null);
  const [loading, setLoading] = useState(false);

  // Load initial configuration
  useEffect(() => {
    loadConfiguration([]);
  }, [productId]);

  const loadConfiguration = async (attributes) => {
    setLoading(true);
    try {
      const response = await fetch(`/api/b2c/products/${productId}/configuration`, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json'
        },
        body: JSON.stringify({
          selected_attributes: attributes
        })
      });
      
      const data = await response.json();
      if (data.status) {
        setConfiguration(data.data);
        setSelectedAttributes(attributes);
        
        // Set current variant if only one matches
        if (data.data.current_variants.length === 1) {
          setCurrentVariant(data.data.current_variants[0]);
        }
      }
    } catch (error) {
      console.error('Error loading configuration:', error);
    } finally {
      setLoading(false);
    }
  };

  const handleAttributeChange = async (attributeId, valueId) => {
    const newAttributes = selectedAttributes.filter(attr => attr.attribute_id !== attributeId);
    newAttributes.push({ attribute_id: attributeId, value_id: valueId });
    
    await loadConfiguration(newAttributes);
  };

  const handleAddToCart = () => {
    if (currentVariant) {
      // Add current variant to cart
      console.log('Adding to cart:', currentVariant);
    }
  };

  if (!configuration) {
    return <div>Loading...</div>;
  }

  return (
    <div className="product-configurator">
      {/* Product Header */}
      <div className="product-header">
        <h1>{configuration.product.name}</h1>
        <div className="product-badge">20% OFF</div>
        <div className="product-rating">
          {configuration.product.rating.average_rating} ({configuration.product.rating.review_count} Reviews)
        </div>
        <div className="product-stats">
          <span>768 Purchased</span>
          <span>110 Stock</span>
        </div>
      </div>

      {/* Product Image */}
      <div className="product-image">
        <img 
          src={currentVariant?.image_url || configuration.product.image_url} 
          alt={configuration.product.name} 
        />
      </div>

      {/* Attribute Selection */}
      <div className="attribute-selection">
        {configuration.configuration.available_attributes.map(attrGroup => (
          <div key={attrGroup.attribute.id} className="attribute-group">
            <h3>{attrGroup.attribute.display_name}</h3>
            <div className="attribute-values">
              {attrGroup.available_values.map(value => (
                <button
                  key={value.id}
                  className={`attribute-value ${selectedAttributes.some(attr => 
                    attr.attribute_id === attrGroup.attribute.id && attr.value_id === value.id
                  ) ? 'selected' : ''} ${!value.is_available ? 'unavailable' : ''}`}
                  onClick={() => handleAttributeChange(attrGroup.attribute.id, value.id)}
                  disabled={!value.is_available}
                >
                  {value.display_value}
                </button>
              ))}
            </div>
          </div>
        ))}
      </div>

      {/* Product Information Tabs */}
      <div className="product-tabs">
        <div className="tab active">Description</div>
        <div className="tab">Size & Weight</div>
        <div className="tab">Material</div>
        <div className="tab">Review (1.24)</div>
      </div>

      {/* Product Description */}
      <div className="product-description">
        <p>{configuration.product.description}</p>
        <h4>Key Features</h4>
        <p>{configuration.product.key_features}</p>
      </div>

      {/* Pricing and Add to Cart */}
      <div className="product-pricing">
        <div className="total-price">
          Total Price: ${currentVariant?.selling_price || configuration.product.pricing.selling_price}
        </div>
        <button 
          className="add-to-cart-btn"
          onClick={handleAddToCart}
          disabled={!currentVariant || !currentVariant.is_in_stock}
        >
          Add to Cart
        </button>
      </div>

      {/* Quantity Selector */}
      <div className="quantity-selector">
        <label>Size:</label>
        <div className="quantity-controls">
          <button>-</button>
          <span>2</span>
          <button>+</button>
        </div>
      </div>
    </div>
  );
}

export default ProductConfigurator;
```

## CSS Styling for the Configurator
```css
.product-configurator {
  max-width: 1200px;
  margin: 0 auto;
  padding: 20px;
}

.product-header {
  display: flex;
  align-items: center;
  gap: 15px;
  margin-bottom: 20px;
}

.product-badge {
  background: #ff4444;
  color: white;
  padding: 4px 8px;
  border-radius: 4px;
  font-size: 12px;
  font-weight: bold;
}

.attribute-selection {
  margin: 20px 0;
}

.attribute-group {
  margin-bottom: 20px;
}

.attribute-group h3 {
  margin-bottom: 10px;
  font-size: 16px;
  font-weight: 600;
}

.attribute-values {
  display: flex;
  gap: 10px;
  flex-wrap: wrap;
}

.attribute-value {
  padding: 8px 16px;
  border: 2px solid #ddd;
  border-radius: 20px;
  background: white;
  cursor: pointer;
  transition: all 0.2s;
}

.attribute-value.selected {
  border-color: #007bff;
  background: #007bff;
  color: white;
}

.attribute-value.unavailable {
  opacity: 0.5;
  cursor: not-allowed;
}

.product-tabs {
  display: flex;
  border-bottom: 1px solid #ddd;
  margin: 20px 0;
}

.tab {
  padding: 10px 20px;
  cursor: pointer;
  border-bottom: 2px solid transparent;
}

.tab.active {
  border-bottom-color: #007bff;
  color: #007bff;
}

.product-pricing {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin: 20px 0;
  padding: 20px;
  background: #f8f9fa;
  border-radius: 8px;
}

.total-price {
  font-size: 24px;
  font-weight: bold;
}

.add-to-cart-btn {
  padding: 12px 24px;
  background: #28a745;
  color: white;
  border: none;
  border-radius: 6px;
  font-size: 16px;
  cursor: pointer;
}

.add-to-cart-btn:disabled {
  background: #6c757d;
  cursor: not-allowed;
}

.quantity-selector {
  display: flex;
  align-items: center;
  gap: 10px;
  margin: 20px 0;
}

.quantity-controls {
  display: flex;
  align-items: center;
  gap: 10px;
}

.quantity-controls button {
  width: 30px;
  height: 30px;
  border: 1px solid #ddd;
  background: white;
  cursor: pointer;
  border-radius: 4px;
}
```

## Error Handling

### Common Error Responses
```json
{
  "status": false,
  "message": "Product not found"
}
```

```json
{
  "status": false,
  "message": "No variant found with the specified attributes"
}
```

```json
{
  "status": false,
  "message": "Validation failed",
  "errors": {
    "selected_attributes": ["The selected attributes field is required."]
  }
}
```

## Performance Considerations

1. **Caching**: Cache product configurations and attribute combinations
2. **Pagination**: For products with many variants, implement pagination
3. **Lazy Loading**: Load attribute values only when needed
4. **Debouncing**: Debounce attribute selection requests to avoid excessive API calls

## Testing Scenarios

1. **Valid attribute combinations**: Test with valid attribute selections
2. **Invalid combinations**: Test with non-existent attribute combinations
3. **Out of stock variants**: Test behavior when selected attributes result in out-of-stock variants
4. **Multiple attributes**: Test with products having multiple attribute types
5. **Edge cases**: Test with products having no variants or single variants 