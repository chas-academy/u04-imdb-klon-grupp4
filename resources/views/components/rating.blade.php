@props([
{{-- -/get backlog i content för att få upp ratings i homeblade--}}
"content"
])
<x-button variant="static">
    <x-star filled=true rating={{$content}}></x-star>
    </x-button>