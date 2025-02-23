@props([
"filled"
])
<div class="flex items-center gap-2">
   @if(empty($rating))
       <div class="text-gray-600">Not rated</div> <!-- Display "Not rated" when there is no rating -->
   @else
       <div class="text-yellow-400">{{$rating}}</div> <!-- Display numeric rating -->
   @endif

<x-lucide-star {{ $attributes->merge([
'class' => 'w-4 h-4 text-yellow-400 ' . ($filled ? 'fill-yellow-400' : 'fill-none')
]) }} />
</div>
