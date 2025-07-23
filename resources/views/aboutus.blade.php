@extends('layouts.fronted')
@section('title', 'About Us - ' . config('app.name'))

@section('content')
    <!-- About Placement Cell -->
    <section class="bg-blue-900 text-white py-16">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">About Our Placement Cell</h1>
            <p class="text-lg md:text-xl mb-6">
                Empowering students at {{ config('app.name') }} to achieve their career dreams through guidance, training, and industry connections.
            </p>
        </div>
    </section>

    <!-- Our Mission -->
    <section class="py-12 bg-gray-50">
        <div class="max-w-4xl mx-auto px-4">
            <h2 class="text-2xl font-bold text-blue-900 mb-4">Our Mission</h2>
            <p class="text-gray-700 mb-4">
                Our mission is to bridge the gap between academia and the professional world by providing students with the resources, training, and opportunities they need to succeed in their chosen careers. We strive to foster strong relationships with top recruiters and ensure our students are well-prepared for the challenges of the job market.
            </p>
        </div>
    </section>

    <!-- Our Team -->
    <section class="py-12">
        <div class="max-w-4xl mx-auto px-4">
            <h2 class="text-2xl font-bold text-blue-900 mb-4">Meet Our Team</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white p-6 rounded-lg shadow text-center">
                    <img src="{{ url('assets/image/team1.jpg') }}" alt="Team Member 1" class="h-20 w-20 rounded-full mx-auto mb-2">
                    <p class="font-semibold text-blue-800">Dr. Rakesh Kumar</p>
                    <p class="text-gray-600 text-sm">Placement Officer</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow text-center">
                    <img src="{{ url('assets/image/team2.jpg') }}" alt="Team Member 2" class="h-20 w-20 rounded-full mx-auto mb-2">
                    <p class="font-semibold text-blue-800">Ms. Sunita Sharma</p>
                    <p class="text-gray-600 text-sm">Training & Development Coordinator</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="py-12 bg-gray-50">
        <div class="max-w-4xl mx-auto px-4">
            <h2 class="text-2xl font-bold text-blue-900 mb-4">Why Choose Our Placement Cell?</h2>
            <ul class="list-disc list-inside text-gray-700 space-y-2">
                <li>Strong network with top recruiters and companies</li>
                <li>Personalized career guidance and counseling</li>
                <li>Workshops, seminars, and mock interviews</li>
                <li>Support for internships and final placements</li>
                <li>Dedicated and experienced placement team</li>
            </ul>
        </div>
    </section>

    <!-- Contact Info -->
    <section class="py-12">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h2 class="text-2xl font-bold text-blue-900 mb-4">Contact the Placement Cell</h2>
            <p class="text-gray-700 mb-2">Email: <a href="mailto:placement@yourcollege.edu" class="text-blue-700 hover:underline">placement@yourcollege.edu</a></p>
            <p class="text-gray-700 mb-2">Phone: <a href="tel:+911234567890" class="text-blue-700 hover:underline">+91 12345 67890</a></p>
            <p class="text-gray-700">Office: Placement Cell, {{ config('app.name') }}, Your College Address</p>
        </div>
    </section>
@endsection