<?php

namespace App\Livewire\Backend\Settings\Header;

use App\Models\Setting;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\ValidationException;

class Header extends Component
{
    use WithFileUploads;
    
    public $logotext, $header_color, $menu_color, $header_text_color, $menu_text_color;
    public $headerColor = '#16A085';
    public $headerTextColor = '#FFFFFF';
    public $menuColor = '#980606';
    public $menuTextColor = '#FFFFFF';
    public $banner;
    public $lab_header_img;

    public function mount()
    {
        $setting = Setting::find(1);
        if ($setting) {
            $this->logotext = $setting->logotext;
            $this->header_color = $setting->header_color;
            $this->header_text_color = $setting->header_text_color;
            $this->menu_color = $setting->menu_color;
            $this->menu_text_color = $setting->menu_text_color;
        }
    }

    public function setHeaderColor()
    {
        $this->header_color = $this->headerColor;
    }

    public function setHeaderTextColor()
    {
        $this->header_text_color = $this->headerTextColor;
    }

    public function setMenuColor()
    {
        $this->menu_color = $this->menuColor;
    }

    public function setMenuTextColor()
    {
        $this->menu_text_color = $this->menuTextColor;
    }

    public function store()
    {
        try {
            $this->validate([
                'logotext' => 'required|string|max:255',
                'header_color' => 'nullable|string|max:255',
                'menu_color' => 'nullable|string|max:255',
                'banner' => 'nullable|image|max:1024',
                'lab_header_img' => 'nullable|image|max:1024',
            ]);

            $setting = Setting::find(1);

            if (!$setting) {
                $setting = new Setting();
            }

            // Delete old banner if new uploaded
            if ($this->banner) {
                if ($setting->banner && file_exists(public_path('storage/' . $setting->banner))) {
                    unlink(public_path('storage/' . $setting->banner));
                }
                $setting->banner = $this->banner->store('settings', 'public');
            }

            // Delete old Lab Header Image if new uploaded
            if ($this->lab_header_img) {
                if ($setting->lab_header_img && file_exists(public_path('storage/' . $setting->lab_header_img))) {
                    unlink(public_path('storage/' . $setting->lab_header_img));
                }
                $setting->lab_header_img = $this->lab_header_img->store('settings', 'public');
            }

            $setting->logotext = $this->logotext;
            $setting->header_color = $this->header_color;
            $setting->header_text_color = $this->header_text_color;
            $setting->menu_color = $this->menu_color;
            $setting->menu_text_color = $this->menu_text_color;


            $setting->save();

            $this->dispatch('toastr:success', message: 'Header Setting Updated successfully.');
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
        $headerSetting = Setting::findOrFail(1);

        return view('livewire.backend.settings.header.header', [
            'datas' => $headerSetting,
        ])->layout('backend.template.body');
    }
}
