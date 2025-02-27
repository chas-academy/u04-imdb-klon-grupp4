@props([
    "source",
    "title",
    "genre",
    "rating",
])

<div
    @class(["relative aspect-video overflow-hidden rounded-lg", "pb-10" => isset($title, $genre, $rating)])
>
    <iframe
        src="{{ $source }}"
        frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
        referrerpolicy="strict-origin-when-cross-origin"
        allowfullscreen
        class="size-full"
    ></iframe>

    @isset($title, $genre, $rating)
        <div
            class="pointer-events-none absolute inset-x-0 bottom-0 z-10 flex items-end justify-between gap-4 bg-gradient-to-t from-neutral-900 from-50% to-90% p-4"
        >
            <div class="flex min-w-0 flex-col">
                <h2
                    class="line-clamp-2 break-words font-bold md:line-clamp-3 md:text-xl"
                >
                    {{ $title }}
                </h2>
                <p>{{ $genre }}</p>
            </div>
            {{-- Needs prop: rating --}}
            <div>rating-component</div>
        </div>
    @endisset
</div>
