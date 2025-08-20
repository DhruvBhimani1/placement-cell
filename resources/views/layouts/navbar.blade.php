<nav class="bg-white shadow px-8 py-4 flex justify-between items-center">
    <!-- Logo and Brand -->
    <div class="flex items-center flex-shrink-0">
        <a class="flex items-center w-auto leading-none" href="{{ route('home') }}">
            <img class="h-10 w-auto invert" src="{{ url('assets/image/placement.png') }}" alt="Placement Cell Logo">
        </a>
    </div>
    <!-- Desktop Menu -->
    <div class="hidden lg:flex lg:items-center lg:space-x-8">
        <a class="text-black hover:text-gray-900 font-medium transition hover:underline hover:underline-offset-8 hover:decoration-2"
            href="{{ route('home') }}">Home</a>
        <a class="text-black hover:text-gray-900 font-medium transition hover:underline hover:underline-offset-8 hover:decoration-2"
            href="{{ route('about') }}">About Us</a>
        <a class="text-black hover:text-gray-900 font-medium transition hover:underline hover:underline-offset-8 hover:decoration-2"
            href="{{ route('placements.summary') }}">Summary of Placements</a>
        <a class="text-black hover:text-gray-900 font-medium transition hover:underline hover:underline-offset-8 hover:decoration-2"
            href="{{ route('placements.students') }}">
            Placed Students</a>
        <a class="text-black hover:text-gray-900 font-medium transition hover:underline hover:underline-offset-8 hover:decoration-2"
            href="{{ route('companies') }}">Companies</a>
        <a class="text-black hover:text-gray-900 font-medium transition hover:underline hover:underline-offset-8 hover:decoration-2"
            href="{{ route('resources') }}">Resources</a>
        <a class="text-black hover:text-gray-900 font-medium transition hover:underline hover:underline-offset-8 hover:decoration-2"
            href="{{ route('contact') }}">Contact</a>
    </div>
    <!-- Right Side Buttons -->
    <div class="hidden lg:flex items-center space-x-3">
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}"
                    class="bg-black text-white font-semibold px-5 py-2 rounded-xl shadow hover:bg-gray-900 transition">
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}"
                    class="flex items-center bg-black text-white font-semibold px-5 py-2 rounded-xl shadow hover:bg-gray-900 transition">
                    LOGIN
                </a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="flex items-center bg-black text-white font-semibold px-5 py-2 rounded-xl shadow hover:bg-gray-900 transition">
                        Create Account
                    </a>
                @endif
            @endauth
        @endif
    </div>
    <!-- Mobile menu button -->
    <div class="lg:hidden flex ml-auto">
        <button class="navbar-burger flex items-center text-black p-2 focus:outline-none" aria-label="Open menu">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>
</nav>
{{-- mobile nav bar --}}
<div class="navbar-menu fixed inset-0 z-50 hidden bg-white bg-opacity-95">
    <div class="navbar-backdrop absolute inset-0 bg-black opacity-30"></div>
    <nav class="relative flex flex-col w-5/6 max-w-sm h-full py-6 px-6 bg-white border-r overflow-y-auto z-10">
        <div class="flex items-center mb-8">
            <a class="w-16 mr-auto leading-none" href="{{ route('home') }}">
                <img class="w-full h-10" src="{{ url('assets/image/placement.png') }}" alt="Placement Cell Logo">
            </a>
            <button class="navbar-close ml-4">
                <svg class="h-8 w-8 text-gray-400 cursor-pointer hover:text-gray-600" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <ul>
            <li class="mb-1">
                <a class="block p-4 text-base font-semibold text-black hover:bg-gray-100 hover:text-blue-700 rounded transition"
                    href="{{ route('home') }}">Home</a>
            </li>
            <li class="mb-1">
                <a class="block p-4 text-base font-semibold text-black hover:bg-gray-100 hover:text-blue-700 rounded transition"
                    href="{{ route('about') }}">About Us</a>
            </li>
            <li class="mb-1">
                <a class="block p-4 text-base font-semibold text-black hover:bg-gray-100 hover:text-blue-700 rounded transition"
                    href="#">Students</a>
            </li>
            <li class="mb-1">
                <a class="block p-4 text-base font-semibold text-black hover:bg-gray-100 hover:text-blue-700 rounded transition"
                    href="#">Companies</a>
            </li>
            <li class="mb-1">
                <a class="block p-4 text-base font-semibold text-black hover:bg-gray-100 hover:text-blue-700 rounded transition"
                    href="#">Jobs</a>
            </li>
            <li class="mb-1">
                <a class="block p-4 text-base font-semibold text-black hover:bg-gray-100 hover:text-blue-700 rounded transition"
                    href="#">Resources</a>
            </li>
            <li class="mb-1">
                <a class="block p-4 text-base font-semibold text-black hover:bg-gray-100 hover:text-blue-700 rounded transition"
                    href="{{ route('contact') }}">Contact</a>
            </li>
        </ul>
        <div class="mt-auto pt-6">
            @if (Route::has('login'))
                @auth
                    <a class="block px-4 py-3 mb-3 text-base text-center font-semibold bg-black text-white rounded-lg hover:bg-gray-900 transition"
                        href="{{ url('/dashboard') }}">Dashboard</a>
                @else
                    <a class="block px-4 py-3 mb-3 text-base text-center font-semibold bg-black text-white rounded-lg hover:bg-gray-900 transition"
                        href="{{ route('login') }}">
                        <svg class="h-5 w-5 inline-block mr-2" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-3A2.25 2.25 0 008.25 5.25V9m7.5 0v10.5A2.25 2.25 0 0113.5 21h-3a2.25 2.25 0 01-2.25-2.25V9m7.5 0H6.75" />
                        </svg>
                        LOGIN
                    </a>
                @endauth
            @endif
        </div>
    </nav>
</div>
