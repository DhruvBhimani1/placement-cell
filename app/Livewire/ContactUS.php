<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUsMail;
use Illuminate\Support\Facades\Log;

class ContactUs extends Component
{
    public $email;
    public $subject;
    public $message;
    public $success_message = 'Your message has been sent successfully.';
    public $error_message = 'There was an error sending your message. Please try again later.';
    protected $rules = [
        'email' => 'required|email',
        'subject' => 'required|max:255',
        'message' => 'required|max:255',
    ];
    public function sendEmail()
    {
        $this->validate();
        try {
            Mail::to('dhruv22bhimani@gmail.com')
                ->send(new ContactUsMail([
                    'email' => $this->email,
                    'subject' => $this->subject,
                    'message' => $this->message,
                ]));
            $this->dispatch('show-ContactUs-success');
            $this->reset();
        } catch (\Exception $e) {
            Log::error('Error sending contact form email: ' . $e->getMessage());
            $this->dispatch('show-ContactUs-error');
        }
    }
    public function render()
    {
        return view('livewire.contact-us');
    }
}
