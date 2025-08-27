@extends('layouts.fronted')
@section('title', 'Companies - ' . config('app.name'))

@php
    // Fetch unique companies from the placements table
    $companies = \App\Models\Placement::select('company')->distinct()->orderBy('company')->get();

    // Function to generate initials from a company name
    function getInitials($name) {
        $words = preg_split("/[\s-]+/", $name);
        $initials = '';
        $count = 0;
        foreach ($words as $word) {
            if (!empty($word)) {
                $initials .= strtoupper($word[0]);
                $count++;
            }
            if ($count >= 2) break;
        }
        return $initials;
    }

    // Function to assign a color based on the company name for variety
    function getColorForName($name) {
        $colors = [
            ['bg' => 'bg-red-100 dark:bg-red-900/50', 'text' => 'text-red-600 dark:text-red-300'],
            ['bg' => 'bg-green-100 dark:bg-green-900/50', 'text' => 'text-green-600 dark:text-green-300'],
            ['bg' => 'bg-sky-100 dark:bg-sky-900/50', 'text' => 'text-sky-600 dark:text-sky-300'],
            ['bg' => 'bg-amber-100 dark:bg-amber-900/50', 'text' => 'text-amber-600 dark:text-amber-300'],
            ['bg' => 'bg-violet-100 dark:bg-violet-900/50', 'text' => 'text-violet-600 dark:text-violet-300'],
            ['bg' => 'bg-fuchsia-100 dark:bg-fuchsia-900/50', 'text' => 'text-fuchsia-600 dark:text-fuchsia-300'],
            ['bg' => 'bg-indigo-100 dark:bg-indigo-900/50', 'text' => 'text-indigo-600 dark:text-indigo-300'],
            ['bg' => 'bg-rose-100 dark:bg-rose-900/50', 'text' => 'text-rose-600 dark:text-rose-300'],
        ];
        // Simple hash to get a consistent color for each name
        $index = abs(crc32($name)) % count($colors);
        return $colors[$index];
    }
@endphp

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 text-gray-900 dark:text-gray-100">

                    <!-- Header -->
                    <div class="text-center mb-12">
                        <h1 class="text-4xl md:text-5xl font-extrabold text-indigo-600 dark:text-indigo-400 mb-4">Our Recruiting Partners</h1>
                        <p class="text-lg text-gray-600 dark:text-gray-400 max-w-3xl mx-auto">
                            We are proud to partner with a diverse range of top companies that recruit our talented students.
                        </p>
                    </div>

                    <!-- Company Grid -->
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
                        @if($companies->count() > 0)
                            @foreach($companies as $company)
                                @php
                                    $colors = getColorForName($company->company);
                                @endphp
                                <div class="bg-gray-50 dark:bg-gray-700/50 border border-gray-200 dark:border-gray-700 rounded-lg p-6 flex flex-col items-center justify-start text-center shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 h-48">
                                    <div class="h-20 w-20 flex-shrink-0 flex items-center justify-center mb-4">
                                        <div class="h-20 w-20 rounded-full flex items-center justify-center text-2xl font-bold shadow-inner {{ $colors['bg'] }} {{ $colors['text'] }}">
                                            {{ getInitials($company->company) }}
                                        </div>
                                    </div>
                                    <p class="font-semibold text-gray-800 dark:text-white flex-grow flex items-center">{{ $company->company }}</p>
                                </div>
                            @endforeach
                        @else
                            <div class="col-span-full text-center py-20">
                                <p class="text-gray-500 dark:text-gray-400">No company information available at the moment.</p>
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection