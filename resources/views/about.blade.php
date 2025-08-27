@extends('layouts.fronted')
@section('title', 'About Us - ' . config('app.name'))

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 text-gray-900 dark:text-gray-100">

                    <!-- About Header -->
                    <div class="text-center mb-12">
                        <h1 class="text-4xl md:text-5xl font-extrabold text-indigo-600 dark:text-indigo-400 mb-4">About the Placement Cell</h1>
                        <p class="text-lg text-gray-600 dark:text-gray-400 max-w-3xl mx-auto">
                            Dedicated to showcasing the success of our students, this platform highlights their achievements, the organizations they've joined, and the packages they've secured to inspire future students.
                        </p>
                    </div>

                    <!-- Our Vision & Mission -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-12">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Our Vision</h2>
                            <ul class="list-disc list-inside text-gray-600 dark:text-gray-400 space-y-3">
                                <li>To highlight the achievements of our students who secured placements in top companies.</li>
                                <li>To serve as a transparent record of placement success for future students and recruiters.</li>
                                <li>To motivate and guide current students by showcasing real examples of career success.</li>
                            </ul>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Our Mission</h2>
                            <ul class="list-disc list-inside text-gray-600 dark:text-gray-400 space-y-3">
                                <li>To connect students with leading organizations and career opportunities.</li>
                                <li>To provide resources and guidance for interview preparation and skill development.</li>
                                <li>To foster a culture of excellence and continuous improvement in placements.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Our Team -->
                    <div>
                        <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-white mb-8">Meet Our Team</h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
                            <div class="text-center">
                                <div class="w-24 h-24 rounded-full bg-indigo-100 dark:bg-indigo-900/50 flex items-center justify-center text-3xl font-bold text-indigo-600 dark:text-indigo-300 mx-auto mb-4">DB</div>
                                <p class="font-semibold text-gray-800 dark:text-white text-lg">Dhruv Bhimani</p>
                                <p class="text-gray-500 dark:text-gray-400 text-sm">Full-Stack Developer</p>
                            </div>
                            <div class="text-center">
                                <div class="w-24 h-24 rounded-full bg-indigo-100 dark:bg-indigo-900/50 flex items-center justify-center text-3xl font-bold text-indigo-600 dark:text-indigo-300 mx-auto mb-4">NS</div>
                                <p class="font-semibold text-gray-800 dark:text-white text-lg">Naman Shirimali</p>
                                <p class="text-gray-500 dark:text-gray-400 text-sm">Backend Developer</p>
                            </div>
                            <div class="text-center">
                                <div class="w-24 h-24 rounded-full bg-indigo-100 dark:bg-indigo-900/50 flex items-center justify-center text-3xl font-bold text-indigo-600 dark:text-indigo-300 mx-auto mb-4">AR</div>
                                <p class="font-semibold text-gray-800 dark:text-white text-lg">Akshay Rathod</p>
                                <p class="text-gray-500 dark:text-gray-400 text-sm">UI/UX Designer</p>
                            </div>
                            <div class="text-center">
                                <div class="w-24 h-24 rounded-full bg-indigo-100 dark:bg-indigo-900/50 flex items-center justify-center text-3xl font-bold text-indigo-600 dark:text-indigo-300 mx-auto mb-4">KP</div>
                                <p class="font-semibold text-gray-800 dark:text-white text-lg">Kavy Parmar</p>
                                <p class="text-gray-500 dark:text-gray-400 text-sm">Frontend Developer</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection