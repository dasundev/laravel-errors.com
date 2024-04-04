@props([
    'type' => 'button'
])
<button type="button" {{ $attributes->twMerge("md:text-md lg:text-lg font-semibold bg-lime-600 px-5 py-2 text-white rounded-xl shadow hover:bg-lime-700 transition-colors duration-300") }} {{ $attributes }} >
    {{ $slot }}
</button>
