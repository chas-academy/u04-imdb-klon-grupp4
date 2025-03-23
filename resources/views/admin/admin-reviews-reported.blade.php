<x-admin-layout class="mx-auto max-w-7xl px-4 md:px-6">
    <div class="flex flex-col gap-8">
        <div class="flex flex-start pt-4">
            <a href="{{ route('admin.index') }}">
                <x-button variant="primary">GO BACK</x-button>
            </a>
        </div>

        <h1 class="text-2xl font-bold text-center">Reported Reviews</h1>

        <div class="flex flex-row justify-center items-center">
            <form method="GET" action="{{ route('admin.admin.reviews.reported') }}" class="flex items-center gap-2">

                <input
                    id="search"
                    name="search"
                    type="text"
                    placeholder="Search..."
                    class="rounded-lg bg-neutral-600 placeholder:text-neutral-200 border-none"
                    value="{{ request()->search }}">

                <button type="submit" class="flex items-center justify-center">
                    <x-lucide-search class="w-6 h-6 text-neutral-100" />
                </button>
            </form>
        </div>

        @if(isset($reportedReviews) && $reportedReviews->count() > 0)
        @foreach($reportedReviews as $report)
        <div class="review-card">
            <x-user-review
                :username="$report->review->user->username"
                :title="$report->review->title"
                :content="$report->review->content"
                :rating="number_format($report->review->rating, 1)"
                :reviewId="$report->review->id" />

            <div class="flex gap-4">
                <!-- Accept Button -->
                <form method="POST" action="{{ route('admin.admin.acceptReview', $report->id) }}">
                    @csrf
                    <button type="submit" class="x-button variant-success">Accept</button>
                </form>




                <!-- Delete Button -->
                <form method="POST" action="{{ route('admin.admin.deleteReport', $report->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="x-button variant-danger">Delete</button>
                </form>
            </div>
        </div>
        @endforeach
        @else
        <p class="text-center text-gray-400">No reported reviews found.</p>
        @endif

</x-admin-layout>