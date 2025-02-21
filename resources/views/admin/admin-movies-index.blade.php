<x-admin-layout>
    <div class="m-auto min-w-[588px]">
        <h1
            class="mb-[141px] mt-[116px] flex justify-center text-2xl font-bold"
        >
            Movie List
        </h1>

        @if ($errors->has("deleteMovie"))
            <div class="text-red-500">
                {{ $errors->first("deleteMovie") }}
            </div>
        @endif

        <div id="movie-list">
            @foreach ($movies as $movie)
                <div class="relative mb-3 flex items-center justify-between">
                    <div class="flex-grow border-b">
                        <h2 class="inline-block font-bold">
                            {{ $movie->title }}
                        </h2>
                    </div>
                    <div class="ml-4 flex gap-4">
                        <a href="{{ route("admin.movies.edit", $movie->id) }}">
                            <x-lucide-pen class="size-6" />
                        </a>

                        <form
                            action="{{ route("admin.movies.destroy", $movie->id) }}"
                            method="POST"
                        >
                            @csrf
                            @method("DELETE")
                            <button type="submit">
                                <x-lucide-trash class="size-6" />
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mb-[307px] mt-6">
            <x-button
                id="toggle-button"
                class="transition-all duration-300 ease-in-out"
                onclick="toggleMovies()"
            >
                Show All
            </x-button>
        </div>
    </div>

    <script>
        let showingAll = false;
        const allMovies = @json($allMovies);  
        const movieList = document.getElementById('movie-list');
        const toggleButton = document.getElementById('toggle-button');

        function toggleMovies() {
            if (showingAll) {
                movieList.innerHTML = '';
                allMovies.slice(0, 12).forEach(movie => {
                    movieList.innerHTML += renderMovie(movie);
                });
                toggleButton.innerText = 'Show All';
            } else {
                movieList.innerHTML = '';
                allMovies.forEach(movie => {
                    movieList.innerHTML += renderMovie(movie);
                });
                toggleButton.innerText = 'Show Less';
            }
            showingAll = !showingAll;
        }

        function renderMovie(movie) {
            return `
                <div class="relative mb-3 flex items-center justify-between">
                    <div class="flex-grow border-b">
                        <p class="inline-block font-bold">${movie.title}</p>
                    </div>
                    <div class="ml-4 flex gap-4">
                        <a href="/admin/movies/${movie.id}/edit">
                            <x-lucide-pen class="size-6" />
                        </a>
                        <form action="/admin/movies/${movie.id}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit">
                                <x-lucide-trash class="size-6" />
                            </button>
                        </form>
                    </div>
                </div>
            `;
        }
    </script>
</x-admin-layout>
