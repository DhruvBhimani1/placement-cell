<?php

namespace App\Livewire;

use App\Models\Placement;
use Livewire\Component;

class TopAchievers extends Component
{
    public $year = '';
    public $branch = '';

    public $years;
    public $branches;

    public function mount()
    {
        $this->years = Placement::select('year')->distinct()->orderBy('year', 'desc')->pluck('year');
        $this->branches = [
            'Computer Engineering',
            'Information Technology',
            'Electronics & Communication Engineering',
            'Mechanical Engineering',
            'Civil Engineering',
            'Production Engineering',
            'Information and Communication Technology',
            'Electronics and Instrumentation Engineering',
        ];
    }

    public function render()
    {
        $query = Placement::query();

        if ($this->year) {
            $query->where('year', $this->year);
        }

        if ($this->branch) {
            $query->where('branch', $this->branch);
        }

        $placements = $query->orderBy('package', 'desc')->take(6)->get();

        return view('livewire.top-achievers', [
            'placements' => $placements,
        ]);
    }
}
