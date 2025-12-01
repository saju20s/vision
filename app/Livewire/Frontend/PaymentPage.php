<?php

namespace App\Livewire\Frontend;

use App\Models\Payment;
use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rule;

class PaymentPage extends Component
{


    public $payment_method = 'bkash';
    public $transaction_id;
    public $amount = 1000;
    public $phone;

    protected function rules()
    {
        return [
            'payment_method' => ['required', Rule::in(['bkash', 'nagad', 'manual'])],
            'transaction_id' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'amount' => ['required', 'numeric', 'min:1000', 'max:1000'],
        ];
    }

    public function payNow()
    {
        $this->validate();

        // Check duplicate transaction
        if (Payment::where('transaction_id', $this->transaction_id)->exists()) {
            $this->addError('transaction_id', 'এই transaction id ইতোমধ্যে ব্যবহার করা হয়েছে।');
            return;
        }



        // Save payment without user_id
        Payment::create([
            'payment_method' => $this->payment_method,
            'amount' => $this->amount,
            'transaction_id' => $this->transaction_id,
            'phone' => $this->phone,
            'paid_for_month' => now()->format('Y-m-01'),
        ]);

        // Activate all users
        User::query()->update(['is_active' => true]);

        session()->flash('success', 'আপনার পেমেন্ট রেকর্ড করা হয়েছে।');

        // Reset form fields
        $this->reset(['transaction_id', 'phone']);
    }

    public function render()
    {
        return view('livewire.frontend.payment-page')->layout('frontend.template.body');
    }
}
