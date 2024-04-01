<?php

use function Livewire\Volt\{state};

?>

<div>
    <section class="bg-amber-400 overflow-x-hidden">
        <div class="relative max-w-6xl mx-auto py-20 lg:py-28 px-5 lg:px-0">
            <div class="max-w-3xl flex flex-col gap-8">
                <h1 class="text-4xl lg:text-5xl font-bold text-black">
                    Laravel errors are not nightmares <br>
                    <span class="text-xl md:text-2xl lg:text-3xl font-semibold leading-none">— if we treat them in the right way.</span>
                </h1>
                <div class="max-w-md">
                    <p class="text-xl text-black font-medium">Our goal is help the Laravel community to find the best solution for the errors they encounter.</p>
                </div>
                <a href="{{ route('filament.app.auth.login') }}" class="inline-flex" wire:navigate.hover>
                    <button class="text-md lg:text-lg font-semibold bg-lime-600 px-5 py-2 text-white rounded-xl shadow hover:bg-lime-700 transition-colors duration-300">Share your error experience with us</button>
                </a>
            </div>
            <div class="hidden lg:flex flex-col gap-4 absolute top-20 right-[-400px] w-full max-w-4xl">
                <a href="#" class="transition-all hover:scale-105">
                    <div class="ml-40 flex flex-col items-start justify-center gap-5 bg-amber-200 p-5 rounded-xl shadow">
                        <div class="text-purple-800 font-medium">Illuminate\Encryption\MissingAppKeyException</div>
                        <div class="text-lg leading-none font-medium">No application encryption key has been specified.</div>
                    </div>
                </a>
                <a href="#" class="transition-all hover:scale-105">
                    <div class="ml-20 flex flex-col items-start justify-center gap-5 bg-amber-200 p-5 rounded-xl shadow">
                        <div class="text-purple-800 font-medium">InvalidArgumentException</div>
                        <div class="text-lg leading-none font-medium">View [welcome] not found.</div>
                    </div>
                </a>
                <a href="#" class="transition-all hover:scale-105">
                    <div class="flex flex-col items-start justify-center gap-5 bg-amber-200 p-5 rounded-xl shadow">
                        <div class="text-purple-800 font-medium">Illuminate\Contracts\Container\BindingResolutionException</div>
                        <div class="text-lg leading-none font-medium">Target class [App\Http\Controllers\DashboardController] does not exist.</div>
                    </div>
                </a>
            </div>
        </div>
    </section>
    <section class="max-w-6xl mx-auto px-5 lg:px-0 pt-16">
        <h1 class="text-4xl font-bold text-center">Latest Errors</h1>
        <div class="flex flex-col gap-4 mt-12">
            <a href="#" class="flex flex-col items-start justify-center gap-5 bg-purple-100 p-5 rounded-xl shadow shadow-purple-300 hover:bg-purple-200 transition-colors">
                <div class="text-purple-800 font-medium">Illuminate\Encryption\MissingAppKeyException</div>
                <div class="text-lg leading-none font-medium">No application encryption key has been specified.</div>
            </a>
            <a href="#" class="flex flex-col items-start justify-center gap-5 bg-purple-100 p-5 rounded-xl shadow shadow-purple-300 hover:bg-purple-200 transition-colors">
                <div class="text-purple-800 font-medium">InvalidArgumentException</div>
                <div class="text-lg leading-none font-medium">View [welcome] not found.</div>
            </a>
            <a href="#" class="flex flex-col items-start justify-center gap-5 bg-purple-100 p-5 rounded-xl shadow shadow-purple-300 hover:bg-purple-200 transition-colors">
                <div class="text-purple-800 font-medium">Illuminate\Contracts\Container\BindingResolutionException</div>
                <div class="text-lg leading-none font-medium">Target class [App\Http\Controllers\DashboardController] does not exist.</div>
            </a>
        </div>
    </section>
    <section class="max-w-6xl mx-auto px-5 lg:px-0 pt-16">
        <h1 class="text-4xl font-bold text-center">Contributors</h1>
        <div class="flex flex-wrap justify-center gap-3 mt-12">
            <a class="h-20 w-20 shrink-0 overflow-hidden rounded-full" href="#">
                <img class="w-full h-full rounded-full object-cover will-change-transform hover:scale-110" src="https://ui-avatars.com/api?name=random" alt="">
            </a>
        </div>
    </section>
</div>
