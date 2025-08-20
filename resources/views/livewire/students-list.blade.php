<?php

use Livewire\Volt\Component;
use App\Models\Placement;

new class extends Component {
    public $students;

    public function mount()
    {
        $this->students = Placement::all();
    }
};
?>

<div class="max-w-4xl mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold mb-6">All Students</h2>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-2 px-4 border">Name</th>
                    <th class="py-2 px-4 border">Branch</th>
                    <th class="py-2 px-4 border">Year</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr class="hover:bg-gray-50">
                    <td class="py-2 px-4 border">{{ $student->student_name }}</td>
                    <td class="py-2 px-4 border">{{ $student->branch }}</td>
                    <td class="py-2 px-4 border">{{ $student->year }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
