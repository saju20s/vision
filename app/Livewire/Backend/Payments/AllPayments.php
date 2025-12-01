<?php

namespace App\Livewire\Backend\Payments;

use App\Models\Payment;
use App\Models\Setting;
use Livewire\Component;
use Livewire\WithPagination;

class AllPayments extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $deleteId;
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
    }

    public function delete()
    {

        $payment = Payment::findOrFail($this->deleteId);


        $payment->delete();
        $this->deleteId = null;

        $this->dispatch('toastr:success', message: 'Payment deleted successfully.');
    }


    public function render()
    {
        $payments = Payment::latest()->paginate(50);
        $setting = Setting::find(1);
        return view('livewire.backend.payments.all-payments', [
            'datas' => $payments,
            'setting' => $setting,
        ])->layout('backend.template.body');
    }
}
