<?php

namespace App\Livewire\Backend\Settings\Smtp;

use App\Models\Smtp;
use Livewire\Component;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Validation\ValidationException;

class SmtpUpdate extends Component
{
    public $mail_mailer = '';
    public $mail_host = '';
    public $mail_port = '';
    public $mail_username = '';
    public $mail_password = '';
    public $mail_encryption = '';
    public $mail_address = '';
    public $mail_from_name = '';
    

    public function mount()
    {
        if ($smtp = Smtp::find(1)) {
            $this->fill([
                'mail_mailer'     => $smtp->mail_mailer,
                'mail_host'       => $smtp->mail_host,
                'mail_port'       => $smtp->mail_port,
                'mail_username'   => $smtp->mail_username,
                'mail_password'   => $smtp->mail_password,
                'mail_encryption' => $smtp->mail_encryption,
                'mail_address'    => $smtp->mail_address,
                'mail_from_name'    => $smtp->mail_from_name,
            ]);
        }
    }

    protected function updateEnv($key, $value)
    {
        $path = base_path('.env');

        if (! File::exists($path)) {
            return;
        }

        $escaped = preg_quote($key, '/');

        $env = File::get($path);

        $line = $key . '=' . $this->quoteEnv($value);

        if (preg_match("/^{$escaped}=.*/m", $env)) {
            $env = preg_replace("/^{$escaped}=.*/m", $line, $env);
        } else {
            $env .= PHP_EOL . $line;
        }

        File::put($path, $env);
    }

    protected function quoteEnv($value)
    {
        if ($value === null) {
            return '';
        }


        if (preg_match('/\s|#|=/', $value)) {
            $value = str_replace('"', '\"', $value);
            return "\"{$value}\"";
        }

        return $value;
    }

    public function store()
    {


        try {

            $this->validate([
                'mail_mailer'     => 'required|string|max:255',
                'mail_host'       => 'required|string|max:255',
                'mail_port'       => 'required|integer|min:1|max:65535',
                'mail_username'   => 'required|string|max:255',
                'mail_password'   => 'required|string|max:255',
                'mail_encryption' => 'nullable|string|max:255',
                'mail_address'    => 'required|email|max:255',
                'mail_from_name'    => 'required|string|max:255',
            ]);


            $smtp = Smtp::find(1) ?? new Smtp();
            $smtp->mail_mailer     = $this->mail_mailer;
            $smtp->mail_host       = $this->mail_host;
            $smtp->mail_port       = $this->mail_port;
            $smtp->mail_username   = $this->mail_username;
            $smtp->mail_password   = $this->mail_password;
            $smtp->mail_encryption = $this->mail_encryption;
            $smtp->mail_address    = $this->mail_address;
            $smtp->mail_from_name    = $this->mail_from_name;
            $smtp->save();

            $this->updateEnv('MAIL_MAILER', $this->mail_mailer);
            $this->updateEnv('MAIL_HOST', $this->mail_host);
            $this->updateEnv('MAIL_PORT', $this->mail_port);
            $this->updateEnv('MAIL_USERNAME', $this->mail_username);
            $this->updateEnv('MAIL_PASSWORD', $this->mail_password);
            $this->updateEnv('MAIL_ENCRYPTION', $this->mail_encryption);
            $this->updateEnv('MAIL_FROM_ADDRESS', $this->mail_address);
            $this->updateEnv('MAIL_FROM_NAME', $this->mail_from_name);

            Artisan::call('config:clear');

            $this->dispatch('toastr:success', message: 'SMTP updated successfully!');
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
        $smtp = Smtp::findOrFail(1);

        return view('livewire.backend.settings.smtp.smtp-update', [
            'datas' => $smtp,
        ])->layout('backend.template.body');
    }
}
