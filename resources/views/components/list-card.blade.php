@props([
    "title",
    "description",
    "movies" => [],
    "href",
])

<x-base-card href="{{ $href }}">
    <div class="flex gap-4">
        <x-list-cover :movies="$movies" class="h-24 w-16 object-cover" />

        <div class="flex-1">
            <div class="flex justify-between">
                <h3 class="text-lg font-bold">{{ $title }}</h3>
                <x-lucide-x
                    class="size-6 cursor-pointer text-neutral-400 hover:text-neutral-100"
                />
            </div>
            <p class="line-clamp-3 sm:line-clamp-1">{{ $description }}</p>
        </div>
    </div>
</x-base-card>
