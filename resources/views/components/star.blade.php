<!--

16x16, 24x24, 32x32, 32x32 ifylld

-->

<!-- @props(['size' => 'false', ]) -->

    <!--
    <h1 class="text-red-500">hello world</h1>
    <x-lucide-star color="#ebbe00" width="16" height="16"/>
    <x-lucide-star color="#ebbe00" width="24" height="24"/>
    <x-lucide-star color="#ebbe00" width="32" height="32" fill="none"/>
    <x-lucide-star color="#ebbe00" width="32" height="32" fill="#ebbe00"/>
-->


   <!-- <x-lucide-star class="w-24 h-24 bg-yellow-400"/> -->

<div>
    @props(['size', 'filled', 'rating' => ''])
    <div class="flex">
    @if($rating === '')
        <div class="text-gray-600 text-6xl pr-2">Not rated</div>
        @if($filled)
            <x-lucide-star {{ $attributes->merge(['class' => 'w-'.$size.' h-'.$size.' text-gray-600 fill-gray-600']) }} />
        @else
            <x-lucide-star {{ $attributes->merge(['class' => 'w-'.$size.' h-'.$size.' text-gray-600 fill-none']) }} />
        @endif
    @else
            <div class="text-yellow-400 text-6xl pr-2">{{$rating}}</div>
            @if($filled)
            <x-lucide-star {{ $attributes->merge(['class' => 'w-'.$size.' h-'.$size.' text-yellow-400 fill-yellow-400']) }} />
            @else
            <x-lucide-star {{ $attributes->merge(['class' => 'w-'.$size.' h-'.$size.' text-yellow-400 fill-none']) }} />
                @endif    
    @endif
</div>

</div>
