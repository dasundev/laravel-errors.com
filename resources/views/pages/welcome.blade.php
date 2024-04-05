<?php

use function Livewire\Volt\{state};
use App\Models\Error;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

state([
    'popularErrors' => Error::approved()->take(3)->get(),
    'latestErrors' => Error::approved()->latest()->take(3)->get(),
    'contributors' => User::whereHas('errors', function (Builder $builder) {
        $builder->approved();
    })->get()
]);

?>

<div>
    <section class="bg-amber-400 overflow-x-hidden">
        <div class="relative max-w-7xl mx-auto py-20 lg:py-28 px-5">
            <div class="max-w-3xl flex flex-col gap-8">
                <h1 class="text-4xl lg:text-5xl font-bold text-black">
                    Laravel errors are not nightmares <br>
                    <span class="text-xl md:text-2xl lg:text-3xl font-semibold leading-none">— if we treat them in the right way.</span>
                </h1>
                <div class="max-w-lg">
                    <p class="text-xl lg:text-2xl text-black font-normal">Our goal is help the Laravel community to find the best solution for the errors they encounter.</p>
                </div>
                <div
                    x-data="{ modalOpen: false }"
                    @keydown.escape.window="modalOpen = false"
                    class="inline-flex"
                >
                    <x-primary-button @click="modalOpen=true" class="mt-5">
                        Share your error experience with us
                    </x-primary-button>
                    <template x-teleport="body">
                        <div x-show="modalOpen" class="fixed top-0 left-0 z-[99] flex items-center justify-center w-screen h-screen" x-cloak>
                            <div x-show="modalOpen"
                                 x-transition:enter="ease-out duration-200"
                                 x-transition:enter-start="opacity-0"
                                 x-transition:enter-end="opacity-100"
                                 x-transition:leave="ease-in duration-200"
                                 x-transition:leave-start="opacity-100"
                                 x-transition:leave-end="opacity-0"
                                 @click="modalOpen=false" class="absolute inset-0 w-full h-full bg-black bg-opacity-75"></div>
                            <div x-show="modalOpen"
                                 x-trap.inert.noscroll="modalOpen"
                                 x-transition:enter="ease-out duration-200"
                                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                 x-transition:leave="ease-in duration-200"
                                 x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                 x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                 class="relative w-full py-6 bg-amber-200 px-7 sm:max-w-lg sm:rounded-lg">
                                <div class="flex flex-col items-center justify-between gap-5">
                                    <h3 class="text-lg font-semibold">Let's save developers time together! ❤️</h3>
                                    <a class="w-full" href="{{ route('auth.redirect') }}">
                                        <x-primary-button class="w-full inline-flex justify-center items-center gap-2">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M12.026 2C6.517 2 2.052 6.465 2.052 11.974C2.052 16.38 4.909 20.119 8.873 21.439C9.372 21.529 9.552 21.222 9.552 20.958C9.552 20.721 9.544 20.093 9.541 19.262C6.766 19.864 6.18 17.924 6.18 17.924C5.728 16.772 5.073 16.465 5.073 16.465C4.168 15.846 5.142 15.86 5.142 15.86C6.144 15.93 6.669 16.888 6.669 16.888C7.559 18.412 9.005 17.972 9.571 17.717C9.662 17.072 9.922 16.632 10.206 16.383C7.992 16.132 5.664 15.276 5.664 11.453C5.664 10.366 6.053 9.474 6.688 8.778C6.587 8.525 6.242 7.51 6.787 6.138C6.787 6.138 7.624 5.869 9.529 7.159C10.3426 6.93767 11.1818 6.8247 12.025 6.823C12.8682 6.82437 13.7075 6.93735 14.521 7.159C16.427 5.868 17.263 6.138 17.263 6.138C17.808 7.51 17.466 8.525 17.362 8.778C18.002 9.474 18.386 10.365 18.386 11.453C18.386 15.286 16.056 16.128 13.834 16.375C14.189 16.683 14.509 17.291 14.509 18.221C14.509 19.555 14.497 20.631 14.497 20.958C14.497 21.225 14.675 21.535 15.184 21.437C19.146 20.115 22 16.379 22 11.974C22 6.465 17.535 2 12.026 2Z"
                                                      fill="white"/>
                                            </svg>
                                            Sign in with GitHub
                                        </x-primary-button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
            <div class="hidden lg:flex flex-col gap-4 absolute top-20 right-[-300px] w-full max-w-4xl">
                @foreach($popularErrors as $index => $error)
                    <a wire:navigate href="{{ route('errors.index', $error) }}" @class(['transition-all hover:scale-105', $index === 0 ? 'ml-40' : null, $index === 1 ? 'ml-20' : null])>
                        <x-error :$error class="bg-amber-200 hover:bg-amber-200"/>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
    <section class="max-w-7xl mx-auto px-5 pt-10 lg:pt-16">
        <h2 class="text-3xl lg:text-4xl font-bold text-center">Latest Errors</h2>
        <div class="flex flex-col gap-4 mt-12">
            @foreach($latestErrors as $index => $error)
                <a wire:navigate href="{{ route('errors.index', $error) }}">
                    <x-error :$error class="bg-purple-100 hover:bg-purple-200"/>
                </a>
            @endforeach
        </div>
    </section>
    <section class="max-w-7xl mx-auto px-5 pt-10 lg:pt-16">
        <h2 class="text-3xl lg:text-4xl font-bold text-center">Contributors</h2>
        <div class="flex flex-wrap justify-center gap-3 mt-12">
            @foreach($contributors as $contributor)
                <a class="h-16 w-16 lg:h-20 lg:w-20 shrink-0 overflow-hidden rounded-full" href="{{ $contributor->github_profile_url }}" target="_blank">
                    <img class="w-full h-full rounded-full object-cover will-change-transform hover:scale-110 transition" src="{{ Gravatar::fallback("https://ui-avatars.com/api?name=$contributor->name")->get($contributor->email) }}" alt="{{ $contributor->name }}">
                </a>
            @endforeach
        </div>
    </section>
</div>
