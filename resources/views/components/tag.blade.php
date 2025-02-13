@props([
    "variant" => "tag",
{{-- -/get backlog i content för att få upp ratings i homeblade--}}
"content"
])

@if($variant === "tag")
    <x-button variant="secondary">{{ $content }}</x-button>
@elseif($variant === "rating")
    <x-button variant="secondary">
        {{--<x-star size=8 filled=true rating={{$content}}></x-star> denna rad väntar på att star ska bli klar--}}
    </x-button>
@endif
