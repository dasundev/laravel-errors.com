<div {{ $attributes->twMerge("flex flex-col items-start justify-center gap-5 p-5 rounded-xl shadow transition-colors") }}>
    <div class="text-purple-800 font-medium">{{ $error->exception }}</div>
    <div class="text-lg leading-none font-medium">{{ $error->title }}</div>
</div>
