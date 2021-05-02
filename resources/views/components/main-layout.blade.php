 <html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ mix('css/t-app.css') }}">

        <title>
            {{ config('app.name') }} | {{ $title }}
        </title>
         <meta name="viewport" content="width=device-width, initial-scale=1.0" />
         <link href="{{ asset('css/app.scss') }}" rel="stylesheet">
    </head>
    <body>
        <main id="app">
            {{ $slot }}
        </main>

        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
