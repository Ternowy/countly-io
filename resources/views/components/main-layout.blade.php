<html>
    <head>
        <title>
            {{ config('app.name') }} | {{ $title }}
        </title>
    </head>
    <body>
        {{ $slot }}

        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>