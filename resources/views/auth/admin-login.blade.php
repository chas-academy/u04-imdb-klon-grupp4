<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-neutral-800 font-outfit text-base text-neutral-100 flex justify-center min-h-screen items-center">
    
    
    <div class="flex w-full max-w-2xl flex-col items-center gap-8">
        <h1 class="text-center text-2xl font-bold">Admin Login</h1>
    
        <form
            method="POST"
            action="{{ route("login.admin") }}"
            class="flex w-full flex-col gap-4"
        >
            @csrf
            
            <div>
                <x-input-field id="username" placeholder="Enter username">
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
            <p class="text-red-500">{{ $errors->first("credentials") }}</p>
            <x-button class="sm:self-end">Sign in</x-button>
        </form>
    
        <div class="flex gap-4">
            <x-logo showText />
        </div>
    </div>  
                        
    
</body>
</html>