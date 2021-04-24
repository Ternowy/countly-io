 <html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <title>
            {{ config('app.name') }} | {{ $title }}
        </title>
    </head>
    <body>
        <div id="app">
            {{ $slot }}
        </div>

        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>