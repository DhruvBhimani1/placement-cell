@extends('layouts.fronted')
@section('title',  config('app.name'))

@section('content')
    <!-- Hero Section -->
    <section class="relative overflow-hidden py-12 md:py-26 bg-blue-900">
        <img 
            src="{{ asset('assets/image/homeimg.jpg') }}" 
            alt="Placement Cell Hero" 
            class="absolute inset-0 w-full h-full object-cover object-center z-0"
        >
        <div class="relative z-20 max-w-3xl md:max-w-5xl mx-auto px-4 flex flex-col items-center text-center">
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-4 text-white leading-tight">Welcome to the Placement Cell</h1>
            <p class="text-base sm:text-lg md:text-xl mb-8 text-white">Empowering students with career opportunities, industry connections, and professional growth.</p>
            <a href="{{ route('students.resources') }}" class="inline-block bg-white text-blue-900 font-semibold px-6 py-3 rounded-lg shadow hover:bg-blue-100 transition">Explore Student Resources</a>
        </div>
    </section>

    <!-- About Placement Cell -->
    <section class="py-12 bg-gray-50">
        <div class="max-w-5xl mx-auto px-4">
            <h2 class="text-2xl font-bold text-blue-900 mb-4">About Our Placement Cell</h2>
            <p class="text-gray-700 mb-4">
                The Placement Cell at {{ config('app.name') }} is dedicated to bridging the gap between students and the professional world. We provide guidance, training, and opportunities to help our students achieve their dream careers. Our team works tirelessly to connect students with top recruiters and prepare them for success.
            </p>
            <a href="{{ route('about') }}" class="text-blue-700 font-semibold hover:underline">Learn more &rarr;</a>
        </div>
    </section>

    <!-- Past Placements Section -->
    <section class="py-12">
        <div class="max-w-5xl mx-auto px-4">
            <h2 class="text-2xl font-bold text-blue-900 mb-8 text-center">Past Placements</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow text-center">
                    <img src="{{ url('assets/image/company1.png') }}" alt="Company 1" class="h-12 mx-auto mb-2">
                    <p class="font-semibold text-blue-800">TCS</p>
                    <p class="text-gray-600 text-sm">25 students placed</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow text-center">
                    <img src="{{ url('assets/image/company2.png') }}" alt="Company 2" class="h-12 mx-auto mb-2">
                    <p class="font-semibold text-blue-800">Infosys</p>
                    <p class="text-gray-600 text-sm">18 students placed</p>
                </div>
               
                    <img src="{{ url('assets/image/company3.png') }}" alt="Company 3" class="h-12 mx-auto mb-2">
                    <p class="font-semibold text-blue-800">Wipro</p>
                    <p class="text-gray-600 text-sm">15 students placed</p>
                </div>
            </div>
            <div class="text-center mt-8">
                <a href="{{ route('recruiters') }}" class="text-blue-700 font-semibold hover:underline">See all recruiters &rarr;</a>
            </div>
        </div>
    </section>

    <!-- Student Resources -->
    <section class="py-12 bg-gray-50">
        <div class="max-w-5xl mx-auto px-4">
            <h2 class="text-2xl font-bold text-blue-900 mb-4">Student Resources</h2>
            <ul class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <li class="bg-white p-6 rounded-lg shadow">
                    <h3 class="font-semibold text-blue-800 mb-2">Resume Building</h3>
                    <p class="text-gray-600 mb-2">Tips and templates to craft a professional resume tailored for campus placements.</p>
                    <a href="#" class="text-blue-700 hover:underline">Read more</a>
                </li>
                <li class="bg-white p-6 rounded-lg shadow">
                    <h3 class="font-semibold text-blue-800 mb-2">Interview Preparation</h3>
                    <p class="text-gray-600 mb-2">Mock interviews, common questions, and expert advice from alumni and recruiters.</p>
                    <a href="#" class="text-blue-700 hover:underline">Read more</a>
                </li>
                <li class="bg-white p-6 rounded-lg shadow">
                    <h3 class="font-semibold text-blue-800 mb-2">Workshops & Events</h3>
                    <p class="text-gray-600 mb-2">Stay updated with upcoming placement events, webinars, and workshops at {{ config('app.name') }}.</p>
                    <a href="#" class="text-blue-700 hover:underline">See events</a>
                </li>
            </ul>
        </div>
    </section>

    <!-- Success Stories -->
    <section class="py-12">
        <div class="max-w-5xl mx-auto px-4">
            <h2 class="text-2xl font-bold text-blue-900 mb-8 text-center">Success Stories</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white p-6 rounded-lg shadow">
                    <p class="text-gray-700 mb-2">"The Placement Cell at {{ config('app.name') }} helped me land my dream job at TCS!"</p>
                    <div class="flex items-center mt-4">
                        <img src="{{ url('assets/image/student1.jpg') }}" alt="Student 1" class="h-10 w-10 rounded-full mr-3">
                        <div>
                            <p class="font-semibold text-blue-800">Amit Sharma</p>
                            <p class="text-gray-500 text-sm">Software Engineer, TCS</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <p class="text-gray-700 mb-2">"Workshops and mock interviews boosted my confidence for campus placements."</p>
                    <div class="flex items-center mt-4">
                        <img src="{{ url('assets/image/student2.jpg') }}" alt="Student 2" class="h-10 w-10 rounded-full mr-3">
                        <div>
                            <p class="font-semibold text-blue-800">Priya Verma</p>
                            <p class="text-gray-500 text-sm">Business Analyst, Infosys</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Call to Action -->
    <section class="py-12 bg-blue-900 text-white">
        <div class="max-w-5xl mx-auto px-4 text-center">
            <h2 class="text-2xl font-bold mb-4">Get in Touch</h2>
            <p class="mb-6">Have questions or need guidance? The {{ config('app.name') }} Placement Cell team is here to help you succeed.</p>
            <a href="{{ route('contact') }}" class="inline-block bg-white text-blue-900 font-semibold px-6 py-3 rounded-lg shadow hover:bg-blue-100 transition">Contact Us</a>
        </div>
    </section>
@endsection
