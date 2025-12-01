<?php

namespace App\Livewire\Backend\Reports;

use App\Models\Bill;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Investigation;

class ViewReports extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $statusFilter = 'pending'; // default

    public function toggleStatus($id)
    {
        $bill = Bill::find($id);
        if (!$bill) return;

        $bill->status = $bill->status === 'pending' ? 'complete' : 'pending';
        $bill->save();

        $this->dispatch('toastr:success', message: 'Report Completed');
    }

    public function setFilter($status)
    {
        $this->statusFilter = $status;
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
        // Counts for buttons
        $countPending = $this->formatCount(Bill::where('status', 'pending')->count());
        $countComplete = $this->formatCount(Bill::where('status', 'complete')->count());

        $user = auth()->user();
        $userRole = $user->getRoleNames()->first();

        // যদি Master Admin না হয়, তাহলে শুধু pending রিপোর্ট দেখাও
        if ($userRole !== 'Master Admin') {
            $this->statusFilter = 'pending';
        }

        $bills = Bill::with('patient')
            ->when($this->statusFilter, function ($query) {
                $query->where('status', $this->statusFilter);
            })
            ->when($this->search, function ($query) {
                $query->whereHas('patient', function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('phone', 'like', '%' . $this->search . '%');
                })->orWhere('invoice_number', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(10);

        return view('livewire.backend.reports.view-reports', [
            'datas' => $bills,
            'countPending' => $countPending,
            'countComplete' => $countComplete,
        ])->layout('backend.template.body');
    }
}
