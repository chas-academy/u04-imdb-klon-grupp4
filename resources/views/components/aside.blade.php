<aside class="flex min-w-80 flex-col justify-between bg-neutral-900 px-4 py-20">
    <div>
        <div class="flex flex-col items-center gap-8">
            <x-logo :showText="false" />
            <span class="text-2xl font-bold">Dashboard</span>
        </div>

        <nav class="flex flex-col">
            <x-accordion
                category="Users"
                :subcategories="[['label'=> 'User settings', 'href' => route('admin.users.index')]]"
            >
                <x-slot:icon>
                    <x-lucide-user-round-pen />
                </x-slot>
            </x-accordion>

            <x-accordion
                category="Movies"
                :subcategories="[['label' => 'Add movie', 'href' => route('admin.movies.create')],['label' => 'All movies', 'href' => route('admin.movies.create')]]"
            >
                <x-slot:icon>
                    <x-lucide-clapperboard />
                </x-slot>
            </x-accordion>

            <x-accordion
                category="Reviews"
                :subcategories="[['label'=> 'All reviews', 'href' => route('admin.reviews.index')]]"
            >
                <x-slot:icon>
                    <x-lucide-star />
                </x-slot>
            </x-accordion>
        </nav>
    </div>

    <form method="POST" action="{{ route("logout") }}">
        @csrf
        <x-button class="self-start">Log out</x-button>
    </form>
</aside>
