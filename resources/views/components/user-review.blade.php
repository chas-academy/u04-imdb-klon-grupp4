@props([
    "username",
    "title",
    "content",
    "rating",
    "reviewId",
])

<x-base-card class="space-x-4" x-data="{ open: false, showFlagModal: false, reviewId: '{{ $reviewId }}' }">
    <x-avatar size="sm" />
    <div @click="open = !open" class="flex w-full cursor-pointer flex-col">
        <div class="flex w-full justify-between">
            <div class="flex items-center gap-2">
                <p class="text-base">{{ $username }}</p>

                <div class="flex items-center gap-1">
                    <p class="text-sm text-neutral-200">{{ $rating }}</p>
                    <x-lucide-star class="size-4 fill-current text-yellow-400"/>
                </div>
            </div>

            {{-- Opens flag post modal --}}
            <div @click.stop="showFlagModal = true">
                <x-flag-post />
            </div>
        </div>

        <p class="text-sm">{{ $title }}</p>

        <div x-show="open" class="text-neutral-200">
            <p class="text-sm">{{ $content }}</p>
        </div>
    </div>

    {{-- Flag post modal --}}
    <x-flag-post-modal :reviewId="$reviewId" x-show="showFlagModal" @close="showFlagModal = false" />
</x-base-card>


