@props([
{{-- -/get backlog i content för att få upp ratings i homeblade--}}
'rating' => null,

])
<x-button variant="static">
<div class="flex items-center gap-2">
   @if(empty($rating))
       <div class="text-gray-600">Not rated</div> <!-- Display "Not rated" when there is no rating -->
       <x-star></x-star>
   @else
   <div class="text-yellow-400">{{$rating}}</div> <!-- Display numeric rating -->
   <x-star filled=true></x-star>
   @endif
    </div>
    </x-button>