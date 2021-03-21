<html>
    <head>
        <title>
            {{ config('app.name') }} | {{ $title }}
        </title>
    </head>
    <body>
        {{ $slot }}
    </body>
</html>