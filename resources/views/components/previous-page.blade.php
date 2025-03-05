@props([
    "href" => "#",
    "page" => "page",
])

<a href="{{ url($href) }}" class="group flex items-center gap-1">
    <x-lucide-chevron-left
        class="size-4 text-neutral-400 transition group-hover:text-neutral-100"
    />
    <div
        class="text-sm text-neutral-400 transition group-hover:text-neutral-100"
    >
        Back to {{ $page }} page
    </div>
</a>
