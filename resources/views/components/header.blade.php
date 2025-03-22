<header
    x-data="{ open: false }"
    class="fixed z-40 flex h-20 w-full justify-between bg-neutral-900 p-4"
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

        @auth
            <a href="{{ route("profile") }}"><x-avatar size="sm" /></a>
        @endauth

        @guest
            <x-button><a href="{{ route("register") }}">Sign up</a></x-button>
        @endguest

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

        <a href="{{ route("home") }}">Home</a>
        <a href="{{ route("genres.index") }}">Genres</a>
        {{-- <a href="/">Watchlist</a> --}}

        @auth
            <a href="{{ route("profile") }}">Profile</a>
        @endauth

        @guest
            <a href="{{ route("register") }}">Sign up</a>
        @endguest
    </div>
</header>
