<x-main-layout class="flex flex-col gap-8">
    <x-previous-page page="home" />
    <x-trailer source="{{ $movie->trailer }}" />

    <div class="flex flex-col gap-4 md:flex-row md:gap-8">
        <div class="hidden aspect-[2/3] min-w-40 bg-red-500 md:block"></div>

        <div class="flex flex-col gap-4 md:flex-row">
            <div class="flex flex-col gap-4">
                <div class="flex justify-between gap-4">
                    <div class="flex flex-col gap-2">
                        <h1 class="text-2xl font-bold">{{ $movie->title }}</h1>
                        <div class="flex gap-2">
                            @foreach ($movie->genres as $genre)
                                <x-tag>{{ $genre->name }}</x-tag>
                            @endforeach
                        </div>
                    </div>
                    <div class="aspect-[2/3] w-28 bg-red-500 md:hidden"></div>
                </div>
                <p>{{ $movie->plot }}</p>
                <div class="flex flex-col gap-2">
                    <div class="flex gap-4">
                        <span>Director:</span>
                        <div class="flex flex-wrap gap-x-4 gap-y-2">
                            @foreach ($movie->directors as $director)
                                <span class="font-bold">
                                    {{ $director->firstname . " " . $director->lastname }}
                                </span>
                                <div
                                    class="h-6 w-1 rounded-full bg-sun-400 last:hidden"
                                ></div>
                            @endforeach
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <span>Stars:</span>
                        <div class="flex flex-wrap gap-x-4 gap-y-2">
                            @foreach ($movie->actors as $actor)
                                <span class="font-bold">
                                    {{ $actor->firstname . " " . $actor->lastname }}
                                </span>
                                <div
                                    class="h-6 w-1 rounded-full bg-sun-400 last:hidden"
                                ></div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-2 md:gap-4">
                <div class="flex flex-col items-start gap-1 md:items-end">
                    <x-tag>
                        <x-rating :rating="$movie->rating" filled />
                    </x-tag>
                    <span class="gap-1 text-xs text-neutral-200">
                        <span class="font-bold">
                            {{ $movie->reviews->count() }}
                        </span>
                        user
                        review{{ $movie->reviews->count() > 1 ? "s" : "" }}
                    </span>
                </div>
                <div class="flex flex-col gap-2">
                    <x-button variant="secondary" font="font-medium">
                        Rate
                        <x-lucide-star class="size-4" />
                    </x-button>
                    <x-button>Add to Watchlist</x-button>
                </div>
            </div>
        </div>
    </div>
</x-main-layout>
