@extends('layouts.fronted')
@section('title', 'About Us - ' . config('app.name'))

@section('content')
    <!-- About Placement Cell -->
    <section class="bg-[#213555] text-white py-16">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">About the Placement Cell</h1>
            <p class="text-md md:text-lg mb-6">
                The Placement Cell of GEC is dedicated to showcasing the success of our students who have been placed in
                reputed companies. This platform highlights their achievements, the organizations they joined, and the
                packages they secured inspiring future students to aim higher.

            </p>
        </div>
    </section>

    <!-- Our Vision & Mission -->
    <section class="py-12 bg-gray-50">
        <div class="max-w-4xl mx-auto px-4">
            <h2 class="text-2xl font-bold text-[#213555] mb-4">Our Vision</h2>
            <ul class="list-disc list-inside text-gray-600 space-y-2 mb-6">
                <li>To highlight the achievements of our students who secured placements in top companies.</li>
                <li>To serve as a transparent record of placement success for future students and recruiters.</li>
                <li>To motivate and guide current students by showcasing real examples of career success.</li>
            </ul>
            <h2 class="text-2xl font-bold text-[#213555] mb-4">Our Mission</h2>
            <ul class="list-disc list-inside text-gray-600 space-y-2">
                <li>To connect students with leading organizations and career opportunities.</li>
                <li>To provide resources and guidance for interview preparation and skill development.</li>
                <li>To foster a culture of excellence and continuous improvement in placements.</li>
            </ul>
        </div>
    </section>
    <!-- Our Team -->
    <section class="py-12">
        <div class="max-w-4xl mx-auto px-4">
            <h2 class="text-2xl font-bold text-[#213555] mb-4">Meet Our Team</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                <div class="bg-white p-6 rounded-lg shadow flex items-center gap-4">
                    <div
                        class="h-16 w-16 rounded-lg bg-gray-200 flex items-center justify-center text-xl font-bold text-gray-700">
                        DB
                    </div>
                    <div>
                        <p class="font-semibold text-black text-lg">Dhruv Bhimani</p>
                        <p class="text-gray-600 text-sm">Fronted and Backend developer</p>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow flex items-center gap-4">
                    <div
                        class="h-16 w-16 rounded-lg bg-gray-200 flex items-center justify-center text-xl font-bold text-gray-700">
                        NS
                    </div>
                    <div>
                        <p class="font-semibold text-black text-lg">Naman Shirimali</p>
                        <p class="text-gray-600 text-sm">Backend Developer</p>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow flex items-center gap-4">
                    <div
                        class="h-16 w-16 rounded-lg bg-gray-200 flex items-center justify-center text-xl font-bold text-gray-700">
                        AR
                    </div>
                    <div>
                        <p class="font-semibold text-black text-lg">Akshay Rathod</p>
                        <p class="text-gray-600 text-sm">Designer and Frontend Developer</p>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow flex items-center gap-4">
                    <div
                        class="h-16 w-16 rounded-lg bg-gray-200 flex items-center justify-center text-xl font-bold text-gray-700">
                        KP
                    </div>
                    <div>
                        <p class="font-semibold text-black text-lg">Kavy Parmar</p>
                        <p class="text-gray-600 text-sm">Designer and Frontend Developer</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
