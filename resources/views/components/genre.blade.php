@props([
    "category",
])

<div
    class="relative aspect-[2/3] min-w-24 cursor-pointer overflow-hidden rounded-lg
    border border-transparent hover:border-neutral-200 transition">

        <img
            src="{{ asset("images/red.jpg")}}"
            alt="{{ $category }}"
            class="absolute z-10 size-full object-cover object-left"
        />

    <div class="group relative z-20 flex items-center justify-center size-full">
        <div class="flex items-centerjustify-center">
            <p> {{ $category }} </p>
        </div>
    </div>
</div>
