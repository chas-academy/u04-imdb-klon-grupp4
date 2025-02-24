@props([
    "href" => "#",
])

<a
    href="{{ url($href) }}"
    {{ $attributes->class("flex rounded-lg bg-neutral-900 p-4") }}
>
    {{ $slot }}
</a>
