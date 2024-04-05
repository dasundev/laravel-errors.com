<div {{ $attributes->twMerge("overflow-x-scroll no-scrollbar p-5 rounded-xl shadow transition-colors") }}>
    <div class="text-purple-800 font-medium text-sm font-exception">{{ $error->exception }}</div>
    <h3 class="text-md whitespace-nowrap sm:text-lg leading-none font-medium mt-3">{{ $error->title }}</h3>
</div>
