@props([
    "rating" => null,
    "filled" => false,
])

<div class="flex items-center gap-2 text-sm">
    @if ($rating)
        <div class="text-yellow-400">{{ $rating }}</div>
        <x-lucide-star
            @class(["size text-yellow-400 ", "fill-yellow-400" => $filled])
        />
    @else
        <div class="text-gray-400">Not rated</div>
        <x-lucide-star class="size-4 text-gray-400" />
    @endif
</div>
