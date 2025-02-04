@props([
    "variant" => "primary",
    "wide" => false,
])

<button
    @class([
        "bg-sun-400 hover:bg-sun-500" => $variant === "primary",
        "bg-neutral-900 hover:bg-neutral-700" => $variant === "secondary",
        "w-full" => $wide,
        "item-center flex gap-2 rounded-full px-4 py-2 font-bold transition",
    ])
>
    <div class="size-6">
        {{ $icon }}
    </div>
    {{ $slot }}
</button>
