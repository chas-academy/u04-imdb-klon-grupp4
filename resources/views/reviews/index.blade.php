<x-main-layout class="flex flex-col gap-8">
    <x-previous-page page="home" href="{{ route('home') }}" />
    <!-- Movie Details -->
    <x-trailer source="{{ $movie->trailer }}" />

    <div class="flex flex-col gap-4 md:flex-row md:gap-8">
        <div class="hidden aspect-[2/3] min-w-40 bg-red-500 md:block"></div>

        <div class="flex flex-col gap-4 md:flex-row">
            <div class="flex flex-col gap-4">
                <div class="flex justify-between gap-4">
                    <div class="flex flex-col gap-2">
                        <h1 class="text-2xl font-bold">{{ $movie->title }}</h1>
                    </div>
                    <div class="aspect-[2/3] w-28 bg-red-500 md:hidden"></div>
                </div>
                <p>{{ $movie->plot }}</p>
            </div>
            <div class="flex flex-col gap-2 md:gap-4">
                <div class="flex flex-col items-start gap-1 md:items-end">
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

<!-- Review Form -->
<div class="mt-8">
    <h2 class="text-xl font-bold">Leave a Review</h2>
    @auth
    <form action="{{ route('reviews.store', ['movie_id' => $movie->id]) }}" method="POST">
        @csrf

        <!-- Review Title -->
        <div>
            <label for="title" class="block text-sm font-medium text-gray-300">Review Title</label>
            <input type="text" name="title" id="title" required
                class="w-full p-2 border border-gray-500 rounded bg-gray-800 text-white focus:border-red-500 focus:ring-0">
        </div>

        <div>
            <label for="rating" class="block text-sm font-medium text-gray-300">Rating (1-10)</label>
            <input type="number" name="rating" id="rating" min="1" max="10" required
                class="w-full p-2 border rounded bg-gray-800 text-white">
        </div>

        <!-- Review Content -->
        <div>
            <label for="content" class="block text-sm font-medium text-gray-300">Your Review</label>
            <textarea name="content" id="content" rows="4" required
                class="w-full p-2 border border-gray-500 rounded bg-gray-800 text-white focus:border-red-500 focus:ring-0"></textarea>
        </div>

        <x-button variant="primary" class="mt-4">
            Submit Review
        </x-button>
    </form>

    <!-- Display Temporary Review from Session -->
    @if (session('temporary_review'))
    <div class="flex flex-col gap-4 mt-4">
        <x-user-review 
            :username="Auth::user()->name" 
            :title="session('temporary_review')['title']" 
            :content="session('temporary_review')['content']" 
            :rating="session('temporary_review')['rating']" 
            :reviewId="null" /> <!-- No review ID for temporary review -->
    </div>
    @endif
    @else
    <p class="text-sm text-gray-400">You must <a href="{{ route('login') }}" class="text-blue-400">log in</a> to leave a review.</p>
    @endauth
</div>

<!-- Reviews Section -->
<div class="mt-8">
    <h2 class="text-xl font-bold">User Reviews</h2>

    @if ($movie->reviews->isEmpty())
    <p class="text-gray-400">No reviews yet. Be the first to review!</p>
    @else
    <div class="flex flex-col gap-4 mt-4">
        @foreach ($movie->reviews as $review)
        <x-user-review :username="$review->user->name"
            :title="$review->title"
            :content="$review->content"
            :rating="$review->rating"
            :reviewId="$review->id" />
        @endforeach
    </div>
    @endif
</div>


</x-main-layout>