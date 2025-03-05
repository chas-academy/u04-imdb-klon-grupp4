@props([
    "href" => "#",
    "page" => "page",
])

<a href="{{ url($href) }}" class="group flex w-fit items-center gap-3">
    <div class="h-6 w-1 rounded-full bg-sun-400"></div>
    <div>{{ $page }}</div>
    <x-lucide-chevron-right
        class="size-6 text-neutral-100 transition group-hover:text-sun-400"
    />
</a>
