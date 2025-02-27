<x-main-layout>
    <div class="flex flex-col gap-5">
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

        <div class="grid grid-flow-col gap-4 overflow-x-auto w-full max-w-full auto-cols-[minmax(8rem,_1fr)]">
            <x-genre
                category="Comedy"
                href="/genres/1"
            />
            <x-genre
                category="Fantasy"
                href="/genres/2"
            />
            <x-genre
                category="Science fiction"
                href="/genres/3"
            />
            <x-genre
                category="Crime"
                href="/genres/4"
            />
            <x-genre 
                category="Mystery"
                href="/genres/5"
            />
            <x-genre 
                category="Drama"
                href="/genres/6"
            />
            <x-genre 
                category="Horror"
                href="/genres/7"
            />
            <x-genre 
                category="Action" 
                ref="/genres/8"
            />
            <x-genre 
                category="Documentary"
                href="/genres/9"
            />
            <x-genre 
                category="Historical"
                href="/genres/10"
            />
            <x-genre 
                category="Western"
                href="/genres/11"
            />
            <x-genre 
                category="Film noir"
                href="/genres/12"
            />
            <x-genre 
                category="Thriller"
                href="/genres/13"
            />
            <x-genre 
                category="Romance"
                href="/genres/14"
            />
            <x-genre 
                category="Animation"
                href="/genres/15"
            />
            <x-genre 
                category="Musical"
                href="/genres/16"
            />
            <x-genre 
                category="Adventure"
                href="/genres/17"
            />
        </div>
    </div>
</x-main-layout>
