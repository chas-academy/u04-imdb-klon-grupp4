@props([
    "variant" => "primary",
    "wide" => false,
    "font" => "font-bold",
])

<button
    @class([
        "bg-sun-400 hover:bg-sun-500" => $variant === "primary",
        "bg-neutral-900 hover:bg-neutral-700" => $variant === "secondary",
        "w-full" => $wide,
        $font,
        "flex items-center justify-center gap-2 text-nowrap rounded-full px-4 py-2 transition font-bold",
    ])
>
    @if (isset($icon))
        <div class="size-6">
            {{ $icon }}
        </div>
    @endif

    {{ $slot }}
</button>
