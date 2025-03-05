<x-main-layout class="grid w-full gap-8 md:grid-cols-[1fr,3fr] md:gap-32">
    <div class="flex flex-col gap-8">
        <div class="flex w-full flex-col items-center gap-4 pt-12">
            <x-avatar size="lg" />

            <div class="flex flex-col">
                <h2 class="text-2xl">{{ "@" . $user->username }}</h2>
            </div>

            <x-button wide variant="secondary">
                <a href="/">Account Settings</a>
            </x-button>
        </div>
    </div>
    <div class="flex flex-col gap-6">
        <section class="space-y-4">
            <x-forward-page
                page="Custom lists"
                href="{{ route('lists.index') }}"
            />

            @foreach ($lists as $list)
                {{-- TODO: render poster images --}}
                <x-list-card
                    :title="$list->title"
                    :description="$list->description"
                    href="{{ route('lists.show', ['id' => $list->id]) }}"
                />
            @endforeach
        </section>

        <section class="space-y-4">
            <x-section-title title="Latest rating" />

            @foreach ($reviews as $review)
                <x-user-review
                    :username="$user->username"
                    :title="$review->title"
                    :content="$review->content"
                    :score="$review->own_rating"
                />
            @endforeach
        </section>
    </div>
</x-main-layout>
