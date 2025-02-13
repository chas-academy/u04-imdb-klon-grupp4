<header class="fixed z-10 flex w-full bg-neutral-900 p-4">
    <x-logo showText />

    <nav class="flex gap-4">
        <x-button variant="secondary">
            <a href="/">Genre</a>
        </x-button>

        <x-button variant="secondary">
            <x-slot:icon>
                <x-lucide-bookmark-plus />
            </x-slot>

            <a href="/">Watchlist</a>
        </x-button>

        <x-button><a href="/register">Sign up</a></x-button>
    </nav>
</header>
