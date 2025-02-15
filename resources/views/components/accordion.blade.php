@props([
    "category",
    "subcategories",
])

<x-base-card>
    <div x-data="{ open: false }" class="flex w-full flex-col gap-4">
        <div class="flex justify-between">
            <div class="flex gap-2">
                <div class="size-6">{{ $icon }}</div>
                <span>{{ $category }}</span>
            </div>

            <button @click="open = !open" class="size-6">
                <x-lucide-chevron-down />
            </button>
        </div>

        <div x-show="open" class="flex flex-col pl-8">
            @foreach ($subcategories as $subcategory)
                <span>{{ $subcategory }}</span>
            @endforeach
        </div>
    </div>
</x-base-card>
