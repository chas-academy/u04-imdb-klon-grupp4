<!DOCTYPE html>
<html lang="en" class="font-outfit bg-neutral-800 text-base text-neutral-100">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Movie Scout</title>
        <link rel="icon" href="{{ asset("images/logomark.svg") }}" />
        @vite(["resources/css/app.css", "resources/js/app.js"])
    </head>
    <body>
        <x-navbar />
        <main>
            {{ $slot }}
        </main>
        <x-footer />
    </body>
</html>
