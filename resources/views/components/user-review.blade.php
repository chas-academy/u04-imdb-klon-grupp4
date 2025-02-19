@props([
    "username" => "Username",
    "title" => "Title of the review",
    "content" => null,
    "score" => "X/10",
])

<x-base-card class="hover:ring-2 hover:ring-neutral-700 !important transition">
    <div>
        <x-avatar size="sm" />
    </div>
    <div 
        x-data="{ open: false }" 
        @click="open = !open" 
        class="flex w-full flex-col cursor-pointer"
    >
        <div class="flex justify-between w-full">
            <div class="flex gap-2 items-center">
                <p class="font-bold text-lg">{{ $username }}</p>
                <div class="flex items-center gap-1">
                    <p class="text-neutral-200 text-sm">{{ $score }}</p>
                    <x-lucide-star class="size-4 text-yellow-400 fill-current" />
                </div>
            </div>
            <x-flag-post />
        </div>

        <p class="text-sm">{{ $title }}</p>

        <div x-show="open" class="text-neutral-200">
            <p class="text-sm">{{ $content }}</p>
        </div>
    </div>
</x-base-card>