<?php

namespace App\Livewire\Backend\Settings\Contact;

use App\Models\Setting;
use Livewire\Component;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Validation\ValidationException;

class Contact extends Component
{
    public $cphone, $cemail, $address, $map, $messenger_page_id, $country;

    public function mount()
    {
        $contact = Setting::find(1);
        if ($contact) {
            $this->cphone = $contact->cphone;
            $this->cemail = $contact->cemail;
            $this->address = $contact->address;
            $this->country = $contact->country;
            $this->map = $contact->map;
            $this->messenger_page_id = $contact->messenger_page_id;
        }
        
    }

    public function store()
    {
        try {
            $this->validate([
                'cphone' => 'required|string|max:255',
                'cemail' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'map' => 'required|string',
                'messenger_page_id' => 'nullable|string|max:200',
                'country' => 'nullable|string|max:255',
            ]);

            $contact = Setting::find(1);

            if (!$contact) {
                $contact = new Setting();
            }

            $contact->cphone = $this->cphone;
            $contact->cemail = $this->cemail;
            $contact->address = $this->address;
            $contact->map = $this->map;
            $contact->messenger_page_id = $this->messenger_page_id;
            $contact->country = $this->country;

            $contact->save();
            $this->updateEnvFile('APP_TIMEZONE', $this->country);

            // Success message
            $this->dispatch('toastr:success', message: 'Contact updated successfully.');
        } catch (ValidationException $e) {
            foreach ($e->validator->getMessageBag()->all() as $message) {
                $this->dispatch('toastr:error', message: $message);
            }
        } catch (\Exception $e) {
            $this->dispatch('toastr:error', message: $e->getMessage());
        }
    }

    protected function updateEnvFile($key, $value)
    {
        // Get the current path to the .env file
        $envFile = base_path('.env');

        // Get the contents of the .env file
        if (file_exists($envFile)) {
            $envContents = file_get_contents($envFile);

            // Replace the value of APP_TIMEZONE key if it exists, otherwise append it
            if (strpos($envContents, $key) !== false) {
                // Replace the existing key with the new value
                $envContents = preg_replace("/^{$key}=(.*)$/m", "{$key}={$value}", $envContents);
            } else {
                // Append the new key and value to the .env file
                $envContents .= "\n{$key}={$value}\n";
            }

            // Save the contents back to the .env file
            file_put_contents($envFile, $envContents);

            // Clear the cache to ensure the changes take effect
           Artisan::call('optimize:clear');
        }
    }


    public function render()
    {
        $contact = Setting::findOrFail(1);

        return view('livewire.backend.settings.contact.contact', [
            'datas' => $contact,
        ])->layout('backend.template.body');
    }
}
