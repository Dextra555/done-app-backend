# Multiple Image Upload System Documentation

## Overview

This document explains the comprehensive multiple image upload system implemented for products and variants in both the admin panel and API. The system supports main images, gallery images, and proper image management with sorting and activation controls.

## System Architecture

### Database Structure

#### Product Images Table (`product_images`)
```sql
- id (Primary Key)
- product_id (Foreign Key to products)
- image_url (Path to image file)
- type (main/gallery/thumbnail)
- sort_order (Integer for ordering)
- is_active (Boolean for visibility)
- created_at, updated_at
```

#### Product Variant Images Table (`product_variant_images`)
```sql
- id (Primary Key)
- variant_id (Foreign Key to product_variants)
- image_url (Path to image file)
- type (main/gallery/thumbnail)
- sort_order (Integer for ordering)
- is_active (Boolean for visibility)
- created_at, updated_at
```

### Model Relationships

#### Product Model
```php
// Main image relationship
public function mainImage()
{
    return $this->hasOne(ProductImage::class)->where('type', 'main')->active();
}

// Gallery images relationship
public function galleryImages()
{
    return $this->hasMany(ProductImage::class)->where('type', 'gallery')->active()->ordered();
}

// All images relationship
public function images()
{
    return $this->hasMany(ProductImage::class)->active()->ordered();
}
```

#### ProductVariant Model
```php
// Main image relationship
public function mainImage()
{
    return $this->hasOne(ProductVariantImage::class, 'variant_id')->where('type', 'main')->active();
}

// Gallery images relationship
public function galleryImages()
{
    return $this->hasMany(ProductVariantImage::class, 'variant_id')->where('type', 'gallery')->active()->ordered();
}

// All images relationship
public function images()
{
    return $this->hasMany(ProductVariantImage::class, 'variant_id')->active()->ordered();
}
```

## Admin Panel Implementation

### Product Management

#### Create Product Form
- **Main Image**: Single image upload with drag & drop
- **Gallery Images**: Multiple image upload (up to 10 images)
- **Preview**: Real-time image preview with remove functionality
- **Validation**: File type (JPEG, PNG, JPG, GIF, WEBP) and size (10MB max)

#### Edit Product Form
- **Existing Images**: Display current images with sort order and active status
- **Add New Images**: Upload additional main or gallery images
- **Image Management**: Reorder, activate/deactivate, delete individual images
- **Bulk Operations**: Remove multiple images at once

### Variant Management

#### Create Variant Form
- **Main Image**: Single image upload for variant
- **Gallery Images**: Multiple image upload for variant gallery
- **Preview**: Real-time preview with remove functionality
- **Validation**: Same validation rules as products

#### Edit Variant Form
- **Existing Images**: Manage current variant images
- **Add New Images**: Upload additional images
- **Image Management**: Full CRUD operations on variant images

## Edit Forms Implementation

### Product Edit Form Features

#### Existing Image Management
```blade
<!-- Display existing images with management controls -->
@if($product->images->count() > 0)
    <div class="space-y-3">
        @foreach($product->images->sortBy('sort_order') as $image)
            <div class="flex items-center space-x-3 p-3 bg-white rounded-lg border border-gray-200">
                <img src="{{ $image->image_url }}" alt="Product image" class="w-16 h-16 object-cover rounded-lg">
                <div class="flex-1">
                    <!-- Image type and status badges -->
                    <div class="flex items-center space-x-2 mb-1">
                        <span class="text-xs font-medium px-2 py-1 rounded-full 
                            {{ $image->type === 'main' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800' }}">
                            {{ ucfirst($image->type) }}
                        </span>
                        @if($image->is_active)
                            <span class="text-xs font-medium px-2 py-1 rounded-full bg-green-100 text-green-800">Active</span>
                        @else
                            <span class="text-xs font-medium px-2 py-1 rounded-full bg-red-100 text-red-800">Inactive</span>
                        @endif
                    </div>
                    
                    <!-- Sort order and active status controls -->
                    <div class="flex items-center space-x-2">
                        <input type="number" 
                               name="existing_images[{{ $image->id }}][sort_order]" 
                               value="{{ $image->sort_order }}" 
                               min="1" 
                               class="w-16 text-xs border-gray-300 rounded px-2 py-1">
                        <label class="text-xs text-gray-600">Sort Order</label>
                        <label class="flex items-center">
                            <input type="checkbox" 
                                   name="existing_images[{{ $image->id }}][is_active]" 
                                   value="1" 
                                   {{ $image->is_active ? 'checked' : '' }}>
                            <span class="ml-1 text-xs text-gray-600">Active</span>
                        </label>
                    </div>
                </div>
                
                <!-- Delete button -->
                <div class="flex flex-col space-y-1">
                    <button type="button" 
                            onclick="deleteImage({{ $image->id }})" 
                            class="text-red-600 hover:text-red-800 text-xs">
                        Delete
                    </button>
                </div>
            </div>
        @endforeach
    </div>
@endif
```

#### Add New Images Section
```blade
<!-- Add new main image -->
<div>
    <label for="main_image" class="block text-sm font-medium text-gray-700">Add New Main Image</label>
    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-gray-400 transition-colors duration-200">
        <div class="space-y-1 text-center">
            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                <!-- SVG path -->
            </svg>
            <div class="flex text-sm text-gray-600">
                <label for="main_image" class="relative cursor-pointer bg-white rounded-md font-medium text-primary-600 hover:text-primary-500">
                    <span>Upload new main image</span>
                    <input id="main_image" name="main_image" type="file" class="sr-only" accept="image/*" onchange="previewMainImage(this)">
                </label>
                <p class="pl-1">or drag and drop</p>
            </div>
            <p class="text-xs text-gray-500">PNG, JPG, GIF, WEBP up to 10MB</p>
        </div>
    </div>
    <div id="main-image-preview" class="mt-3 hidden">
        <img id="main-preview-img" src="" alt="Main Image Preview" class="w-32 h-32 object-cover rounded-lg border border-gray-200">
        <button type="button" onclick="removeMainImage()" class="mt-2 text-sm text-red-600 hover:text-red-800">
            Remove New Main Image
        </button>
    </div>
</div>

<!-- Add new gallery images -->
<div>
    <label for="gallery_images" class="block text-sm font-medium text-gray-700">Add New Gallery Images</label>
    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-gray-400 transition-colors duration-200">
        <!-- Similar structure for gallery images -->
        <input id="gallery_images" name="gallery_images[]" type="file" class="sr-only" accept="image/*" multiple onchange="previewGalleryImages(this)">
    </div>
    <div id="gallery-images-preview" class="mt-3 hidden">
        <div id="gallery-preview-container" class="grid grid-cols-4 gap-2">
            <!-- Gallery image previews will be added here -->
        </div>
        <button type="button" onclick="removeAllGalleryImages()" class="mt-2 text-sm text-red-600 hover:text-red-800">
            Remove All New Gallery Images
        </button>
    </div>
</div>
```

### Variant Edit Form Features

#### Existing Variant Image Management
```blade
<!-- Display existing variant images with management controls -->
@if($variant->images->count() > 0)
    <div class="space-y-3">
        @foreach($variant->images->sortBy('sort_order') as $image)
            <div class="flex items-center space-x-3 p-3 bg-amber-50 rounded-lg border border-amber-200">
                <img src="{{ $image->image_url }}" alt="Variant image" class="w-16 h-16 object-cover rounded-lg">
                <div class="flex-1">
                    <!-- Image type and status badges -->
                    <div class="flex items-center space-x-2 mb-1">
                        <span class="text-xs font-medium px-2 py-1 rounded-full 
                            {{ $image->type === 'main' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800' }}">
                            {{ ucfirst($image->type) }}
                        </span>
                        @if($image->is_active)
                            <span class="text-xs font-medium px-2 py-1 rounded-full bg-green-100 text-green-800">Active</span>
                        @else
                            <span class="text-xs font-medium px-2 py-1 rounded-full bg-red-100 text-red-800">Inactive</span>
                        @endif
                    </div>
                    
                    <!-- Sort order and active status controls -->
                    <div class="flex items-center space-x-2">
                        <input type="number" 
                               name="existing_images[{{ $image->id }}][sort_order]" 
                               value="{{ $image->sort_order }}" 
                               min="1" 
                               class="w-16 text-xs border-amber-300 rounded px-2 py-1">
                        <label class="text-xs text-amber-600">Sort Order</label>
                        <label class="flex items-center">
                            <input type="checkbox" 
                                   name="existing_images[{{ $image->id }}][is_active]" 
                                   value="1" 
                                   {{ $image->is_active ? 'checked' : '' }}>
                            <span class="ml-1 text-xs text-amber-600">Active</span>
                        </label>
                    </div>
                </div>
                
                <!-- Delete button -->
                <div class="flex flex-col space-y-1">
                    <button type="button" 
                            onclick="deleteVariantImage({{ $image->id }})" 
                            class="text-red-600 hover:text-red-800 text-xs">
                        Delete
                    </button>
                </div>
            </div>
        @endforeach
    </div>
@endif
```

### Frontend Features

#### Drag & Drop Upload
```javascript
// Main image preview
function previewMainImage(input) {
    const file = input.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('main-preview-img').src = e.target.result;
            document.getElementById('main-image-preview').classList.remove('hidden');
        }
        reader.readAsDataURL(file);
    } else {
        document.getElementById('main-image-preview').classList.add('hidden');
    }
}

// Gallery images preview
function previewGalleryImages(input) {
    const files = input.files;
    const container = document.getElementById('gallery-preview-container');
    
    for (let i = 0; i < files.length; i++) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const imageDiv = document.createElement('div');
            imageDiv.innerHTML = `
                <img src="${e.target.result}" alt="Gallery Preview" class="w-16 h-16 object-cover rounded-lg">
                <button onclick="removeGalleryImage(${index})" class="remove-btn">×</button>
            `;
            container.appendChild(imageDiv);
        }
        reader.readAsDataURL(files[i]);
    }
}
```

#### Image Management Functions
```javascript
// Delete existing image functionality
function deleteImage(imageId) {
    if (confirm('Are you sure you want to delete this image? This action cannot be undone.')) {
        // Create a hidden input for the image to be deleted
        const deleteInput = document.createElement('input');
        deleteInput.type = 'hidden';
        deleteInput.name = 'delete_images[]';
        deleteInput.value = imageId;
        document.querySelector('form').appendChild(deleteInput);
        
        // Hide the image container
        const imageContainer = document.querySelector(`[onclick="deleteImage(${imageId})"]`).closest('.flex');
        if (imageContainer) {
            imageContainer.style.display = 'none';
        }
    }
}

// Remove new main image
function removeMainImage() {
    document.getElementById('main_image').value = '';
    document.getElementById('main-image-preview').classList.add('hidden');
    document.getElementById('main-preview-img').src = '';
}

// Remove all new gallery images
function removeAllGalleryImages() {
    document.getElementById('gallery_images').value = '';
    document.getElementById('gallery-images-preview').classList.add('hidden');
    document.getElementById('gallery-preview-container').innerHTML = '';
    galleryImageCount = 0;
}
```

## API Implementation

### B2C Product API

#### Product Listing (`/api/b2c/products`)
```json
{
    "status": true,
    "data": {
        "products": [
            {
                "id": 1,
                "name": "Product Name",
                "images": {
                    "main": {
                        "id": 1,
                        "image_url": "https://example.com/products/main.jpg",
                        "type": "main"
                    },
                    "gallery": [
                        {
                            "id": 2,
                            "image_url": "https://example.com/products/gallery1.jpg",
                            "type": "gallery",
                            "sort_order": 1
                        }
                    ],
                    "all": [
                        // Combined array of all images
                    ]
                }
            }
        ]
    }
}
```

#### Product Detail (`/api/b2c/products/{id}`)
```json
{
    "status": true,
    "data": {
        "product": {
            "id": 1,
            "name": "Product Name",
            "images": {
                "main": { /* main image data */ },
                "gallery": [ /* gallery images array */ ],
                "all": [ /* all images array */ ]
            },
            "variants": [
                {
                    "id": 1,
                    "sku": "SKU-001",
                    "images": {
                        "main": { /* variant main image */ },
                        "gallery": [ /* variant gallery images */ ],
                        "all": [ /* all variant images */ ]
                    }
                }
            ]
        }
    }
}
```

#### Product Variants (`/api/b2c/products/{id}/variants`)
```json
{
    "status": true,
    "data": {
        "variants": [
            {
                "id": 1,
                "sku": "SKU-001",
                "image_url": "https://example.com/variants/main.jpg",
                "images": [
                    {
                        "id": 1,
                        "image_url": "https://example.com/variants/main.jpg",
                        "type": "main",
                        "sort_order": 1
                    },
                    {
                        "id": 2,
                        "image_url": "https://example.com/variants/gallery1.jpg",
                        "type": "gallery",
                        "sort_order": 2
                    }
                ]
            }
        ]
    }
}
```

## File Storage

### Directory Structure
```
public/
├── products/
│   ├── 1753876526_image1.jpg
│   ├── 1753876545_image2.png
│   └── ...
└── variants/
    ├── 1753959554_variant1.jpg
    ├── 1753959655_variant2.png
    └── ...
```

### Upload Helper Methods
```php
/**
 * Upload image helper method
 */
private function uploadImage($image, $directory)
{
    $imageName = time() . '_' . $image->getClientOriginalName();
    $uploadPath = public_path($directory);
    
    // Create directory if it doesn't exist
    if (!file_exists($uploadPath)) {
        mkdir($uploadPath, 0755, true);
    }
    
    $image->move($uploadPath, $imageName);
    return '/' . $directory . '/' . $imageName;
}

/**
 * Delete image helper method
 */
private function deleteImage($imageUrl)
{
    if ($imageUrl && file_exists(public_path(ltrim($imageUrl, '/')))) {
        unlink(public_path(ltrim($imageUrl, '/')));
    }
}
```

## Validation Rules

### Product Image Validation
```php
'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
'gallery_images' => 'nullable|array|max:10',
'gallery_images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:10240',
```

### Variant Image Validation
```php
'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
'gallery_images' => 'nullable|array|max:10',
'gallery_images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:10240',
```

## Image Management Features

### Sort Order
- Images are automatically assigned sort order when uploaded
- Main images get sort_order = 1
- Gallery images get incrementing sort orders starting from 2
- Sort order can be manually adjusted in edit forms

### Active/Inactive Status
- Images can be activated or deactivated without deletion
- Inactive images are not shown in API responses
- Useful for temporary hiding of images

### Image Types
- **main**: Primary image for product/variant
- **gallery**: Additional images for product/variant gallery
- **thumbnail**: Smaller versions (future implementation)

## API Response Formatting

### Image URL Formatting
```php
// In API controllers
'image_url' => $image->image_url ? url($image->image_url) : null,
```

### Image Grouping
```php
'images' => [
    'main' => $product->mainImage ? [
        'id' => $product->mainImage->id,
        'image_url' => url($product->mainImage->image_url),
        'type' => $product->mainImage->type
    ] : null,
    'gallery' => $product->galleryImages->map(function ($image) {
        return [
            'id' => $image->id,
            'image_url' => url($image->image_url),
            'type' => $image->type,
            'sort_order' => $image->sort_order
        ];
    }),
    'all' => $product->all_images->map(function ($image) {
        return [
            'id' => $image->id,
            'image_url' => url($image->image_url),
            'type' => $image->type,
            'sort_order' => $image->sort_order
        ];
    })
]
```

## Security Considerations

### File Upload Security
- File type validation (only images allowed)
- File size limits (10MB max)
- Unique filename generation (timestamp + original name)
- Directory traversal protection

### Access Control
- Admin authentication required for upload operations
- Product/variant ownership validation
- Image deletion restricted to product/variant owners

## Performance Optimizations

### Database Queries
- Eager loading of image relationships
- Proper indexing on foreign keys and sort_order
- Scoped queries for active images only

### File Storage
- Organized directory structure
- Efficient file naming convention
- Automatic cleanup of orphaned files

## Usage Examples

### Creating a Product with Multiple Images
```php
// In ProductController::store()
$product = Product::create([...]);

// Handle main image
if ($request->hasFile('main_image')) {
    $mainImageUrl = $this->uploadImage($request->file('main_image'), 'products');
    ProductImage::create([
        'product_id' => $product->id,
        'image_url' => $mainImageUrl,
        'type' => 'main',
        'sort_order' => 1,
        'is_active' => true
    ]);
}

// Handle gallery images
if ($request->hasFile('gallery_images')) {
    $sortOrder = 2;
    foreach ($request->file('gallery_images') as $galleryImage) {
        $imageUrl = $this->uploadImage($galleryImage, 'products');
        ProductImage::create([
            'product_id' => $product->id,
            'image_url' => $imageUrl,
            'type' => 'gallery',
            'sort_order' => $sortOrder++,
            'is_active' => true
        ]);
    }
}
```

### Updating a Product with Image Management
```php
// In ProductController::update()
$product = Product::find($id);

// Handle main image upload
if ($request->hasFile('main_image')) {
    // Delete old main image
    $oldMainImage = $product->mainImage;
    if ($oldMainImage) {
        $this->deleteImage($oldMainImage->image_url);
        $oldMainImage->delete();
    }
    
    $mainImageUrl = $this->uploadImage($request->file('main_image'), 'products');
    
    // Create new main image record
    ProductImage::create([
        'product_id' => $product->id,
        'image_url' => $mainImageUrl,
        'type' => 'main',
        'sort_order' => 1,
        'is_active' => true
    ]);
}

// Handle gallery images upload
if ($request->hasFile('gallery_images')) {
    $maxSortOrder = $product->images()->max('sort_order') ?? 1;
    foreach ($request->file('gallery_images') as $galleryImage) {
        $imageUrl = $this->uploadImage($galleryImage, 'products');
        ProductImage::create([
            'product_id' => $product->id,
            'image_url' => $imageUrl,
            'type' => 'gallery',
            'sort_order' => ++$maxSortOrder,
            'is_active' => true
        ]);
    }
}

// Handle existing images updates (sort order, active status)
if ($request->has('existing_images')) {
    foreach ($request->existing_images as $imageData) {
        $image = ProductImage::find($imageData['id']);
        if ($image && $image->product_id === $product->id) {
            $image->update([
                'sort_order' => $imageData['sort_order'] ?? $image->sort_order,
                'is_active' => $imageData['is_active'] ?? $image->is_active
            ]);
        }
    }
}

// Handle image deletions
if ($request->has('delete_images')) {
    foreach ($request->delete_images as $imageId) {
        $image = ProductImage::find($imageId);
        if ($image && $image->product_id === $product->id) {
            $this->deleteImage($image->image_url);
            $image->delete();
        }
    }
}
```

### Retrieving Product Images in API
```php
// In ProductController::show()
$product = Product::with([
    'mainImage',
    'galleryImages',
    'variants.mainImage',
    'variants.galleryImages'
])->find($id);

return response()->json([
    'status' => true,
    'data' => [
        'product' => [
            'id' => $product->id,
            'name' => $product->name,
            'images' => [
                'main' => $product->mainImage ? [
                    'id' => $product->mainImage->id,
                    'image_url' => url($product->mainImage->image_url),
                    'type' => $product->mainImage->type
                ] : null,
                'gallery' => $product->galleryImages->map(function ($image) {
                    return [
                        'id' => $image->id,
                        'image_url' => url($image->image_url),
                        'type' => $image->type,
                        'sort_order' => $image->sort_order
                    ];
                })
            ]
        ]
    ]
]);
```

## Testing

### Admin Panel Testing
1. Create product with main image
2. Add gallery images
3. Edit product and reorder images
4. Deactivate/activate images
5. Delete individual images
6. Test variant image upload

### Edit Form Testing
1. **Product Edit Form**:
   - View existing images with proper badges
   - Change sort order of existing images
   - Toggle active/inactive status
   - Delete individual images
   - Add new main image
   - Add new gallery images
   - Preview new images before upload
   - Remove new images before submission

2. **Variant Edit Form**:
   - View existing variant images
   - Manage variant image properties
   - Add new variant images
   - Delete variant images
   - Test image preview functionality

### API Testing
1. Test product listing with images
2. Test product detail with all image types
3. Test variant images in API responses
4. Verify image URL formatting
5. Test image sorting and filtering

## Future Enhancements

### Planned Features
- Image resizing and optimization
- Multiple image formats (WebP, AVIF)
- CDN integration
- Image lazy loading
- Bulk image operations
- Image metadata storage
- Image search and filtering

### Technical Improvements
- Image compression
- Thumbnail generation
- Image caching
- Progressive image loading
- Image watermarking
- EXIF data extraction

## Conclusion

The multiple image upload system provides a comprehensive solution for managing product and variant images in both the admin panel and API. It supports main images, gallery images, proper sorting, activation controls, and efficient file management. The system is designed to be scalable, secure, and user-friendly while maintaining backward compatibility with existing single-image implementations.

### Key Features Summary

#### Admin Panel
- ✅ **Create Forms**: Multiple image upload with drag & drop
- ✅ **Edit Forms**: Complete image management with existing image display
- ✅ **Image Management**: Sort, activate/deactivate, delete operations
- ✅ **Real-time Preview**: Image preview before upload
- ✅ **Validation**: File type and size validation

#### API
- ✅ **Structured Responses**: Organized image data in API responses
- ✅ **Multiple Image Types**: Main and gallery image separation
- ✅ **Proper URL Formatting**: Full URLs with domain
- ✅ **Image Sorting**: Ordered image arrays
- ✅ **Backward Compatibility**: Maintains existing API structure

#### Database
- ✅ **Proper Relationships**: Efficient model relationships
- ✅ **Image Metadata**: Type, sort order, active status
- ✅ **File Management**: Organized storage structure
- ✅ **Data Integrity**: Foreign key constraints and validation 