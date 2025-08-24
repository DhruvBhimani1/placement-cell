<?php

use App\Models\Placement;
use Illuminate\Support\Collection;
use Livewire\Volt\Component;
use Livewire\WithPagination;

new class extends Component {
    use WithPagination;

    public $year = '';
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
        $this->resetPage();
    }

    public function setBranch($branch)
    {
        $this->branch = $this->branch == $branch ? '' : $branch;
        $this->resetPage();
    }

    public function with(): array
    {
        $query = Placement::query()
            ->when($this->year, fn($q) => $q->where('year', $this->year))
            ->when($this->branch, fn($q) => $q->where('branch', $this->branch));

        $students = (clone $query)->orderByDesc('id')->paginate(12);

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
    <section class="bg-[#213555] text-white py-16">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Placed Students</h1>
            <p class="text-lg text-blue-100">Celebrating our students' success in campus placements</p>
        </div>
    </section>

    <!-- Filters -->
    <div class="max-w-6xl mx-auto px-4 mt-12">
        <!-- Year Tabs -->
        <div class="flex gap-4 mb-8 justify-center flex-wrap">
             @foreach($this->years as $y)
                <button wire:click="setYear('{{ $y }}')" class="px-8 py-2 rounded-lg font-semibold shadow focus:outline-none transition {{ $year == $y ? 'bg-black text-white' : 'bg-white text-black border border-gray-300 hover:bg-gray-100' }}">{{ $y }}</button>
            @endforeach
        </div>
        <hr class="mb-8">

        <!-- Branch Tabs -->
        <div class="flex flex-wrap gap-3 mb-8 justify-center">
            
            @foreach($this->branches as $b)
                <button wire:click="setBranch('{{ $b }}')" class="px-5 py-2 rounded-xl font-medium shadow focus:outline-none transition {{ $branch == $b ? 'bg-black text-white' : 'bg-white text-black border border-gray-300 hover:bg-gray-100' }}">{{ $b }}</button>
            @endforeach
        </div>
        <hr class="mb-8">

        <!-- Summary Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
            <div class="bg-white rounded-xl border p-8 flex flex-col items-center shadow transition hover:shadow-lg">
                <span class="text-4xl mb-2">💼</span>
                <span class="text-3xl font-bold text-black">{{ $placedStudentsCount }}</span>
                <span class="text-gray-500 mt-1">Placed Students</span>
            </div>
            <div class="bg-white rounded-xl border p-8 flex flex-col items-center shadow transition hover:shadow-lg">
                <span class="text-4xl mb-2">🏆</span>
                <span class="text-3xl font-bold text-black">{{ $highestPackage ?? 'N/A' }} Lacs</span>
                <span class="text-gray-500 mt-1">Highest Package</span>
            </div>
            <div class="bg-white rounded-xl border p-8 flex flex-col items-center shadow transition hover:shadow-lg">
                <span class="text-4xl mb-2">📊</span>
                <span class="text-3xl font-bold text-black">{{ $averagePackage ?? 'N/A' }} Lacs</span>
                <span class="text-gray-500 mt-1">Average Package</span>
            </div>
            <div class="bg-white rounded-xl border p-8 flex flex-col items-center shadow transition hover:shadow-lg">
                <span class="text-4xl mb-2">🏢</span>
                <span class="text-3xl font-bold text-black">{{ $companiesVisitedCount }}</span>
                <span class="text-gray-500 mt-1">Companies Visited</span>
            </div>
        </div>
    </div>

    <!-- Placed Students Cards -->
    <div class="max-w-6xl mx-auto px-2">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8 mb-20">
            @forelse($students as $student)
                <div class="bg-white border rounded-2xl p-8 flex flex-col items-center shadow transition-transform duration-200 hover:scale-105 hover:shadow-2xl hover:border-[#213555]">
                    <div class="mb-5">
                        <svg width="80" height="80" viewBox="0 0 80 80" fill="none">
                            <circle cx="40" cy="40" r="36" fill="#E5E7EB"/>
                            <ellipse cx="40" cy="35" rx="18" ry="20" fill="#F9E7D3"/>
                            <path d="M22 60c0-10 36-10 36 0v10H22V60z" fill="#222"/>
                            <path d="M40 15c-10 0-18 8-18 20 0 2 0 4 1 6 2-6 8-10 17-10s15 4 17 10c1-2 1-4 1-6 0-12-8-20-18-20z" fill="#222"/>
                        </svg>
                    </div>
                    <p class="font-bold text-lg text-center mb-1 text-[#213555]">{{ $student->student_name }}</p>
                    <p class="text-gray-700 text-center text-sm mb-1">{{ $student->company }}</p>
                    <p class="text-gray-500 text-center text-xs mb-2">CTC</p>
                    <span class="font-bold text-xl text-[#213555] mt-2">{{ $student->package }} Lacs</span>
                </div>
            @empty
                <div class="col-span-full text-center py-12">
                    <h3 class="text-lg font-medium text-gray-900">No students found</h3>
                    <p class="mt-1 text-sm text-gray-500">No records match your current filters.</p>
                </div>
            @endforelse
        </div>
        
        @if ($students->hasPages())
            <div class="p-4 sm:p-6">
                {{ $students->links() }}
            </div>
        @endif
    </div>
</div>