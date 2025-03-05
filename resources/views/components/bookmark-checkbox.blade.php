@props(['size','filled' => true])
<div>
@if ( $filled )
<x-lucide-bookmark {{ $attributes->merge(['class' => 'size-['.$size.'rem] text-neutral-900 opacity-10 fill-neutral-100']) }}/>
@else
<x-lucide-bookmark {{ $attributes->merge(['class' => 'size-['.$size.'rem] text-neutral-900 opacity-10']) }}/> 
@endif

</div>