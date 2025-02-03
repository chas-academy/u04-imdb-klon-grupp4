<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Featured</title>
        <link rel="icon" href="{{ asset("images/logomark.svg") }}" />
    </head>
    <body>
        <x-navbar />
        <main>
            {{ $slot }}
        </main>
        <x-footer />
    </body>
</html>
