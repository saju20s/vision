<?php

namespace App\Livewire\Backend\Settings\Logo;

use App\Models\Setting;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\ValidationException;

class LogoIdentity extends Component
{
    use WithFileUploads;

    public $site_title, $site_url, $description, $keyword;
    public $logo, $favicon;

    public function mount()
    {
        $setting = Setting::find(1);
        if ($setting) {
            $this->site_title = $setting->site_title;
            $this->site_url = $setting->site_url;
            $this->description = $setting->description;
            $this->keyword = $setting->keyword;
        }
    }

    public function store()
    {
        try {
            $this->validate([
                'site_title' => 'required|string|max:255',
                'site_url' => 'required|url',
                'description' => 'nullable|string',
                'keyword' => 'nullable|string',
                'logo' => 'nullable|image|max:1024',
                'favicon' => 'nullable|image|max:512',
            ]);

            $setting = Setting::find(1);

            if (!$setting) {
                $setting = new Setting();
            }

            $setting->site_title = $this->site_title;
            $setting->site_url = $this->site_url;
            $setting->description = $this->description;
            $setting->keyword = $this->keyword;

            // Delete old logo if new uploaded
            if ($this->logo) {
                if ($setting->logo && file_exists(public_path('storage/' . $setting->logo))) {
                    unlink(public_path('storage/' . $setting->logo));
                }
                $setting->logo = $this->logo->store('settings', 'public');
            }

            // Delete old favicon if new uploaded
            if ($this->favicon) {
                if ($setting->favicon && file_exists(public_path('storage/' . $setting->favicon))) {
                    unlink(public_path('storage/' . $setting->favicon));
                }
                $setting->favicon = $this->favicon->store('settings', 'public');
            }

            $setting->save();

            $this->dispatch('toastr:success', message: 'Setting Updated successfully.');
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
        $logoidentity = Setting::findOrFail(1);

        return view('livewire.backend.settings.logo.logo-identity', [
            'datas' => $logoidentity,
        ])->layout('backend.template.body');
    }
}
