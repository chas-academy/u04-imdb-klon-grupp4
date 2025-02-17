<!DOCTYPE html>
<html lang="en" class="bg-neutral-800 font-outfit text-base text-neutral-100">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Movie Scout</title>
        <link rel="icon" href="{{ asset("images/logomark.svg") }}" />
        @vite(["resources/css/app.css", "resources/js/app.js"])
    </head>
    <body class="flex">
        <main
            {{ $attributes->class("md:pt-50 min-h-screen w-full max-w-5xl ") }}
        >
            {{ $slot }}
        </main>
    </body>
</html>
