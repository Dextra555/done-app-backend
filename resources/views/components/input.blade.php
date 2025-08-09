@props(['id' => null, 'name' => null, 'type' => 'text', 'value' => '', 'autocomplete' => null])

<input
    @if($id) id="{{ $id }}" @endif
    @if($name) name="{{ $name }}" @endif
    type="{{ $type }}"
    {{ $attributes->merge(['class' => 'mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50']) }}
    value="{{ $value }}"
    @if($autocomplete) autocomplete="{{ $autocomplete }}" @endif
>

@error($name)
    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
@enderror
