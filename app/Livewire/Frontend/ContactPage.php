<?php

namespace App\Livewire\Frontend;

use App\Models\Message;
use App\Models\Setting;
use Livewire\Component;

class ContactPage extends Component
{
    public $name;
    public $email;
    public $phone;
    public $message;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|numeric',
        'message' => 'required|string',
    ];

    public function store()
    {
        // Validate data
        $validated = $this->validate();

        // Create Blog
        Message::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'message' => $this->message,
        ]);

        // Reset form inputs
        $this->reset();

        session()->flash('success', 'Your message has been sent successfully!');
    }




    public function render()
    {
        return view('livewire.frontend.contact-page', [
            'setting' => Setting::find(1),
        ])->layout('frontend.template.body');
    }
}
