<?php

namespace App\Livewire;

use App\Models\StudentProfile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class StudentProfileEditor extends Component
{
    use WithFileUploads;

    public StudentProfile $profile;
    public ?User $user = null;
    public $bio;
    public $skills;
    public $resume;

    public function mount(User $user = null)
    {
        $this->user = $user ?? Auth::user();
        $this->profile = $this->user->profile()->firstOrNew();
        $this->bio = $this->profile->bio;
        $this->skills = $this->profile->skills;
    }

    public function save()
    {
        // Only the student themselves can update their profile
        if (Auth::id() !== $this->user->id) {
            abort(403);
        }

        $this->validate([
            'bio' => 'nullable|string|max:1000',
            'skills' => 'nullable|string|max:500',
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:2048', // 2MB Max
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

    public function render()
    {
        return view('livewire.student-profile-editor');
    }
}
