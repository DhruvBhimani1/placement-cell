@extends('layouts.fronted')
@section('title', config('app.name'))

@section('content')
    <!-- Hero Section -->
    <section class="relative overflow-hidden py-12 md:py-26 bg-[#213555]">
        <img src="{{ asset('assets/image/homeimg.jpg') }}" alt="Placement Cell Hero"
            class="absolute inset-0 w-full h-full object-cover object-center z-0">
        <div class="relative z-20 max-w-3xl md:max-w-5xl mx-auto px-4 flex flex-col items-center text-center">
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-4 text-white leading-tight">Welcome to the Placement
                Cell</h1>
            <p class="text-base sm:text-lg md:text-xl mb-8 text-white">Empowering students with career opportunities,
                industry connections, and professional growth.</p>

        </div>
    </section>
    <!-- Top Achievers Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-5xl mx-auto px-4 text-center">
            <!-- Trophy Icon and Title -->
            <div class="flex flex-row justify-center items-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mt-2 mr-2"
                    viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                    <path fill="#000000"
                        d="M208.3 64L432.3 64C458.8 64 480.4 85.8 479.4 112.2C479.2 117.5 479 122.8 478.7 128L528.3 128C554.4 128 577.4 149.6 575.4 177.8C567.9 281.5 514.9 338.5 457.4 368.3C441.6 376.5 425.5 382.6 410.2 387.1C390 415.7 369 430.8 352.3 438.9L352.3 512L416.3 512C434 512 448.3 526.3 448.3 544C448.3 561.7 434 576 416.3 576L224.3 576C206.6 576 192.3 561.7 192.3 544C192.3 526.3 206.6 512 224.3 512L288.3 512L288.3 438.9C272.3 431.2 252.4 416.9 233 390.6C214.6 385.8 194.6 378.5 175.1 367.5C121 337.2 72.2 280.1 65.2 177.6C63.3 149.5 86.2 127.9 112.3 127.9L161.9 127.9C161.6 122.7 161.4 117.5 161.2 112.1C160.2 85.6 181.8 63.9 208.3 63.9zM165.5 176L113.1 176C119.3 260.7 158.2 303.1 198.3 325.6C183.9 288.3 172 239.6 165.5 176zM444 320.8C484.5 297 521.1 254.7 527.3 176L475 176C468.8 236.9 457.6 284.2 444 320.8z" />
                </svg>
                <h2 class="text-3xl md:text-4xl font-bold text-black">Top Achievers</h2>
            </div>
            <p class="text-lg text-gray-500 mb-8">Celebrating our students who secured the highest packages</p>
            <!-- Filters -->
            <div class="flex flex-col md:flex-row justify-center items-center gap-4 mb-10">
                <div class="flex items-center bg-white rounded-lg px-4 py-2 shadow-sm">
                    <svg class="h-5 w-5 text-gray-400 mr-2" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <select class="bg-transparent text-gray-700 focus:outline-none">
                        <option>All Years</option>
                        <option>2025</option>
                        <option>2024</option>
                        <option>2023</option>
                    </select>
                </div>
                <div class="flex items-center bg-white rounded-lg px-4 py-2 shadow-sm">
                    <svg class="h-5 w-5 text-gray-400 mr-2" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 14l9-5-9-5-9 5 9 5zm0 7v-6m0 0l-9-5m9 5l9-5" />
                    </svg>
                    <select class="bg-transparent text-gray-700 focus:outline-none">
                        <option>All Branches</option>
                        <option>CSE</option>
                        <option>ECE</option>
                        <option>ME</option>
                    </select>
                </div>
            </div>
            <!-- Achievers Cards (example, add your own data) -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow text-center">
                    <img src="{{ url('assets/image/student1.jpg') }}" alt="Achiever 1"
                        class="h-16 w-16 rounded-full mx-auto mb-2">
                    <p class="font-semibold text-black text-lg">Amit Sharma</p>
                    <p class="text-gray-500 text-sm mb-2">Software Engineer, TCS</p>
                    <span class="inline-block bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-semibold">₹18
                        LPA</span>
                </div>
                <div class="bg-white p-6 rounded-lg shadow text-center">
                    <img src="{{ url('assets/image/student2.jpg') }}" alt="Achiever 2"
                        class="h-16 w-16 rounded-full mx-auto mb-2">
                    <p class="font-semibold text-black text-lg">Priya Verma</p>
                    <p class="text-gray-500 text-sm mb-2">Business Analyst, Infosys</p>
                    <span class="inline-block bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-semibold">₹15
                        LPA</span>
                </div>
                <div class="bg-white p-6 rounded-lg shadow text-center">
                    <img src="{{ url('assets/image/student3.jpg') }}" alt="Achiever 3"
                        class="h-16 w-16 rounded-full mx-auto mb-2">
                    <p class="font-semibold text-black text-lg">Rahul Singh</p>
                    <p class="text-gray-500 text-sm mb-2">Data Scientist, Wipro</p>
                    <span class="inline-block bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-semibold">₹14
                        LPA</span>
                </div>
            </div>
        </div>
    </section>
    <!-- Partner Companies Section -->
<section class="py-16 bg-white">
    <div class="max-w-5xl mx-auto px-4 text-center">
        <h2 class="text-4xl font-bold mb-2">Our Recruiters</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Google -->
            <div class="bg-white rounded-2xl border border-gray-200 p-8 flex flex-col items-center transition transform hover:scale-105 hover:shadow-lg">
                <span class="text-5xl mb-4">🔍</span>
                <p class="font-semibold text-black text-lg mb-2">Google</p>
                <span class="bg-gray-100 text-black px-3 py-1 rounded-full text-xs font-semibold">Technology</span>
            </div>
            <!-- Microsoft -->
            <div class="bg-white rounded-2xl border border-gray-200 p-8 flex flex-col items-center transition transform hover:scale-105 hover:shadow-lg">
                <span class="text-5xl mb-4">💻</span>
                <p class="font-semibold text-black text-lg mb-2">Microsoft</p>
                <span class="bg-gray-100 text-black px-3 py-1 rounded-full text-xs font-semibold">Technology</span>
            </div>
            <!-- Amazon -->
            <div class="bg-white rounded-2xl border border-gray-200 p-8 flex flex-col items-center transition transform hover:scale-105 hover:shadow-lg">
                <span class="text-5xl mb-4">📦</span>
                <p class="font-semibold text-black text-lg mb-2">Amazon</p>
                <span class="bg-gray-100 text-black px-3 py-1 rounded-full text-xs font-semibold">E-commerce</span>
            </div>
            <!-- Tesla -->
            <div class="bg-white rounded-2xl border border-gray-200 p-8 flex flex-col items-center transition transform hover:scale-105 hover:shadow-lg">
                <span class="text-5xl mb-4">⚡</span>
                <p class="font-semibold text-black text-lg mb-2">Tesla</p>
                <span class="bg-gray-100 text-black px-3 py-1 rounded-full text-xs font-semibold">Automotive</span>
            </div>
            <!-- Apple -->
            <div class="bg-white rounded-2xl border border-gray-200 p-8 flex flex-col items-center transition transform hover:scale-105 hover:shadow-lg">
                <span class="text-5xl mb-4">🍎</span>
                <p class="font-semibold text-black text-lg mb-2">Apple</p>
                <span class="bg-gray-100 text-black px-3 py-1 rounded-full text-xs font-semibold">Technology</span>
            </div>
            <!-- Netflix -->
            <div class="bg-white rounded-2xl border border-gray-200 p-8 flex flex-col items-center transition transform hover:scale-105 hover:shadow-lg">
                <span class="text-5xl mb-4">🎬</span>
                <p class="font-semibold text-black text-lg mb-2">Netflix</p>
                <span class="bg-gray-100 text-black px-3 py-1 rounded-full text-xs font-semibold">Entertainment</span>
            </div>
            <!-- Meta -->
            <div class="bg-white rounded-2xl border border-gray-200 p-8 flex flex-col items-center transition transform hover:scale-105 hover:shadow-lg">
                <span class="text-5xl mb-4">🧑‍💻</span>
                <p class="font-semibold text-black text-lg mb-2">Meta</p>
                <span class="bg-gray-100 text-black px-3 py-1 rounded-full text-xs font-semibold">Social Media</span>
            </div>
            <!-- Adobe -->
            <div class="bg-white rounded-2xl border border-gray-200 p-8 flex flex-col items-center transition transform hover:scale-105 hover:shadow-lg">
                <span class="text-5xl mb-4">🎨</span>
                <p class="font-semibold text-black text-lg mb-2">Adobe</p>
                <span class="bg-gray-100 text-black px-3 py-1 rounded-full text-xs font-semibold">Software</span>
            </div>
        </div>
    </div>
</section>

@endsection
