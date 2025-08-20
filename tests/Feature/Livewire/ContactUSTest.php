<?php

use App\Livewire\ContactUS;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(ContactUS::class)
        ->assertStatus(200);
});
