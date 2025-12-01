<?php

namespace App\Livewire\Backend\Marketings;

use App\Models\Bill;
use Livewire\Component;
use Illuminate\Validation\ValidationException;

class MarketingCommision extends Component
{
    public $invoice_number;
    public $commision_amount;
    public $commision_type;
    public $bill; // matched bill

    public function searchInvoice()
    {
        $this->bill = Bill::where('invoice_number', $this->invoice_number)
            ->with('marketing')
            ->first();

        if (!$this->bill) {
            $this->bill = null;
            $this->dispatch('toastr:error', message: 'Invoice not found!');
        } elseif (!$this->bill->marketing_id) {
            $this->dispatch('toastr:error', message: 'This bill has no marketing assigned!');
        }
    }


    public function store()
    {
        try {
            $this->validate([
                'invoice_number'    => 'required|string',
                'commision_amount'  => 'required|numeric|min:0',
                'commision_type'    => 'required|in:percentage,amount',
            ]);

            $bill = Bill::where('invoice_number', $this->invoice_number)->first();

            if (!$bill) {
                throw new \Exception("Invoice not found!");
            }

            if (!$bill->marketing_id) {
                throw new \Exception("This bill has no marketing assigned!");
            }

            // calculation
            if ($this->commision_type === 'percentage') {
                $marketing_commision = ($bill->total_amount * $this->commision_amount) / 100;
            } else {
                $marketing_commision = $this->commision_amount;
            }

            $marketing_commision = intval(round($marketing_commision));

            $bill->update([
                'marketing_commision_type' => $this->commision_type,
                'marketing_commision'      => $marketing_commision,
            ]);

            $this->dispatch('toastr:success', message: "Marketing commission added successfully!");
            $this->reset(['invoice_number', 'commision_amount', 'commision_type', 'bill']);
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
        return view('livewire.backend.marketings.marketing-commision', [
            'bill' => $this->bill,
        ])->layout('backend.template.body');
    }
}
