<x-main-layout>
    <div class="flex flex-col gap-8">
        <div class="flex flex-col">
            <div class="flex flex-col gap-1">
                <x-previous-page href="/genres" page="Genres" />
                <p class="text-2xl font-bold">{{ ucfirst($genre->name) }}</p>
            </div>
            <p class="max-w-[45rem]">
                Explore the {{ $genre->name }} section to browse through a
                curated selection of movies within this category. Dive in and
                discover films that match your favorite mood and style!
            </p>
        </div>

        <div class="grid grid-cols-3 gap-4 md:grid-cols-7">
            @foreach ($genre->movies as $movie)
                <x-movie
                    id="{{ $movie->id }}"
                    title="{{ $movie->title }}"
                    poster="{{ asset($movie->poster) }}"
                />
            @endforeach
        </div>
    </div>
</x-main-layout>
