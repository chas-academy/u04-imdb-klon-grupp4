@props([
    "href" => "#",
    "page" => "page",
])

<a href="{{ url($href)}}" class="group flex items-center gap-1">
    <x-lucide-chevron-left class="text-neutral-400 group-hover:text-neutral-100 size-4 transition"/>
    <div class="text-sm text-neutral-400 group-hover:text-neutral-100 transition">Back to {{ $page }} page</div>
</a>