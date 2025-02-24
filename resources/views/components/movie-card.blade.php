@props([
    "title",
    "year",
    "length",
    "description",
    "movie",
    "href",
])

@php
    $image = $movie["image"] ?? null;
@endphp

<x-base-card href="{{ $href }}" class="m-4 h-auto w-full">
    <div class="flex gap-4">
        <img
            class="h-24 w-16 object-cover"
            src="{{ $image }}"
            alt="{{ $title }}"
        />

        <div class="flex flex-col gap-1">
            <div class="flex justify-between">
                <h3 class="text-lg font-bold">{{ $title }}</h3>
                {{-- Bookmark here --}}
            </div>
            <div class="flex gap-2">
                <p>{{ $year }}</p>
                <p class="text-neutral-400">{{ $length }}</p>
            </div>
            <p class="line-clamp-2 text-sm text-neutral-400 sm:line-clamp-1">
                {{ $description }}
            </p>
        </div>
    </div>
</x-base-card>
