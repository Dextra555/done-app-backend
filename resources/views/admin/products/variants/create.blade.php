@extends('layouts.admin')

@section('title', 'Create Variant - ' . $product->name)

@section('content')
    <div class="max-w-7xl mx-auto">
        <!-- Page Header -->
        <div class="bg-white rounded-lg shadow-sm border border-amber-200 p-5">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-amber-900">Create New Variant</h1>
                    <p class="mt-2 text-amber-700">Add a new variant for {{ $product->name }}</p>
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
                    <form action="{{ route('admin.products.variants.store', $product) }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
                        @csrf
                        
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

                        <!-- Basic Variant Information -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- SKU Field -->
                            <div>
                                <label for="sku" class="block text-sm font-medium text-amber-900 mb-2">
                                    SKU <span class="text-red-500">*</span>
                                </label>
                                <div class="flex space-x-2">
                                    <input type="text" id="sku" name="sku" value="{{ old('sku') }}" required
                                        class="flex-1 block w-full px-3 py-2 border border-amber-300 rounded-lg shadow-sm placeholder-amber-400 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500">
                                    <button type="button" onclick="generateSku()" 
                                            class="px-4 py-2 bg-amber-100 hover:bg-amber-200 text-amber-700 font-medium rounded-lg transition-colors duration-200">
                                        Generate
                                    </button>
                                </div>
                            </div>

                            <!-- Price Field -->
                            <div>
                                <label for="price" class="block text-sm font-medium text-amber-900 mb-2">
                                    Price <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-amber-500">
                                        $
                                    </span>
                                    <input type="number" id="price" name="price" value="{{ old('price') }}" step="0.01" min="0" required
                                        class="block w-full pl-8 pr-3 py-2 border border-amber-300 rounded-lg shadow-sm placeholder-amber-400 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500">
                                </div>
                            </div>

                            <!-- Stock Field -->
                            <div>
                                <label for="stock" class="block text-sm font-medium text-amber-900 mb-2">
                                    Stock Quantity <span class="text-red-500">*</span>
                                </label>
                                <input type="number" id="stock" name="stock" value="{{ old('stock', 0) }}" min="0" required
                                    class="block w-full px-3 py-2 border border-amber-300 rounded-lg shadow-sm placeholder-amber-400 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500">
                            </div>

                            <!-- Main Image Upload -->
                            <div>
                                <label for="main_image" class="block text-sm font-medium text-amber-900 mb-2">
                                    Main Image
                                </label>
                                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-amber-300 border-dashed rounded-lg hover:border-amber-400 transition-colors duration-200">
                                    <div class="space-y-1 text-center">
                                        <svg class="mx-auto h-12 w-12 text-amber-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div class="flex text-sm text-amber-600">
                                            <label for="main_image" class="relative cursor-pointer bg-white rounded-md font-medium text-amber-600 hover:text-amber-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-amber-500">
                                                <span>Upload main image</span>
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
                                        Remove Main Image
                                    </button>
                                </div>
                                @error('main_image')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Other Images Upload -->
                            <div>
                                <label for="other_images" class="block text-sm font-medium text-amber-900 mb-2">Other Images</label>
                                <input id="other_images" name="other_images[]" type="file" class="sr-only" accept="image/*" multiple onchange="previewOtherImages(this)">
                                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-amber-300 border-dashed rounded-lg hover:border-amber-400 transition-colors duration-200">
                                    <div class="space-y-1 text-center">
                                        <svg class="mx-auto h-12 w-12 text-amber-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div class="flex text-sm text-amber-600">
                                            <label for="other_images" class="relative cursor-pointer bg-white rounded-md font-medium text-amber-600 hover:text-amber-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-amber-500">
                                                <span>Upload other images</span>
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
                                        Remove All Other Images
                                    </button>
                                </div>
                                @error('other_images')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Dynamic Attribute Blocks Section -->
                        <div class="border-t border-amber-200 pt-6">
                            <div class="flex items-center justify-between mb-6">
                                <div>
                                    <h4 class="text-lg font-medium text-amber-900">Variant Attributes</h4>
                                    <p class="text-sm text-amber-600 mt-1">Define the attributes and values for this variant</p>
                                </div>
                                <button type="button" onclick="addAttributeBlock()" 
                                        class="inline-flex items-center px-4 py-2 bg-amber-600 hover:bg-amber-700 text-white font-medium rounded-lg transition-colors duration-200">
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

                        <!-- Form Actions -->
                        <div class="flex items-center justify-end space-x-4 pt-6 border-t border-amber-200">
                            <a href="{{ route('admin.products.variants.index', $product) }}" 
                            class="px-4 py-2 border border-amber-300 text-amber-700 font-medium rounded-lg hover:bg-amber-50 transition-colors duration-200">
                                Cancel
                            </a>
                            <button type="submit" 
                                    class="px-6 py-2 bg-amber-600 hover:bg-amber-700 text-white font-medium rounded-lg transition-colors duration-200">
                                Create Variant
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Preview Section -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow-sm border border-amber-200 sticky top-8">
                    <div class="px-6 py-4 border-b border-amber-200">
                        <h3 class="text-lg font-medium text-amber-900">Variant Preview</h3>
                    </div>
                    <div class="p-6">
                        <div id="variant-preview" class="text-center">
                            <div class="mb-4">
                                <div class="w-20 h-20 bg-amber-100 rounded-lg border border-amber-200 flex items-center justify-center mx-auto">
                                    <svg class="w-8 h-8 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            </div>
                            <h6 class="font-medium text-amber-900 mb-1">SKU-001</h6>
                            <p class="text-lg font-bold text-amber-600 mb-2">$0.00</p>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 mb-3">
                                Stock: 0
                            </span>
                            <p class="text-amber-500 text-sm italic">No attributes selected</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Inline Modal for Adding New Items -->
    <div id="inlineModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-medium text-amber-900" id="modalTitle">Add New Item</h3>
                    <button onclick="closeInlineModal()" class="text-gray-400 hover:text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                
                <div class="space-y-4">
                    <div>
                        <label for="newItemName" class="block text-sm font-medium text-amber-900 mb-2">Name</label>
                        <input type="text" id="newItemName" 
                            class="block w-full px-3 py-2 border border-amber-300 rounded-lg shadow-sm placeholder-amber-400 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500"
                            placeholder="Enter name">
                    </div>
                    
                    <div id="bulkAddSection" class="hidden">
                        <label for="bulkItems" class="block text-sm font-medium text-amber-900 mb-2">Bulk Add (Optional)</label>
                        <textarea id="bulkItems" rows="3"
                                class="block w-full px-3 py-2 border border-amber-300 rounded-lg shadow-sm placeholder-amber-400 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500"
                                placeholder="Enter multiple items separated by commas&#10;Example: Red, Blue, Green"></textarea>
                        <p class="text-xs text-amber-600 mt-1">Separate multiple items with commas</p>
                    </div>
                </div>

                <div class="flex justify-end space-x-3 mt-6">
                    <button onclick="closeInlineModal()" 
                            class="px-4 py-2 border border-amber-300 text-amber-700 bg-white hover:bg-amber-50 font-medium rounded-lg transition-colors duration-200">
                        Cancel
                    </button>
                    <button onclick="saveNewItem()" 
                            class="px-4 py-2 bg-amber-600 hover:bg-amber-700 text-white font-medium rounded-lg transition-colors duration-200">
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

    // Generate SKU function
    window.generateSku = function() {
        var productName = '{{ $product->name }}';
        var baseSku = productName.toUpperCase().replace(/[^A-Z0-9]/g, '').substring(0, 8);
        
        fetch('{{ route("admin.products.variants.generate-sku", $product) }}')
            .then(response => response.json())
            .then(data => {
                document.getElementById('sku').value = data.sku;
                updatePreview();
            })
            .catch(error => {
                console.error('Error generating SKU:', error);
            });
    }

    // Add new attribute block
    window.addAttributeBlock = function() {
        attributeBlockCounter++;
        const blockId = `attribute-block-${attributeBlockCounter}`;
        
        const blockHtml = `
            <div id="${blockId}" class="bg-amber-50 rounded-lg p-6 border border-amber-200">
                <div class="flex items-center justify-between mb-4">
                    <h5 class="text-md font-medium text-amber-900">Attribute Block ${attributeBlockCounter}</h5>
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
                        <label class="block text-sm font-medium text-amber-900 mb-2">
                            Attribute <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <select name="attribute_blocks[${attributeBlockCounter}][attribute_id]" 
                                    class="block w-full px-3 py-2 border border-amber-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500"
                                    onchange="onAttributeChange(${attributeBlockCounter})">
                                <option value="">Select Attribute</option>
                                ${availableData.attributes.map(attr => 
                                    `<option value="${attr.id}">${attr.name}</option>`
                                ).join('')}
                                <option value="add_new" class="text-amber-600 font-medium">+ Add New Attribute</option>
                            </select>
                        </div>
                    </div>

                    <!-- Sub-Attribute Dropdown -->
                    <div>
                        <label class="block text-sm font-medium text-amber-900 mb-2">
                            Sub-Attribute
                        </label>
                        <div class="relative">
                            <select name="attribute_blocks[${attributeBlockCounter}][sub_attribute_id]" 
                                    class="block w-full px-3 py-2 border border-amber-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500"
                                    onchange="onSubAttributeChange(${attributeBlockCounter})">
                                <option value="">Select Sub-Attribute</option>
                                <option value="add_new" class="text-amber-600 font-medium">+ Add New Sub-Attribute</option>
                            </select>
                        </div>
                    </div>

                    <!-- Attribute Value Dropdown -->
                    <div class="attribute-value-container">
                        <label class="block text-sm font-medium text-amber-900 mb-2">
                            Attribute Value <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <select name="attribute_blocks[${attributeBlockCounter}][attribute_value_id]" 
                                    class="block w-full px-3 py-2 border border-amber-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500"
                                    onchange="onAttributeValueChange(${attributeBlockCounter})">
                                <option value="">Select Value</option>
                                <option value="add_new" class="text-amber-600 font-medium">+ Add New Value</option>
                            </select>
                        </div>
                    </div>

                    <!-- Sub-Attribute Value Dropdown -->
                    <div class="sub-attribute-value-container">
                        <label class="block text-sm font-medium text-amber-900 mb-2">
                            Sub-Attribute Value
                        </label>
                        <div class="relative">
                            <select name="attribute_blocks[${attributeBlockCounter}][sub_attribute_value_id]" 
                                    class="block w-full px-3 py-2 border border-amber-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500"
                                    onchange="onSubAttributeValueChange(${attributeBlockCounter})">
                                <option value="">Select Value</option>
                                <option value="add_new" class="text-amber-600 font-medium">+ Add New Value</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        `;
        
        document.getElementById('attribute-blocks-container').insertAdjacentHTML('beforeend', blockHtml);
        updatePreview();
    }

    // Remove attribute block
    window.removeAttributeBlock = function(blockId) {
        const element = document.getElementById(blockId);
        if (element) {
            element.remove();
        }
        updatePreview();
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
        
        subAttributeSelect.innerHTML = '<option value="">Select Sub-Attribute</option><option value="add_new" class="text-amber-600 font-medium">+ Add New Sub-Attribute</option>';
        attributeValueSelect.innerHTML = '<option value="">Select Value</option><option value="add_new" class="text-amber-600 font-medium">+ Add New Value</option>';
        subAttributeValueSelect.innerHTML = '<option value="">Select Value</option><option value="add_new" class="text-amber-600 font-medium">+ Add New Value</option>';
        
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
        
        updatePreview();
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
        subAttributeValueSelect.innerHTML = '<option value="">Select Value</option><option value="add_new" class="text-amber-600 font-medium">+ Add New Value</option>';
        
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
        
        updatePreview();
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
        
        updatePreview();
    }

    // Handle sub-attribute value change
    window.onSubAttributeValueChange = function(blockId) {
        const valueSelect = document.querySelector(`select[name="attribute_blocks[${blockId}][sub_attribute_value_id]"]`);
        const valueId = valueSelect.value;
        
        if (valueId === 'add_new') {
            showInlineModal('sub_attribute_value', 'Add New Sub-Attribute Value', blockId);
            return;
        }
        
        updatePreview();
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

    // Image preview function
    window.previewMainImage = function(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('main-preview-img').src = e.target.result;
                document.getElementById('main-image-preview').classList.remove('hidden');
                updatePreview();
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Remove main image function
    window.removeMainImage = function() {
        document.getElementById('main_image').value = '';
        document.getElementById('main-image-preview').classList.add('hidden');
        document.getElementById('main-preview-img').src = '';
        updatePreview();
    }

    // Other image preview function
    window.previewOtherImages = function(input) {
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
                    imageDiv.innerHTML = `
                        <img src="${e.target.result}" alt="Other Image Preview" class="w-16 h-16 object-cover rounded-lg border border-amber-200">
                        <button type="button" onclick="this.parentElement.remove()" class="absolute -top-1 -right-1 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs hover:bg-red-600">
                            ×
                        </button>
                    `;
                    
                    container.appendChild(imageDiv);
                }
                
                reader.readAsDataURL(file);
            }
        } else {
            previewDiv.classList.add('hidden');
        }
    }

    // Remove all other images function
    window.removeAllOtherImages = function() {
        document.getElementById('other_images').value = '';
        document.getElementById('other-images-preview').classList.add('hidden');
        document.getElementById('other-preview-container').innerHTML = '';
    }

    // Update preview function
    window.updatePreview = function() {
        var sku = document.getElementById('sku').value || 'SKU-001';
        var price = document.getElementById('price').value || '0.00';
        var stock = document.getElementById('stock').value || '0';
        var mainImageFile = document.getElementById('main_image').files[0];
        var galleryImages = document.getElementById('gallery_images').files;
        
        var selectedAttributes = [];
        
        // Get selected values from all attribute blocks
        document.querySelectorAll('[id^="attribute-block-"]').forEach(function(block) {
            const attributeSelect = block.querySelector('select[name*="[attribute_id]"]');
            const attributeValueSelect = block.querySelector('select[name*="[attribute_value_id]"]');
            
            if (attributeSelect && attributeValueSelect && attributeSelect.value && attributeValueSelect.value) {
                const attributeName = attributeSelect.options[attributeSelect.selectedIndex].text;
                const valueName = attributeValueSelect.options[attributeValueSelect.selectedIndex].text;
                selectedAttributes.push(`${attributeName}: ${valueName}`);
            }
        });

        var preview = `
            <div class="text-center">
                <div class="mb-4">
                    ${mainImageFile ? 
                        `<img src="${URL.createObjectURL(mainImageFile)}" alt="Variant" class="w-20 h-20 object-cover rounded-lg border border-amber-200 mx-auto">` :
                        `<div class="w-20 h-20 bg-amber-100 rounded-lg border border-amber-200 flex items-center justify-center mx-auto">
                            <svg class="w-8 h-8 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>`
                    }
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

    // Document ready function
    document.addEventListener('DOMContentLoaded', function() {
        // Update preview when form fields change
        ['sku', 'price', 'stock'].forEach(id => {
            const element = document.getElementById(id);
            if (element) {
                element.addEventListener('input', updatePreview);
            }
        });

        // Update preview when image changes
        const mainImageInput = document.getElementById('main_image');
        if (mainImageInput) {
            mainImageInput.addEventListener('change', updatePreview);
        }

        // Update preview when dropdowns change
        document.addEventListener('change', function(e) {
            if (e.target.name && e.target.name.includes('attribute_blocks')) {
                updatePreview();
            }
        });

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

        // Initial preview
        updatePreview();
    });
</script>