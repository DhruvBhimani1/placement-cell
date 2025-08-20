<?php


use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use App\Models\Placement;
use Maatwebsite\Excel\Facades\Excel;

new class extends Component {
     use WithFileUploads;

    public $file;

    public function import()
    {
        $this->validate([
            'file' => 'required|mimes:csv,txt|max:2048',
        ]);

        $path = $this->file->getRealPath();
        $data = array_map('str_getcsv', file($path));
        $header = array_map('strtolower', $data[0]);
        unset($data[0]); // remove header row

        foreach ($data as $row) {
            $row = array_combine($header, $row);

            Placement::create([
                'student_name'    => $row['student_name'],
                'company' => $row['company'],
                'branch'  => $row['branch'],
                'package' => $row['package'],
                'year'    => $row['year'],
            ]);
        }

        session()->flash('success', 'Placements imported successfully!');
    }
};
?>
<div class="max-w-lg mx-auto p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-xl font-bold mb-4">Import Placement Data (CSV)</h2>

    @if (session()->has('success'))
        <div class="p-2 mb-3 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="import" class="space-y-4">
        <input type="file" wire:model="file" class="block w-full text-sm border rounded p-2" />

        @error('file') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
            Import CSV
        </button>
    </form>
</div>
