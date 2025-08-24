<?php

use App\Models\Placement;
use Illuminate\Support\Collection;
use Livewire\WithFileUploads;
use Livewire\Volt\Component;
use Maatwebsite\Excel\Facades\Excel;

new class extends Component {
    use WithFileUploads;

    public $file;

    public $student_name;
    public $company;
    public $branch;
    public $package;
    public $year;

    public function getBranchesProperty(): Collection
    {
        return Placement::query()->select('branch')->distinct()->orderBy('branch')->pluck('branch');
    }

    public function saveStudent()
    {
        $validated = $this->validate([
            'student_name' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'branch' => 'required|string|max:255',
            'package' => 'required|numeric|min:0',
            'year' => 'required|digits:4|integer|min:1900|max:' . (date('Y') + 1),
        ]);

        Placement::create($validated);

        session()->flash('success_manual', 'Student added successfully!');

        $this->reset('student_name', 'company', 'branch', 'package', 'year');
    }

    public function import()
    {
        $this->validate([
            'file' => 'required|mimes:csv,xlsx|max:2048',
        ]);

        try {
            $collection = Excel::toCollection(new \stdClass(), $this->file)->first();

            $header = $collection->first()->map(fn($item) => strtolower(trim($item)))->toArray();

            $rows = $collection->slice(1);

            foreach ($rows as $row) {
                $data = array_combine($header, $row->toArray());

                if (empty(array_filter($data))) {
                    continue;
                }

                Placement::create([
                    'student_name' => $data['student_name'] ?? $data['student name'] ?? null,
                    'company'      => $data['company'] ?? null,
                    'branch'       => $data['branch'] ?? null,
                    'package'      => $data['package'] ?? null,
                    'year'         => $data['year'] ?? null,
                ]);
            }

            session()->flash('success_csv', 'Placements imported successfully!');

        } catch (\Exception $e) {
            session()->flash('error_csv', 'An error occurred during import: ' . $e->getMessage());
        } finally {
            $this->reset('file');
        }
    }
};
?>

<div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
    <div x-data="{ tab: 'manual' }" class="bg-white rounded-2xl shadow-lg overflow-hidden">
        <!-- Tab Headers -->
        <div class="flex border-b border-gray-200">
            <button @click="tab = 'manual'"
                :class="{ 'border-b-2 border-indigo-600 text-indigo-600': tab === 'manual', 'text-gray-500 hover:text-gray-700': tab !== 'manual' }"
                class="flex-1 py-4 px-6 text-center font-medium focus:outline-none transition-colors duration-200">
                Add Student Manually
            </button>
            <button @click="tab = 'csv'"
                :class="{ 'border-b-2 border-indigo-600 text-indigo-600': tab === 'csv', 'text-gray-500 hover:text-gray-700': tab !== 'csv' }"
                class="flex-1 py-4 px-6 text-center font-medium focus:outline-none transition-colors duration-200">
                Import from CSV or XLSX </button>
        </div>

        <!-- Tab Content -->
        <div>
            <!-- Manual Add Form -->
            <div x-show="tab === 'manual'" class="p-6 sm:p-8">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">New Student Details</h3>
                @if (session('success_manual'))
                    <div class="p-4 mb-4 bg-green-100 text-green-700 rounded-lg">
                        {{ session('success_manual') }}
                    </div>
                @endif
                <form wire:submit.prevent="saveStudent" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="student_name" class="block text-sm font-medium text-gray-700">Student
                                Name</label>
                            <input type="text" id="student_name" wire:model.defer="student_name"
                                class="mt-1 block w-full p-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                            @error('student_name')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="company" class="block text-sm font-medium text-gray-700">Company</label>
                            <input type="text" id="company" wire:model.defer="company"
                                class="mt-1 block w-full p-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                            @error('company')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="branch" class="block text-sm font-medium text-gray-700">Branch</label>
                            <select id="branch" wire:model.defer="branch"
                                class="mt-1 block w-full p-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="">Select a Branch</option>
                                @foreach ($this->branches as $branchOption)
                                    <option value="{{ $branchOption }}">{{ $branchOption }}</option>
                                @endforeach
                            </select>
                            @error('branch')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="package" class="block text-sm font-medium text-gray-700">Package (LPA)</label>
                            <input type="number" step="0.01" id="package" wire:model.defer="package"
                                class="mt-1 block w-full p-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                            @error('package')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="year" class="block text-sm font-medium text-gray-700">Placement Year</label>
                            <input type="number" id="year" wire:model.defer="year"
                                class="mt-1 block w-full p-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                            @error('year')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit"
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Add Student
                        </button>
                    </div>
                </form>
            </div>

            <!-- CSV Import Form -->
            <div x-show="tab === 'csv'" class="p-6 sm:p-8">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Import Data from CSV or XLSX File</h3>
                @if (session('success_csv'))
                    <div class="p-4 mb-4 bg-green-100 text-green-700 rounded-lg">
                        {{ session('success_csv') }}
                    </div>
                @endif
                 @if (session('error_csv'))
                    <div class="p-4 mb-4 bg-red-100 text-red-700 rounded-lg">
                        {{ session('error_csv') }}
                    </div>
                @endif
                <div class="prose prose-sm max-w-none text-gray-600">
                    <p>Upload a CSV or XLSX file with the following columns in the header row: <code>student_name</code>,
                        <code>company</code>, <code>branch</code>, <code>package</code>, <code>year</code>.</p>
                    <p>The file should not exceed 2MB.</p>
                </div>
                <form wire:submit.prevent="import" class="mt-6 space-y-4">
                    <div>
                        <label for="file-upload" class="sr-only">Choose file</label>
                        <input id="file-upload" type="file" wire:model="file"
                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                        @error('file')
                            <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex items-center gap-4">
                        <button type="submit"
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <span wire:loading.remove wire:target="import">Import</span>
                            <span wire:loading wire:target="import">Importing...</span>
                        </button>
                        <div wire:loading wire:target="file" class="text-sm text-gray-500">
                            Uploading...
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>