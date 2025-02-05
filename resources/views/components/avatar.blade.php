@props([
    "size",
    "imageUrl" => null,
])

<div
    @class([
        "size-10" => $size === "sm",
        "size-28" => $size === "md",
        "size-40" => $size === "lg",
        "flex items-center justify-center overflow-hidden rounded-full bg-neutral-200",
    ])
>
    @if (isset($imageUrl))
        <img src="{{ $imageUrl }}" alt="profile picture" />
    @else
        <x-lucide-image class="size-6 text-neutral-400" />
    @endif
</div>
