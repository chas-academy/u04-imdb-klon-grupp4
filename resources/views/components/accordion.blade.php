@props([
    "category",
])

<x-base-card>
    <details>
        <summary class="list-none [&::-webkit-details-marker]:hidden">
            <div class="flex gap-2">
                {{-- om det är en annan icon då? --}}
                <div class="size-6">{{ $icon }}</div>
                {{ $category }}
            </div>
        </summary>

        <p>testar</p>
    </details>
</x-base-card>
