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
