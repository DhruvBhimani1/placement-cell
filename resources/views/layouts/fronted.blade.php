<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Favicon -->
    <link rel="icon" href="{{ url('assets/image/favicon.png') }}" type="png" />
    {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    @include('layouts.navbar')
    <main>
        @yield('content')
    </main> {{-- Contact Us  --}}
    <section class="bg-[#F3F4F6] dark:bg-gray-900">
        @livewire('contact-us')
    </section>
    @include('layouts.footer')
    <script src="{{ url('assets/js/script.js') }}"></script>
    @stack('scripts')
    @stack('scripts')
</body>

</html>
