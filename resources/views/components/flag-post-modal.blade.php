{{-- Darker background when modal is active --}}
<div class="fixed inset-0 z-40" x-show="showFlagModal" x-transition>
    <div class="absolute inset-0 bg-neutral-900 opacity-80"></div>
<div class="fixed inset-0 z-40" x-show="showFlagModal" x-transition>
    <div class="absolute inset-0 bg-neutral-900 opacity-80"></div>

    {{-- Modal --}}
    <div class="p-4 inset-x-4 sm:left-1/2 top-1/2 sm:-translate-x-1/2 -translate-y-1/2 absolute z-50 flex rounded-lg justify-center items-center bg-neutral-800">
        <form method="POST" action="{{ route('admin.report.store') }}" class="flex flex-col gap-2 w-full">
            @csrf

            <input type="hidden" name="review_id" :value="reviewId">

            <div>
                <p class="text-lg font-bold">Why are you flagging this post?</p>
                <p>Help us understand the issue. Please select a reason below:</p>
            </div>

            <div class="flex gap-1">
                <x-checkbox name="flags[]" value="spam"/><p><b>Spam:</b> This post is spam.</p>
            </div>
            
            <div class="flex gap-1">
                <x-checkbox name="flags[]" value="inappropriate"/><p><b>Inappropriate:</b> This post contains offensive or inappropriate material.</p>
            </div>

            <div class="flex gap-1">
                <x-checkbox name="flags[]" value="misinformation"/><p><b>Misinformation:</b> This post contains misleading or false information.</p>
            </div>

            <div class="flex gap-1">
                <x-checkbox name="flags[]" value="irrelevant"/><p><b>Irrelevant:</b> This post is not relevant to the topic.</p>
            </div>

            <div class="flex gap-1">
                <x-checkbox name="flags[]" value="other"/><p><b>Other.</b></p>
            </div>

            <x-input-field id="flag-post" name="description" placeholder="Description" variant="textarea">Additional information (optional):</x-input-field>
        
            <div class="flex flex-row justify-end gap-1">
                <x-button font="font-medium" variant="secondary" @click="showFlagModal = false">Cancel</x-button>
                <x-button type="submit">Submit report</x-button>
            </div>
        </form>
    </div>
            <x-input-field id="flag-post" name="description" placeholder="Description" variant="textarea">Additional information (optional):</x-input-field>
        
            <div class="flex flex-row justify-end gap-1">
                <x-button font="font-medium" variant="secondary" @click="showFlagModal = false">Cancel</x-button>
                <x-button type="submit">Submit report</x-button>
            </div>
        </form>
    </div>
</div>