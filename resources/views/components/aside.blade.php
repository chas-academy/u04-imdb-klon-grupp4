<aside class="bg-neutral-900">
    <nav>
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
</aside>
