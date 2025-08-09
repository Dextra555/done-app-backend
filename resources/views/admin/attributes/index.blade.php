@extends('layouts.admin')

@section('title', 'Product Attributes Management')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Page Header -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-amber-900">Product Attributes</h1>
                <p class="mt-2 text-amber-700">Manage product attributes and their values</p>
            </div>
            <a href="{{ route('admin.attributes.create') }}" 
               class="inline-flex items-center px-4 py-2 bg-amber-600 hover:bg-amber-700 text-white font-medium rounded-lg transition-colors duration-200">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Add New Attribute
            </a>
        </div>
    </div>

    <!-- Attributes Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6">
        @forelse($attributes as $attribute)
            <div class="bg-white rounded-lg shadow-sm border border-amber-200 overflow-hidden">
                <!-- Attribute Header -->
                <div class="px-6 py-4 border-b border-amber-200 bg-amber-50">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-amber-900">{{ $attribute->name }}</h3>
                        <div class="flex items-center space-x-2">
                            <a href="{{ route('admin.attributes.edit', $attribute) }}" 
                               class="text-amber-600 hover:text-amber-700">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </a>
                            <form action="{{ route('admin.attributes.destroy', $attribute) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        onclick="return confirm('Are you sure you want to delete this attribute?')"
                                        class="text-red-600 hover:text-red-700">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Attribute Values -->
                <div class="p-6">
                    @if($attribute->values->count() > 0)
                        <div class="space-y-3">
                            @foreach($attribute->values as $value)
                                <div class="flex items-center justify-between p-3 bg-amber-50 rounded-lg">
                                    <div class="flex items-center">
                                        @if($value->subAttribute)
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-800 mr-2">
                                                Sub-Attribute
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 mr-2">
                                                Custom Value
                                            </span>
                                        @endif
                                        <span class="text-sm font-medium text-amber-900">
                                            {{ $value->value ?? $value->subAttribute->name }}
                                        </span>
                                    </div>
                                    <div class="text-xs text-amber-600">
                                        ID: {{ $value->id }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-8">
                            <svg class="w-12 h-12 text-amber-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <p class="text-amber-600">No values defined for this attribute.</p>
                        </div>
                    @endif

                    <!-- Quick Add Section -->
                    <div class="mt-6 pt-6 border-t border-amber-200">
                        <h4 class="text-sm font-medium text-amber-900 mb-3">Quick Add</h4>
                        
                        <!-- Add Sub-Attribute -->
                        <div class="mb-3">
                            <form class="flex space-x-2" onsubmit="addSubAttribute(event, {{ $attribute->id }})">
                                <input type="text" 
                                       id="sub_attr_{{ $attribute->id }}" 
                                       placeholder="New sub-attribute"
                                       class="flex-1 text-sm rounded border-amber-300 focus:border-amber-500 focus:ring-amber-500">
                                <button type="submit" 
                                        class="px-3 py-1 bg-amber-100 hover:bg-amber-200 text-amber-700 text-sm font-medium rounded transition-colors duration-200">
                                    Add
                                </button>
                            </form>
                        </div>

                        <!-- Add Custom Value -->
                        <div>
                            <form class="flex space-x-2" onsubmit="addCustomValue(event, {{ $attribute->id }})">
                                <input type="text" 
                                       id="custom_val_{{ $attribute->id }}" 
                                       placeholder="New custom value"
                                       class="flex-1 text-sm rounded border-amber-300 focus:border-amber-500 focus:ring-amber-500">
                                <button type="submit" 
                                        class="px-3 py-1 bg-blue-100 hover:bg-blue-200 text-blue-700 text-sm font-medium rounded transition-colors duration-200">
                                    Add
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full">
                <div class="text-center py-12">
                    <svg class="w-16 h-16 text-amber-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <h3 class="text-lg font-medium text-amber-900 mb-2">No Attributes Found</h3>
                    <p class="text-amber-600 mb-6">Get started by creating your first product attribute.</p>
                    <a href="{{ route('admin.attributes.create') }}" 
                       class="inline-flex items-center px-4 py-2 bg-amber-600 hover:bg-amber-700 text-white font-medium rounded-lg transition-colors duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Create First Attribute
                    </a>
                </div>
            </div>
        @endforelse
    </div>
</div>

@push('scripts')
<script>
function addSubAttribute(event, attributeId) {
    event.preventDefault();
    const input = document.getElementById(`sub_attr_${attributeId}`);
    const name = input.value.trim();
    
    if (!name) return;

    fetch(`/admin/attributes/${attributeId}/sub-attributes`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ name: name })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        } else {
            alert('Error adding sub-attribute: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error adding sub-attribute');
    });
}

function addCustomValue(event, attributeId) {
    event.preventDefault();
    const input = document.getElementById(`custom_val_${attributeId}`);
    const value = input.value.trim();
    
    if (!value) return;

    fetch(`/admin/attributes/${attributeId}/custom-values`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ value: value })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        } else {
            alert('Error adding custom value: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error adding custom value');
    });
}
</script>
@endpush
@endsection 