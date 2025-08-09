# Multiple Images Flow for Products and Product Variants

## Overview

This document describes the implementation of a comprehensive multiple images system for both products and product variants in the Done App API. The system supports different image types (main, gallery, thumbnail) with proper ordering and active/inactive status management.

## Database Structure

### 1. Product Images Table (`product_images`)

```sql
CREATE TABLE product_images (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    product_id BIGINT UNSIGNED NOT NULL,
    image_url VARCHAR(255) NOT NULL,
    type ENUM('main', 'gallery', 'thumbnail') DEFAULT 'gallery',
    sort_order INT DEFAULT 0,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE,
    INDEX idx_product_type (product_id, type),
    INDEX idx_product_sort (product_id, sort_order)
);
```

### 2. Product Variant Images Table (`product_variant_images`)

```sql
CREATE TABLE product_variant_images (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    variant_id BIGINT UNSIGNED NOT NULL,
    image_url VARCHAR(255) NOT NULL,
    type ENUM('main', 'gallery') DEFAULT 'main',
    sort_order INT DEFAULT 0,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    
    FOREIGN KEY (variant_id) REFERENCES product_variants(id) ON DELETE CASCADE,
    INDEX idx_variant_type (variant_id, type),
    INDEX idx_variant_sort (variant_id, sort_order)
);
```

## Models

### 1. ProductImage Model

```php
class ProductImage extends Model
{
    protected $fillable = [
        'product_id',
        'image_url',
        'type',
        'sort_order',
        'is_active'
    ];

    protected $casts = [
        'sort_order' => 'integer',
        'is_active' => 'boolean'
    ];

    // Relationships
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    // Scopes
    public function scopeActive($query) { ... }
    public function scopeMain($query) { ... }
    public function scopeGallery($query) { ... }
    public function scopeThumbnail($query) { ... }
    public function scopeOrdered($query) { ... }
}
```

### 2. ProductVariantImage Model

```php
class ProductVariantImage extends Model
{
    protected $fillable = [
        'variant_id',
        'image_url',
        'type',
        'sort_order',
        'is_active'
    ];

    protected $casts = [
        'type' => 'string',
        'sort_order' => 'integer',
        'is_active' => 'boolean'
    ];

    // Relationships
    public function variant(): BelongsTo
    {
        return $this->belongsTo(ProductVariant::class, 'variant_id');
    }

    // Scopes
    public function scopeActive($query) { ... }
    public function scopeMain($query) { ... }
    public function scopeGallery($query) { ... }
    public function scopeOrdered($query) { ... }
}
```

## Updated Product Model Relationships

```php
class Product extends Model
{
    // New image relationships
    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class)->active()->ordered();
    }

    public function mainImage(): HasOne
    {
        return $this->hasOne(ProductImage::class)->where('type', 'main')->active();
    }

    public function galleryImages(): HasMany
    {
        return $this->hasMany(ProductImage::class)->where('type', 'gallery')->active()->ordered();
    }

    public function thumbnailImages(): HasMany
    {
        return $this->hasMany(ProductImage::class)->where('type', 'thumbnail')->active()->ordered();
    }

    // Updated main image URL attribute
    public function getMainImageUrlAttribute()
    {
        // First try to get from product images
        if ($this->mainImage) {
            return $this->mainImage->image_url;
        }
        
        // Fallback to legacy image_url field
        if ($this->image_url) {
            return $this->image_url;
        }
        
        // Finally fallback to main variant image
        if ($this->mainVariant && $this->mainVariant->image_url) {
            return $this->mainVariant->image_url;
        }
        
        return null;
    }

    // Get all images for this product
    public function getAllImagesAttribute()
    {
        $images = collect();
        
        // Add main image if exists
        if ($this->mainImage) {
            $images->push($this->mainImage);
        }
        
        // Add gallery images
        $images = $images->merge($this->galleryImages);
        
        // Add thumbnail images
        $images = $images->merge($this->thumbnailImages);
        
        return $images->sortBy('sort_order');
    }
}
```

## Updated ProductVariant Model Relationships

```php
class ProductVariant extends Model
{
    // Updated image relationships
    public function images(): HasMany
    {
        return $this->hasMany(ProductVariantImage::class, 'variant_id')->active()->ordered();
    }

    public function mainImage(): HasOne
    {
        return $this->hasOne(ProductVariantImage::class, 'variant_id')->where('type', 'main')->active();
    }

    public function galleryImages(): HasMany
    {
        return $this->hasMany(ProductVariantImage::class, 'variant_id')->where('type', 'gallery')->active()->ordered();
    }
}
```

## API Response Structure

### 1. Product List Response (formatProduct)

```json
{
    "id": 1,
    "name": "Product Name",
    "description": "Product description",
    "selling_price": "99.99",
    "image_url": "http://example.com/products/1_main.webp",
    "images": {
        "main": {
            "id": 1,
            "image_url": "http://example.com/products/1_main.webp",
            "type": "main"
        },
        "gallery": [
            {
                "id": 2,
                "image_url": "http://example.com/products/1_gallery_1.webp",
                "type": "gallery",
                "sort_order": 1
            },
            {
                "id": 3,
                "image_url": "http://example.com/products/1_gallery_2.webp",
                "type": "gallery",
                "sort_order": 2
            }
        ],
        "all": [
            {
                "id": 1,
                "image_url": "http://example.com/products/1_main.webp",
                "type": "main",
                "sort_order": 0
            },
            {
                "id": 2,
                "image_url": "http://example.com/products/1_gallery_1.webp",
                "type": "gallery",
                "sort_order": 1
            }
        ]
    },
    "main_variant": {
        "id": 1,
        "sku": "PROD-001",
        "price": "99.99",
        "stock": 10,
        "image_url": "http://example.com/variants/1_main.webp",
        "images": {
            "main": {
                "id": 1,
                "image_url": "http://example.com/variants/1_main.webp",
                "type": "main"
            },
            "gallery": [
                {
                    "id": 2,
                    "image_url": "http://example.com/variants/1_gallery_1.webp",
                    "type": "gallery",
                    "sort_order": 1
                }
            ]
        }
    }
}
```

### 2. Product Detail Response (formatProductDetail)

```json
{
    "id": 1,
    "name": "Product Name",
    "description": "Product description",
    "key_features": "Key features text",
    "selling_price": "99.99",
    "cost_price": "79.99",
    "images": {
        "main": { ... },
        "gallery": [ ... ],
        "all": [ ... ]
    },
    "variants": [
        {
            "id": 1,
            "sku": "PROD-001",
            "price": "99.99",
            "stock": 10,
            "image_url": "http://example.com/variants/1_main.webp",
            "images": {
                "main": { ... },
                "gallery": [ ... ],
                "all": [ ... ]
            }
        }
    ]
}
```

### 3. Product Full Detail Response (formatProductFullDetail)

```json
{
    "id": 1,
    "name": "Product Name",
    "description": "Product description",
    "key_features": "Key features text",
    "slug": "product-name",
    "image_url": "http://example.com/products/1_main.webp",
    "images": {
        "main": { ... },
        "gallery": [ ... ],
        "all": [ ... ]
    },
    "variants": {
        "summary": {
            "total_variants": 3,
            "active_variants": 3,
            "in_stock_variants": 2,
            "on_sale_variants": 1,
            "price_range": {
                "min": "89.99",
                "max": "129.99"
            }
        },
        "list": [
            {
                "id": 1,
                "sku": "PROD-001",
                "price": "99.99",
                "selling_price": "99.99",
                "original_price": "119.99",
                "cost_price": "79.99",
                "stock": 10,
                "min_stock": 5,
                "is_active": true,
                "is_featured": false,
                "is_in_stock": true,
                "is_on_sale": true,
                "discount_percentage": 16.67,
                "image_url": "http://example.com/variants/1_main.webp",
                "images": {
                    "main": { ... },
                    "gallery": [ ... ],
                    "all": [ ... ]
                },
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
        ]
    }
}
```

## Image Types and Usage

### 1. Product Images

- **Main Image**: Primary product image, displayed in product listings and as the default image
- **Gallery Images**: Additional product images for detailed product views, image galleries, and carousels
- **Thumbnail Images**: Smaller versions for thumbnails, quick previews, and mobile views

### 2. Product Variant Images

- **Main Image**: Primary variant image, displayed when this specific variant is selected
- **Gallery Images**: Additional variant images for detailed variant views

## Migration and Seeding

### 1. Run Migrations

```bash
php artisan migrate
```

This will create:
- `product_images` table
- Enhanced `product_variant_images` table with new fields

### 2. Run Seeders

```bash
php artisan db:seed --class=ProductImageSeeder
php artisan db:seed --class=ProductVariantImageSeeder
```

Or run all seeders:

```bash
php artisan db:seed
```

## Backward Compatibility

The implementation maintains backward compatibility with the existing single image system:

1. **Legacy Support**: The `image_url` field in products and variants is still supported
2. **Fallback Chain**: 
   - Product main image: `product_images.main` → `products.image_url` → `product_variants.image_url`
   - Variant main image: `product_variant_images.main` → `product_variants.image_url`

## API Endpoints

All existing product endpoints now return the enhanced image structure:

- `GET /api/b2c/products` - Product list with multiple images
- `GET /api/b2c/products/{id}` - Product detail with multiple images
- `GET /api/b2c/products/{id}/basic` - Basic product info with multiple images
- `GET /api/b2c/products/{id}/variants` - Product variants with multiple images

## Frontend Integration

### 1. Display Main Image

```javascript
// Use the main image URL
const mainImageUrl = product.image_url;

// Or access the structured images
const mainImage = product.images.main?.image_url || product.image_url;
```

### 2. Display Image Gallery

```javascript
// Get all gallery images
const galleryImages = product.images.gallery.map(img => img.image_url);

// Or get all images (main + gallery + thumbnails)
const allImages = product.images.all.map(img => img.image_url);
```

### 3. Variant Image Switching

```javascript
// When variant is selected, show its main image
const variantMainImage = selectedVariant.images.main?.image_url || selectedVariant.image_url;

// Show variant gallery
const variantGallery = selectedVariant.images.gallery.map(img => img.image_url);
```

## Best Practices

1. **Image Optimization**: Ensure all images are properly optimized for web use
2. **Consistent Sizing**: Maintain consistent aspect ratios for main images
3. **Sort Order**: Use sort_order to control image display sequence
4. **Active Status**: Use is_active to temporarily hide images without deletion
5. **Fallback Handling**: Always provide fallback images for better UX

## Future Enhancements

1. **Image Upload API**: Endpoints for uploading and managing product images
2. **Image Processing**: Automatic image resizing and optimization
3. **CDN Integration**: Cloud storage for better image delivery
4. **Image Analytics**: Track image performance and user interactions
5. **Bulk Operations**: APIs for bulk image management 