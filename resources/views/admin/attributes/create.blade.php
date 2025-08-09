@extends('layouts.admin')

@section('title', 'Create New Attribute')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Page Header -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-amber-900">Create New Attribute</h1>
                <p class="mt-2 text-amber-700">Add a new product attribute with flexible value options</p>
            </div>
            <a href="{{ route('admin.attributes.index') }}" 
               class="inline-flex items-center px-4 py-2 bg-amber-100 hover:bg-amber-200 text-amber-700 font-medium rounded-lg transition-colors duration-200">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Attributes
            </a>
        </div>
    </div>

    <!-- Main Form -->
    <div class="bg-white rounded-lg shadow-sm border border-amber-200">
        <div class="px-6 py-4 border-b border-amber-200">
            <h3 class="text-lg font-medium text-amber-900">Attribute Details</h3>
        </div>
        
        <form action="{{ route('admin.attributes.store') }}" method="POST" class="p-6 space-y-6">
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

            <!-- Attribute Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-amber-900 mb-2">
                    Attribute Name <span class="text-red-500">*</span>
                </label>
                <input type="text" 
                       id="name" 
                       name="name" 
                       value="{{ old('name') }}" 
                       class="w-full rounded-lg border-amber-300 focus:border-amber-500 focus:ring-amber-500 @error('name') border-red-300 focus:border-red-500 focus:ring-red-500 @enderror"
                       placeholder="e.g., Color, Size, Material, Brand"
                       required>
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p class="mt-1 text-sm text-amber-600">Choose a descriptive name for this attribute (e.g., "Color", "Size", "Material")</p>
            </div>

            <!-- Value Type Selection -->
            <div>
                <label class="block text-sm font-medium text-amber-900 mb-3">Value Type</label>
                <div class="space-y-3">
                    <label class="flex items-center">
                        <input type="radio" 
                               name="value_type" 
                               value="sub_attributes" 
                               checked
                               onchange="toggleValueType()"
                               class="rounded border-amber-300 text-amber-600 focus:ring-amber-500">
                        <span class="ml-2 text-sm text-amber-900">Sub-Attributes (Recommended)</span>
                    </label>
                    <p class="ml-6 text-xs text-amber-600">Use predefined options like "Red", "Blue", "Green" for Color attribute</p>
                    
                    <label class="flex items-center">
                        <input type="radio" 
                               name="value_type" 
                               value="custom_values" 
                               onchange="toggleValueType()"
                               class="rounded border-amber-300 text-amber-600 focus:ring-amber-500">
                        <span class="ml-2 text-sm text-amber-900">Custom Values</span>
                    </label>
                    <p class="ml-6 text-xs text-amber-600">Use free-form values like "18 inches", "2 years warranty"</p>
                    
                    <label class="flex items-center">
                        <input type="radio" 
                               name="value_type" 
                               value="both" 
                               onchange="toggleValueType()"
                               class="rounded border-amber-300 text-amber-600 focus:ring-amber-500">
                        <span class="ml-2 text-sm text-amber-900">Both Types</span>
                    </label>
                    <p class="ml-6 text-xs text-amber-600">Use both predefined options and custom values</p>
                </div>
            </div>

            <!-- Sub-Attributes Section -->
            <div id="sub_attributes_section" class="space-y-4">
                <div class="flex items-center justify-between">
                    <label class="block text-sm font-medium text-amber-900">Sub-Attributes</label>
                    <button type="button" 
                            onclick="addSubAttributeField()"
                            class="inline-flex items-center px-3 py-1 bg-amber-100 hover:bg-amber-200 text-amber-700 text-sm font-medium rounded transition-colors duration-200">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Add Option
                    </button>
                </div>
                
                <div id="sub_attributes_container" class="space-y-2">
                    <div class="flex items-center space-x-2">
                        <input type="text" 
                               name="sub_attributes[]" 
                               placeholder="e.g., Red"
                               class="flex-1 rounded border-amber-300 focus:border-amber-500 focus:ring-amber-500">
                        <button type="button" 
                                onclick="removeField(this)"
                                class="p-2 text-red-600 hover:text-red-700 hover:bg-red-50 rounded">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                
                <p class="text-xs text-amber-600">Add predefined options for this attribute. These will be available as checkboxes when creating product variants.</p>
            </div>

            <!-- Custom Values Section -->
            <div id="custom_values_section" class="space-y-4" style="display: none;">
                <div class="flex items-center justify-between">
                    <label class="block text-sm font-medium text-amber-900">Custom Values</label>
                    <button type="button" 
                            onclick="addCustomValueField()"
                            class="inline-flex items-center px-3 py-1 bg-blue-100 hover:bg-blue-200 text-blue-700 text-sm font-medium rounded transition-colors duration-200">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Add Value
                    </button>
                </div>
                
                <div id="custom_values_container" class="space-y-2">
                    <div class="flex items-center space-x-2">
                        <input type="text" 
                               name="custom_values[]" 
                               placeholder="e.g., 18 inches"
                               class="flex-1 rounded border-amber-300 focus:border-amber-500 focus:ring-amber-500">
                        <button type="button" 
                                onclick="removeField(this)"
                                class="p-2 text-red-600 hover:text-red-700 hover:bg-red-50 rounded">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                
                <p class="text-xs text-amber-600">Add custom values for this attribute. These can be specific measurements, descriptions, or any free-form text.</p>
            </div>

            <!-- Submit Buttons -->
            <div class="flex justify-end space-x-3 pt-6 border-t border-amber-200">
                <a href="{{ route('admin.attributes.index') }}" 
                   class="inline-flex items-center px-4 py-2 border border-amber-300 text-amber-700 bg-white hover:bg-amber-50 font-medium rounded-lg transition-colors duration-200">
                    Cancel
                </a>
                <button type="submit" 
                        class="inline-flex items-center px-6 py-2 bg-amber-600 hover:bg-amber-700 text-white font-medium rounded-lg transition-colors duration-200">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Create Attribute
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
function toggleValueType() {
    const valueType = document.querySelector('input[name="value_type"]:checked').value;
    const subAttributesSection = document.getElementById('sub_attributes_section');
    const customValuesSection = document.getElementById('custom_values_section');
    
    if (valueType === 'sub_attributes') {
        subAttributesSection.style.display = 'block';
        customValuesSection.style.display = 'none';
    } else if (valueType === 'custom_values') {
        subAttributesSection.style.display = 'none';
        customValuesSection.style.display = 'block';
    } else if (valueType === 'both') {
        subAttributesSection.style.display = 'block';
        customValuesSection.style.display = 'block';
    }
}

function addSubAttributeField() {
    const container = document.getElementById('sub_attributes_container');
    const newField = document.createElement('div');
    newField.className = 'flex items-center space-x-2';
    newField.innerHTML = `
        <input type="text" 
               name="sub_attributes[]" 
               placeholder="e.g., Red"
               class="flex-1 rounded border-amber-300 focus:border-amber-500 focus:ring-amber-500">
        <button type="button" 
                onclick="removeField(this)"
                class="p-2 text-red-600 hover:text-red-700 hover:bg-red-50 rounded">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
            </svg>
        </button>
    `;
    container.appendChild(newField);
}

function addCustomValueField() {
    const container = document.getElementById('custom_values_container');
    const newField = document.createElement('div');
    newField.className = 'flex items-center space-x-2';
    newField.innerHTML = `
        <input type="text" 
               name="custom_values[]" 
               placeholder="e.g., 18 inches"
               class="flex-1 rounded border-amber-300 focus:border-amber-500 focus:ring-amber-500">
        <button type="button" 
                onclick="removeField(this)"
                class="p-2 text-red-600 hover:text-red-700 hover:bg-red-50 rounded">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
            </svg>
        </button>
    `;
    container.appendChild(newField);
}

function removeField(button) {
    const field = button.parentElement;
    const container = field.parentElement;
    
    // Don't remove if it's the last field
    if (container.children.length > 1) {
        field.remove();
    } else {
        // Clear the input instead of removing
        const input = field.querySelector('input');
        if (input) input.value = '';
    }
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    toggleValueType();
});
</script>
@endpush
@endsection 