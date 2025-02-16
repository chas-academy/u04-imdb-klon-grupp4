@props([
    "category",
    "subcategories",
])

<x-base-card>
    <div x-data="{ open: false }" class="flex w-full flex-col gap-4">
        <button @click="open = !open" class="flex justify-between">
            <div class="flex gap-2">
                <div class="size-6">{{ $icon }}</div>
                <span>{{ $category }}</span>
            </div>

            <x-lucide-chevron-down class="size-6" />
        </button>

        <div x-show="open" class="flex flex-col pl-8">
            @foreach ($subcategories as $subcategory)
                <a href="{{ $subcategory["href"] }}">
                    {{ $subcategory["label"] }}
                </a>
            @endforeach
        </div>
    </div>
</x-base-card>
