<!DOCTYPE html>
<html lang="en" class="bg-neutral-800 font-outfit text-base text-neutral-100">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Movie Scout</title>
        <link rel="icon" href="{{ asset("images/logomark.svg") }}" />
        @vite(["resources/css/app.css", "resources/js/app.js"])
    </head>
    <body class="flex flex-col items-center">
        <x-header />

        <main
            {{ $attributes->class("min-h-screen w-full max-w-5xl flex-1 px-4 pt-24 md:pb-16 md:pt-28") }}
        >
            {{ $slot }}
        </main>

        <x-footer />
    </body>
</html>
