@props([
    "variant" => "mobile",
    "type" => "text",
    "id" => null,
    "placeholder" => "",
    "description" => "description",
])

<form class="flex flex-col gap-2">
    <label for="{{ $id }}" class="block text-base text-neutral-100 font-bold">
        {{ $slot }}
    </label>

@if($variant === "desktop")

    <input 
        type="{{ $type }}" 
        id="{{ $id }}" 
        placeholder="{{ $placeholder }}" 
        
         {{ $attributes->merge(["class" => "w-full"]) }}
    >
    @else
    <input 
        type="{{ $type }}" 
        id="{{ $id }}" 
        placeholder="{{ $placeholder }}" 
        
         {{ $attributes->merge(['class' => 'w-auto']) }}
    >
    @endif

</form>