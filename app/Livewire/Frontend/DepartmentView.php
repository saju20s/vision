<?php

namespace App\Livewire\Frontend;

use App\Models\Setting;
use Livewire\Component;
use App\Models\Department;

class DepartmentView extends Component
{
    public $departmentId;
    public $department;

    public function mount($id)
    {
        $this->departmentId = $id;
        $this->department = Department::findOrFail($id);
    }

    public function render()
    {
        $setting = Setting::find(1);
        return view('livewire.frontend.department-view',[
            'setting' => $setting
        ])->layout('frontend.template.body');
    }
}
