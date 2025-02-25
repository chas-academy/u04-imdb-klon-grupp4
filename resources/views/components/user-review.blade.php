@props([
    "username",
    "title",
    "content",
    "score",
])

<x-base-card class="space-x-4">
    <x-avatar size="sm" />
    <div
        x-data="{ open: false }"
        @click="open = !open"
        class="flex w-full cursor-pointer flex-col"
    >
        <div class="flex w-full justify-between">
            <div class="flex items-center gap-2">
                <p class="text-base">{{ $username }}</p>

                <div class="flex items-center gap-1">
                    <p class="text-sm text-neutral-200">{{ $score }}</p>

                    <x-lucide-star
                        class="size-4 fill-current text-yellow-400"
                    />
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
