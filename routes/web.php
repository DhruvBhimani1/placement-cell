<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('about', 'about')->name('about');
Route::view('placements/summary', 'summary')->name('placements.summary');
Route::view('placements/students', 'students')->name('placements.students');
Route::view('companies', 'companies')->name('companies');
Route::view('resources', 'resources')->name('resources');
Route::view('contact', 'contact')->name('contact');

Route::get('dashboard', DashboardController::class)
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');
    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');


    Volt::route('students', 'students-list')->name('students.list');
    Volt::route('students/add', 'import-students')->name('students.add');
    Volt::route('students/edit/{id}', 'student-edit')->name('students.edit');
});

require __DIR__ . '/auth.php';