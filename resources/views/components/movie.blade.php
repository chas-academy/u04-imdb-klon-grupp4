@props([
    "title",
    "poster" => null,
    "rating" => null,
    "isBookmarked",
])

<div
    class="ratio relative aspect-[2/3] min-w-24 cursor-pointer flex-col overflow-hidden rounded-lg"
>
    @if (isset($poster))
        <img
            src="{{ $poster }}"
            alt="{{ $title }}"
            class="absolute z-10 size-full"
        />
    @endif

    <div
        class="group relative z-20 flex size-full flex-col justify-between bg-gradient-to-t from-neutral-900 to-80% transition hover:bg-neutral-900/80"
    >
        {{-- bookmark component --}}
        <div>bookmark</div>

        <div class="p-2">
            <p
                class="line-clamp-1 text-sm font-bold group-hover:line-clamp-none md:line-clamp-2"
            >
                {{ $title }}
            </p>

            {{-- rating-component --}}
            <div>4.5</div>
        </div>
    </div>
</div>
