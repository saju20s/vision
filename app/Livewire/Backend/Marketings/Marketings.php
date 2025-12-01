<?php

namespace App\Livewire\Backend\Marketings;

use App\Models\Bill;
use Livewire\Component;
use App\Models\Marketing;
use Livewire\WithPagination;

class Marketings extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $deleteId;
    public $search = '';
    public $statusFilter = true;
    public $typeFilter = null;

    public function setTypeFilter($type)
    {
        if ($this->typeFilter === $type) {
            $this->typeFilter = null;
        } else {
            $this->typeFilter = $type;
        }

        $this->resetPage();
    }


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

        $marketing = Marketing::findOrFail($this->deleteId);


        $marketing->delete();
        $this->deleteId = null;

        $this->dispatch('toastr:success', message: 'Marketing deleted successfully.');
    }

    public function toggleStatus($id)
    {
        $doctor = Marketing::findOrFail($id);
        $doctor->is_active = !$doctor->is_active;
        $doctor->save();

        $status = $doctor->is_active ? 'activated' : 'deactivated';
        $this->dispatch('toastr:success', message: "Doctor $status successfully.");
    }

    public function setStatusFilter($status)
    {
        $this->statusFilter = $status; // true = Active, false = Inactive
        $this->resetPage();
    }

    public function formatCount($count)
    {
        if ($count >= 1000000) {
            return number_format($count / 1000000, 1) . 'M';
        } elseif ($count >= 1000) {
            return number_format($count / 1000, 1) . 'K';
        } else {
            return $count;
        }
    }



    public function render()
    {
        $marketings = Marketing::query()
            ->when(
                $this->search,
                fn($query) => $query->where(function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('phone', 'like', '%' . $this->search . '%');
                })
            )
            ->where('is_active', $this->statusFilter)
            ->when(
                $this->typeFilter,
                fn($q) => $q->where('type', $this->typeFilter)
            )
            ->latest()
            ->paginate(20);

        // Calculate totals for each marketing
        foreach ($marketings as $marketing) {
            $bills = Bill::where('marketing_id', $marketing->id)->get();
            $marketing->total_patients = $bills->unique('patient_id')->count();
            $marketing->total_amount = $bills->sum('total_amount');
            $marketing->total_commission = $bills->sum('marketing_commision');
        }

        $activeCount = $this->formatCount(Marketing::where('is_active', true)->count());
        $inactiveCount = $this->formatCount(Marketing::where('is_active', false)->count());

        return view('livewire.backend.marketings.marketings', [
            'datas' => $marketings,
            'activeCount' => $activeCount,
            'inactiveCount' => $inactiveCount,
        ])->layout('backend.template.body');
    }
}
