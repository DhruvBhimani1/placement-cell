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
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-[#213555] to-[#4F6F52] text-white py-20">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold mb-4 tracking-tight">Placed Students</h1>
            <p class="text-lg text-gray-200">Celebrating the success of our students in campus placements.</p>
        </div>
    </section>

    <!-- Filters -->
    <div class="bg-gray-50 py-12">
        <div class="max-w-6xl mx-auto px-4">
            <!-- Year Tabs -->
            <div class="flex gap-4 mb-8 justify-center flex-wrap">
                @foreach($this->years as $y)
                    <button wire:click="setYear('{{ $y }}')" class="px-6 py-2 rounded-full font-semibold shadow-md focus:outline-none transition-transform transform hover:scale-105 {{ $year == $y ? 'bg-gray-800 text-white' : 'bg-white text-gray-800 border border-gray-300 hover:bg-gray-100' }}">{{ $y }}</button>
                @endforeach
            </div>

            <!-- Branch Tabs -->
            <div class="flex flex-wrap gap-3 mb-8 justify-center">
                @foreach($this->branches as $b)
                    <button wire:click="setBranch('{{ $b }}')" class="px-5 py-2 rounded-full font-medium shadow-md focus:outline-none transition-transform transform hover:scale-105 {{ $branch == $b ? 'bg-gray-800 text-white' : 'bg-white text-gray-800 border border-gray-300 hover:bg-gray-100' }}">{{ $b }}</button>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Summary Cards -->
    <div class="bg-white py-16">
        <div class="max-w-6xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-gray-50 rounded-xl border p-8 flex flex-col items-center shadow-lg transition hover:shadow-xl hover:-translate-y-1">
                    <span class="text-5xl mb-3">💼</span>
                    <span class="text-4xl font-bold text-gray-800">{{ $placedStudentsCount }}</span>
                    <span class="text-gray-500 mt-1 font-medium">Placed Students</span>
                </div>
                <div class="bg-gray-50 rounded-xl border p-8 flex flex-col items-center shadow-lg transition hover:shadow-xl hover:-translate-y-1">
                    <span class="text-5xl mb-3">🏆</span>
                    <span class="text-4xl font-bold text-gray-800">{{ $highestPackage ?? 'N/A' }} Lacs</span>
                    <span class="text-gray-500 mt-1 font-medium">Highest Package</span>
                </div>
                <div class="bg-gray-50 rounded-xl border p-8 flex flex-col items-center shadow-lg transition hover:shadow-xl hover:-translate-y-1">
                    <span class="text-5xl mb-3">📊</span>
                    <span class="text-4xl font-bold text-gray-800">{{ $averagePackage ?? 'N/A' }} Lacs</span>
                    <span class="text-gray-500 mt-1 font-medium">Average Package</span>
                </div>
                <div class="bg-gray-50 rounded-xl border p-8 flex flex-col items-center shadow-lg transition hover:shadow-xl hover:-translate-y-1">
                    <span class="text-5xl mb-3">🏢</span>
                    <span class="text-4xl font-bold text-gray-800">{{ $companiesVisitedCount }}</span>
                    <span class="text-gray-500 mt-1 font-medium">Companies Visited</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Placed Students Cards -->
    <div class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @forelse($students as $student)
                    <div class="bg-white border rounded-lg overflow-hidden shadow-lg transition-transform duration-300 hover:scale-105 hover:shadow-2xl">
                        <div class="p-6 text-center">
                            <h3 class="font-bold text-xl text-gray-800 mb-1">{{ $student->student_name }}</h3>
                            <p class="text-gray-600 text-sm mb-2">{{ $student->company }}</p>
                            <div class="mt-4">
                                <span class="inline-block bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded-full">CTC</span>
                                <span class="font-bold text-lg text-gray-800">{{ $student->package }} Lacs</span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-20">
                        <div class="mx-auto">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h12a2 2 0 012 2v10a2 2 0 01-2 2H4a2 2 0 01-2-2z" />
                            </svg>
                            <h3 class="mt-2 text-lg font-medium text-gray-900">No students found</h3>
                            <p class="mt-1 text-sm text-gray-500">There are no records matching your current filters.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
