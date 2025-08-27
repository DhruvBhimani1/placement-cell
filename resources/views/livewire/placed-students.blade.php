<?php

use App\Models\Placement;
use Illuminate\Support\Collection;
use Livewire\Volt\Component;

new class extends Component {
    public $year = '2024';
    public $branch = 'Computer Engineering';

    public function getYearsProperty(): Collection
    {
        return Placement::query()
            ->select('year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');
    }

    public function getBranchesProperty(): Collection
    {
        return Placement::query()
            ->select('branch')
            ->distinct()
            ->orderBy('branch')
            ->pluck('branch');
    }

    public function setYear($year)
    {
        $this->year = $this->year == $year ? '' : $year;
    }

    public function setBranch($branch)
    {
        $this->branch = $this->branch == $branch ? '' : $branch;
    }

    public function with(): array
    {
        $query = Placement::query()
            ->when($this->year, fn($q) => $q->where('year', $this->year))
            ->when($this->branch, fn($q) => $q->where('branch', $this->branch));

        $students = (clone $query)->orderByDesc('id')->get();

        $statsQuery = (clone $query);
        $placedStudentsCount = $statsQuery->count();
        $highestPackage = $statsQuery->max('package');
        $averagePackage = round($statsQuery->avg('package'), 2);
        $companiesVisitedCount = $statsQuery->distinct('company')->count('company');

        return [
            'students' => $students,
            'placedStudentsCount' => $placedStudentsCount,
            'highestPackage' => $highestPackage,
            'averagePackage' => $averagePackage,
            'companiesVisitedCount' => $companiesVisitedCount,
        ];
    }
};
?>

<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Placed Students') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8">
                    <!-- Filters -->
                    <div class="mb-8">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Filter by Year</h3>
                        <div class="flex gap-4 mb-8 justify-start flex-wrap">
                            @foreach($this->years as $y)
                                <button wire:click="setYear('{{ $y }}')" class="px-6 py-2 rounded-md font-semibold text-sm transition-all duration-300 {{ $year == $y ? 'bg-indigo-600 text-white shadow-md' : 'bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-600' }}">{{ $y }}</button>
                            @endforeach
                        </div>

                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Filter by Branch</h3>
                        <div class="flex flex-wrap gap-3 justify-start">
                            @foreach($this->branches as $b)
                                <button wire:click="setBranch('{{ $b }}')" class="px-5 py-2 rounded-md font-semibold text-sm transition-all duration-300 {{ $branch == $b ? 'bg-indigo-600 text-white shadow-md' : 'bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-600' }}">{{ $b }}</button>
                            @endforeach
                        </div>
                    </div>

                    <hr class="border-gray-200 dark:border-gray-700 my-8">

                    <!-- Summary Cards -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
                        <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl border border-gray-200 dark:border-gray-700 p-6 flex items-center gap-6 shadow-sm">
                            <div class="text-indigo-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <span class="text-3xl font-bold text-gray-800 dark:text-white">{{ $placedStudentsCount }}</span>
                                <p class="text-gray-500 dark:text-gray-400 mt-1">Placed Students</p>
                            </div>
                        </div>
                         <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl border border-gray-200 dark:border-gray-700 p-6 flex items-center gap-6 shadow-sm">
                            <div class="text-indigo-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v.01M12 6v-1m0-1H9m3 0h3m-3 18v-1m0 1H9m3 0h3m-3-18a9 9 0 11-9 9" />
                                </svg>
                            </div>
                            <div>
                                <span class="text-3xl font-bold text-gray-800 dark:text-white">{{ $highestPackage ?? 'N/A' }}</span>
                                <p class="text-gray-500 dark:text-gray-400 mt-1">Highest Package (LPA)</p>
                            </div>
                        </div>
                        <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl border border-gray-200 dark:border-gray-700 p-6 flex items-center gap-6 shadow-sm">
                            <div class="text-indigo-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <div>
                                <span class="text-3xl font-bold text-gray-800 dark:text-white">{{ $averagePackage ?? 'N/A' }}</span>
                                <p class="text-gray-500 dark:text-gray-400 mt-1">Average Package (LPA)</p>
                            </div>
                        </div>
                        <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl border border-gray-200 dark:border-gray-700 p-6 flex items-center gap-6 shadow-sm">
                            <div class="text-indigo-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <div>
                                <span class="text-3xl font-bold text-gray-800 dark:text-white">{{ $companiesVisitedCount }}</span>
                                <p class="text-gray-500 dark:text-gray-400 mt-1">Companies Visited</p>
                            </div>
                        </div>
                    </div>

                    <!-- Placed Students Cards -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                        @forelse($students as $student)
                            <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden shadow-md transition-transform duration-300 hover:-translate-y-1 hover:shadow-xl">
                                <div class="p-6 text-center">
                                    <h3 class="font-semibold text-lg text-gray-800 dark:text-white mb-1">{{ $student->student_name }}</h3>
                                    <p class="text-indigo-500 dark:text-indigo-400 text-sm mb-3">{{ $student->company }}</p>
                                    <div class="mt-4 inline-block bg-gray-100 dark:bg-gray-700 rounded-full px-4 py-2">
                                        <span class="text-sm font-medium text-gray-600 dark:text-gray-300">CTC:</span>
                                        <span class="font-bold text-gray-800 dark:text-white">{{ $student->package }} Lacs</span>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full text-center py-20">
                                <div class="mx-auto">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h12a2 2 0 012 2v10a2 2 0 01-2 2H4a2 2 0 01-2-2z" />
                                    </svg>
                                    <h3 class="mt-2 text-lg font-medium text-gray-900 dark:text-gray-100">No students found</h3>
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">There are no records matching your current filters.</p>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>