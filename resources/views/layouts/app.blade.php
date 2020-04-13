<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-white h-screen antialiased leading-none">
    <div id="app">
        <nav class="shadow py-6">
            <div class="container mx-auto px-6 md:px-0">
                <div class="flex">
                    <div class="mr-6">
                        <a href="{{ url('/') }}" class="text-lg font-semibold text-green-500 no-underline">
                            {{ config('app.name', 'Sanctuary Finder') }}
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        @yield('content')

        <footer class="flex flex-col items-center mt-16 mb-8">
            <p class="text-sm text-gray-600">
                Made with
                <span class="text-xs text-red-700 mx-1">&hearts;</span>
                for the animals by Ethan Scott &amp; Sacha Corazzi, and
                <a href="{{ url('/contribute') }}" class="text-green-500 underline">you</a>
            </p>
            <p class="mt-2">
                🐄🐖🐕🐈🐓🦃🐑🐇🦔🦆
            </p>
        </footer>
    </div>
</body>
</html>
