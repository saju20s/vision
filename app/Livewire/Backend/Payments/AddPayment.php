<?php

namespace App\Livewire\Backend\Payments;

use App\Models\User;
use App\Models\Payment;
use Livewire\Component;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;

class AddPayment extends Component
{
    public $payment_method = 'bkash';
    public $transaction_id;
    public $amount = 1000;
    public $phone;
    public $date;

    public function mount()
    {
        $this->date = now()->toDateString();
    }

    protected function rules()
    {
        return [
            'payment_method' => ['required', Rule::in(['bkash', 'nagad', 'manual'])],
            'transaction_id' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'date' => ['required', 'string', 'max:255'],
            'amount' => ['required', 'numeric', 'min:1000', 'max:1000'],
        ];
    }

    public function payNow()
    {


        try {
            $this->validate();

            // Check duplicate transaction
            if (Payment::where('transaction_id', $this->transaction_id)->exists()) {
                $this->dispatch('toastr:error', message: 'এই transaction id ইতোমধ্যে ব্যবহার করা হয়েছে।');
                return;
            }


            // Save payment without user_id
            Payment::create([
                'payment_method' => $this->payment_method,
                'amount' => $this->amount,
                'transaction_id' => $this->transaction_id,
                'phone' => $this->phone,
                'paid_for_month' => $this->date,
            ]);

            // Activate all users
            User::query()->update(['is_active' => true]);

            $this->dispatch('toastr:success', message: 'Payment added successfully.');

            // Reset form fields
            $this->reset(['transaction_id', 'phone']);
        } catch (ValidationException $e) {
            foreach ($e->validator->getMessageBag()->all() as $message) {
                $this->dispatch('toastr:error', message: $message);
            }
        } catch (\Exception $e) {
            $this->dispatch('toastr:error', message: $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.backend.payments.add-payment')->layout('backend.template.body');
    }
}
