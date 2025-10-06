@props(['href', 'current' => false, 'ariaCurrent' => false])

@php
    if ($current) {
        $classes = "text-white bg-blue-700";
        $ariaCurrent = "page";
    } else {
        $classes = "text-gray-900 hover:bg-gray-100";
    }
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => 'block py-2 px-3 rounded-sm ' . $classes, 'aria-current' => $ariaCurrent]) }}>
    {{ $slot }}
</a>
