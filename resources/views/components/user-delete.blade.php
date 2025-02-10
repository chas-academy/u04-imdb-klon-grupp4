{{-- Darker background when modal is active --}}
<div class="fixed inset-0 bg-neutral-900 opacity-80 z-0"></div>

{{-- Modal --}}
<div class="m-4 p-4 flex rounded-lg justify-center items-center bg-neutral-800 z-10">
    <div class="flex flex-col gap-2">
        <div>
            <p class="text-lg font-bold">Woah!</p>
            <p class="text-lg font-bold">It looks like you're trying to delete your account.</p>
            <p>This is a permanent action that cannot be undone. Are you sure you want to delete this account? </p>
        </div>
    <div class="flex flex-row justify-end gap-1">
        <x-button variant="secondary">Cancel</x-button>
        <x-button>Yes, delete my account</x-button>
    </div>
</div>
