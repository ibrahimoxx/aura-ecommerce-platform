@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full ps-6 pe-4 py-3 border-l-4 border-black text-start text-[11px] uppercase tracking-widest font-semibold text-black bg-gray-50 focus:outline-none focus:text-black focus:bg-gray-100 focus:border-black transition duration-150 ease-in-out'
            : 'block w-full ps-6 pe-4 py-3 border-l-4 border-transparent text-start text-[11px] uppercase tracking-widest font-medium text-gray-500 hover:text-black hover:bg-gray-50 hover:border-gray-200 focus:outline-none focus:text-black focus:bg-gray-50 focus:border-gray-200 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
