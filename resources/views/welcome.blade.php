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
    <livewire:top-achievers />
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
