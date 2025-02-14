@props([
    "title" => "",
    "year" => "",
    "length" => "",
    "description" => "",
    "movie" => [],
])

@php
    $image = $movie["image"] ?? asset("images/default.jpg");
@endphp

<x-base-card class="m-4 w-full h-auto">
    <div class="flex gap-4">
        <img class="w-16 h-24 object-cover rounded-lg" src="{{ $image }}" alt="{{ $title }}">

        <div class="flex flex-col gap-1">
            <div class="flex justify-between">
                <h3 class="lext-lg font-bold">{{ $title }}</h3>
                {{-- Bookmark here --}}
            </div>
            <div class="flex gap-2">
                <p>{{ $year }}</p>
                <p class="text-neutral-400"> {{ $length }}</p>
            </div>
            <p class="text-sm text-neutral-400 line-clamp-2 sm:line-clamp-1">{{ $description }}</p>
        </div>
    </div>
</x-base-card>