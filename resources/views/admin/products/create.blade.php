@extends('layouts.admin')

@section('title', 'Create New Product')

@section('content')
<div class="p-4 sm:p-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-6 space-y-4 sm:space-y-0">
        <h2 class="text-xl sm:text-2xl font-bold text-gray-900">Create New Product</h2>
        <a href="{{ route('admin.products.index') }}" class="inline-flex items-center justify-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Back to Products
        </a>
    </div>

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 sm:p-6">
            @if($errors->any())
                <div class="mb-6 rounded-md bg-red-50 p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-red-800">
                                There {{ $errors->count() === 1 ? 'is' : 'are' }} {{ $errors->count() }} {{ Str::plural('error', $errors->count()) }} with your submission
                            </h3>
                            <div class="mt-2 text-sm text-red-700">
                                <ul class="list-disc pl-5 space-y-1">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
                <!-- Basic Information -->
                <div class="xl:col-span-2 space-y-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Product Name <span class="text-red-500">*</span></label>
                        <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-primary-500 focus:ring-primary-500 text-sm @error('name') border-red-300 @enderror" 
                               id="name" name="name" value="{{ old('name') }}" required>
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="category_id" class="block text-sm font-medium text-gray-700">Category <span class="text-red-500">*</span></label>
                            <select class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-primary-500 focus:ring-primary-500 text-sm @error('category_id') border-red-300 @enderror" 
                                    id="category_id" name="category_id" required>
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-primary-500 focus:ring-primary-500 text-sm @error('description') border-red-300 @enderror" 
                                  id="description" name="description" rows="4">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="key_features" class="block text-sm font-medium text-gray-700">Key Features</label>
                        <textarea class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-primary-500 focus:ring-primary-500 text-sm @error('key_features') border-red-300 @enderror" 
                                  id="key_features" name="key_features" rows="3" 
                                  placeholder="Enter key features separated by commas">{{ old('key_features') }}</textarea>
                        @error('key_features')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div>
                            <label for="cost_price" class="block text-sm font-medium text-gray-700">Cost Price</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm">$</span>
                                </div>
                                <input type="number" step="0.01" class="pl-7 block w-full border-gray-300 rounded-md shadow-sm focus:border-primary-500 focus:ring-primary-500 text-sm @error('cost_price') border-red-300 @enderror" 
                                       id="cost_price" name="cost_price" value="{{ old('cost_price') }}">
                            </div>
                            @error('cost_price')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="selling_price" class="block text-sm font-medium text-gray-700">Selling Price <span class="text-red-500">*</span></label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm">$</span>
                                </div>
                                <input type="number" step="0.01" class="pl-7 block w-full border-gray-300 rounded-md shadow-sm focus:border-primary-500 focus:ring-primary-500 text-sm @error('selling_price') border-red-300 @enderror" 
                                       id="selling_price" name="selling_price" value="{{ old('selling_price') }}" required>
                            </div>
                            @error('selling_price')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="stock" class="block text-sm font-medium text-gray-700">Stock <span class="text-red-500">*</span></label>
                            <input type="number" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-primary-500 focus:ring-primary-500 text-sm @error('stock') border-red-300 @enderror" 
                                   id="stock" name="stock" value="{{ old('stock', 0) }}" required>
                            @error('stock')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="sku" class="block text-sm font-medium text-gray-700">SKU</label>
                            <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-primary-500 focus:ring-primary-500 text-sm @error('sku') border-red-300 @enderror" 
                                   id="sku" name="sku" value="{{ old('sku') }}">
                            @error('sku')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                       
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                            <select class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-primary-500 focus:ring-primary-500 text-sm @error('status') border-red-300 @enderror" 
                                    id="status" name="status">
                                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                            </select>
                            @error('status')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="featured" class="block text-sm font-medium text-gray-700">Featured</label>
                            <select class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-primary-500 focus:ring-primary-500 text-sm @error('featured') border-red-300 @enderror" 
                                    id="featured" name="featured">
                                <option value="0" {{ old('featured') == '0' ? 'selected' : '' }}>No</option>
                                <option value="1" {{ old('featured') == '1' ? 'selected' : '' }}>Yes</option>
                            </select>
                            @error('featured')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Dynamic Attribute Blocks Section -->
                    <div class="border-t border-gray-200 pt-6">
                        <div class="flex items-center justify-between mb-6">
                            <div>
                                <h4 class="text-lg font-medium text-gray-900">Product Attributes</h4>
                                <p class="text-sm text-gray-600 mt-1">Define the attributes and values for this product</p>
                            </div>
                            <button type="button" onclick="addAttributeBlock()" 
                                    class="inline-flex items-center px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white font-medium rounded-lg transition-colors duration-200">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Add Attribute Block
                            </button>
                        </div>
                        
                        <div id="attribute-blocks-container" class="space-y-6">
                            <!-- Attribute blocks will be added here dynamically -->
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="space-y-6">
                    <!-- Product Images -->
                    <div class="bg-gray-50 rounded-lg p-4">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Product Images</h3>
                        <div class="space-y-4">
                            <!-- Main Image Upload -->
                            <div>
                                <label for="main_image" class="block text-sm font-medium text-gray-700">Main Image</label>
                                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-gray-400 transition-colors duration-200">
                                    <div class="space-y-1 text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div class="flex text-sm text-gray-600">
                                            <label for="main_image" class="relative cursor-pointer bg-white rounded-md font-medium text-primary-600 hover:text-primary-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-primary-500">
                                                <span>Upload main image</span>
                                                <input id="main_image" name="main_image" type="file" class="sr-only" accept="image/*" onchange="previewMainImage(this)">
                                            </label>
                                            <p class="pl-1">or drag and drop</p>
                                        </div>
                                        <p class="text-xs text-gray-500">
                                            PNG, JPG, GIF, WEBP up to 10MB
                                        </p>
                                    </div>
                                </div>
                                <div id="main-image-preview" class="mt-3 hidden">
                                    <img id="main-preview-img" src="" alt="Main Image Preview" class="w-32 h-32 object-cover rounded-lg border border-gray-200">
                                    <button type="button" onclick="removeMainImage()" class="mt-2 text-sm text-red-600 hover:text-red-800">
                                        Remove Main Image
                                    </button>
                                </div>
                                @error('main_image')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Other Images Upload -->
                            <div>
                                <label for="other_images" class="block text-sm font-medium text-gray-700">Other Images</label>
                                <input id="other_images" name="other_images[]" type="file" class="sr-only" accept="image/*" multiple onchange="previewOtherImages(this)">
                                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-gray-400 transition-colors duration-200">
                                    <div class="space-y-1 text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div class="flex text-sm text-gray-600">
                                            <label for="other_images" class="relative cursor-pointer bg-white rounded-md font-medium text-primary-600 hover:text-primary-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-primary-500">
                                                <span>Upload other images</span>
                                            </label>
                                            <p class="pl-1">or drag and drop</p>
                                        </div>
                                        <p class="text-xs text-gray-500">
                                            PNG, JPG, GIF, WEBP up to 10MB (Max 10 images)
                                        </p>
                                    </div>
                                </div>
                                <div id="other-images-preview" class="mt-3 hidden">
                                    <div id="other-preview-container" class="grid grid-cols-4 gap-2">
                                        <!-- Other image previews will be added here -->
                                    </div>
                                    <button type="button" onclick="removeAllOtherImages()" class="mt-2 text-sm text-red-600 hover:text-red-800">
                                        Remove All Other Images
                                    </button>
                                </div>
                                @error('other_images')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- SEO Information -->
                    <div class="bg-gray-50 rounded-lg p-4">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">SEO Information</h3>
                        <div class="space-y-4">
                            <div>
                                <label for="meta_title" class="block text-sm font-medium text-gray-700">Meta Title</label>
                                <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-primary-500 focus:ring-primary-500 text-sm @error('meta_title') border-red-300 @enderror" 
                                       id="meta_title" name="meta_title" value="{{ old('meta_title') }}">
                                @error('meta_title')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="meta_description" class="block text-sm font-medium text-gray-700">Meta Description</label>
                                <textarea class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-primary-500 focus:ring-primary-500 text-sm @error('meta_description') border-red-300 @enderror" 
                                          id="meta_description" name="meta_description" rows="3">{{ old('meta_description') }}</textarea>
                                @error('meta_description')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="meta_keywords" class="block text-sm font-medium text-gray-700">Meta Keywords</label>
                                <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-primary-500 focus:ring-primary-500 text-sm @error('meta_keywords') border-red-300 @enderror" 
                                       id="meta_keywords" name="meta_keywords" value="{{ old('meta_keywords') }}" placeholder="keyword1, keyword2, keyword3">
                                @error('meta_keywords')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex flex-col sm:flex-row sm:justify-end mt-8 pt-6 border-t border-gray-200 space-y-3 sm:space-y-0 sm:space-x-3">
                <a href="{{ route('admin.products.index') }}" class="inline-flex items-center justify-center px-6 py-3 border border-gray-300 rounded-md shadow-sm text-base font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                    Cancel
                </a>
                <button type="submit" class="inline-flex items-center justify-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Create Product
                </button>
            </div>
        </div>
    </form>
</div>


    <!-- Inline Modal for Adding New Items -->
    <div id="inlineModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-medium text-gray-900" id="modalTitle">Add New Item</h3>
                    <button onclick="closeInlineModal()" class="text-gray-400 hover:text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                
                <div class="space-y-4">
                    <div>
                        <label for="newItemName" class="block text-sm font-medium text-gray-900 mb-2">Name</label>
                        <input type="text" id="newItemName" 
                            class="block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                            placeholder="Enter name">
                    </div>
                    
                    <div id="bulkAddSection" class="hidden">
                        <label for="bulkItems" class="block text-sm font-medium text-gray-900 mb-2">Bulk Add (Optional)</label>
                        <textarea id="bulkItems" rows="3"
                                class="block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                                placeholder="Enter multiple items separated by commas&#10;Example: Red, Blue, Green"></textarea>
                        <p class="text-xs text-gray-600 mt-1">Separate multiple items with commas</p>
                    </div>
                </div>

                <div class="flex justify-end space-x-3 mt-6">
                    <button onclick="closeInlineModal()" 
                            class="px-4 py-2 border border-gray-300 text-gray-700 bg-white hover:bg-gray-50 font-medium rounded-lg transition-colors duration-200">
                        Cancel
                    </button>
                    <button onclick="saveNewItem()" 
                            class="px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white font-medium rounded-lg transition-colors duration-200">
                        Add Item(s)
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

<script type="text/javascript">
    // Global variables
    let attributeBlockCounter = 0;
    let currentModalContext = null;

    // Available data (will be populated from backend)
    const availableData = {
        attributes: @json($attributes),
        subAttributes: @json($attributes->flatMap->subAttributes),
        attributeValues: @json($attributes->flatMap->values),
        subAttributeValues: []
    };

    // Add new attribute block
    window.addAttributeBlock = function() {
        attributeBlockCounter++;
        const blockId = `attribute-block-${attributeBlockCounter}`;
        
        const blockHtml = `
            <div id="${blockId}" class="bg-gray-50 rounded-lg p-6 border border-gray-200">
                <div class="flex items-center justify-between mb-4">
                    <h5 class="text-md font-medium text-gray-900">Attribute Block ${attributeBlockCounter}</h5>
                    <button type="button" onclick="removeAttributeBlock('${blockId}')" 
                            class="text-red-500 hover:text-red-700">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                    </button>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Attribute Dropdown -->
                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-2">
                            Attribute <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <select name="attribute_blocks[${attributeBlockCounter}][attribute_id]" 
                                    class="block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                                    onchange="onAttributeChange(${attributeBlockCounter})">
                                <option value="">Select Attribute</option>
                                ${availableData.attributes.map(attr => 
                                    `<option value="${attr.id}">${attr.name}</option>`
                                ).join('')}
                                <option value="add_new" class="text-primary-600 font-medium">+ Add New Attribute</option>
                            </select>
                        </div>
                    </div>

                    <!-- Sub-Attribute Dropdown -->
                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-2">
                            Sub-Attribute
                        </label>
                        <div class="relative">
                            <select name="attribute_blocks[${attributeBlockCounter}][sub_attribute_id]" 
                                    class="block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                                    onchange="onSubAttributeChange(${attributeBlockCounter})">
                                <option value="">Select Sub-Attribute</option>
                                <option value="add_new" class="text-primary-600 font-medium">+ Add New Sub-Attribute</option>
                            </select>
                        </div>
                    </div>

                    <!-- Attribute Value Dropdown -->
                    <div class="attribute-value-container">
                        <label class="block text-sm font-medium text-gray-900 mb-2">
                            Attribute Value <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <select name="attribute_blocks[${attributeBlockCounter}][attribute_value_id]" 
                                    class="block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                                    onchange="onAttributeValueChange(${attributeBlockCounter})">
                                <option value="">Select Value</option>
                                <option value="add_new" class="text-primary-600 font-medium">+ Add New Value</option>
                            </select>
                        </div>
                    </div>

                    <!-- Sub-Attribute Value Dropdown -->
                    <div class="sub-attribute-value-container hidden">
                        <label class="block text-sm font-medium text-gray-900 mb-2">
                            Sub-Attribute Value
                        </label>
                        <div class="relative">
                            <select name="attribute_blocks[${attributeBlockCounter}][sub_attribute_value_id]" 
                                    class="block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                                    onchange="onSubAttributeValueChange(${attributeBlockCounter})">
                                <option value="">Select Value</option>
                                <option value="add_new" class="text-primary-600 font-medium">+ Add New Value</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        `;
        
        document.getElementById('attribute-blocks-container').insertAdjacentHTML('beforeend', blockHtml);
    }

    // Remove attribute block
    window.removeAttributeBlock = function(blockId) {
        const element = document.getElementById(blockId);
        if (element) {
            element.remove();
        }
    }

    // Handle attribute change
    window.onAttributeChange = function(blockId) {
        const attributeSelect = document.querySelector(`select[name="attribute_blocks[${blockId}][attribute_id]"]`);
        const attributeId = attributeSelect.value;
        
        if (attributeId === 'add_new') {
            showInlineModal('attribute', 'Add New Attribute', blockId);
            return;
        }
        
        // Reset dependent dropdowns
        const subAttributeSelect = document.querySelector(`select[name="attribute_blocks[${blockId}][sub_attribute_id]"]`);
        const attributeValueSelect = document.querySelector(`select[name="attribute_blocks[${blockId}][attribute_value_id]"]`);
        const subAttributeValueSelect = document.querySelector(`select[name="attribute_blocks[${blockId}][sub_attribute_value_id]"]`);
        
        subAttributeSelect.innerHTML = '<option value="">Select Sub-Attribute</option><option value="add_new" class="text-primary-600 font-medium">+ Add New Sub-Attribute</option>';
        attributeValueSelect.innerHTML = '<option value="">Select Value</option><option value="add_new" class="text-primary-600 font-medium">+ Add New Value</option>';
        subAttributeValueSelect.innerHTML = '<option value="">Select Value</option><option value="add_new" class="text-primary-600 font-medium">+ Add New Value</option>';
        
        // Reset visibility and enable all fields
        resetFieldVisibility(blockId);
        
        if (attributeId) {
            // Populate sub-attributes
            const attribute = availableData.attributes.find(attr => attr.id == attributeId);
            if (attribute && attribute.sub_attributes) {
                attribute.sub_attributes.forEach(subAttr => {
                    const option = document.createElement('option');
                    option.value = subAttr.id;
                    option.textContent = subAttr.name;
                    subAttributeSelect.appendChild(option);
                });
            }
            
            // Populate attribute values
            const values = availableData.attributeValues.filter(val => val.attribute_id == attributeId);
            values.forEach(value => {
                const option = document.createElement('option');
                option.value = value.id;
                option.textContent = value.value;
                attributeValueSelect.appendChild(option);
            });
        }
    }

    // Handle sub-attribute change
    window.onSubAttributeChange = function(blockId) {
        const subAttributeSelect = document.querySelector(`select[name="attribute_blocks[${blockId}][sub_attribute_id]"]`);
        const subAttributeId = subAttributeSelect.value;
        
        if (subAttributeId === 'add_new') {
            showInlineModal('sub_attribute', 'Add New Sub-Attribute', blockId);
            return;
        }
        
        // Reset sub-attribute value dropdown
        const subAttributeValueSelect = document.querySelector(`select[name="attribute_blocks[${blockId}][sub_attribute_value_id]"]`);
        subAttributeValueSelect.innerHTML = '<option value="">Select Value</option><option value="add_new" class="text-primary-600 font-medium">+ Add New Value</option>';
        
        // Handle mutual exclusivity
        if (subAttributeId) {
            // Hide/disable Attribute Value field when Sub-Attribute is selected
            hideAttributeValueField(blockId);
        } else {
            // Show/enable Attribute Value field when Sub-Attribute is cleared
            showAttributeValueField(blockId);
        }
        
        if (subAttributeId) {
            // Populate sub-attribute values
            const subAttribute = availableData.subAttributes.find(subAttr => subAttr.id == subAttributeId);
            if (subAttribute) {
                // For now, we'll leave it empty as sub-attribute values would need a separate data structure
            }
        }
    }

    // Handle attribute value change
    window.onAttributeValueChange = function(blockId) {
        const valueSelect = document.querySelector(`select[name="attribute_blocks[${blockId}][attribute_value_id]"]`);
        const valueId = valueSelect.value;
        
        if (valueId === 'add_new') {
            showInlineModal('attribute_value', 'Add New Attribute Value', blockId);
            return;
        }
        
        // Handle mutual exclusivity
        if (valueId) {
            // Hide/disable Sub-Attribute Value field when Attribute Value is selected
            hideSubAttributeValueField(blockId);
        } else {
            // Show/enable Sub-Attribute Value field when Attribute Value is cleared
            showSubAttributeValueField(blockId);
        }
    }

    // Handle sub-attribute value change
    window.onSubAttributeValueChange = function(blockId) {
        const valueSelect = document.querySelector(`select[name="attribute_blocks[${blockId}][sub_attribute_value_id]"]`);
        const valueId = valueSelect.value;
        
        if (valueId === 'add_new') {
            showInlineModal('sub_attribute_value', 'Add New Sub-Attribute Value', blockId);
            return;
        }
    }

    // Helper function to reset field visibility
    window.resetFieldVisibility = function(blockId) {
        const attributeValueContainer = document.querySelector(`#attribute-block-${blockId} .attribute-value-container`);
        const subAttributeValueContainer = document.querySelector(`#attribute-block-${blockId} .sub-attribute-value-container`);
        
        if (attributeValueContainer) {
            attributeValueContainer.style.display = 'block';
            attributeValueContainer.querySelector('select').disabled = false;
        }
        if (subAttributeValueContainer) {
            subAttributeValueContainer.style.display = 'block';
            subAttributeValueContainer.querySelector('select').disabled = false;
        }
    }

    // Helper function to hide Attribute Value field
    window.hideAttributeValueField = function(blockId) {
        const attributeValueContainer = document.querySelector(`#attribute-block-${blockId} .attribute-value-container`);
        if (attributeValueContainer) {
            attributeValueContainer.style.display = 'none';
            attributeValueContainer.querySelector('select').disabled = true;
            attributeValueContainer.querySelector('select').value = '';
        }
    }

    // Helper function to show Attribute Value field
    window.showAttributeValueField = function(blockId) {
        const attributeValueContainer = document.querySelector(`#attribute-block-${blockId} .attribute-value-container`);
        if (attributeValueContainer) {
            attributeValueContainer.style.display = 'block';
            attributeValueContainer.querySelector('select').disabled = false;
        }
    }

    // Helper function to hide Sub-Attribute Value field
    window.hideSubAttributeValueField = function(blockId) {
        const subAttributeValueContainer = document.querySelector(`#attribute-block-${blockId} .sub-attribute-value-container`);
        if (subAttributeValueContainer) {
            subAttributeValueContainer.style.display = 'none';
            subAttributeValueContainer.querySelector('select').disabled = true;
            subAttributeValueContainer.querySelector('select').value = '';
        }
    }

    // Helper function to show Sub-Attribute Value field
    window.showSubAttributeValueField = function(blockId) {
        const subAttributeValueContainer = document.querySelector(`#attribute-block-${blockId} .sub-attribute-value-container`);
        if (subAttributeValueContainer) {
            subAttributeValueContainer.style.display = 'block';
            subAttributeValueContainer.querySelector('select').disabled = false;
        }
    }

    // Show inline modal
    window.showInlineModal = function(type, title, blockId) {
        currentModalContext = { type, blockId };
        document.getElementById('modalTitle').textContent = title;
        document.getElementById('newItemName').value = '';
        document.getElementById('bulkItems').value = '';
        
        // Show/hide bulk add section based on type
        const bulkAddSection = document.getElementById('bulkAddSection');
        if (type === 'attribute_value' || type === 'sub_attribute_value') {
            bulkAddSection.classList.remove('hidden');
        } else {
            bulkAddSection.classList.add('hidden');
        }
        
        document.getElementById('inlineModal').classList.remove('hidden');
        document.getElementById('newItemName').focus();
    }

    // Close inline modal
    window.closeInlineModal = function() {
        document.getElementById('inlineModal').classList.add('hidden');
        currentModalContext = null;
    }

    // Save new item
    window.saveNewItem = function() {
        const name = document.getElementById('newItemName').value.trim();
        const bulkItems = document.getElementById('bulkItems').value.trim();
        
        if (!name && !bulkItems) {
            alert('Please enter at least one item');
            return;
        }
        
        let items = [];
        if (name) items.push(name);
        if (bulkItems) {
            items = items.concat(bulkItems.split(',').map(item => item.trim()).filter(item => item));
        }
        
        // Remove duplicates
        items = [...new Set(items)];
        
        // Add items via AJAX
        const context = currentModalContext;
        const endpoint = getEndpointForType(context.type);
        
        items.forEach(item => {
            const data = getDataForType(context.type, item, context.blockId);
            
            fetch(endpoint, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json'
                },
                body: new URLSearchParams(data)
            })
            .then(response => response.json())
            .then(response => {
                if (response.success) {
                    // Add to available data
                    addToAvailableData(context.type, response.data);
                    
                    // Update dropdowns
                    updateDropdowns(context.type, response.data, context.blockId);
                } else {
                    alert('Error adding item: ' + response.message);
                }
            })
            .catch(error => {
                console.error('Error adding item:', error);
                alert('Error adding item');
            });
        });
        
        closeInlineModal();
    }

    // Get endpoint for type
    window.getEndpointForType = function(type) {
        switch (type) {
            case 'attribute': return '{{ route("admin.attributes.add-attribute") }}';
            case 'sub_attribute': return '{{ route("admin.attributes.add-sub-attribute-ajax") }}';
            case 'attribute_value': return '{{ route("admin.attributes.add-attribute-value") }}';
            case 'sub_attribute_value': return '{{ route("admin.attributes.add-sub-attribute-value") }}';
            default: return '{{ route("admin.attributes.index") }}';
        }
    }

    // Get data for type
    window.getDataForType = function(type, name, blockId) {
        const data = {};
        
        switch (type) {
            case 'attribute':
                data.name = name;
                break;
            case 'sub_attribute':
                data.name = name;
                const attributeSelect = document.querySelector(`select[name="attribute_blocks[${blockId}][attribute_id]"]`);
                data.attribute_id = attributeSelect.value;
                break;
            case 'attribute_value':
                data.value = name;
                const attrSelect = document.querySelector(`select[name="attribute_blocks[${blockId}][attribute_id]"]`);
                data.attribute_id = attrSelect.value;
                break;
            case 'sub_attribute_value':
                data.value = name;
                const subAttrSelect = document.querySelector(`select[name="attribute_blocks[${blockId}][sub_attribute_id]"]`);
                data.sub_attribute_id = subAttrSelect.value;
                break;
        }
        
        return data;
    }

    // Add to available data
    window.addToAvailableData = function(type, data) {
        switch (type) {
            case 'attribute':
                availableData.attributes.push(data);
                break;
            case 'sub_attribute':
                availableData.subAttributes.push(data);
                break;
            case 'attribute_value':
                availableData.attributeValues.push(data);
                break;
            case 'sub_attribute_value':
                availableData.subAttributeValues.push(data);
                break;
        }
    }

    // Update dropdowns
    window.updateDropdowns = function(type, data, blockId) {
        switch (type) {
            case 'attribute':
                // Add to all attribute dropdowns
                document.querySelectorAll('select[name*="[attribute_id]"]').forEach(select => {
                    if (!select.querySelector(`option[value="${data.id}"]`)) {
                        const option = document.createElement('option');
                        option.value = data.id;
                        option.textContent = data.name;
                        select.appendChild(option);
                    }
                });
                break;
            case 'sub_attribute':
                // Add to sub-attribute dropdown for this block
                const subAttrSelect = document.querySelector(`select[name="attribute_blocks[${blockId}][sub_attribute_id]"]`);
                const subAttrOption = document.createElement('option');
                subAttrOption.value = data.id;
                subAttrOption.textContent = data.name;
                subAttrSelect.appendChild(subAttrOption);
                break;
            case 'attribute_value':
                // Add to attribute value dropdown for this block
                const attrValueSelect = document.querySelector(`select[name="attribute_blocks[${blockId}][attribute_value_id]"]`);
                const attrValueOption = document.createElement('option');
                attrValueOption.value = data.id;
                attrValueOption.textContent = data.value;
                attrValueSelect.appendChild(attrValueOption);
                break;
            case 'sub_attribute_value':
                // Add to sub-attribute value dropdown for this block
                const subAttrValueSelect = document.querySelector(`select[name="attribute_blocks[${blockId}][sub_attribute_value_id]"]`);
                const subAttrValueOption = document.createElement('option');
                subAttrValueOption.value = data.id;
                subAttrValueOption.textContent = data.value;
                subAttrValueSelect.appendChild(subAttrValueOption);
                break;
        }
    }

    // Document ready function
    document.addEventListener('DOMContentLoaded', function() {
        // Close modal when clicking outside
        document.getElementById('inlineModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeInlineModal();
            }
        });

        // Handle Enter key in modal
        ['newItemName', 'bulkItems'].forEach(id => {
            const element = document.getElementById(id);
            if (element) {
                element.addEventListener('keypress', function(e) {
                    if (e.key === 'Enter') {
                        e.preventDefault();
                        saveNewItem();
                    }
                });
            }
        });
    });
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Auto-generate SKU from product name
    const nameInput = document.getElementById('name');
    const skuInput = document.getElementById('sku');
    if (nameInput && skuInput) {
        nameInput.addEventListener('input', function() {
            var name = this.value;
            if (name && !skuInput.value) {
                var sku = name.replace(/[^a-zA-Z0-9]/g, '').toUpperCase().substring(0, 8);
                skuInput.value = sku;
            }
        });
    }

    // Auto-generate meta title from product name
    const metaTitleInput = document.getElementById('meta_title');
    if (nameInput && metaTitleInput) {
        nameInput.addEventListener('input', function() {
            var name = this.value;
            if (name && !metaTitleInput.value) {
                metaTitleInput.value = name;
            }
        });
    }
});

// Main image preview functionality
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

function removeMainImage() {
    document.getElementById('main_image').value = '';
    document.getElementById('main-image-preview').classList.add('hidden');
    document.getElementById('main-preview-img').src = '';
}

// Other images preview functionality
let otherImageCount = 0;

function previewOtherImages(input) {
    const files = input.files;
    const container = document.getElementById('other-preview-container');
    const previewDiv = document.getElementById('other-images-preview');
    
    if (files.length > 0) {
        previewDiv.classList.remove('hidden');
        
        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            const reader = new FileReader();
            
            reader.onload = function(e) {
                const imageDiv = document.createElement('div');
                imageDiv.className = 'relative';
                imageDiv.id = `other-image-${otherImageCount}`;
                
                imageDiv.innerHTML = `
                    <img src="${e.target.result}" alt="Other Image Preview" class="w-16 h-16 object-cover rounded-lg border border-gray-200">
                    <button type="button" onclick="removeOtherImage(${otherImageCount})" class="absolute -top-1 -right-1 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs hover:bg-red-600">
                        ×
                    </button>
                `;
                
                container.appendChild(imageDiv);
                otherImageCount++;
            }
            
            reader.readAsDataURL(file);
        }
    } else {
        previewDiv.classList.add('hidden');
    }
}

function removeOtherImage(index) {
    const imageDiv = document.getElementById(`other-image-${index}`);
    if (imageDiv) {
        imageDiv.remove();
    }
}

function removeAllOtherImages() {
    document.getElementById('other_images').value = '';
    document.getElementById('other-images-preview').classList.add('hidden');
    document.getElementById('other-preview-container').innerHTML = '';
    otherImageCount = 0;
}
</script>