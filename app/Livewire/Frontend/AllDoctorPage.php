<?php

namespace App\Livewire\Frontend;

use App\Models\Doctor;
use App\Models\Setting;
use Livewire\Component;
use Livewire\WithPagination;

class AllDoctorPage extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    // form inputs (temporary)
    public $searchInput = '';
    public $departmentInput = 'All';

    // actual filter values
    public $searchTerm = '';
    public $department = 'All';

    public function updatingSearchInput()
    {
        $this->resetPage();
    }

    public function updatingDepartmentInput()
    {
        $this->resetPage();
    }

    // যখন submit button চাপা হবে
    public function applyFilter()
    {
        $this->searchTerm = $this->searchInput;
        $this->department = $this->departmentInput;
        $this->resetPage();
    }

    public function render()
    {
        $query = Doctor::query()
            ->where('is_active', true)
            ->latest();

        if (!empty($this->searchTerm)) {
            $query->where(function ($q) {
                $q->where('name', 'like', '%' . $this->searchTerm . '%')
                  ->orWhere('designation', 'like', '%' . $this->searchTerm . '%')
                  ->orWhere('specialization', 'like', '%' . $this->searchTerm . '%');
            });
        }

        if ($this->department !== 'All') {
            $query->where('specialization', $this->department);
        }

        $doctors = $query->paginate(12);

        $departments = Doctor::where('is_active', true)
            ->select('specialization')
            ->distinct()
            ->pluck('specialization');

        $setting= Setting::find(1);

        return view('livewire.frontend.all-doctor-page', [
            'datas' => $doctors,
            'departments' => $departments,
            'setting' => $setting
        ])->layout('frontend.template.body');
    }
}
