{{-- Darker background when modal is active --}}
<div class="fixed inset-0 z-40">
<div class="absolute inset-0 bg-neutral-900 opacity-80"></div>

{{-- Modal --}}
<div class="p-4 inset-x-4 sm:left-1/2 top-1/2 sm:-translate-x-1/2 -translate-y-1/2 absolute z-50 flex rounded-lg justify-center items-center bg-neutral-800">
    <div class="flex flex-col gap-2 w-full">
        <div>
            <p class="text-lg font-bold">Woah!</p>
            <p class="text-lg font-bold">It looks like you're trying to delete your account.</p>
            <p>This is a permanent action that cannot be undone. Are you sure you want to delete this account? </p>
        </div>
        <div class="flex flex-row justify-end gap-1">
            <x-button font="font-medium" variant="secondary">Cancel</x-button>
            <x-button>Yes, delete my account</x-button>
        </div>
    </div>
</div>
</div>