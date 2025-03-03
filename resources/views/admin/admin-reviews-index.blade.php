<x-admin-layout class="mx-auto max-w-7xl px-4 md:px-6">
    <div class="flex flex-col gap-8">
        <div class="flex flex-start pt-4">
            <a href="{{ route('admin.index') }}">
                <x-button variant="primary">GO BACK</x-button>
            </a>
        </div>
        
        <h1 class="text-2xl font-bold text-center"> ALL REVIEWS </h1>
 
    <div class="flex flex-row justify-center items-center">
    <form method="GET" action="{{ route('admin.reviews.index') }}" class="flex items-center gap-3">
        <input 
            id="search"
            name="search"
            type="text"
            placeholder="Search..."
            class="p-2 rounded-lg bg-neutral-600 placeholder:text-neutral-200 border-none w-64"
            value="{{ request()->search }}"
        >

        <button type="submit" class="flex items-center justify-center">
            <x-lucide-search class="w-6 h-6 text-neutral-100" />
        </button>
    </form>
    
    </div>
        <div class="flex flex-col gap-2">
            @foreach($reviews as $review)
                <x-user-review
                    :username="$review->user->username" 
                    :title="$review->title" 
                    :content="$review->content"
                    :rating="number_format($review->rating, 1)" 
                />
            @endforeach
        </div>
    </div>
    
</x-admin-layout>