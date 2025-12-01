<?php

namespace App\Livewire\Backend\Payments;

use App\Models\Payment;
use App\Models\Setting;
use Livewire\Component;
use Livewire\WithPagination;

class AllPaymentList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';


    public function render()
    {

        $payments = Payment::where('status', 'approved')
            ->latest()
            ->paginate(50);
        $setting = Setting::find(1);
        return view('livewire.backend.payments.all-payment-list', [
            'datas' => $payments,
            'setting' => $setting,
        ])->layout('backend.template.body');
    }
}
