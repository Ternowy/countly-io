 <html>
    <head>
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