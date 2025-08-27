@extends('layouts.fronted')
@section('title', config('app.name'))

@section('content')
    <!-- Hero Section -->
    <section class="relative overflow-hidden py-12 md:py-26 bg-[#213555]">
        <img src="{{ asset('assets/image/homeimg.jpg') }}" alt="Placement Cell Hero" class="absolute inset-0 w-full h-full object-cover object-center z-0">
        <div class="absolute inset-0 bg-black/50 z-10"></div> {{-- Added semi-transparent overlay --}}
        <div class="relative z-20 max-w-3xl md:max-w-5xl mx-auto px-4 py-20 md:py-32 flex flex-col items-center text-center">
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold mb-4 text-white leading-tight">Welcome to the Placement
                Cell</h1>
            <p class="text-lg sm:text-xl md:text-2xl mb-10 text-white">Providing transparent access to placement data, connecting students with opportunities, and showcasing the achievements of our alumni.</p>
           
        </div>
    </section>
    <livewire:top-achievers />
    <!-- Partner Companies Section -->
<section class="py-16 bg-gray-50"> {{-- Changed background to light gray --}}
    <div class="max-w-5xl mx-auto px-4 text-center">
        <h2 class="text-4xl font-bold mb-8">Our Recruiters</h2> {{-- Increased bottom margin --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Google -->
            <div class="bg-white rounded-2xl border border-gray-200 p-10 flex flex-col items-center transition transform hover:scale-105 hover:shadow-lg shadow-md"> {{-- Added shadow-md and increased padding --}}
                <span class="text-6xl mb-4">🔍</span> {{-- Increased emoji size --}}
                <p class="font-semibold text-black text-xl mb-2 tracking-wide">Google</p> {{-- Increased font size and added tracking --}}
                <span class="bg-gray-100 text-black px-4 py-2 rounded-full text-sm font-semibold">Technology</span> {{-- Adjusted padding and font size --}}
            </div>
            <!-- Microsoft -->
            <div class="bg-white rounded-2xl border border-gray-200 p-10 flex flex-col items-center transition transform hover:scale-105 hover:shadow-lg shadow-md">
                <span class="text-6xl mb-4">💻</span>
                <p class="font-semibold text-black text-xl mb-2 tracking-wide">Microsoft</p>
                <span class="bg-gray-100 text-black px-4 py-2 rounded-full text-sm font-semibold">Technology</span>
            </div>
            <!-- Amazon -->
            <div class="bg-white rounded-2xl border border-gray-200 p-10 flex flex-col items-center transition transform hover:scale-105 hover:shadow-lg shadow-md">
                <span class="text-6xl mb-4">📦</span>
                <p class="font-semibold text-black text-xl mb-2 tracking-wide">Amazon</p>
                <span class="bg-gray-100 text-black px-4 py-2 rounded-full text-sm font-semibold">E-commerce</span>
            </div>
            <!-- Tesla -->
            <div class="bg-white rounded-2xl border border-gray-200 p-10 flex flex-col items-center transition transform hover:scale-105 hover:shadow-lg shadow-md">
                <span class="text-6xl mb-4">⚡</span>
                <p class="font-semibold text-black text-xl mb-2 tracking-wide">Tesla</p>
                <span class="bg-gray-100 text-black px-4 py-2 rounded-full text-sm font-semibold">Automotive</span>
            </div>
            <!-- Apple -->
            <div class="bg-white rounded-2xl border border-gray-200 p-10 flex flex-col items-center transition transform hover:scale-105 hover:shadow-lg shadow-md">
                <span class="text-6xl mb-4">🍎</span>
                <p class="font-semibold text-black text-xl mb-2 tracking-wide">Apple</p>
                <span class="bg-gray-100 text-black px-4 py-2 rounded-full text-sm font-semibold">Technology</span>
            </div>
            <!-- Netflix -->
            <div class="bg-white rounded-2xl border border-gray-200 p-10 flex flex-col items-center transition transform hover:scale-105 hover:shadow-lg shadow-md">
                <span class="text-6xl mb-4">🎬</span>
                <p class="font-semibold text-black text-xl mb-2 tracking-wide">Netflix</p>
                <span class="bg-gray-100 text-black px-4 py-2 rounded-full text-sm font-semibold">Entertainment</span>
            </div>
            <!-- Meta -->
            <div class="bg-white rounded-2xl border border-gray-200 p-10 flex flex-col items-center transition transform hover:scale-105 hover:shadow-lg shadow-md">
                <span class="text-6xl mb-4">🧑‍💻</span>
                <p class="font-semibold text-black text-xl mb-2 tracking-wide">Meta</p>
                <span class="bg-gray-100 text-black px-4 py-2 rounded-full text-sm font-semibold">Social Media</span>
            </div>
            <!-- Adobe -->
            <div class="bg-white rounded-2xl border border-gray-200 p-10 flex flex-col items-center transition transform hover:scale-105 hover:shadow-lg shadow-md">
                <span class="text-6xl mb-4">🎨</span>
                <p class="font-semibold text-black text-xl mb-2 tracking-wide">Adobe</p>
                <span class="bg-gray-100 text-black px-4 py-2 rounded-full text-sm font-semibold">Software</span>
            </div>
        </div>
        <div class="mt-12"> {{-- Added a button to view all recruiters --}}
            <a href="#" class="inline-block bg-[#213555] text-white font-semibold py-3 px-8 rounded-full text-lg hover:bg-[#1a2b47] transition duration-300 ease-in-out shadow-lg">
                View All Recruiters
            </a>
        </div>
    </div>
</section>

@endsection
