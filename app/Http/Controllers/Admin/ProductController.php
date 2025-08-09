<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Tag;
use App\Models\ProductAttribute;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of products
     */
    public function index()
    {
        $products = Product::with(['category', 'variants'])
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new product
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        $attributes = ProductAttribute::with(['subAttributes', 'values'])->get();

        return view('admin.products.create', compact('categories', 'tags', 'attributes'));
    }

    /**
     * Store a newly created product
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'key_features' => 'nullable|string',
            'cost_price' => 'nullable|numeric|min:0',
            'selling_price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'status' => 'required|in:active,inactive',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
            'other_images' => 'nullable|array|max:10',
            'other_images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:10240',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
            'attribute_blocks' => 'nullable|array',
            'attribute_blocks.*.attribute_id' => 'required|exists:product_attributes,id',
            'attribute_blocks.*.sub_attribute_id' => 'nullable|exists:attribute_sub_attributes,id',
            'attribute_blocks.*.attribute_value_id' => 'nullable|exists:attribute_values,id',
            'attribute_blocks.*.sub_attribute_value_id' => 'nullable|exists:attribute_values,id',
        ]);

        // Handle main image upload
        $mainImageUrl = null;
        if ($request->hasFile('main_image')) {
            $mainImageUrl = $this->uploadImage($request->file('main_image'), 'products');
        }

        $product = Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'key_features' => $request->key_features,
            'cost_price' => $request->cost_price,
            'selling_price' => $request->selling_price,
            'stock' => $request->stock,
            'status' => $request->status,
            'image_url' => $mainImageUrl, // Keep for backward compatibility
            'slug' => Str::slug($request->name),
        ]);

        // Handle main image in product_images table
        if ($mainImageUrl) {
            ProductImage::create([
                'product_id' => $product->id,
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
                $imageUrl = $this->uploadImage($otherImage, 'products');
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_url' => $imageUrl,
                    'type' => 'other',
                    'sort_order' => $sortOrder++,
                    'is_active' => true
                ]);
            }
        }

        // Attach tags if provided
        if ($request->has('tags')) {
            $product->tags()->attach($request->tags);
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
                $product->attributeValues()->attach($attributeValueIds);
            }
        }

        return redirect()->route('admin.products.index')
            ->with('success', 'Product created successfully!');
    }

    /**
     * Display the specified product
     */
    public function show(Product $product)
    {
        $product->load(['category', 'variants', 'tags', 'reviews', 'images']);
        
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified product
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $attributes = ProductAttribute::with(['subAttributes', 'values'])->get();
        
        // Load product with its attributes and images
        $product->load(['attributeValues.attribute', 'images']);
        
        return view('admin.products.edit', compact('product', 'categories', 'tags', 'attributes'));
    }

    /**
     * Update the specified product
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'key_features' => 'nullable|string',
            'cost_price' => 'nullable|numeric|min:0',
            'selling_price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'status' => 'required|in:active,inactive',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
            'other_images' => 'nullable|array|max:10',
            'other_images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:10240',
            'existing_images' => 'nullable|array',
            'existing_images.*.id' => 'exists:product_images,id',
            'existing_images.*.sort_order' => 'integer|min:1',
            'existing_images.*.is_active' => 'boolean',
            'delete_images' => 'nullable|array',
            'delete_images.*' => 'exists:product_images,id',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
            'attribute_blocks' => 'nullable|array',
            'attribute_blocks.*.attribute_id' => 'required|exists:product_attributes,id',
            'attribute_blocks.*.sub_attribute_id' => 'nullable|exists:attribute_sub_attributes,id',
            'attribute_blocks.*.attribute_value_id' => 'nullable|exists:attribute_values,id',
            'attribute_blocks.*.sub_attribute_value_id' => 'nullable|exists:attribute_values,id',
        ]);

        // Handle main image upload
        $mainImageUrl = $product->image_url; // Keep existing image if no new one uploaded
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
        if ($request->hasFile('other_images')) {
            $maxSortOrder = $product->images()->max('sort_order') ?? 1;
            foreach ($request->file('other_images') as $otherImage) {
                $imageUrl = $this->uploadImage($otherImage, 'products');
                ProductImage::create([
                    'product_id' => $product->id,
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

        $product->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'key_features' => $request->key_features,
            'cost_price' => $request->cost_price,
            'selling_price' => $request->selling_price,
            'stock' => $request->stock,
            'status' => $request->status,
            'image_url' => $mainImageUrl, // Keep for backward compatibility
            'slug' => Str::slug($request->name),
        ]);

        // Sync tags
        if ($request->has('tags')) {
            $product->tags()->sync($request->tags);
        } else {
            $product->tags()->detach();
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
            
            // Sync all attribute values
            $product->attributeValues()->sync($attributeValueIds);
        } else {
            // Remove all attribute values if no blocks provided
            $product->attributeValues()->detach();
        }

        return redirect()->route('admin.products.index')
            ->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified product
     */
    public function destroy(Product $product)
    {
        // Delete all associated images
        foreach ($product->images as $image) {
            $this->deleteImage($image->image_url);
        }
        $product->images()->delete();

        // Delete associated image file if it exists (legacy)
        if ($product->image_url && file_exists(public_path(ltrim($product->image_url, '/')))) {
            unlink(public_path(ltrim($product->image_url, '/')));
        }

        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Product deleted successfully!');
    }

    /**
     * Toggle product status
     */
    public function toggleStatus(Product $product)
    {
        $product->update([
            'status' => $product->status === 'active' ? 'inactive' : 'active'
        ]);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product status updated successfully!');
    }

    /**
     * Bulk actions
     */
    public function bulkAction(Request $request)
    {
        $request->validate([
            'action' => 'required|in:activate,deactivate,delete',
            'products' => 'required|array',
            'products.*' => 'exists:products,id',
        ]);

        $products = Product::whereIn('id', $request->products);

        switch ($request->action) {
            case 'activate':
                $products->update(['status' => 'active']);
                $message = 'Products activated successfully!';
                break;
            case 'deactivate':
                $products->update(['status' => 'inactive']);
                $message = 'Products deactivated successfully!';
                break;
            case 'delete':
                $products->delete();
                $message = 'Products deleted successfully!';
                break;
        }

        return redirect()->route('admin.products.index')->with('success', $message);
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