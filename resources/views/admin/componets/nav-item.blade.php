@props(['href', 'active', 'icon', 'label'])

@php
    $classes = $active 
        ? 'bg-indigo-800 text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md'
        : 'text-white hover:bg-indigo-600 group flex items-center px-2 py-2 text-sm font-medium rounded-md';
@endphp

<a href="{{ $href }}" class="{{ $classes }}">
    <i class="{{ $icon }} mr-3"></i> {{ $label }}
</a>