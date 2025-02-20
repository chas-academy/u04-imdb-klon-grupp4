@props([
    "showText",
    "responsive" => false,
    "link" => true,
])

@if ($link)
    <a
        href="/"
        class="flex items-center gap-2 text-nowrap text-2xl font-bold text-sun-400"
    >
        <img src="{{ asset("images/logomark.svg") }}" alt="Movie Scout" />

        @if ($showText)
            <span class="{{ $responsive ? "hidden md:inline" : null }}">
                Movie Scout
            </span>
        @endif
    </a>
@else
    <div class="flex gap-2 text-nowrap text-2xl font-bold text-sun-400">
        <img src="{{ asset("images/logomark.svg") }}" alt="Movie Scout" />

        @if ($showText)
            <span class="{{ $responsive ? "hidden md:inline" : null }}">
                Movie Scout
            </span>
        @endif
    </div>
@endif
