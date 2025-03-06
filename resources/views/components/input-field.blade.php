@props([
    "type" => "text",
    "id",
    "placeholder",
    "variant" => "input",
    "value" => "",
])

<div class="flex flex-col gap-2 w-full">
    <label for="{{ $id }}" class="block text-base text-neutral-100 font-bold">
        {{ $slot }}
    </label>

    @if ($variant === "textarea")
        <textarea
            id="{{ $id }}"
            name="{{ $id }}"
            placeholder="{{ $placeholder }}"
            class="p-2 min-h-16 rounded-lg bg-neutral-600 placeholder:text-neutral-200 border-none" 
        ></textarea>
    @else
        <input 
            id="{{ $id }}"
            name="{{ $id }}"
            type="{{ $type }}"
            placeholder="{{ $placeholder }}"
            value="{{ $value }}"
            class="p-2 rounded-lg bg-neutral-600 placeholder:text-neutral-200 border-none"
        >
    @endif
</div>