@props([
    "fill" => "false",
    "name" => null,
    "value" => null,
    "id" => uniqid("checkbox"),
])

<label for="{{ $id }}" class="size-6 shrink-0 cursor-pointer flex items-center">
    <input type="checkbox" id="{{ $id }}" name="{{ $name }}" value="{{ $value }}" class="hidden peer"/>
    <x-lucide-square class="text-neutral-100 peer-checked:hidden"/>
    <x-lucide-square-check class="text-neutral-100 peer-checked:block hidden"/>
</label>