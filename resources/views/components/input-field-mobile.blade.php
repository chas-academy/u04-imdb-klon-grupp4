@props([
    "type" => "text",
    "id" => null,
    "placeholder" => "",
    "variant" => "primary"
])

<form class="flex flex-col gap-2 w-[332px]">
    <label for="{{ $id }}" class="block text-base text-neutral-100 font-bold">
        {{ $slot }}
    </label>

    @if ($variant === "secondary")
        <textarea
            id="{{ $id }}"
            name="{{ $id }}"
            placeholder="{{ $placeholder }}"
            class="p-2  h-16 rounded-lg bg-neutral-600 placeholder:text-neutral-200 text-base border-none focus:outline-none focus:ring-0 focus:border-transparent" 
        ></textarea>
    @else
        <input 
            type="{{ $type }}"
            id="{{ $id }}"
            name="{{ $id }}"
            placeholder="{{ $placeholder }}"
            class="p-2 h-10 rounded-lg bg-neutral-600 placeholder:text-neutral-200 text-base border-none focus:outline-none focus:ring-0 focus:border-transparent"
    >
    @endif
</form>