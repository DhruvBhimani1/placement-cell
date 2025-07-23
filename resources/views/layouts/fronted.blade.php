<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Favicon -->
    <link rel="icon" href="{{ url('assets/image/favicon.png') }}" type="png" />
</head>

<body>
    @include('layouts.navbar')
    <main>
        @yield('content')
    </main>
    @include('layouts.footer')
    <script src="{{ url('assets/js/script.js') }}"></script>
</body>
</html>
