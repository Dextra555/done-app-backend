@props(['active' => false, 'href' => '#'])

@php
    $classes = $active 
        ? 'bg-amber-900 text-white group flex items-center px-4 py-3 text-sm font-medium rounded-md transition-colors duration-200'
        : 'text-amber-100 hover:bg-amber-700 hover:bg-opacity-50 group flex items-center px-4 py-3 text-sm font-medium rounded-md transition-colors duration-200';
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
