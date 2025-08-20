@extends('layouts.fronted')
@section('title', 'Placed Students - ' . config('app.name'))

@section('content')
    <!-- Hero Section -->
    <section class="bg-[#213555] text-white py-16">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Placed Students</h1>
            <p class="text-lg text-blue-100">Celebrating our students' success in campus placements</p>
        </div>
    </section>

    <!-- Year Tabs -->
    <div class="max-w-6xl mx-auto px-4 mt-12">
        <div class="flex gap-4 mb-8 justify-center">
            <button class="px-8 py-2 rounded-lg font-semibold bg-black text-white shadow focus:outline-none">2024</button>
            <button class="px-8 py-2 rounded-lg font-semibold bg-white text-black border border-gray-300 hover:bg-gray-100 transition">2023</button>
            <button class="px-8 py-2 rounded-lg font-semibold bg-white text-black border border-gray-300 hover:bg-gray-100 transition">2022</button>
        </div>
        <hr class="mb-8">

        <!-- Branch Tabs -->
        <div class="flex flex-wrap gap-3 mb-8 justify-center">
            <button class="px-5 py-2 rounded-xl font-medium bg-black text-white shadow focus:outline-none">Computer Engineering</button>
            <button class="px-5 py-2 rounded-xl font-medium bg-white text-black border border-gray-300 hover:bg-gray-100 transition">Information Technology</button>
            <button class="px-5 py-2 rounded-xl font-medium bg-white text-black border border-gray-300 hover:bg-gray-100 transition">Electronics & Communication Engineering</button>
            <button class="px-5 py-2 rounded-xl font-medium bg-white text-black border border-gray-300 hover:bg-gray-100 transition">Mechanical Engineering</button>
            <button class="px-5 py-2 rounded-xl font-medium bg-white text-black border border-gray-300 hover:bg-gray-100 transition">Civil Engineering</button>
            <button class="px-5 py-2 rounded-xl font-medium bg-white text-black border border-gray-300 hover:bg-gray-100 transition">Production Engineering</button>
            <button class="px-5 py-2 rounded-xl font-medium bg-white text-black border border-gray-300 hover:bg-gray-100 transition">Information and Communication Technology</button>
            <button class="px-5 py-2 rounded-xl font-medium bg-white text-black border border-gray-300 hover:bg-gray-100 transition">Electronics and Instrumentation Engineering</button>
        </div>
        <hr class="mb-8">

        <!-- Summary Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
            <div class="bg-white rounded-xl border p-8 flex flex-col items-center shadow transition hover:shadow-lg">
                <span class="text-4xl mb-2">👤</span>
                <span class="text-3xl font-bold text-black">60</span>
                <span class="text-gray-500 mt-1">Sanctioned Intake</span>
            </div>
            <div class="bg-white rounded-xl border p-8 flex flex-col items-center shadow transition hover:shadow-lg">
                <span class="text-4xl mb-2">💼</span>
                <span class="text-3xl font-bold text-black">40</span>
                <span class="text-gray-500 mt-1">Placed Students</span>
            </div>
            <div class="bg-white rounded-xl border p-8 flex flex-col items-center shadow transition hover:shadow-lg">
                <span class="text-4xl mb-2">🏢</span>
                <span class="text-3xl font-bold text-black">66.67%</span>
                <span class="text-gray-500 mt-1">Placement Rate</span>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
            <div class="bg-white rounded-xl border p-8 flex flex-col items-center shadow transition hover:shadow-lg">
                <span class="text-4xl mb-2">👤</span>
                <span class="text-3xl font-bold text-black">5 Lacs</span>
                <span class="text-gray-500 mt-1">Highest Package</span>
            </div>
            <div class="bg-white rounded-xl border p-8 flex flex-col items-center shadow transition hover:shadow-lg">
                <span class="text-4xl mb-2">💼</span>
                <span class="text-3xl font-bold text-black">3.68 Lacs</span>
                <span class="text-gray-500 mt-1">Average Package</span>
            </div>
            <div class="bg-white rounded-xl border p-8 flex flex-col items-center shadow transition hover:shadow-lg">
                <span class="text-4xl mb-2">🏢</span>
                <span class="text-3xl font-bold text-black">12</span>
                <span class="text-gray-500 mt-1">Companies Visited</span>
            </div>
        </div>
    </div>

    <!-- Placed Students Cards -->
    <div class="max-w-6xl mx-auto px-2">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8 mb-20">
            <!-- Student 1 -->
            <div class="bg-white border rounded-2xl p-8 flex flex-col items-center shadow transition-transform duration-200 hover:scale-105 hover:shadow-2xl hover:border-[#213555]">
                <!-- Male SVG Avatar -->
                <div class="mb-5">
                    <svg width="80" height="80" viewBox="0 0 80 80" fill="none">
                        <circle cx="40" cy="40" r="36" fill="#E5E7EB"/>
                        <ellipse cx="40" cy="35" rx="18" ry="20" fill="#F9E7D3"/>
                        <path d="M22 60c0-10 36-10 36 0v10H22V60z" fill="#222"/>
                        <path d="M40 15c-10 0-18 8-18 20 0 2 0 4 1 6 2-6 8-10 17-10s15 4 17 10c1-2 1-4 1-6 0-12-8-20-18-20z" fill="#222"/>
                    </svg>
                </div>
                <p class="font-bold text-lg text-center mb-1 text-[#213555]">Shah Aakash Nileshbhai</p>
                <p class="text-gray-700 text-center text-sm mb-1">SKH Algorithm</p>
                <p class="text-gray-500 text-center text-xs mb-2">CTC</p>
                <span class="font-bold text-xl text-[#213555] mt-2">5 Lacs</span>
            </div>
            <!-- Student 2 -->
            <div class="bg-white border rounded-2xl p-8 flex flex-col items-center shadow transition-transform duration-200 hover:scale-105 hover:shadow-2xl hover:border-[#213555]">
                <!-- Female SVG Avatar -->
                <div class="mb-5">
                    <svg width="80" height="80" viewBox="0 0 80 80" fill="none">
                        <circle cx="40" cy="40" r="36" fill="#E5E7EB"/>
                        <ellipse cx="40" cy="35" rx="18" ry="20" fill="#F9E7D3"/>
                        <path d="M22 60c0-10 36-10 36 0v10H22V60z" fill="#222"/>
                        <path d="M40 15c-10 0-18 8-18 20 0 2 0 4 1 6 2-6 8-10 17-10s15 4 17 10c1-2 1-4 1-6 0-12-8-20-18-20z" fill="#222"/>
                        <ellipse cx="40" cy="40" rx="8" ry="10" fill="#222"/>
                    </svg>
                </div>
                <p class="font-bold text-lg text-center mb-1 text-[#213555]">Patel Hasti Amitbhai</p>
                <p class="text-gray-700 text-center text-sm mb-1">SKH Algorithm</p>
                <p class="text-gray-500 text-center text-xs mb-2">CTC</p>
                <span class="font-bold text-xl text-[#213555] mt-2">5 Lacs</span>
            </div>
            <!-- Student 3 -->
            <div class="bg-white border rounded-2xl p-8 flex flex-col items-center shadow transition-transform duration-200 hover:scale-105 hover:shadow-2xl hover:border-[#213555]">
                <!-- Male SVG Avatar -->
                <div class="mb-5">
                    <svg width="80" height="80" viewBox="0 0 80 80" fill="none">
                        <circle cx="40" cy="40" r="36" fill="#E5E7EB"/>
                        <ellipse cx="40" cy="35" rx="18" ry="20" fill="#F9E7D3"/>
                        <path d="M22 60c0-10 36-10 36 0v10H22V60z" fill="#222"/>
                        <path d="M40 15c-10 0-18 8-18 20 0 2 0 4 1 6 2-6 8-10 17-10s15 4 17 10c1-2 1-4 1-6 0-12-8-20-18-20z" fill="#222"/>
                    </svg>
                </div>
                <p class="font-bold text-lg text-center mb-1 text-[#213555]">Jagani Darshan Mukeshbhai</p>
                <p class="text-gray-700 text-center text-sm mb-1">SKH Algorithm</p>
                <p class="text-gray-500 text-center text-xs mb-2">CTC</p>
                <span class="font-bold text-xl text-[#213555] mt-2">5 Lacs</span>
            </div>
            <!-- Student 4 -->
            <div class="bg-white border rounded-2xl p-8 flex flex-col items-center shadow transition-transform duration-200 hover:scale-105 hover:shadow-2xl hover:border-[#213555]">
                <!-- Female SVG Avatar -->
                <div class="mb-5">
                    <svg width="80" height="80" viewBox="0 0 80 80" fill="none">
                        <circle cx="40" cy="40" r="36" fill="#E5E7EB"/>
                        <ellipse cx="40" cy="35" rx="18" ry="20" fill="#F9E7D3"/>
                        <path d="M22 60c0-10 36-10 36 0v10H22V60z" fill="#222"/>
                        <path d="M40 15c-10 0-18 8-18 20 0 2 0 4 1 6 2-6 8-10 17-10s15 4 17 10c1-2 1-4 1-6 0-12-8-20-18-20z" fill="#222"/>
                        <ellipse cx="40" cy="40" rx="8" ry="10" fill="#222"/>
                    </svg>
                </div>
                <p class="font-bold text-lg text-center mb-1 text-[#213555]">RAMNA ANKITABEN BHARATBHAI</p>
                <p class="text-gray-700 text-center text-sm mb-1">tatvasoft ahmedabad</p>
                <p class="text-gray-500 text-center text-xs mb-2">CTC</p>
                <span class="font-bold text-xl text-[#213555] mt-2">4.8 Lacs</span>
            </div>
        </div>
    </div>
@endsection