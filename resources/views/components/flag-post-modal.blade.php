{{-- Darker background when modal is active --}}
<div class="fixed inset-0 bg-neutral-900 opacity-80 z-0"></div>

{{-- Modal --}}
<div class="m-4 p-4 flex rounded-lg justify-center items-center bg-neutral-800 z-10">
    <div class="flex flex-col gap-2">
        <div>
            <p class="text-lg font-bold">Why are you flagging this post?</p>
            <p>Help us understand the issue. Please select a reason below:</p>
        </div>

        {{-- Checkbox --}} <p><b>Spam:</b> This post is spam.</p>
        {{-- Checkbox --}} <p><b>Inappropriate:</b> This post contains offensive or inappropriate material.</p>
        {{-- Checkbox --}} <p><b>Misinformation:</b> This post contains misleading or false information.</p>
        {{-- Checkbox --}} <p><b>Irrelevant:</b> This post is not relevant to the topic.</p>
        {{-- Checkbox --}} <p><b>Other.</b></p>

        <x-input-field id="flag-post" placeholder="Description" variant="textarea">Additional information (optional):</x-input-field>
    
        <div class="flex flex-row justify-end gap-1">
            <x-button variant="secondary">Cancel</x-button>
            <x-button>Submit report</x-button>
        </div>
    </div>
</div>
