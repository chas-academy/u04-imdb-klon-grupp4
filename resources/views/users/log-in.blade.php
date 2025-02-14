<x-main-layout class="flex w-full max-w-2xl flex-col items-center gap-8">
    <h1 class="text-center text-2xl font-bold">Log in</h1>

    <form
        method="post"
        action="{{ route("register") }}"
        class="flex w-full flex-col gap-4"
    >
        @csrf
        <div>
            <x-input-field id="username" placeholder="Username">
                Username
            </x-input-field>
            <p class="text-red-500">{{ $errors->first("username") }}</p>
        </div>

        <div>
            <x-input-field
                id="password"
                placeholder="Enter password"
                type="password"
            >
                Password
            </x-input-field>
            <p class="text-red-500">{{ $errors->first("password") }}</p>
        </div>

        <x-button class="sm:self-end">Log in</x-button>
    </form>

    <div class="flex gap-4">
        <p>Don't have an account yet?</p>

        <a href="/" class="text-sky-500 hover:underline">Sign up!</a>
    </div>
</x-main-layout>
