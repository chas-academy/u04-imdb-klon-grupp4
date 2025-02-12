@props ([
    "movies" => []
])

<div class="w-24 grid grid-cols-2 grid-rows-2 overflow-hidden">
    @foreach (collect($movies)->take(4) as $movie)
        @php
            $image = $movie["image"] ?? asset("images/default.jpg");
        @endphp
        <img class="w-full h-full object-cover" src="{{ $image }}" alt="List cover">
    @endforeach
</div>