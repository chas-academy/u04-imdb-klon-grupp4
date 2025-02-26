<x-main-layout>
    {{-- <div class="flex flex-col gap-5"> --}}
        <x-trailer
            source=""
            title=""
            plot=""
            rating=""
        />
    
        <div class="">
            {{-- mini trailers här --}}
        </div>

        <div class="flex flex-col gap-2">
            <div class="group flex w-fit items-center gap-3">
                <div class="h-6 w-1 rounded-full bg-sun-400"></div>
                <p>Popular movies</p>
            </div>
            <div class="">
                {{-- filmer i rad scrollbart --}}
            </div>
        </div>

        <div class="flex flex-col gap-2">
            <div class="group flex w-fit items-center gap-3">
                <div class="h-6 w-1 rounded-full bg-sun-400"></div>
                <p>Popular movies</p>
            </div>
            <div class="">
                {{-- serier/all-time favourite filmer i rad scrollbart --}}
            </div>
        </div>

        <div class="flex flex-col gap-2">
            <x-forward-page
                page="Genres"
                href="{{ route('genres.index') }}"
            />
            <div class="grid grid-flow-col gap-4 overflow-x-auto w-full max-w-full auto-cols-[minmax(8rem,_1fr)]">
                {{-- <x-genre category="Comedy" /> lägg till href! --}}
                <x-genre category="Fantasy" />
                <x-genre category="Science fiction" />
                <x-genre category="Crime" />
                <x-genre category="Mystery" />
                <x-genre category="Drama" />
                <x-genre category="Horror" />
                <x-genre category="Action" />
                <x-genre category="Documentary" />
                <x-genre category="Historical" />
                <x-genre category="Western" />
                <x-genre category="Film noir" />
                <x-genre category="Thriller" />
                <x-genre category="Romance" />
                <x-genre category="Animation" />
                <x-genre category="Musical" />
                <x-genre category="Adventure" />
            </div>
        </div>

    </div>
</x-main-layout>
