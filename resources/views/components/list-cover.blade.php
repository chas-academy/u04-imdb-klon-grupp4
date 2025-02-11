@props ([
    "movies" => []
])

<div class="m-5 grid grid-cols-2 grid-rows-2 w-16 h-24">
    @foreach (collect($movies)->take(4) as $movie)
        @php
            $image = $movie['image'] ?? asset('images/default.jpg');
        @endphp
        <img class="w-full h-full object-cover" src="{{ $image }}" alt="List cover">
    @endforeach
</div>