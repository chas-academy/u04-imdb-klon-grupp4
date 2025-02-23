@props([
"filled"
])
 
<x-lucide-star {{ $attributes->merge([
'class' => 'w-4 h-4 text-yellow-400 ' . ($filled ? 'fill-yellow-400' : 'fill-none')
]) }} />
</div>
