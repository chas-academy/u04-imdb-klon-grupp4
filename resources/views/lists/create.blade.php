<x-main-layout class="flex w-full max-w-[608px] flex-col justify-center min-h-screen gap-8"> 

    <form
        method="POST"
        action="{{ route('lists.store') }}"
        class="flex w-full flex-col gap-4"
    >
        @csrf
        <div>
            <x-input-field id="title" placeholder="List name..." style="width: 608px !important;">
                Enter the name of your list
            </x-input-field>
            <p class="text-red-500">{{ $errors->first('title') }}</p>
        </div>

        <div>
            <x-input-field
                id="description"
                placeholder="Description"
                style="width: 608px !important;"
            >
                Describe your list
            </x-input-field>
            <p class="text-red-500">{{ $errors->first('description') }}</p>
        </div>

        <div class="flex gap-5 self-end">
            <x-button class="sm:self-end">Create</x-button>
            <x-button type="button" class="sm:self-end !bg-neutral-900" onclick="window.location='{{ route('lists.index') }}'">Cancel</x-button>
        
            
        </div>
    </form>
</x-main-layout>