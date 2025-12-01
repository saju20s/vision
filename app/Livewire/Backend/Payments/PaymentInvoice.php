<?php

namespace App\Livewire\Backend\Payments;

use App\Models\Payment;
use Livewire\Component;

class PaymentInvoice extends Component
{
    public $payment;

    public function mount($id)
    {
        $this->payment = Payment::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.backend.payments.payment-invoice')
            ->layout('backend.template.body');
    }
}
