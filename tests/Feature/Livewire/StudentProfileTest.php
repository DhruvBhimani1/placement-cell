<?php

use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

beforeEach(function () {
    // Create an admin user for testing admin actions
    $this->admin = User::factory()->create(['role' => 'admin']);

    // Create two student users for testing permissions
    $this->student1 = User::factory()->create(['role' => 'student']);
    $this->student2 = User::factory()->create(['role' => 'student']);
});

test('a student can view their own profile editor', function () {
    actingAs($this->student1)
        ->get(route('profile.edit'))
        ->assertOk()
        ->assertSeeLivewire('profile-editor');
});

test('a student can update their profile', function () {
    Storage::fake('public');

    $file = UploadedFile::fake()->create('resume.pdf', 100, 'application/pdf');

    actingAs($this->student1);

    Livewire::test('profile-editor')
        ->set('bio', 'This is my new bio.')
        ->set('skills', 'PHP, Laravel, Testing')
        ->set('resume', $file)
        ->call('save');

    $this->student1->refresh();

    $profile = $this->student1->profile;
    expect($profile)->not->toBeNull();
    expect($profile->bio)->toBe('This is my new bio.');
    expect($profile->skills)->toBe('PHP, Laravel, Testing');
    expect($profile->resume_path)->not->toBeNull();

    Storage::disk('public')->assertExists($profile->resume_path);
});

test('an admin can view a student profile', function () {
    actingAs($this->admin)
        ->get(route('students.profile', $this->student1))
        ->assertOk()
        ->assertSee('Student Profile: ' . $this->student1->name);
});

test('a student cannot view another student profile page', function () {
    // The route for viewing other profiles is admin-only.
    // This test ensures a student gets a 'Forbidden' error.
    actingAs($this->student1)
        ->get(route('students.profile', $this->student2))
        ->assertForbidden();
});

test('a student cannot update another student profile', function () {
    actingAs($this->student1);

    // This test attempts to update student2's profile while authenticated as student1.
    // The component should prevent this via the abort(403) call.
    Livewire::test('profile-editor', ['user' => $this->student2])
        ->set('bio', 'malicious bio')
        ->call('save')
        ->assertForbidden();

    $this->student2->refresh();
    expect($this->student2->profile)->toBeNull();
});
