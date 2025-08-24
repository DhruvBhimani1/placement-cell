<?php

use App\Models\Placement;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

new class extends Component {
    use WithPagination;

    public $search = '';

    public $year = '';

    public $package = '';

    public $showModal = false;
    public $deleteId = null;

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        $this->showModal = true;
    }

    public function delete()
    {
        $student = Placement::findOrFail($this->deleteId);
        $student->delete();

        session()->flash('success', 'Student deleted successfully!');
        $this->showModal = false;
        $this->deleteId = null;
    }

    public function with(): array
    {
        $students = Placement::query()
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('student_name', 'like', "%{$this->search}%")->orWhere('company', 'like', "%{$this->search}%");
                });
            })
            ->when($this->year, function ($query) {
                $query->where('year', $this->year);
            })
            ->when(filled($this->package), function ($query) {
                $query->where('package', '>=', $this->package);
            })
            ->orderByDesc('id')
            ->paginate(20);

        $years = Placement::query()->select('year')->distinct()->orderBy('year', 'desc')->pluck('year');

        return [
            'students' => $students,
            'years' => $years,
        ];
    }
};
?>

<div class="max-w-7xl mx-auto">
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
        <div class="p-6 sm:p-8 border-b border-gray-200">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Placed Students Directory</h2>
                    <p class="mt-1 text-sm text-gray-600">Browse and manage student placement records.</p>
                </div>
                <div class="w-full md:w-auto mt-4 md:mt-0">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input type="text" wire:model.live.debounce.300ms="search"
                            placeholder="Search by name or company..."
                            class="block w-full md:w-64 pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                    </div>
                </div>
            </div>
            <div class="mt-6 flex flex-col md:flex-row items-center gap-4">
                <div class="w-full md:w-auto">
                    <label for="year" class="sr-only">Year</label>
                    <select id="year" wire:model.live="year"
                        class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        <option value="">Filter by Year</option>
                        @foreach ($years as $y)
                            <option value="{{ $y }}">{{ $y }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-full md:w-auto">
                    <label for="package" class="sr-only">Min Package</label>
                    <input id="package" type="number" wire:model.live.debounce.300ms="package"
                        placeholder="Min Package (LPA)"
                        class="block w-full p-3 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                </div>
            </div>
        </div>

        @if (session('success'))
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show" x-transition
                class="p-4 bg-green-50 border-l-4 border-green-400">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Company</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Package (LPA)</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Branch</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Year
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($students as $student)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $student->student_name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $student->company }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $student->package }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $student->branch }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $student->year }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('students.edit', $student->id) }}"
                                    class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                <button wire:click="confirmDelete({{ $student->id }})"
                                    class="ml-4 text-red-600 hover:text-red-900">Delete</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-sm text-gray-500">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" aria-hidden="true">
                                    <path vector-effect="non-scaling-stroke" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2"
                                        d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h16a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2zm3-14a2 2 0 012-2h8a2 2 0 012 2v2H5V3z" />
                                </svg>
                                <h3 class="mt-2 text-sm font-medium text-gray-900">No students found</h3>
                                <p class="mt-1 text-sm text-gray-500">No records match your current filters.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($students->hasPages())
            <div class="p-4 sm:p-6 bg-white border-t border-gray-200">
                {{ $students->links() }}
            </div>
        @endif
    </div>

    <!-- Delete Confirmation Modal -->
    @if ($showModal)
        <div class="fixed inset-0 z-10 overflow-y-auto backdrop-blur-sm" aria-labelledby="modal-title" role="dialog"
            aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div
                    class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div
                                class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                <svg class="h-6 w-6 text-red-600" stroke="currentColor" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                    Delete Student Record
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">
                                        Are you sure you want to delete this record? This action is irreversible.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button wire:click="delete" type="button"
                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                            Confirm Delete
                        </button>
                        <button wire:click="$set('showModal', false)" type="button"
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
