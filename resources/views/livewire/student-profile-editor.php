<?php

use App\Models\StudentProfile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;

new class extends Component
{
    use WithFileUploads;

    public ?User $user;
    public StudentProfile $profile;

    // Form state
    public string $bio = '';
    public string $skills = '';
    public $resume;

    /**
     * Initialize the component state.
     */
    public function mount(User $user = null): void
    {
        $this->user = $user ?? Auth::user();
        $this->profile = $this->user->profile()->firstOrNew();

        $this->bio = $this->profile->bio ?? '';
        $this->skills = $this->profile->skills ?? '';
    }

    /**
     * Validate and save the profile information.
     */
    public function save(): void
    {
        // Manually authorize that the user can update the profile.
        if (Auth::id() !== $this->user->id) {
            abort(403, 'This action is unauthorized.');
        }

        $validated = $this->validate([
            'bio' => ['nullable', 'string', 'max:1000'],
            'skills' => ['nullable', 'string', 'max:500'],
            'resume' => ['nullable', 'file', 'mimes:pdf,doc,docx', 'max:2048'], // 2MB Max
        ]);

        $this->profile->user_id = $this->user->id;
        $this->profile->bio = $validated['bio'];
        $this->profile->skills = $validated['skills'];

        if ($this->resume) {
            // Store the new resume and update the path.
            $this->profile->resume_path = $this->resume->store('resumes', 'public');
        }

        $this->profile->save();

        // Use session flash for a simple success message.
        session()->flash('message', 'Profile successfully updated.');
    }
}; ?>

<div>
    <form wire:submit="save">
        <div class="space-y-6">
            <header>
                @if (auth()->id() === $this->user->id)
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Edit Your Profile</h2>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Update your bio, skills, and resume.</p>
                @else
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Student Profile: {{ $this->user->name }}</h2>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Viewing the profile of {{ $this->user->email }}.</p>
                @endif
            </header>

            {{-- Success Message --}}
            @if (session('message'))
                <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                    {{ session('message') }}
                </div>
            @endif

            {{-- Bio Field --}}
            <div>
                <label for="bio" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Bio</label>
                <textarea id="bio" wire:model="bio" rows="4"
                          class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:bg-gray-800 dark:border-gray-600 dark:text-white focus:ring-indigo-500 focus:border-indigo-500"
                          @disabled(auth()->id() !== $this->user->id)></textarea>
                @error('bio') <span class="mt-2 text-sm text-red-600">{{ $message }}</span> @enderror
            </div>

            {{-- Skills Field --}}
            <div>
                <label for="skills" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Skills</label>
                <input type="text" id="skills" wire:model="skills"
                       class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:bg-gray-800 dark:border-gray-600 dark:text-white focus:ring-indigo-500 focus:border-indigo-500"
                       placeholder="e.g., PHP, Laravel, JavaScript"
                       @disabled(auth()->id() !== $this->user->id)>
                <p class="mt-2 text-sm text-gray-500">Comma-separated list of your top skills.</p>
                @error('skills') <span class="mt-2 text-sm text-red-600">{{ $message }}</span> @enderror
            </div>

            {{-- Resume Field --}}
            <div>
                <label for="resume" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Resume</label>
                
                @if (auth()->id() === $this->user->id)
                    <div class="mt-1">
                        <input type="file" id="resume" wire:model="resume" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                        <div wire:loading wire:target="resume" class="mt-2 text-sm text-gray-500">Uploading...</div>
                    </div>
                @endif

                <div class="mt-2 text-sm text-gray-500">
                    @if ($this->profile->resume_path)
                        Current resume:
                        <a href="{{ Storage::url($this->profile->resume_path) }}" target="_blank" class="text-indigo-600 hover:underline">
                            View Resume
                        </a>
                    @else
                        No resume uploaded.
                    @endif
                </div>
                @error('resume') <span class="mt-2 text-sm text-red-600">{{ $message }}</span> @enderror
            </div>

            {{-- Save Button --}}
            @if (auth()->id() === $this->user->id)
                <div class="flex items-center gap-4">
                    <button type="submit" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Save Changes
                    </button>
                </div>
            @endif
        </div>
    </form>
</div>