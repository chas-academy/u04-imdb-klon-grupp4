@props([
{{-- -/get backlog i content för att få upp ratings i homeblade--}}
'rating' => null,
"content"
])
<x-button variant="static">
<div class="flex items-center gap-2">
   @if(empty($rating))
       <div class="text-gray-600">Not rated</div> <!-- Display "Not rated" when there is no rating -->
   @else
   <div class="text-yellow-400">{{$rating}}</div> <!-- Display numeric rating -->
   @endif
    <x-star filled=true rating={{$content}}></x-star>
    </div>
    </x-button>