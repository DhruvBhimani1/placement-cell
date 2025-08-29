<?php

use App\Models\User;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use App\Models\StudentProfile; // Import StudentProfile model

new class extends Component {
    use WithFileUploads;

    public User $user;
    public $photo;
    public $resume;
    public string $bio = '';
    public string $skills = '';
    public string $linkedin_url = '';
    public string $github_url = '';
    public string $twitter_url = '';


    public function mount(): void
    {
        $this->user = auth()->user();

        // Create StudentProfile if it doesn't exist
        if (!$this->user->profile) {
            $this->user->profile()->create(['user_id' => $this->user->id]);
            $this->user->load('profile'); // Reload the user to get the newly created profile
        }

        $this->bio = $this->user->profile->bio ?? '';
        $this->skills = $this->user->profile->skills ?? '';
        $this->linkedin_url = $this->user->profile->linkedin_url ?? '';
        $this->github_url = $this->user->profile->github_url ?? '';
        $this->twitter_url = $this->user->profile->twitter_url ?? '';
    }

    public function update()
    {
        $this->validate([
            'photo' => 'nullable|image|max:1024', // 1MB Max
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:10240', // 10MB Max
            'bio' => 'nullable|string|max:1000',
            'skills' => 'nullable|string|max:255',
            'linkedin_url' => 'nullable|url',
            'github_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
        ]);

        $this->user->profile->update([
            'bio' => $this->bio,
            'skills' => $this->skills,
            'linkedin_url' => $this->linkedin_url,
            'github_url' => $this->github_url,
            'twitter_url' => $this->twitter_url,
        ]);

        if ($this->photo) {
            $this->user->profile->update([
                'profile_picture' => $this->photo->store('profile-photos', 'public'),
            ]);
        }

        if ($this->resume) {
            $this->user->profile->update([
                'resume_path' => $this->resume->store('resumes', 'public'),
            ]);
        }

        $this->dispatch('saved');
    }
}; ?>

<div class="bg-white shadow-md rounded-lg p-6">
    <header class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800">
            {{ __('Student Profile Information') }}
        </h2>

        <p class="mt-2 text-gray-600">
            {{ __("Update your account's profile information and add your social media links.") }}
        </p>
    </header>

    <form wire:submit.prevent="update" class="space-y-8">
        <!-- Profile Photo -->
        <div class="flex items-center space-x-6">
            @if ($photo)
                <img class="h-24 w-24 rounded-full object-cover" src="{{ $photo->temporaryUrl() }}" alt="Profile Photo">
            @elseif ($user->profile->profile_picture)
                <img class="h-24 w-24 rounded-full object-cover" src="{{ asset('storage/' . $user->profile->profile_picture) }}" alt="Profile Photo">
            @else
                <div class="h-24 w-24 rounded-full bg-gray-200 flex items-center justify-center">
                    <svg class="h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
            @endif
            <div>
                <x-input-label for="photo" :value="__('Profile Photo')" />
                <x-text-input wire:model="photo" type="file" id="photo" class="mt-1 block w-full" />
                <x-input-error :messages="$errors->get('photo')" class="mt-2" />
            </div>
        </div>

        <!-- Resume -->
        <div>
            <x-input-label for="resume" :value="__('Resume (PDF, DOC, DOCX)')" />
            <x-text-input wire:model="resume" type="file" id="resume" class="mt-1 block w-full" />
            <x-input-error :messages="$errors->get('resume')" class="mt-2" />
        </div>

        <!-- Bio -->
        <div>
            <x-input-label for="bio" :value="__('Bio')" />
            <textarea wire:model="bio" id="bio" rows="4" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"></textarea>
            <x-input-error :messages="$errors->get('bio')" class="mt-2" />
        </div>

        <!-- Skills -->
        <div>
            <x-input-label for="skills" :value="__('Skills (comma separated)')" />
            <x-text-input wire:model="skills" type="text" id="skills" class="mt-1 block w-full" />
            <x-input-error :messages="$errors->get('skills')" class="mt-2" />
        </div>

        <!-- Social Media Links -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <x-input-label for="linkedin_url" :value="__('LinkedIn URL')" />
                <x-text-input wire:model="linkedin_url" type="url" id="linkedin_url" class="mt-1 block w-full" placeholder="https://www.linkedin.com/in/your-profile" />
                <x-input-error :messages="$errors->get('linkedin_url')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="github_url" :value="__('GitHub URL')" />
                <x-text-input wire:model="github_url" type="url" id="github_url" class="mt-1 block w-full" placeholder="https://github.com/your-username" />
                <x-input-error :messages="$errors->get('github_url')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="twitter_url" :value="__('Twitter URL')" />
                <x-text-input wire:model="twitter_url" type="url" id="twitter_url" class="mt-1 block w-full" placeholder="https://twitter.com/your-username" />
                <x-input-error :messages="$errors->get('twitter_url')" class="mt-2" />
            </div>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button wire:loading.attr="disabled">
                <span wire:loading.remove>{{ __('Save') }}</span>
                <span wire:loading>{{ __('Saving...') }}</span>
            </x-primary-button>

            <x-action-message class="me-3" on="saved">
                {{ __('Saved.') }}
            </x-action-message>
        </div>
    </form>
</div>
