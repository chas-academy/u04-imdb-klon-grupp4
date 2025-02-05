@props([
    "showText",
    "responsive" => false,
    "link" => true,
])

@if ($link)
    <a
        href="/"
        class="text-sun-400 flex w-full items-center gap-2 text-2xl font-bold"
    >
        <img src="{{ asset("images/logomark.svg") }}" alt="Movie Scout" />

        @if ($showText)
            <span class="{{ $responsive ? "hidden md:inline" : null }}">
                Movie Scout
            </span>
        @endif
    </a>
@else
    <div class="text-sun-400 flex w-full gap-2 text-2xl font-bold">
        <img src="{{ asset("images/logomark.svg") }}" alt="Movie Scout" />

        @if ($showText)
            <span class="{{ $responsive ? "hidden md:inline" : null }}">
                Movie Scout
            </span>
        @endif
    </div>
@endif
