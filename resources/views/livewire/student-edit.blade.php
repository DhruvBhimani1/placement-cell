<?php

use Livewire\Volt\Component;
use App\Models\Placement;

new class extends Component {
    public $student_id;
    public $student_name;
    public $company;
    public $package;
    public $branch;
    public $year;
    public $loading = true;

    public $branches = [
        'Computer Engineering',
        'Information Technology',
        'Electronics & Communication Engineering',
        'Mechanical Engineering',
        'Civil Engineering',
        'Production Engineering',
        'Information and Communication Technology',
        'Electronics and Instrumentation Engineering',
    ];

    public function mount($id)
    {
        $student = Placement::findOrFail($id);

        $this->student_id   = $student->id;
        $this->student_name = $student->student_name;
        $this->company      = $student->company;
        $this->package      = $student->package;
        $this->branch       = $student->branch;
        $this->year         = $student->year;

        $this->loading = false;
    }

    public function save()
    {
        $this->validate([
            'student_name' => 'required|string|max:255',
            'company'      => 'required|string|max:255',
            'package'      => 'required|numeric|min:0',
            'branch'       => 'required|in:' . implode(',', $this->branches),
            'year'         => 'required|digits:4|integer|min:2000|max:' . date('Y'),
        ]);

        $student = Placement::findOrFail($this->student_id);

        $student->student_name = $this->student_name;
        $student->company      = $this->company;
        $student->package      = $this->package;
        $student->branch       = $this->branch;
        $student->year         = $this->year;
        $student->save();

        session()->flash('success', 'Student updated!');
        return redirect()->route('students.list');
    }
};
?>
<div class="max-w-xl mx-auto py-10">
    <h2 class="text-2xl font-bold mb-6 text-center">Edit Student</h2>

    @if($loading)
        <div class="flex justify-center items-center py-10">
            <svg class="animate-spin h-8 w-8 text-blue-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"/>
            </svg>
        </div>
    @else
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form wire:submit.prevent="save" class="space-y-4">
            <div>
                <label class="block font-semibold mb-1">Name</label>
                <input type="text" wire:model="student_name" class="w-full border rounded px-3 py-2" placeholder="Name">
            </div>
            <div>
                <label class="block font-semibold mb-1">Company</label>
                <input type="text" wire:model="company" class="w-full border rounded px-3 py-2" placeholder="Company">
            </div>
            <div>
                <label class="block font-semibold mb-1">Package (LPA)</label>
                <input type="number" step="0.01" wire:model="package" class="w-full border rounded px-3 py-2" placeholder="Package">
            </div>
            <div>
                <label class="block font-semibold mb-1">Branch</label>
                <select wire:model="branch" class="w-full border rounded px-3 py-2">
                    <option value="">Select Branch</option>
                    @foreach($branches as $b)
                        <option value="{{ $b }}">{{ $b }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block font-semibold mb-1">Year</label>
                <input type="number" wire:model="year" class="w-full border rounded px-3 py-2" placeholder="Year">
            </div>
            <button type="submit" class="w-full px-6 py-2 bg-[#0D0D0D] text-white rounded hover:bg-[#1E293B] font-semibold">Save Changes</button>
        </form>
    @endif
</div>
