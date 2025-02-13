@props([
    "href" => "#",
    "page" => "page",
])

<a href="{{ url($href)}}" class="group flex items-center gap-3">
    <div class="w-1 h-6 bg-sun-400 rounded-full"></div>
    <div class="text-lg font-bold">{{ $page }} </div>
    <x-lucide-chevron-right class="text-neutral-100 size-6 group-hover:text-sun-400 transition"/>
</a>