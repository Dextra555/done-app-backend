<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductAttribute;
use App\Models\AttributeValue;
use App\Models\ProductVariantImage;
use Illuminate\Http\Request;

class ProductVariantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display variants for a specific product
     */
    public function index(Product $product)
    {
        $variants = $product->variants()->with(['images', 'attributeValues.attribute'])->paginate(15);
        $attributes = ProductAttribute::with('subAttributes')->get();
        
        return view('admin.products.variants.index', compact('product', 'variants', 'attributes'));
    }

    /**
     * Show the form for creating a new variant
     */
    public function create(Product $product)
    {
        $attributes = ProductAttribute::with(['subAttributes', 'values'])->get();
        
        return view('admin.products.variants.create', compact('product', 'attributes'));
    }

    /**
     * Store a newly created variant
     */
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'sku' => 'required|string|max:100|unique:product_variants,sku',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
            'other_images' => 'nullable|array|max:10',
            'other_images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:10240',
            'attribute_values' => 'nullable|array',
            'attribute_values.*' => 'exists:attribute_values,id',
        ]);

        $mainImageUrl = null;
        
        // Handle main image upload
        if ($request->hasFile('main_image')) {
            $mainImageUrl = $this->uploadImage($request->file('main_image'), 'variants');
        }

        $variant = $product->variants()->create([
            'sku' => $request->sku,
            'stock' => $request->stock,
            'price' => $request->price,
            'selling_price' => $request->selling_price ?: $request->price,
            'original_price' => $request->original_price ?: $request->price,
            'cost_price' => $request->cost_price,
            'weight' => $request->weight,
            'length' => $request->length,
            'width' => $request->width,
            'height' => $request->height,
            'min_stock' => $request->min_stock ?: 5,
            'is_active' => $request->has('is_active'),
            'is_featured' => $request->has('is_featured'),
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'slug' => $request->slug ?: \Str::slug($request->sku),
            'image_url' => $mainImageUrl, // Keep for backward compatibility
        ]);

        // Handle main image in product_variant_images table
        if ($mainImageUrl) {
            ProductVariantImage::create([
                'variant_id' => $variant->id,
                'image_url' => $mainImageUrl,
                'type' => 'main',
                'sort_order' => 1,
                'is_active' => true
            ]);
        }

        // Handle gallery images
        if ($request->hasFile('other_images')) {
            $sortOrder = 2; // Start after main image
            foreach ($request->file('other_images') as $otherImage) {
                $imageUrl = $this->uploadImage($otherImage, 'variants');
                ProductVariantImage::create([
                    'variant_id' => $variant->id,
                    'image_url' => $imageUrl,
                    'type' => 'other',
                    'sort_order' => $sortOrder++,
                    'is_active' => true
                ]);
            }
        }

        // Handle attribute blocks
        if ($request->has('attribute_blocks')) {
            $attributeValueIds = [];
            
            foreach ($request->attribute_blocks as $block) {
                // Add main attribute value
                if (!empty($block['attribute_value_id'])) {
                    $attributeValueIds[] = $block['attribute_value_id'];
                }
                
                // Add sub-attribute value if provided
                if (!empty($block['sub_attribute_value_id'])) {
                    $attributeValueIds[] = $block['sub_attribute_value_id'];
                }
            }
            
            // Attach all attribute values
            if (!empty($attributeValueIds)) {
                $variant->attributeValues()->attach($attributeValueIds);
            }
        }

        return redirect()->route('admin.products.variants.index', $product)
            ->with('success', 'Product variant created successfully!');
    }

    /**
     * Display the specified variant
     */
    public function show(Product $product, ProductVariant $variant)
    {
        $variant->load(['images', 'attributeValues.attribute', 'attributeValues.subAttribute']);
        
        return view('admin.products.variants.show', compact('product', 'variant'));
    }

    /**
     * Show the form for editing the specified variant
     */
    public function edit(Product $product, ProductVariant $variant)
    {
        $attributes = ProductAttribute::with(['subAttributes', 'values'])->get();
        $variant->load(['attributeValues', 'images']);
        
        return view('admin.products.variants.edit', compact('product', 'variant', 'attributes'));
    }

    /**
     * Update the specified variant
     */
    public function update(Request $request, Product $product, ProductVariant $variant)
    {
        $request->validate([
            'sku' => 'required|string|max:100|unique:product_variants,sku,' . $variant->id,
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'selling_price' => 'nullable|numeric|min:0',
            'original_price' => 'nullable|numeric|min:0',
            'cost_price' => 'nullable|numeric|min:0',
            'weight' => 'nullable|numeric|min:0',
            'length' => 'nullable|numeric|min:0',
            'width' => 'nullable|numeric|min:0',
            'height' => 'nullable|numeric|min:0',
            'min_stock' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
            'is_featured' => 'nullable|boolean',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'slug' => 'nullable|string|max:255|unique:product_variants,slug,' . $variant->id,
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
            'other_images' => 'nullable|array|max:10',
            'other_images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:10240',
            'existing_images' => 'nullable|array',
            'existing_images.*.id' => 'exists:product_variant_images,id',
            'existing_images.*.sort_order' => 'integer|min:1',
            'existing_images.*.is_active' => 'boolean',
            'delete_images' => 'nullable|array',
            'delete_images.*' => 'exists:product_variant_images,id',
            'attribute_values' => 'nullable|array',
            'attribute_values.*' => 'exists:attribute_values,id',
        ]);

        $mainImageUrl = $variant->image_url; // Keep existing image if no new one uploaded
        
        // Handle main image upload
        if ($request->hasFile('main_image')) {
            // Delete old main image
            $oldMainImage = $variant->mainImage;
            if ($oldMainImage) {
                $this->deleteImage($oldMainImage->image_url);
                $oldMainImage->delete();
            }
            
            $mainImageUrl = $this->uploadImage($request->file('main_image'), 'variants');
            
            // Create new main image record
            ProductVariantImage::create([
                'variant_id' => $variant->id,
                'image_url' => $mainImageUrl,
                'type' => 'main',
                'sort_order' => 1,
                'is_active' => true
            ]);
        }

        // Handle gallery images upload
        if ($request->hasFile('other_images')) {
            $maxSortOrder = $variant->images()->max('sort_order') ?? 1;
            foreach ($request->file('other_images') as $otherImage) {
                $imageUrl = $this->uploadImage($otherImage, 'variants');
                ProductVariantImage::create([
                    'variant_id' => $variant->id,
                    'image_url' => $imageUrl,
                    'type' => 'other',
                    'sort_order' => ++$maxSortOrder,
                    'is_active' => true
                ]);
            }
        }

        // Handle existing images updates (sort order, active status)
        if ($request->has('existing_images')) {
            foreach ($request->existing_images as $imageData) {
                $image = ProductVariantImage::find($imageData['id']);
                if ($image && $image->variant_id === $variant->id) {
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
                $image = ProductVariantImage::find($imageId);
                if ($image && $image->variant_id === $variant->id) {
                    $this->deleteImage($image->image_url);
                    $image->delete();
                }
            }
        }

        // Track changes for history
        $oldPrice = $variant->price;
        $oldSellingPrice = $variant->selling_price;
        $oldStock = $variant->stock;
        
        $variant->update([
            'sku' => $request->sku,
            'stock' => $request->stock,
            'price' => $request->price,
            'selling_price' => $request->selling_price ?: $request->price,
            'original_price' => $request->original_price ?: $request->price,
            'cost_price' => $request->cost_price,
            'weight' => $request->weight,
            'length' => $request->length,
            'width' => $request->width,
            'height' => $request->height,
            'min_stock' => $request->min_stock ?: 5,
            'is_active' => $request->has('is_active'),
            'is_featured' => $request->has('is_featured'),
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'slug' => $request->slug ?: \Str::slug($request->sku),
            'image_url' => $mainImageUrl, // Keep for backward compatibility
        ]);

        // Log price changes
        if ($oldPrice != $request->price) {
            $variant->priceHistory()->create([
                'old_price' => $oldPrice,
                'new_price' => $request->price,
                'change_reason' => 'Price update',
                'changed_by' => auth()->id()
            ]);
        }

        if ($oldSellingPrice != ($request->selling_price ?: $request->price)) {
            $variant->priceHistory()->create([
                'old_price' => $oldSellingPrice,
                'new_price' => $request->selling_price ?: $request->price,
                'change_reason' => 'Selling price update',
                'changed_by' => auth()->id()
            ]);
        }

        // Log inventory changes
        if ($oldStock != $request->stock) {
            $variant->inventoryLogs()->create([
                'old_stock' => $oldStock,
                'new_stock' => $request->stock,
                'change_reason' => 'Stock update',
                'changed_by' => auth()->id(),
                'notes' => 'Manual stock update'
            ]);
        }

        // Sync attribute values
        if ($request->has('attribute_values')) {
            $variant->attributeValues()->sync($request->attribute_values);
        } else {
            $variant->attributeValues()->detach();
        }

        return redirect()->route('admin.products.variants.index', $product)
            ->with('success', 'Product variant updated successfully!');
    }

    /**
     * Remove the specified variant
     */
    public function destroy(Product $product, ProductVariant $variant)
    {
        // Delete all associated images
        foreach ($variant->images as $image) {
            $this->deleteImage($image->image_url);
        }
        $variant->images()->delete();

        // Delete the image file if it exists (legacy)
        if ($variant->image_url && file_exists(public_path(ltrim($variant->image_url, '/')))) {
            unlink(public_path(ltrim($variant->image_url, '/')));
        }
        
        $variant->delete();

        return redirect()->route('admin.products.variants.index', $product)
            ->with('success', 'Product variant deleted successfully!');
    }

    /**
     * Get attribute values for an attribute (AJAX)
     */
    public function getAttributeValues(Request $request)
    {
        $attributeValues = AttributeValue::where('attribute_id', $request->attribute_id)->get();
        return response()->json($attributeValues);
    }

    /**
     * Generate SKU for variant (AJAX)
     */
    public function generateSku(Request $request, Product $product)
    {
        $baseSku = strtoupper(substr(preg_replace('/[^A-Za-z0-9]/', '', $product->name), 0, 8));
        $counter = 1;
        
        do {
            $sku = $baseSku . '-' . str_pad($counter, 3, '0', STR_PAD_LEFT);
            $exists = ProductVariant::where('sku', $sku)->exists();
            $counter++;
        } while ($exists);

        return response()->json(['sku' => $sku]);
    }

    /**
     * Bulk update variant stock
     */
    public function bulkUpdateStock(Request $request, Product $product)
    {
        $request->validate([
            'variants' => 'required|array',
            'variants.*.id' => 'required|exists:product_variants,id',
            'variants.*.stock' => 'required|integer|min:0',
        ]);

        foreach ($request->variants as $variantData) {
            $variant = ProductVariant::find($variantData['id']);
            if ($variant && $variant->product_id === $product->id) {
                $variant->update(['stock' => $variantData['stock']]);
            }
        }

        return redirect()->route('admin.products.variants.index', $product)
            ->with('success', 'Variant stock updated successfully!');
    }

    /**
     * Toggle variant status (active/inactive)
     */
    public function toggleStatus(Product $product, ProductVariant $variant)
    {
        $variant->update([
            'stock' => $variant->stock > 0 ? 0 : 1
        ]);

        return redirect()->route('admin.products.variants.index', $product)
            ->with('success', 'Variant status updated successfully!');
    }

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
} 