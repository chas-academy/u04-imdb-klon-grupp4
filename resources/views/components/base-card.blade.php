@props([
    "href" => null,
])

@php
    $class = "flex rounded-lg bg-neutral-900 p-4";
@endphp

@if ($href)
    <a href="{{ url($href) }}" {{ $attributes->class($class) }}>
        {{ $slot }}
    </a>
@else
    <div {{ $attributes->class($class) }}>
        {{ $slot }}
    </div>
@endif
