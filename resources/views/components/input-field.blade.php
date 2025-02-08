@props([
    "type" => "text",
    "id",
    "placeholder",
    "variant" => "input",
])

<div class="flex flex-col gap-2 w-full max-w-[20.75rem] sm:max-w-[38rem]">
    <label for="{{ $id }}" class="block text-base text-neutral-100 font-bold">
        {{ $slot }}
    </label>

    @if ($variant === "textarea")
        <textarea
            id="{{ $id }}"
            name="{{ $id }}"
            placeholder="{{ $placeholder }}"
            class="p-2 w-full min-h-16 rounded-lg bg-neutral-600 placeholder:text-neutral-200 text-base border-none focus:outline-none focus:ring-0 focus:border-transparent" 
        ></textarea>
    @else
        <input 
            type="{{ $type }}"
            id="{{ $id }}"
            name="{{ $id }}"
            placeholder="{{ $placeholder }}"
            class="p-2 w-full h-10 rounded-lg bg-neutral-600 placeholder:text-neutral-200 text-base border-none focus:outline-none focus:ring-0 focus:border-transparent"
        >
    @endif
</div>