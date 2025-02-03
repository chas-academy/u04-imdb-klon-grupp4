@props([
    "showText",
    "responsive" => false,
])

<div
    class="text-sun-400 fixed flex w-full gap-2 bg-neutral-900 text-2xl font-bold"
>
    <img src="{{ asset("images/logomark.svg") }}" alt="Movie Scout" />

    @if ($showText)
        <span class="{{ $responsive ? "hidden md:inline" : null }}">
            Movie Scout
        </span>
    @endif
</div>
