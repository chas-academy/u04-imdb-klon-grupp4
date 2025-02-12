<header
    x-data="{ open: false }"
    class="fixed z-40 flex size-20 w-full justify-between bg-neutral-900 p-4"
>
    <x-logo showText />

    <nav class="flex items-center gap-4">
        <div class="hidden md:flex">
            <x-button variant="secondary">
                <a href="/">Genre</a>
            </x-button>

            <x-button variant="secondary">
                <x-slot:icon>
                    <x-lucide-bookmark-plus />
                </x-slot>

                <a href="/">Watchlist</a>
            </x-button>
        </div>

        <x-button><a href="/register">Sign up</a></x-button>

        <button @click="open = true" class="size-6 md:hidden">
            <x-lucide-menu />
        </button>
    </nav>

    <div
        x-show="open"
        class="fixed inset-0 z-50 flex flex-col items-center justify-center gap-8 bg-neutral-900 font-bold"
    >
        <button @click="open = false">
            <x-lucide-x class="absolute right-4 top-4 size-6" />
        </button>

        <a href="/">Home</a>
        <a href="/">Genres</a>
        <a href="/">Watchlist</a>
        {{-- change to profile if signed in --}}
        <a href="/">Sign in</a>
    </div>
</header>
