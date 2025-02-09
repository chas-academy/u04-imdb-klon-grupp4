@props ([
    "isRed" => false,
])

<x-lucide-flag 
    class="text-neutral-100 size-6 cursor-pointer hover:fill-sun-400 hover:text-sun-400 transition"
    
/>


<script>
    function toggleFlag() {
        let flag
    }
    x-data="{ isRed: @json($isRed) }"
    @click="if (!isRed) isRed = true"
    :class="isRed ? 'hover:fill-sun-400 hover:text-sun-400' : 'fill-neutral-100 text-neutral-100'"
    />