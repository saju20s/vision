<?php

namespace App\Livewire\Backend\Settings\Footer;

use App\Models\Link;
use App\Models\Setting;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\ValidationException;

class Footer extends Component
{
    use WithFileUploads;

    public $footer_text, $copyright_text, $footer_color, $copyright_color, $ftr_image, $facebook, $youtube, $twitter, $linkedin;
    public $title, $link;
    public $footerColor = '#16A085';
    public $copyrightColor = '#980606';
    public $deleteId;

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
    }

    public function delete()
    {
        $link = Link::findOrFail($this->deleteId);

        $link->delete();
        $this->deleteId = null;

        $this->dispatch('toastr:success', message: 'Link deleted successfully.');
    }


    public function mount()
    {
        $setting = Setting::find(1);
        if ($setting) {
            $this->footer_text = $setting->footer_text;
            $this->copyright_text = $setting->copyright_text;
            $this->footer_color = $setting->footer_color;
            $this->copyright_color = $setting->copyright_color;
            $this->facebook = $setting->facebook;
            $this->youtube = $setting->youtube;
            $this->twitter = $setting->twitter;
            $this->linkedin = $setting->linkedin;
        }
    }

    public function setFooterColor()
    {
        $this->footer_color = $this->footerColor;
    }

    public function setCopyrightColor()
    {
        $this->copyright_color = $this->copyrightColor;
    }

    public function store()
    {
        try {
            $this->validate([
                'footer_text' => 'required|string|max:255',
                'copyright_text' => 'required|string|max:255',
                'footer_color' => 'required|string|max:255',
                'copyright_color' => 'required|string|max:255',
                'ftr_image' => 'nullable|image|max:1024',
            ]);

            $setting = Setting::find(1);

            if (!$setting) {
                $setting = new Setting();
            }

            $setting->footer_text = $this->footer_text;
            $setting->copyright_text = $this->copyright_text;
            $setting->footer_color = $this->footer_color;
            $setting->copyright_color = $this->copyright_color;
            $setting->facebook = $this->facebook;
            $setting->youtube = $this->youtube;
            $setting->twitter = $this->twitter;
            $setting->linkedin = $this->linkedin;

            // Delete old ftr_image if new uploaded
            if ($this->ftr_image) {
                if ($setting->ftr_image && file_exists(public_path('storage/' . $setting->ftr_image))) {
                    unlink(public_path('storage/' . $setting->ftr_image));
                }
                $setting->ftr_image = $this->ftr_image->store('settings', 'public');
            }


            $setting->save();

            // Success message
            $this->dispatch('toastr:success', message: 'Footer Setting updated successfully.');
        } catch (ValidationException $e) {
            foreach ($e->validator->getMessageBag()->all() as $message) {
                $this->dispatch('toastr:error', message: $message);
            }
        } catch (\Exception $e) {
            $this->dispatch('toastr:error', message: $e->getMessage());
        }
    }

    public function linkStore()
    {
        try {
            $this->validate([
                'title' => 'required|string|max:255',
                'link' => 'required|url|max:255',
            ]);

            Link::create([
                'title' => $this->title,
                'link' => $this->link,
                'position' => 'footer',
            ]);

            $this->reset('title', 'link');

            $this->dispatch('toastr:success', message: 'Footer Link Added successfully.');
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
        $footerSetting = Setting::findOrFail(1);
        $links = Link::where('position', 'footer')->latest()->get();

        return view('livewire.backend.settings.footer.footer', [
            'datas' => $footerSetting,
            'links' => $links,
        ])->layout('backend.template.body');
    }
}
