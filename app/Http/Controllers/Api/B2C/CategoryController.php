<?php

namespace App\Http\Controllers\Api\B2C;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Get all categories
     */
    public function index(Request $request)
    {
        try {
            $query = Category::where('status', true);
            
            // Search by name or description if search parameter is provided
            if ($request->has('search')) {
                $search = $request->search;
                $query->where(function($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%");
                });
            }
            
            // Sort by sort_order (default) or other fields
            $sortField = $request->input('sort_by', 'sort_order');
            $sortOrder = $request->input('sort_order', 'asc');
            
            $categories = $query->orderBy($sortField, $sortOrder)
                              ->get();

            return response()->json([
                'status' => true,
                'message' => 'Categories retrieved successfully',
                'data' => [
                    'categories' => $categories->map(function ($category) {
                        return [
                            'id' => $category->id,
                            'name' => $category->name,
                            'slug' => $category->slug,
                            'description' => $category->description,
                            'image_url' => $category->image_url ? url($category->image_url) : null,
                            'sort_order' => $category->sort_order
                        ];
                    })
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to retrieve categories',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Create a new category
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100|unique:categories,name',
            'slug' => 'nullable|string|max:100|unique:categories,slug',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'status' => 'boolean',
            'sort_order' => 'nullable|integer|min:0'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $imageUrl = null;
            
            // Handle image upload - store directly in public folder
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                
                // Create categories directory in public if it doesn't exist
                $publicPath = public_path('categories');
                if (!file_exists($publicPath)) {
                    mkdir($publicPath, 0755, true);
                }
                
                // Move image to public/categories directory
                $image->move($publicPath, $imageName);
                $imageUrl = '/categories/' . $imageName;
            }

            $category = Category::create([
                'name' => $request->name,
                'slug' => $request->slug ?? null, // Will be auto-generated if not provided
                'description' => $request->description,
                'image_url' => $imageUrl,
                'status' => $request->has('status') ? $request->status : true,
                'sort_order' => $request->sort_order ?? 0
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Category created successfully',
                'data' => [
                    'category' => [
                        'id' => $category->id,
                        'name' => $category->name,
                        'slug' => $category->slug,
                        'description' => $category->description,
                        'image_url' => $imageUrl ? url($imageUrl) : null,
                        'sort_order' => $category->sort_order,
                        'status' => $category->status,
                        'created_at' => $category->created_at,
                        'updated_at' => $category->updated_at
                    ]
                ]
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to create category',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get category by ID with products
     */
    public function show(Request $request, $id)
    {
        try {
            $category = Category::with(['products' => function ($query) {
                $query->active()->inStock()->with(['mainVariant', 'category']);
            }])
            ->where('id', $id)
            ->where('status', true)
            ->first();

            if (!$category) {
                return response()->json([
                    'status' => false,
                    'message' => 'Category not found'
                ], 404);
            }

            return response()->json([
                'status' => true,
                'message' => 'Category retrieved successfully',
                'data' => [
                    'category' => [
                        'id' => $category->id,
                        'name' => $category->name,
                        'slug' => $category->slug,
                        'description' => $category->description,
                        'image_url' => $category->image_url ? url($category->image_url) : null,
                        'sort_order' => $category->sort_order,
                        'products' => $category->products->map(function ($product) {
                            return [
                                'id' => $product->id,
                                'name' => $product->name,
                                'description' => $product->description,
                                'selling_price' => $product->selling_price,
                                'image_url' => $product->image_url ? url($product->image_url) : null,
                                'average_rating' => $product->average_rating,
                                'review_count' => $product->review_count,
                                'category' => [
                                    'id' => $product->category->id,
                                    'name' => $product->category->name
                                ]
                            ];
                        })
                    ]
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to retrieve category',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update category
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:100|unique:categories,name,' . $id,
            'slug' => 'sometimes|string|max:100|unique:categories,slug,' . $id,
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'status' => 'sometimes|boolean',
            'sort_order' => 'nullable|integer|min:0'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $category = Category::find($id);

            if (!$category) {
                return response()->json([
                    'status' => false,
                    'message' => 'Category not found'
                ], 404);
            }

            $updateData = [];

            // Update name if provided
            if ($request->has('name')) {
                $updateData['name'] = $request->name;
            }
            
            // Update slug if provided, otherwise it will be auto-generated from name
            if ($request->has('slug')) {
                $updateData['slug'] = $request->slug;
            }

            // Update description if provided
            if ($request->has('description')) {
                $updateData['description'] = $request->description;
            }

            // Update status if provided
            if ($request->has('status')) {
                $updateData['status'] = $request->status;
            }
            
            // Update sort_order if provided
            if ($request->has('sort_order')) {
                $updateData['sort_order'] = $request->sort_order;
            }

            // Handle image upload
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                
                // Create categories directory in public if it doesn't exist
                $publicPath = public_path('categories');
                if (!file_exists($publicPath)) {
                    mkdir($publicPath, 0755, true);
                }
                
                // Delete old image if exists
                if ($category->image_url) {
                    $oldImagePath = public_path($category->image_url);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
                
                // Move new image to public/categories directory
                $image->move($publicPath, $imageName);
                $updateData['image_url'] = '/categories/' . $imageName;
            }

            // Update the category
            $category->update($updateData);

            return response()->json([
                'status' => true,
                'message' => 'Category updated successfully',
                'data' => [
                    'category' => [
                        'id' => $category->id,
                        'name' => $category->name,
                        'slug' => $category->slug,
                        'description' => $category->description,
                        'image_url' => $category->image_url ? url($category->image_url) : null,
                        'sort_order' => $category->sort_order,
                        'status' => $category->status,
                        'created_at' => $category->created_at,
                        'updated_at' => $category->updated_at
                    ]
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to update category',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Search categories
     */
    /**
     * Get category by slug
     */
    public function showBySlug($slug)
    {
        try {
            $category = Category::where('slug', $slug)
                ->where('status', true)
                ->first();

            if (!$category) {
                return response()->json([
                    'status' => false,
                    'message' => 'Category not found'
                ], 404);
            }

            return response()->json([
                'status' => true,
                'message' => 'Category retrieved successfully',
                'data' => [
                    'category' => [
                        'id' => $category->id,
                        'name' => $category->name,
                        'slug' => $category->slug,
                        'description' => $category->description,
                        'image_url' => $category->image_url ? url($category->image_url) : null,
                        'sort_order' => $category->sort_order
                    ]
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to retrieve category',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Search categories
     */
    public function search(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'query' => 'required|string|min:2',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $query = $request->query;
            
            $categories = Category::where('status', true)
                ->where(function ($q) use ($query) {
                    $q->where('name', 'LIKE', "%{$query}%")
                      ->orWhere('description', 'LIKE', "%{$query}%");
                })
                ->get();

            return response()->json([
                'status' => true,
                'message' => 'Search completed successfully',
                'data' => [
                    'categories' => $categories->map(function ($category) {
                        return [
                            'id' => $category->id,
                            'name' => $category->name,
                            'slug' => $category->slug,
                            'description' => $category->description,
                            'image_url' => $category->image_url ? url($category->image_url) : null,
                            'sort_order' => $category->sort_order
                        ];
                    })
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Search failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }
} 