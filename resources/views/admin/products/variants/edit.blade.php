@extends('layouts.admin')

@section('title', 'Edit Variant - ' . $product->name)

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Page Header -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-amber-900">Edit Variant</h1>
                <p class="mt-2 text-amber-700">Update variant for {{ $product->name }}</p>
            </div>
            <a href="{{ route('admin.products.variants.index', $product) }}" 
               class="inline-flex items-center px-4 py-2 bg-amber-600 hover:bg-amber-700 text-white font-medium rounded-lg transition-colors duration-200">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Variants
            </a>
        </div>
    </div>

    <!-- Product Info Card -->
    <div class="bg-white rounded-lg shadow-sm border border-amber-200 mb-8">
        <div class="p-6">
            <div class="flex items-start space-x-6">
                <div class="flex-shrink-0">
                    @if($product->image_url)
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" 
                             class="w-24 h-24 object-cover rounded-lg border border-amber-200">
                    @else
                        <div class="w-24 h-24 bg-amber-100 rounded-lg border border-amber-200 flex items-center justify-center">
                            <svg class="w-8 h-8 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    @endif
                </div>
                <div class="flex-1 min-w-0">
                    <h3 class="text-xl font-semibold text-amber-900 mb-2">{{ $product->name }}</h3>
                    <p class="text-amber-700 text-sm mb-4">{{ Str::limit($product->description, 150) }}</p>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <span class="text-xs font-medium text-amber-600 uppercase tracking-wide">Category</span>
                            <p class="text-sm text-amber-900">{{ $product->category->name ?? 'N/A' }}</p>
                        </div>
                        <div>
                            <span class="text-xs font-medium text-amber-600 uppercase tracking-wide">Base Price</span>
                            <p class="text-sm font-semibold text-amber-900">${{ number_format($product->selling_price, 2) }}</p>
                        </div>
                        <div>
                            <span class="text-xs font-medium text-amber-600 uppercase tracking-wide">Status</span>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $product->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                {{ ucfirst($product->status) }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Form -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Form Section -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg shadow-sm border border-amber-200">
                <div class="px-6 py-4 border-b border-amber-200">
                    <h3 class="text-lg font-medium text-amber-900">Variant Details</h3>
                </div>
                <form action="{{ route('admin.products.variants.update', [$product, $variant]) }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
                    @csrf
                    @method('PUT')
                    
                    @if($errors->any())
                        <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                            <div class="flex">
                                <svg class="w-5 h-5 text-red-400 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium text-red-800">There {{ $errors->count() === 1 ? 'is' : 'are' }} {{ $errors->count() }} {{ Str::plural('error', $errors->count()) }} with your submission</h3>
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

                    <!-- SKU Field -->
                    <div>
                        <label for="sku" class="block text-sm font-medium text-amber-900 mb-2">
                            SKU <span class="text-red-500">*</span>
                        </label>
                        <div class="flex space-x-2">
                            <input type="text" 
                                   id="sku" 
                                   name="sku" 
                                   value="{{ old('sku', $variant->sku) }}" 
                                   class="flex-1 rounded-lg border-amber-300 focus:border-amber-500 focus:ring-amber-500 @error('sku') border-red-300 focus:border-red-500 focus:ring-red-500 @enderror"
                                   placeholder="Enter SKU or generate automatically"
                                   required>
                            <button type="button" 
                                    onclick="generateSku()"
                                    class="inline-flex items-center px-4 py-2 bg-amber-100 hover:bg-amber-200 text-amber-700 font-medium rounded-lg transition-colors duration-200">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                                Generate
                            </button>
                        </div>
                        @error('sku')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Price and Stock Row -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="price" class="block text-sm font-medium text-amber-900 mb-2">
                                Price <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-amber-500 sm:text-sm">$</span>
                                </div>
                                <input type="number" 
                                       step="0.01" 
                                       id="price" 
                                       name="price" 
                                       value="{{ old('price', $variant->price) }}" 
                                       class="pl-7 rounded-lg border-amber-300 focus:border-amber-500 focus:ring-amber-500 @error('price') border-red-300 focus:border-red-500 focus:ring-red-500 @enderror"
                                       placeholder="0.00"
                                       required>
                            </div>
                            @error('price')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="stock" class="block text-sm font-medium text-amber-900 mb-2">
                                Stock <span class="text-red-500">*</span>
                            </label>
                            <input type="number" 
                                   id="stock" 
                                   name="stock" 
                                   value="{{ old('stock', $variant->stock) }}" 
                                   min="0"
                                   class="rounded-lg border-amber-300 focus:border-amber-500 focus:ring-amber-500 @error('stock') border-red-300 focus:border-red-500 focus:ring-red-500 @enderror"
                                   placeholder="0"
                                   required>
                            @error('stock')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Variant Images -->
                    <div>
                        <label class="block text-sm font-medium text-amber-900 mb-2">
                            Variant Images
                        </label>
                        
                        <!-- Existing Images -->
                        @if($variant->images->count() > 0)
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-amber-700 mb-2">Current Images</label>
                                <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                                    @foreach($variant->images->sortBy('sort_order') as $image)
                                        <div class="relative group">
                                            <img src="{{ $image->image_url }}" alt="Variant image" class="w-full h-24 object-cover rounded-lg border border-amber-200">
                                            <div class="absolute top-1 left-1">
                                                <span class="text-xs font-medium px-2 py-1 rounded-full 
                                                    {{ $image->type === 'main' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800' }}">
                                                    {{ $image->type === 'main' ? 'Main' : 'Other' }}
                                                </span>
                                            </div>
                                            <button type="button" 
                                                    onclick="deleteVariantImage({{ $image->id }})" 
                                                    class="absolute top-1 right-1 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs opacity-0 group-hover:opacity-100 transition-opacity">
                                                ×
                                            </button>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- Add New Main Image -->
                        <div class="mb-4">
                            <label for="main_image" class="block text-sm font-medium text-amber-900 mb-2">
                                Add New Main Image
                            </label>
                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-amber-300 border-dashed rounded-lg hover:border-amber-400 transition-colors duration-200">
                                <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-12 w-12 text-amber-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex text-sm text-amber-600">
                                        <label for="main_image" class="relative cursor-pointer bg-white rounded-md font-medium text-amber-600 hover:text-amber-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-amber-500">
                                            <span>Upload new main image</span>
                                            <input id="main_image" name="main_image" type="file" class="sr-only" accept="image/*" onchange="previewMainImage(this)">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs text-amber-500">
                                        PNG, JPG, GIF, WEBP up to 10MB
                                    </p>
                                </div>
                            </div>
                            <div id="main-image-preview" class="mt-3 hidden">
                                <img id="main-preview-img" src="" alt="Main Image Preview" class="w-32 h-32 object-cover rounded-lg border border-amber-200">
                                <button type="button" onclick="removeMainImage()" class="mt-2 text-sm text-red-600 hover:text-red-800">
                                    Remove New Main Image
                                </button>
                            </div>
                            @error('main_image')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Add New Other Images -->
                        <div>
                            <label for="other_images" class="block text-sm font-medium text-amber-900 mb-2">
                                Add New Other Images
                            </label>
                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-amber-300 border-dashed rounded-lg hover:border-amber-400 transition-colors duration-200">
                                <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-12 w-12 text-amber-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex text-sm text-amber-600">
                                        <label for="other_images" class="relative cursor-pointer bg-white rounded-md font-medium text-amber-600 hover:text-amber-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-amber-500">
                                            <span>Upload new other images</span>
                                            <input id="other_images" name="other_images[]" type="file" class="sr-only" accept="image/*" multiple onchange="previewOtherImages(this)">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs text-amber-500">
                                        PNG, JPG, GIF, WEBP up to 10MB (Max 10 images)
                                    </p>
                                </div>
                            </div>
                            <div id="other-images-preview" class="mt-3 hidden">
                                <div id="other-preview-container" class="grid grid-cols-4 gap-2">
                                    <!-- Other image previews will be added here -->
                                </div>
                                <button type="button" onclick="removeAllOtherImages()" class="mt-2 text-sm text-red-600 hover:text-red-800">
                                    Remove All New Other Images
                                </button>
                            </div>
                            @error('other_images')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end space-x-3 pt-6 border-t border-amber-200">
                        <a href="{{ route('admin.products.variants.index', $product) }}" 
                           class="inline-flex items-center px-4 py-2 border border-amber-300 text-amber-700 bg-white hover:bg-amber-50 font-medium rounded-lg transition-colors duration-200">
                            Cancel
                        </a>
                        <button type="submit" 
                                class="inline-flex items-center px-6 py-2 bg-amber-600 hover:bg-amber-700 text-white font-medium rounded-lg transition-colors duration-200">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Update Variant
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Attributes Section -->
            <div class="bg-white rounded-lg shadow-sm border border-amber-200">
                <div class="px-6 py-4 border-b border-amber-200">
                    <h3 class="text-lg font-medium text-amber-900">Product Attributes</h3>
                </div>
                <div class="p-6">
                    @if($attributes->count() > 0)
                        <div class="space-y-4">
                            @foreach($attributes as $attribute)
                                <div class="border border-amber-200 rounded-lg p-4">
                                    <h4 class="font-medium text-amber-900 mb-3">{{ $attribute->name }}</h4>
                                    <div class="space-y-2">
                                        @if($attribute->values->count() > 0)
                                            @foreach($attribute->values as $attrValue)
                                                <label class="flex items-center">
                                                    <input type="checkbox" 
                                                           class="rounded border-amber-300 text-amber-600 focus:ring-amber-500" 
                                                           id="attr_value_{{ $attrValue->id }}" 
                                                           value="{{ $attrValue->id }}" 
                                                           name="attribute_values[]"
                                                           {{ in_array($attrValue->id, $variant->attributeValues->pluck('id')->toArray()) ? 'checked' : '' }}>
                                                    <span class="ml-2 text-sm text-amber-700">
                                                        {{ $attrValue->value ?? $attrValue->subAttribute->name }}
                                                    </span>
                                                </label>
                                            @endforeach
                                        @else
                                            <p class="text-sm text-amber-500 italic">No values available for this attribute.</p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-8">
                            <svg class="w-12 h-12 text-amber-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <p class="text-amber-600">No attributes defined for this product.</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Preview Section -->
            <div class="bg-white rounded-lg shadow-sm border border-amber-200">
                <div class="px-6 py-4 border-b border-amber-200">
                    <h3 class="text-lg font-medium text-amber-900">Variant Preview</h3>
                </div>
                <div class="p-6">
                    <div id="variant-preview" class="text-center">
                        <div class="bg-amber-50 rounded-lg p-6">
                            <div class="w-20 h-20 bg-amber-100 rounded-lg border border-amber-200 flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <p class="text-amber-600 text-sm">Variant preview will appear here</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Update preview when form fields change
    ['sku', 'price', 'stock'].forEach(id => {
        const element = document.getElementById(id);
        if (element) {
            element.addEventListener('input', updatePreview);
        }
    });

    // Update preview when main image changes
    const mainImageInput = document.getElementById('main_image');
    if (mainImageInput) {
        mainImageInput.addEventListener('change', updatePreview);
    }

    // Update preview when attribute checkboxes change
    document.querySelectorAll('input[name="attribute_values[]"]').forEach(checkbox => {
        checkbox.addEventListener('change', updatePreview);
    });

    function updatePreview() {
        var sku = document.getElementById('sku').value || 'SKU-001';
        var price = document.getElementById('price').value || '0.00';
        var stock = document.getElementById('stock').value || '0';
        var mainImageFile = document.getElementById('main_image').files[0];
        var currentMainImageUrl = '{{ $variant->mainImage ? $variant->mainImage->image_url : "" }}';
        
        var selectedAttributes = [];
        document.querySelectorAll('input[name="attribute_values[]"]:checked').forEach(function(checkbox) {
            var label = checkbox.nextElementSibling.textContent;
            selectedAttributes.push(label);
        });

        var imageHtml = '';
        if (mainImageFile) {
            imageHtml = `<img src="${URL.createObjectURL(mainImageFile)}" alt="Variant" class="w-20 h-20 object-cover rounded-lg border border-amber-200 mx-auto">`;
        } else if (currentMainImageUrl) {
            imageHtml = `<img src="${currentMainImageUrl}" alt="Variant" class="w-20 h-20 object-cover rounded-lg border border-amber-200 mx-auto">`;
        } else {
            imageHtml = `<div class="w-20 h-20 bg-amber-100 rounded-lg border border-amber-200 flex items-center justify-center mx-auto">
                <svg class="w-8 h-8 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
            </div>`;
        }

        var preview = `
            <div class="text-center">
                <div class="mb-4">
                    ${imageHtml}
                </div>
                <h6 class="font-medium text-amber-900 mb-1">${sku}</h6>
                <p class="text-lg font-bold text-amber-600 mb-2">$${parseFloat(price).toFixed(2)}</p>
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium ${stock > 0 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'} mb-3">
                    Stock: ${stock}
                </span>
                ${selectedAttributes.length > 0 ? 
                    `<div class="mt-3">
                        ${selectedAttributes.map(attr => `<span class="inline-block bg-amber-100 text-amber-800 text-xs px-2 py-1 rounded mr-1 mb-1">${attr}</span>`).join('')}
                    </div>` : 
                    '<p class="text-amber-500 text-sm italic">No attributes selected</p>'
                }
            </div>
        `;
        
        document.getElementById('variant-preview').innerHTML = preview;
    }

    // Initial preview
    updatePreview();
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
                    <img src="${e.target.result}" alt="Other Image Preview" class="w-16 h-16 object-cover rounded-lg border border-amber-200">
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

// Delete existing variant image functionality
function deleteVariantImage(imageId) {
    if (confirm('Are you sure you want to delete this image? This action cannot be undone.')) {
        // Create a hidden input for the image to be deleted
        const deleteInput = document.createElement('input');
        deleteInput.type = 'hidden';
        deleteInput.name = 'delete_images[]';
        deleteInput.value = imageId;
        document.querySelector('form').appendChild(deleteInput);
        
        // Hide the image container
        const imageContainer = document.querySelector(`[onclick="deleteVariantImage(${imageId})"]`).closest('.flex');
        if (imageContainer) {
            imageContainer.style.display = 'none';
        }
    }
}

function generateSku() {
    var productName = '{{ $product->name }}';
    var baseSku = productName.toUpperCase().replace(/[^A-Z0-9]/g, '').substring(0, 8);
    
    fetch('{{ route("admin.products.variants.generate-sku", $product) }}')
        .then(response => response.json())
        .then(data => {
            if (data.sku) {
                document.getElementById('sku').value = data.sku;
                updatePreview();
            }
        })
        .catch(error => {
            console.error('Error generating SKU:', error);
        });
}
</script>
@endpush 