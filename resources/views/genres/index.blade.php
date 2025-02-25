<x-main-layout>
    <div class="flex flex-col gap-8">
        <div class="flex flex-col">
            <div class="flex flex-col gap-1">
                <x-previous-page href="/" page="Home"/>
                <p class="text-2xl font-bold">Movie genres</p>
            </div>
            <p class="max-w-[45rem]">
                Explore movie genres and find exactly what you're in the mood for.
                Whether you're after timeless classics, hidden gems, or the latest
                blockbusters – this is your gateway to endless entertainment!
            </p>
        </div>

        @foreach ($genres as $genre)
            <div class="flex flex-col gap-2">
                <x-forward-page href="{{ route('genres.show', $genre->id) }}" page="{{ ucfirst($genre->name) }}"/>
                    <div class="grid grid-flow-col gap-4 overflow-x-auto w-full max-w-full auto-cols-[minmax(0,_1fr)]">
                    @foreach ($genre->movies->take(7) as $movie)
                        <x-movie title="{{ $movie->title }}" poster="{{ $movie->poster }}" />
                    @endforeach
                </div>
            </div>
        @endforeach

    </div>
</x-main-layout>