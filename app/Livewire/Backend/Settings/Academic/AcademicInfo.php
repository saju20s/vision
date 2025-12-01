<?php

namespace App\Livewire\Backend\Settings\Academic;

use App\Models\Setting;
use Livewire\Component;
use Illuminate\Validation\ValidationException;

class AcademicInfo extends Component
{
    public $years, $course, $students, $peoples;

    public function mount()
    {
        $academic = Setting::find(1);
        if ($academic) {
            $this->years = $academic->years;
            $this->course = $academic->course;
            $this->students = $academic->students;
            $this->peoples = $academic->peoples;
        }
    }

    public function store()
    {
        try {
            $this->validate([
                'years' => 'required|string|max:255',
                'course' => 'required|string|max:255',
                'students' => 'required|string|max:255',
                'peoples' => 'required|string|max:255',
            ]);

            $academic = Setting::find(1);

            if (!$academic) {
                $academic = new Setting();
            }

            $academic->years = $this->years;
            $academic->course = $this->course;
            $academic->students = $this->students;
            $academic->peoples = $this->peoples;

            $academic->save();

            $this->dispatch('toastr:success', message: 'Academic Updated successfully.');
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
        $academic = Setting::findOrFail(1);

        return view('livewire.backend.settings.academic.academic-info', [
            'datas' => $academic,
        ])->layout('backend.template.body');
    }
}
