<?php

use App\Models\Branch;
use App\Models\Placement;
use Illuminate\Support\Collection;
use Livewire\Volt\Component;

new class extends Component {
    public string $year = '';
    public Collection $years;
    public Collection $branches;
    public Collection $placements;

    public int $totalSanctionedIntake = 0;
    public int $totalPlacedStudents = 0;
    public float $overallPlacementPercentage = 0;
    public ?float $highestPackage = 0;
    public ?float $averagePackage = 0;
    public int $companiesVisitedCount = 0;

    public function mount(): void
    {
        $this->years = Placement::query()->select('year')->distinct()->orderBy('year', 'desc')->pluck('year');
        $this->year = $this->years->first() ?? '';
        $this->branches = Branch::all();
        $this->filterPlacements();
    }

    public function updatedYear(): void
    {
        $this->filterPlacements();
    }

    public function filterPlacements(): void
    {
        $this->placements = Placement::where('year', $this->year)->get();
        $this->calculateStats();
    }

    public function calculateStats(): void
    {
        $this->totalSanctionedIntake = $this->branches->sum('sanctioned_intake');
        $this->totalPlacedStudents = $this->placements->count();
        $this->overallPlacementPercentage = ($this->totalSanctionedIntake > 0) ? round(($this->totalPlacedStudents / $this->totalSanctionedIntake) * 100, 2) : 0;
        $this->highestPackage = $this->placements->max('package');
        $this->averagePackage = round($this->placements->avg('package'), 2);
        $this->companiesVisitedCount = $this->placements->unique('company')->count();
    }
};

?>

<div>
    <!-- Year Tabs -->
    <div class="max-w-4xl mx-auto px-4 m-8">
        <div class="flex gap-4 mb-6">
            @foreach($years as $y)
                <button wire:click="$set('year', '{{ $y }}')" class="px-8 py-2 rounded-lg font-semibold {{ $year == $y ? 'bg-black text-white' : 'bg-white text-black border border-gray-300 hover:bg-gray-100' }} transition">{{ $y }}</button>
            @endforeach
        </div>
        <hr class="mb-8">

        <!-- Summary Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-xl border p-6 flex flex-col items-center shadow">
                <span class="text-4xl mb-2">👤</span>
                <span class="text-3xl font-bold text-black">{{ $totalSanctionedIntake }}</span>
                <span class="text-gray-500 mt-1">Sanctioned Intake</span>
            </div>
            <div class="bg-white rounded-xl border p-6 flex flex-col items-center shadow">
                <span class="text-4xl mb-2">💼</span>
                <span class="text-3xl font-bold text-black">{{ $totalPlacedStudents }}</span>
                <span class="text-gray-500 mt-1">Placed Students</span>
            </div>
            <div class="bg-white rounded-xl border p-6 flex flex-col items-center shadow">
                <span class="text-4xl mb-2">🏢</span>
                <span class="text-3xl font-bold text-black">{{ $overallPlacementPercentage }}%</span>
                <span class="text-gray-500 mt-1">Placement Rate</span>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-xl border p-6 flex flex-col items-center shadow">
                <span class="text-4xl mb-2">🏆</span>
                <span class="text-3xl font-bold text-black">{{ $highestPackage ?? 'N/A' }} Lacs</span>
                <span class="text-gray-500 mt-1">Highest Package</span>
            </div>
            <div class="bg-white rounded-xl border p-6 flex flex-col items-center shadow">
                <span class="text-4xl mb-2">📊</span>
                <span class="text-3xl font-bold text-black">{{ $averagePackage ?? 'N/A' }} Lacs</span>
                <span class="text-gray-500 mt-1">Average Package</span>
            </div>
            <div class="bg-white rounded-xl border p-6 flex flex-col items-center shadow">
                <span class="text-4xl mb-2">🏢</span>
                <span class="text-3xl font-bold text-black">{{ $companiesVisitedCount }}</span>
                <span class="text-gray-500 mt-1">Companies Visited</span>
            </div>
        </div>

        <!-- Branch Wise Summary Table -->
        <h2 class="text-2xl font-bold text-black mt-10 mb-2">Branch Wise Summary <span class="font-normal text-base">(As on 31st December of Respective Year)</span></h2>
        <div class="overflow-x-auto rounded-xl shadow mt-4">
            <table class="min-w-full bg-white border border-gray-300">
                <thead class="bg-[#0a2a2a] text-white">
                    <tr>
                        <th class="py-3 px-2 border">#</th>
                        <th class="py-3 px-2 border">Branch</th>
                        <th class="py-3 px-2 border">Sanctioned Intake</th>
                        <th class="py-3 px-2 border">Placed Students</th>
                        <th class="py-3 px-2 border">Placed %</th>
                        <th class="py-3 px-2 border">Highest package</th>
                    </tr>
                </thead>
                <tbody class="text-black text-center">
                    @foreach($branches as $branch)
                        @php
                            $placedCount = $placements->where('branch', $branch->name)->count();
                            $placementPercentage = ($branch->sanctioned_intake > 0) ? round(($placedCount / $branch->sanctioned_intake) * 100, 2) : 0;
                            $highestBranchPackage = $placements->where('branch', $branch->name)->max('package');
                        @endphp
                        <tr>
                            <td class="py-2 px-2 border">{{ $loop->iteration }}</td>
                            <td class="py-2 px-2 border">{{ $branch->name }}</td>
                            <td class="py-2 px-2 border">{{ $branch->sanctioned_intake }}</td>
                            <td class="py-2 px-2 border">{{ $placedCount }}</td>
                            <td class="py-2 px-2 border">{{ $placementPercentage }}%</td>
                            <td class="py-2 px-2 border">{{ $highestBranchPackage ?? 'N/A' }} Lacs</td>
                        </tr>
                    @endforeach
                    <tr class="font-bold bg-gray-100">
                        <td class="py-2 px-2 border" colspan="2">Total</td>
                        <td class="py-2 px-2 border">{{ $totalSanctionedIntake }}</td>
                        <td class="py-2 px-2 border">{{ $totalPlacedStudents }}</td>
                        <td class="py-2 px-2 border">{{ $overallPlacementPercentage }}%</td>
                        <td class="py-2 px-2 border"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>