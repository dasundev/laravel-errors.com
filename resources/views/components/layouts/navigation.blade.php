<nav class="bg-amber-400 max-w-full">
    <div class="max-w-7xl mx-auto p-5">
        <div class="flex items-center justify-between">
            <x-logo />
            <div class="inline-flex items-center gap-5">
                @persist('search')
                    <div id="search"></div>
                @endpersist
                <div class="inline-flex items-center gap-3">
                    <a href="https://github.com/dasundev/laravel-errors" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" viewBox="0 0 24 24" fill="currentColor" class="text-black hover:text-gray-800 transition-colors">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12.026 2c-5.509 0-9.974 4.465-9.974 9.974 0 4.406 2.857 8.145 6.821 9.465.499.09.679-.217.679-.481 0-.237-.008-.865-.011-1.696-2.775.602-3.361-1.338-3.361-1.338-.452-1.152-1.107-1.459-1.107-1.459-.905-.619.069-.605.069-.605 1.002.07 1.527 1.028 1.527 1.028.89 1.524 2.336 1.084 2.902.829.091-.645.351-1.085.635-1.334-2.214-.251-4.542-1.107-4.542-4.93 0-1.087.389-1.979 1.024-2.675-.101-.253-.446-1.268.099-2.64 0 0 .837-.269 2.742 1.021a9.582 9.582 0 0 1 2.496-.336 9.554 9.554 0 0 1 2.496.336c1.906-1.291 2.742-1.021 2.742-1.021.545 1.372.203 2.387.099 2.64.64.696 1.024 1.587 1.024 2.675 0 3.833-2.33 4.675-4.552 4.922.355.308.675.916.675 1.846 0 1.334-.012 2.41-.012 2.737 0 .267.178.577.687.479C19.146 20.115 22 16.379 22 11.974 22 6.465 17.535 2 12.026 2z"></path>
                        </svg>
                    </a>
                    @auth
                        <div x-data="{ dropdownIsOpen: false }" @click.away="dropdownIsOpen = false" class="relative flex items-center">
                            <button @click="dropdownIsOpen = ! dropdownIsOpen">
                                <img src="{{ Gravatar::fallback("https://ui-avatars.com/api?name=".auth()->user()->name)->get(auth()->user()->email) }}" class="w-9 h-9 rounded-full" alt="{{ auth()->user()->name }}">
                            </button>
                            <div
                                x-cloak
                                x-show="dropdownIsOpen"
                                class="absolute z-[99] top-10 right-0 mt-3 bg-white rounded-lg py-2"
                                x-transition:enter="transition ease-linear duration-75"
                                x-transition:enter-start="scale-95 opacity-0"
                                x-transition:enter-end="scale-100 opacity-100"
                                x-transition:leave="transition ease-linear duration-75"
                                x-transition:leave-start="scale-100 opacity-100"
                                x-transition:leave-end="scale-95 opacity-0"
                            >
                                <a href="{{ route('filament.app.pages.dashboard') }}" class="block w-full pl-5 pr-20 py-2.5 text-left hover:bg-amber-100 disabled:text-gray-500">Dashboard</a>
                                <form action="/app/logout" method="post">
                                    @csrf
                                    <button type="submit" class="block w-full pl-5 pr-20 py-2.5 text-left hover:bg-amber-100 disabled:text-gray-500">Logout</button>
                                </form>
                            </div>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</nav>
