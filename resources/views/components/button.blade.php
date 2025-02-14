@props([
    "variant" => "primary",
    "wide" => false,
    "font" => "font-bold",
])

@php
    use Illuminate\Support\Arr;

    $classes = Arr::toCssClasses([
        "bg-sun-400 hover:bg-sun-500" => $variant === "primary",
        "bg-neutral-900 hover:bg-neutral-700" => $variant === "secondary",
        "w-full" => $wide,
        $font,
        "flex items-center justify-center gap-2 text-nowrap rounded-full px-4 py-2 transition",
    ]);
@endphp

<button {{ $attributes->class($classes) }}>
    @if (isset($icon))
        <div class="size-6">
            {{ $icon }}
        </div>
    @endif

    {{ $slot }}
</button>
