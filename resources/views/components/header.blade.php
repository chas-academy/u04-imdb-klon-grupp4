<header class="fixed z-50 flex size-20 w-full bg-neutral-900 p-4">
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

        <x-button>Sign in</x-button>

        <button class="size-6 md:hidden">
            <x-lucide-menu />
        </button>
    </nav>
</header>
