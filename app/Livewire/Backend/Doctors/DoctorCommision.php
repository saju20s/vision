<?php

namespace App\Livewire\Backend\Doctors;

use App\Models\Setting;
use Livewire\Component;
use Illuminate\Validation\ValidationException;

class DoctorCommision extends Component
{
    public $commision_amount, $commision_type;

    public function mount()
    {
        $commision = Setting::find(1);
        if ($commision && $commision->commision) {
            $data = json_decode($commision->commision, true);
            $this->commision_amount = $data['commision_amount'] ?? null;
            $this->commision_type = $data['commision_type'] ?? null;
        }
    }

    public function store()
    {
        try {
            $this->validate([
                'commision_type' => 'required|string|max:255',
                'commision_amount' => 'required|numeric|min:0',
            ]);

            $commision = Setting::find(1);

            if (!$commision) {
                $commision = new Setting();
            }

            // Save as JSON array
            $commision->commision = json_encode([
                'commision_amount' => $this->commision_amount,
                'commision_type' => $this->commision_type,
            ]);

            $commision->save();

            $this->dispatch('toastr:success', message: 'Commision Updated successfully.');
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
        $commision = Setting::findOrFail(1);
        return view('livewire.backend.doctors.doctor-commision', [
             'datas' => $commision,
        ])->layout('backend.template.body');
    }
}
