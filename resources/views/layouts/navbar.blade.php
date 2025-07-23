<nav class="bg-blue-900 shadow-md px-4 py-3 flex justify-between items-center">
    <!-- Logo and Brand -->
    <div class="flex items-center flex-shrink-0">
        <a class="flex items-center w-26 leading-none" href="{{ route('home') }}">
            <img class="w-full h-18" src="{{ url('assets/image/placement.png') }}" alt="Placement Cell Logo">
        </a>
    </div>
    <!-- Desktop Menu -->
    <div class="hidden lg:flex lg:items-center lg:space-x-6">
        <a class="text-white hover:text-blue-300 font-medium transition" href="{{ route('home') }}">Home</a>
        <a class="text-white hover:text-blue-300 font-medium transition" href="{{ route('about') }}">About Us</a>
        <a class="text-white hover:text-blue-300 font-medium transition" href="{{ route('students.resources') }}">Student Resources</a>
        <a class="text-white hover:text-blue-300 font-medium transition" href="{{ route('recruiters') }}">Recruiters</a>
        <a class="text-white hover:text-blue-300 font-medium transition" href="{{ route('contact') }}">Contact</a>
    </div>
    <!-- Right Side Buttons -->
    <div class="hidden lg:flex items-center space-x-3">
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}"
                   class="bg-white text-blue-900 font-semibold px-4 py-2 rounded-lg shadow hover:bg-blue-100 transition">
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}"
                   class="bg-white text-blue-900 font-semibold px-4 py-2 rounded-lg shadow hover:bg-blue-100 transition">
                    Log In
                </a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                       class="bg-blue-600 text-white font-semibold px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition">
                        Create Account
                    </a>
                @endif
            @endauth
        @endif
    </div>
    <!-- Mobile menu button -->
    <div class="lg:hidden flex ml-auto">
        <button class="navbar-burger flex items-center text-white p-2 focus:outline-none" aria-label="Open menu">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
    </div>
</nav>
{{-- mobile nav bar --}}
<div class="navbar-menu fixed inset-0 z-50 hidden bg-blue-900 bg-opacity-95">
    <div class="navbar-backdrop absolute inset-0 bg-black opacity-30"></div>
    <nav class="relative flex flex-col w-5/6 max-w-sm h-full py-6 px-6 bg-white border-r overflow-y-auto z-10">
        <div class="flex items-center mb-8">
            <a class="w-16 mr-auto leading-none" href="{{ route('home') }}">
                <img class="w-full h-10  shadow invert brightness-200" src="{{ url('assets/image/placement.png') }}" alt="Placement Cell Logo">
            </a>
            <button class="navbar-close ml-4">
                <svg class="h-8 w-8 text-gray-400 cursor-pointer hover:text-gray-600"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <ul>
            <li class="mb-1">
                <a class="block p-4 text-base font-semibold text-blue-900 hover:bg-blue-50 hover:text-blue-700 rounded transition"
                    href="{{ route('home') }}">Home</a>
            </li>
            <li class="mb-1">
                <a class="block p-4 text-base font-semibold text-blue-900 hover:bg-blue-50 hover:text-blue-700 rounded transition"
                    href="{{ route('about') }}">About Us</a>
            </li>
            <li class="mb-1">
                <a class="block p-4 text-base font-semibold text-blue-900 hover:bg-blue-50 hover:text-blue-700 rounded transition"
                    href="{{ route('students.resources') }}">Student Resources</a>
            </li>
            <li class="mb-1">
                <a class="block p-4 text-base font-semibold text-blue-900 hover:bg-blue-50 hover:text-blue-700 rounded transition"
                    href="{{ route('recruiters') }}">Recruiters</a>
            </li>
            <li class="mb-1">
                <a class="block p-4 text-base font-semibold text-blue-900 hover:bg-blue-50 hover:text-blue-700 rounded transition"
                    href="{{ route('contact') }}">Contact</a>
            </li>
        </ul>
        <div class="mt-auto pt-6">
            @if (Route::has('login'))
                @auth
                    <a class="block px-4 py-3 mb-3 text-base text-center font-semibold bg-blue-100 text-blue-900 rounded-lg hover:bg-blue-200 transition"
                        href="{{ url('/dashboard') }}">Dashboard</a>
                @else
                    <a class="block px-4 py-3 mb-3 text-base text-center font-semibold bg-blue-100 text-blue-900 rounded-lg hover:bg-blue-200 transition"
                        href="{{ route('login') }}">Log In</a>
                    @if (Route::has('register'))
                        <a class="block px-4 py-3 mb-2 text-base text-center font-semibold bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition"
                            href="{{ route(name: 'register') }}">Create Account</a>
                    @endif
                @endauth
            @endif
        </div>
    </nav>
</div>
