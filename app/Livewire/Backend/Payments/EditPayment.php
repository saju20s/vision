<?php

namespace App\Livewire\Backend\Payments;

use App\Models\Payment;
use Livewire\Component;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;

class EditPayment extends Component
{
    public $payment;
    public $payment_method;
    public $transaction_id;
    public $amount;
    public $phone;
    public $date;
    public $status;

    public function mount($id)
    {
        $this->payment = Payment::findOrFail($id);

        $this->payment_method = $this->payment->payment_method;
        $this->transaction_id = $this->payment->transaction_id;
        $this->amount = $this->payment->amount;
        $this->phone = $this->payment->phone;
        $this->status = $this->payment->status;
        $this->date = $this->payment->paid_for_month;
    }

    protected function rules()
    {
        return [
            'payment_method' => ['required', Rule::in(['bkash', 'nagad', 'manual'])],
            'transaction_id' => [
                'required',
                'string',
                Rule::unique('payments', 'transaction_id')->ignore($this->payment->id)
            ],
            'phone' => ['required', 'string', 'max:20'],
            'date' => ['required', 'string', 'max:255'],
            'amount' => ['required', 'numeric', 'min:1000', 'max:1000'],
        ];
    }

    public function updatePayment()
    {
        try {
            $this->validate();

            $this->payment->update([
                'payment_method' => $this->payment_method,
                'transaction_id' => $this->transaction_id,
                'amount' => $this->amount,
                'phone' => $this->phone,
                'status' => $this->status,
                'paid_for_month' => $this->date,
            ]);

            $this->dispatch('toastr:success', message: 'Payment updated successfully');
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
        return view('livewire.backend.payments.edit-payment')
            ->layout('backend.template.body');
    }
}
