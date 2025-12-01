<?php

namespace App\Livewire\Backend\Doctors;

use App\Models\Bill;
use App\Models\Doctor;
use Carbon\Carbon;
use Livewire\Component;

class DoctorHistory extends Component
{
    public $doctor;
    public $search = '';
    public $filter = 'all';
    public $bills;
    public $from_date;
    public $to_date;
    public $perPage = 31;

    public function mount($id)
    {
        $this->doctor = Doctor::findOrFail($id);
        $this->loadBills();
    }

    public function loadMore()
    {
        $this->perPage += 31; // ১০টা বাড়িয়ে দাও
        $this->loadBills();
    }


    public function updatedSearch()
    {
        $this->loadBills();
    }

    public function updatedFilter()
    {
        $this->loadBills();
    }

    // 🔹 Date submit button click হলে কল হবে
    public function filterByDate()
    {
        $this->loadBills();
    }

    private function loadBills()
    {
        $query = Bill::with('patient')
            ->where('doctor_id', $this->doctor->id);

        // Search by invoice number
        if (!empty($this->search)) {
            $query->where('invoice_number', 'like', "%{$this->search}%");
        }

        // 🔹 যদি custom date range দেওয়া থাকে → শুধু সেটাই ব্যবহার হবে
        if (!empty($this->from_date) && !empty($this->to_date)) {
            $query->whereBetween('created_at', [
                Carbon::parse($this->from_date)->startOfDay(),
                Carbon::parse($this->to_date)->endOfDay(),
            ]);
        } else {
            // নাহলে filter কাজ করবে
            if ($this->filter === 'this_month') {
                $query->whereMonth('created_at', Carbon::now()->month)
                    ->whereYear('created_at', Carbon::now()->year);
            } elseif ($this->filter === 'last_month') {
                $query->whereMonth('created_at', Carbon::now()->subMonth()->month)
                    ->whereYear('created_at', Carbon::now()->subMonth()->year);
            } elseif ($this->filter === 'last_year') {
                $query->where('created_at', '>=', Carbon::now()->subYear());
            }
        }

        // 🔹 এখানে পরিবর্তন
        $this->bills = $query->orderBy('created_at', 'desc')
            ->take($this->perPage) // প্রতি বার শুধু $perPage টা আনবে
            ->get();
    }



    public function render()
    {
        return view('livewire.backend.doctors.doctor-history')->layout('backend.template.body');
    }
}
