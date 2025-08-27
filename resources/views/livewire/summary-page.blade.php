<?php

use App\Models\Branch;
use App\Models\Placement;
use Illuminate\Support\Collection;
use Livewire\Volt\Component;
use Illuminate\Support\Facades\DB;

new class extends Component {
    public int $year;
    public array $years;

    public function mount(): void
    {
        $this->years = Placement::query()->select('year')->distinct()->orderBy('year', 'desc')->pluck('year')->toArray();
        $this->year = $this->years[0] ?? now()->year;
    }

    public function setYear($value)
    {
        $this->year = (int) $value;
    }

    public function with(): array
    {
        $placements = Placement::where('year', $this->year)->get();
        $branchesInYear = DB::table('branch_year')
            ->join('branches', 'branch_year.branch_id', '=', 'branches.id')
            ->where('branch_year.year', $this->year)
            ->get();

        $totalSanctionedIntake = $branchesInYear->sum('sanctioned_intake');
        $placedStudentsCount = $placements->count();
        $placementPercentage = $totalSanctionedIntake > 0 ? round(($placedStudentsCount / $totalSanctionedIntake) * 100, 2) : 0;
        $highestPackage = $placements->max('package') ?? 0;
        $averagePackage = $placements->avg('package') ?? 0;
        $companiesVisited = $placements->pluck('company')->unique()->count();

        $branchWiseSummary = $branchesInYear->map(function ($branch) use ($placements) {
            $placementsInBranch = $placements->where('branch', $branch->name);
            $placedCount = $placementsInBranch->count();
            $branchIntake = $branch->sanctioned_intake;
            $branchPlacementPercentage = $branchIntake > 0 ? round(($placedCount / $branchIntake) * 100, 2) : 0;

            return [
                'name' => $branch->name,
                'sanctioned_intake' => $branchIntake,
                'placed_students' => $placedCount,
                'placed_percentage' => $branchPlacementPercentage,
                'highest_package' => $placementsInBranch->max('package') ?? 0,
            ];
        });

        return [
            'totalSanctionedIntake' => $totalSanctionedIntake,
            'placedStudentsCount' => $placedStudentsCount,
            'placementPercentage' => $placementPercentage,
            'highestPackage' => $highestPackage,
            'averagePackage' => $averagePackage,
            'companiesVisited' => $companiesVisited,
            'branchWiseSummary' => $branchWiseSummary,
        ];
    }
}; ?>

<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Placement Summary') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <!-- Year Tabs -->
                    <div class="flex items-center gap-4 mb-6">
                        @foreach ($years as $y)
                            <button wire:click="setYear({{ $y }})"
                                class="px-6 py-2 rounded-md font-semibold text-sm transition-all duration-300 {{ $y == $year ? 'bg-indigo-600 text-white shadow-md' : 'bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-600' }}">
                                {{ $y }}
                            </button>
                        @endforeach
                    </div>
                    <hr class="border-gray-200 dark:border-gray-700 mb-8">

                    <!-- Summary Cards -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6 mb-8">
                        <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl border border-gray-200 dark:border-gray-700 p-6 flex flex-col items-center justify-center text-center shadow-sm hover:shadow-lg transition-shadow duration-300">
                            <div class="text-indigo-500 mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <span class="text-3xl font-bold text-gray-800 dark:text-white">{{ $totalSanctionedIntake }}</span>
                            <span class="text-gray-500 dark:text-gray-400 mt-1 text-sm">Sanctioned Intake</span>
                        </div>
                        <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl border border-gray-200 dark:border-gray-700 p-6 flex flex-col items-center justify-center text-center shadow-sm hover:shadow-lg transition-shadow duration-300">
                            <div class="text-indigo-500 mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <span class="text-3xl font-bold text-gray-800 dark:text-white">{{ $placedStudentsCount }}</span>
                            <span class="text-gray-500 dark:text-gray-400 mt-1 text-sm">Placed Students</span>
                        </div>
                        <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl border border-gray-200 dark:border-gray-700 p-6 flex flex-col items-center justify-center text-center shadow-sm hover:shadow-lg transition-shadow duration-300">
                             <div class="text-indigo-500 mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                </svg>
                            </div>
                            <span class="text-3xl font-bold text-gray-800 dark:text-white">{{ $placementPercentage }}%</span>
                            <span class="text-gray-500 dark:text-gray-400 mt-1 text-sm">Placement Rate</span>
                        </div>
                        <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl border border-gray-200 dark:border-gray-700 p-6 flex flex-col items-center justify-center text-center shadow-sm hover:shadow-lg transition-shadow duration-300">
                            <div class="text-indigo-500 mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v.01M12 6v-1m0-1H9m3 0h3m-3 18v-1m0 1H9m3 0h3m-3-18a9 9 0 11-9 9" />
                                </svg>
                            </div>
                            <span class="text-3xl font-bold text-gray-800 dark:text-white">{{ number_format($highestPackage, 2) }}</span>
                            <span class="text-gray-500 dark:text-gray-400 mt-1 text-sm">Highest Package (LPA)</span>
                        </div>
                        <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl border border-gray-200 dark:border-gray-700 p-6 flex flex-col items-center justify-center text-center shadow-sm hover:shadow-lg transition-shadow duration-300">
                            <div class="text-indigo-500 mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <span class="text-3xl font-bold text-gray-800 dark:text-white">{{ number_format($averagePackage, 2) }}</span>
                            <span class="text-gray-500 dark:text-gray-400 mt-1 text-sm">Average Package (LPA)</span>
                        </div>
                        <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl border border-gray-200 dark:border-gray-700 p-6 flex flex-col items-center justify-center text-center shadow-sm hover:shadow-lg transition-shadow duration-300">
                            <div class="text-indigo-500 mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <span class="text-3xl font-bold text-gray-800 dark:text-white">{{ $companiesVisited }}</span>
                            <span class="text-gray-500 dark:text-gray-400 mt-1 text-sm">Companies Visited</span>
                        </div>
                    </div>

                    <!-- Branch Wise Summary Table -->
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white mt-12 mb-4">Branch Wise Summary <span class="font-normal text-base text-gray-500 dark:text-gray-400">({{ $year }})</span></h2>
                    <div class="overflow-x-auto bg-white dark:bg-gray-800 rounded-lg shadow">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th scope="col" class="py-3.5 px-4 text-sm font-semibold text-left text-gray-600 dark:text-gray-300">#</th>
                                    <th scope="col" class="py-3.5 px-4 text-sm font-semibold text-left text-gray-600 dark:text-gray-300">Branch</th>
                                    <th scope="col" class="py-3.5 px-4 text-sm font-semibold text-left text-gray-600 dark:text-gray-300">Intake</th>
                                    <th scope="col" class="py-3.5 px-4 text-sm font-semibold text-left text-gray-600 dark:text-gray-300">Placed</th>
                                    <th scope="col" class="py-3.5 px-4 text-sm font-semibold text-left text-gray-600 dark:text-gray-300">Placed %</th>
                                    <th scope="col" class="py-3.5 px-4 text-sm font-semibold text-left text-gray-600 dark:text-gray-300">Highest (LPA)</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @forelse ($branchWiseSummary as $index => $branch)
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700/50 transition-colors duration-200">
                                        <td class="px-4 py-4 text-sm font-medium text-gray-700 dark:text-gray-300">{{ $index + 1 }}</td>
                                        <td class="px-4 py-4 text-sm font-semibold text-gray-800 dark:text-white">{{ $branch['name'] }}</td>
                                        <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-400">{{ $branch['sanctioned_intake'] }}</td>
                                        <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-400">{{ $branch['placed_students'] }}</td>
                                        <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-400">{{ $branch['placed_percentage'] }}%</td>
                                        <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-400">{{ number_format($branch['highest_package'], 2) }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="py-8 px-4 text-center text-gray-500 dark:text-gray-400">No data available for the selected year.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                             @if($branchWiseSummary->count() > 0)
                                <tfoot class="bg-gray-50 dark:bg-gray-700">
                                    <tr class="font-bold text-gray-700 dark:text-white">
                                        <td class="px-4 py-4 text-sm" colspan="2">Total</td>
                                        <td class="px-4 py-4 text-sm">{{ $totalSanctionedIntake }}</td>
                                        <td class="px-4 py-4 text-sm">{{ $placedStudentsCount }}</td>
                                        <td class="px-4 py-4 text-sm">{{ $placementPercentage }}%</td>
                                        <td class="px-4 py-4 text-sm"></td>
                                    </tr>
                                </tfoot>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>