@props ([
    "title",
    "description",
    "movies" => [],
])    

<x-base-card class="m-4 w-full h-auto">
    <div class="flex gap-4">
        <x-list-cover :movies="$movies" class="w-16 h-24 object-cover" />
    
        <div class="flex-1">
            <div class="flex justify-between">
                <h3 class="text-lg font-bold">{{ $title }}</h3>
                <x-lucide-x class="size-6 text-neutral-400 hover:text-neutral-100 cursor-pointer"></x-lucide-x>
            </div>
            <p class="line-clamp-3 sm:line-clamp-1">{{ $description }}</p>
        </div>
    </div>
</x-base-card>