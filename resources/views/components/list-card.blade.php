@props ([
    "title" => "",
    "description" => "",
    "images" => [],
])    
    
<x-base-card>
    {{-- movie images --}}
    
    <div>
        <div class="flex justify-between">
            <h3 class="text-lg font-bold">{{$title}}List Header</h3>
            <x-lucide-x class="size-6 text-neutral-400 hover:text-neutral-100 cursor-pointer"></x-lucide-x>
        </div>
        <p>{{$description}}Description Description Description Description Description Description Description Description Description Description Description </p>
    </div>
</x-base-card>