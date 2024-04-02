<div {{ $attributes->twMerge("flex flex-col items-start justify-center gap-5 p-5 rounded-xl shadow transition-colors") }}>
    <div class="text-purple-800 font-medium text-sm font-exception">{{ $error->exception }}</div>
    <h3 class="text-lg leading-none font-medium">{{ $error->title }}</h3>
</div>
