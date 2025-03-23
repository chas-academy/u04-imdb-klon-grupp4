<x-admin-layout class="mx-auto">
    <div class="mx-auto w-2/3">
        <h1 class="text-center pt-32 pb-8 font-outfit text-2xl font-bold">
            USER'S SETTINGS
        </h1>
        <form action="{{ route('admin.users.store') }}" method="POST" class="flex flex-col gap-1">
            @csrf
            <x-input-field id="name" placeholder="">Username:</x-input-field>
            <x-input-field id="password" type="password" placeholder="">Password:</x-input-field>
            <x-input-field id="password_confirmation" type="password" placeholder="">Confirm your password:</x-input-field>
            <x-input-field id="email" placeholder="">Email:</x-input-field>
        

            <div class="flex flex-row gap-1 justify-end mt-4 mb-28">
                <x-button type="submit">ADD USER</x-button>
            </div>
        </form>
        <div id="user-list">
            @foreach ($users as $user)
            <div class="relative mb-3 flex items-center justify-between">
                <div class="flex-grow border-b">
                    <h2 class="inline-block font-bold">
                        {{ $user->username}}
                    </h2>
                </div>
                <div class="ml-4 flex gap-4">
                    <a href="{{ route('admin.admin-users-edit', $user->username) }}">
                        <x-lucide-pen class="size-6" />
                    </a>

                    <form
                        action="{{ route('admin.admin-users-delete', $user) }}"
                        method="POST">
                        @csrf
                        @method("DELETE")
                        <button type="submit">
                            <x-lucide-trash class="size-6" />
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-admin-layout>