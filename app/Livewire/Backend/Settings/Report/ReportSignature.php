<?php

namespace App\Livewire\Backend\Settings\Report;

use Livewire\Component;
use App\Models\Setting;
use Livewire\WithFileUploads;
use Illuminate\Validation\ValidationException;

class ReportSignature extends Component
{
    use WithFileUploads;

    public $name, $qualification, $designation, $image;
    public $a_name, $a_qualification, $a_designation;
    public $u_name, $u_qualification, $u_designation;
    public $usg_signature;
    public $report_signature;

    public function mount()
    {
        $setting = Setting::find(1);
        if ($setting) {
            if ($setting->prepared_by) {
                $this->name = $setting->prepared_by['name'] ?? '';
                $this->qualification = $setting->prepared_by['qualification'] ?? '';
                $this->designation = $setting->prepared_by['designation'] ?? '';
            }

            if ($setting->authorized_by) {
                $this->a_name = $setting->authorized_by['name'] ?? '';
                $this->a_qualification = $setting->authorized_by['qualification'] ?? '';
                $this->a_designation = $setting->authorized_by['designation'] ?? '';
            }
        }
        if ($setting && $setting->usg_signature) {
            $this->u_name = $setting->usg_signature['name'] ?? '';
            $this->u_qualification = $setting->usg_signature['qualification'] ?? '';
            $this->u_designation = $setting->usg_signature['designation'] ?? '';
        }
        $this->report_signature = $setting->report_signature ?? null;
    }


    // Prepared By Save
    public function store()
    {
        try {
            $this->validate([
                'name' => 'required|string|max:255',
                'qualification' => 'nullable|string|max:255',
                'designation' => 'nullable|string|max:255',
            ]);

            Setting::updateOrCreate(
                ['id' => 1],
                [
                    'prepared_by' => [
                        'name' => $this->name,
                        'qualification' => $this->qualification,
                        'designation' => $this->designation,
                    ]
                ]
            );

            $this->dispatch('toastr:success', message: 'Prepared By Saved Successfully');
        } catch (ValidationException $e) {
            foreach ($e->validator->getMessageBag()->all() as $message) {
                $this->dispatch('toastr:error', message: $message);
            }
        } catch (\Exception $e) {
            $this->dispatch('toastr:error', message: $e->getMessage());
        }
    }

    // Authorized By Save
    public function Update()
    {
        try {
            $this->validate([
                'a_name' => 'required|string|max:255',
                'a_qualification' => 'nullable|string|max:255',
                'a_designation' => 'nullable|string|max:255',
            ]);

            Setting::updateOrCreate(
                ['id' => 1],
                [
                    'authorized_by' => [
                        'name' => $this->a_name,
                        'qualification' => $this->a_qualification,
                        'designation' => $this->a_designation,
                    ]
                ]
            );

            $this->dispatch('toastr:success', message: 'Authorized By Saved Successfully');
        } catch (ValidationException $e) {
            foreach ($e->validator->getMessageBag()->all() as $message) {
                $this->dispatch('toastr:error', message: $message);
            }
        } catch (\Exception $e) {
            $this->dispatch('toastr:error', message: $e->getMessage());
        }
    }

    // X-ray Report Signature 
    public function reportSignatureStore()
    {
        try {

            $setting = Setting::find(1);

            if ($this->image) {
                $imageName = $this->image->store('settings', 'public');
            } else {
                $imageName = $setting ? $setting->report_signature : null;
            }

            Setting::updateOrCreate(
                ['id' => 1],
                [
                    'report_signature' => $imageName,
                ]
            );

            $this->reset('image');

            $this->report_signature = $imageName;

            $this->dispatch('toastr:success', message: 'Report Signature Saved Successfully.');
        } catch (ValidationException $e) {
            foreach ($e->validator->getMessageBag()->all() as $message) {
                $this->dispatch('toastr:error', message: $message);
            }
        } catch (\Exception $e) {
            $this->dispatch('toastr:error', message: $e->getMessage());
        }
    }

    // USG Report Signature
    public function usgSignatureStore()
    {
        try {
            $this->validate([
                'u_name' => 'required|string|max:255',
                'u_qualification' => 'nullable|string|max:255',
                'u_designation' => 'nullable|string|max:255',
            ]);

            Setting::updateOrCreate(
                ['id' => 1],
                [
                    'usg_signature' => [
                        'name' => $this->u_name,
                        'qualification' => $this->u_qualification,
                        'designation' => $this->u_designation,
                    ]
                ]
            );

            $this->dispatch('toastr:success', message: 'USG Signature Saved Successfully');
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
        return view('livewire.backend.settings.report.report-signature')
            ->layout('backend.template.body');
    }
}
