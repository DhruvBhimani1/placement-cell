<?php

use App\Models\User;
use App\Models\StudentProfile;
use Illuminate\Support\Facades\Auth;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;

new class extends Component {
    use WithFileUploads;

    public StudentProfile $profile;
    public ?User $user = null;
    public $bio;
    public $skills;
    public $resume;

    public function mount(User $user = null): void
    {
        $this->user = $user ?? Auth::user();
        $this->profile = $this->user->profile()->firstOrNew();
        $this->bio = $this->profile->bio;
        $this->skills = $this->profile->skills;
    }

    public function save(): void
    {
        if (Auth::id() !== $this->user->id) {
            abort(403);
        }

        $this->validate([
            'bio' => 'nullable|string|max:1000',
            'skills' => 'nullable|string|max:500',
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $this->profile->user_id = $this->user->id;
        $this->profile->bio = $this->bio;
        $this->profile->skills = $this->skills;

        if ($this->resume) {
            $this->profile->resume_path = $this->resume->store('resumes', 'public');
        }

        $this->profile->save();

        session()->flash('message', 'Profile successfully updated.');
    }
}; ?>

<div>
    <form wire:submit.prevent="save">
        <div class="space-y-4">
            <div>
                @if (auth()->id() === $user->id)
                    <h2 class="text-xl font-semibold">Edit Your Profile</h2>
                    <p class="text-gray-600 dark:text-gray-400">Update your bio, skills, and resume.</p>
                @else
                    <h2 class="text-xl font-semibold">Student Profile: {{ $user->name }}</h2>
                    <p class="text-gray-600 dark:text-gray-400">Viewing the profile of {{ $user->email }}.</p>
                @endif
            </div>

            @if (session()->has('message'))
                <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                    {{ session('message') }}
                </div>
            @endif

            <div>
                <label for="bio" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Bio</label>
                <textarea id="bio" wire:model="bio" rows="4" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:text-white" @if(auth()->id() !== $user->id) disabled @endif></textarea>
                @error('bio') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="skills" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Skills</label>
                <input type="text" id="skills" wire:model="skills" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-800 dark:border-gray-600 dark:text-white" placeholder="e.g., PHP, Laravel, JavaScript" @if(auth()->id() !== $user->id) disabled @endif>
                <p class="mt-2 text-sm text-gray-500">Comma-separated list of your top skills.</p>
                @error('skills') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="resume" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Resume</label>
                @if (auth()->id() === $user->id)
                    <input type="file" id="resume" wire:model="resume" class="block w-full mt-1 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                    <div wire:loading wire:target="resume" class="mt-2 text-sm text-gray-500">Uploading...</div>
                @endif
                @if ($profile->resume_path)
                    <p class="mt-2 text-sm text-gray-500">
                        @if (auth()->id() === $user->id) Current resume: @endif
                        <a href="{{ Storage::url($profile->resume_path) }}" target="_blank" class="text-indigo-600 hover:underline">View Resume</a>
                    </p>
                @else
                    <p class="mt-2 text-sm text-gray-500">No resume uploaded.</p>
                @endif
                @error('resume') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            @if (auth()->id() === $user->id)
                <div>
                    <button type="submit" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Save Changes
                    </button>
                </div>
            @endif
        </div>
    </form>
</div>
