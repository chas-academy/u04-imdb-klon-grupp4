<x-admin-layout class="mx-auto">
<div class="mx-auto w-2/3">
    <h1 class="text-center pt-32 pb-8 font-outfit text-2xl font-bold">
        USER'S SETTINGS
    </h1>
<form class="flex flex-col gap-1">
    <x-input-field id="name" placeholder="">Username:</x-input-field>
    <x-input-field id="name" placeholder="">Password:</x-input-field>
<x-input-field id="name" placeholder="">Email:</x-input-field>

<div class="flex flex-row gap-1 justify-end">
<x-button>ADD USER</x-button>

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
                            action="{{ route('admin.admin-users-delete', $user->id) }}"
                            method="POST"
                        >
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
</x-admin-layout>