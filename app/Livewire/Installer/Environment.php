<?php

namespace App\Livewire\Installer;


use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class Environment extends Component
{
    public array $envVars = [];
    public array $groups = [];
    public string $testMessage = '';
    public string $testType = '';
    public bool $testModalVisible = false;

    public function mount()
    {
        $this->loadEnv();
    }

    public function loadEnv()
    {
        $envPath = base_path('.env');
        $content = file_exists($envPath) ? file_get_contents($envPath) : '';

        foreach (explode("\n", $content) as $line) {
            $line = trim($line);
            if (!empty($line) && strpos($line, '=') !== false && substr($line, 0, 1) !== '#') {
                [$key, $value] = explode('=', $line, 2);
                $this->envVars[$key] = trim($value, "\"");
            }
        }

        $this->groups = [
            'app' => ['APP_NAME', 'APP_ENV', 'APP_DEBUG', 'APP_URL'],
            'database' => ['DB_CONNECTION', 'DB_HOST', 'DB_PORT', 'DB_DATABASE', 'DB_USERNAME', 'DB_PASSWORD'],
            'mail' => ['MAIL_MAILER', 'MAIL_HOST', 'MAIL_PORT', 'MAIL_USERNAME', 'MAIL_PASSWORD', 'MAIL_ENCRYPTION', 'MAIL_FROM_ADDRESS', 'MAIL_FROM_NAME'],
            'imap' => ['IMAP_HOST', 'IMAP_PORT', 'IMAP_ENCRYPTION', 'IMAP_VALIDATE_CERT', 'IMAP_USERNAME', 'IMAP_PASSWORD'],
        ];
    }

    public function save()
    {
        try {
            $this->validate([
                'envVars.APP_NAME' => 'required|string|max:255',
                'envVars.APP_ENV' => 'required|in:local,production,staging,testing',
                'envVars.APP_DEBUG' => 'required|in:true,false',
                'envVars.APP_URL' => 'required|url',
                'envVars.DB_CONNECTION' => 'required|in:mysql,pgsql,sqlite,sqlsrv',
                'envVars.DB_HOST' => 'required',
                'envVars.DB_PORT' => 'required|numeric',
                'envVars.DB_DATABASE' => 'required',
                'envVars.DB_USERNAME' => 'required',
            ]);

            // Test database connection first
            config(['database.connections.temp_test' => [
                'driver' => $this->envVars['DB_CONNECTION'],
                'host' => $this->envVars['DB_HOST'],
                'port' => $this->envVars['DB_PORT'],
                'database' => $this->envVars['DB_DATABASE'],
                'username' => $this->envVars['DB_USERNAME'],
                'password' => $this->envVars['DB_PASSWORD'],
            ]]);

            try {
                \DB::connection('temp_test')->getPdo();
            } catch (\PDOException $e) {
                $errorCode = $e->getCode();
                switch ($errorCode) {
                    case 1045:
                        $this->testMessage = '❌ Database error: Access denied (wrong username/password).';
                        break;
                    case 1049:
                        $this->testMessage = '❌ Database error: Unknown database name.';
                        break;
                    case 2002:
                        $this->testMessage = '❌ Database error: Could not connect to MySQL host.';
                        break;
                    default:
                        $this->testMessage = '❌ Database connection failed: ' . $e->getMessage();
                        break;
                }

                $this->testType = 'database';
                $this->testModalVisible = true;
                return; // Stop saving
            }

            // If DB test passes, save .env
            $envPath = base_path('.env');
            $envContent = '';

            foreach ($this->envVars as $key => $value) {
                $value = str_replace('"', '\"', trim($value));
                if (preg_match('/\s/', $value)) {
                    $value = "\"{$value}\"";
                }
                $envContent .= "{$key}={$value}\n";
            }

            file_put_contents($envPath, $envContent);

            // Clear cache so Laravel reads new env values
            Artisan::call('optimize:clear');

            if (!file_exists(public_path('storage'))) {
                Artisan::call('storage:link');
            }

            // Redirect to final step
            return redirect()->to('/installer/final');
        } catch (\Throwable $e) {
            logger()->error('Installer save error: ' . $e->getMessage());
            $this->dispatch('toastr:error', message: $e->getMessage());
        }
    }




    public function testConnection($type)
    {
        $this->testType = $type;
        $this->testMessage = "Testing {$type} connection...";
        $this->testModalVisible = true;

        try {
            if ($type === 'database') {
                config(['database.connections.test' => [
                    'driver' => $this->envVars['DB_CONNECTION'],
                    'host' => $this->envVars['DB_HOST'],
                    'port' => $this->envVars['DB_PORT'],
                    'database' => $this->envVars['DB_DATABASE'],
                    'username' => $this->envVars['DB_USERNAME'],
                    'password' => $this->envVars['DB_PASSWORD'],
                ]]);

                try {
                    DB::connection('test')->getPdo();
                    $this->testMessage = '✅ Database connection successful!';
                } catch (\PDOException $e) {
                    $errorCode = $e->getCode();
                    switch ($errorCode) {
                        case 1045:
                            $this->testMessage = '❌ Database error: Access denied for user (wrong username/password).';
                            break;
                        case 1049:
                            $this->testMessage = '❌ Database error: Unknown database name.';
                            break;
                        case 2002:
                            $this->testMessage = '❌ Database error: Could not connect to MySQL host.';
                            break;
                        default:
                            $this->testMessage = '❌ Database connection failed: ' . $e->getMessage();
                            break;
                    }
                }
            } elseif ($type === 'mail') {
                try {
                    config(['mail.mailers.smtp' => [
                        'transport' => $this->envVars['MAIL_MAILER'],
                        'host' => $this->envVars['MAIL_HOST'],
                        'port' => $this->envVars['MAIL_PORT'],
                        'username' => $this->envVars['MAIL_USERNAME'],
                        'password' => $this->envVars['MAIL_PASSWORD'],
                        'encryption' => $this->envVars['MAIL_ENCRYPTION'],
                    ]]);

                    Mail::raw('Test Mail from Installer', function ($msg) {
                        $msg->to($this->envVars['MAIL_FROM_ADDRESS'])->subject('Test Mail');
                    });

                    $this->testMessage = '✅ Mail sent successfully!';
                } catch (\Exception $e) {
                    $msg = strtolower($e->getMessage());

                    if (str_contains($msg, 'connection refused')) {
                        $this->testMessage = '❌ Mail error: Could not connect to mail server.';
                    } elseif (str_contains($msg, 'authentication failed') || str_contains($msg, 'invalid credentials')) {
                        $this->testMessage = '❌ Mail error: Invalid username or password.';
                    } elseif (str_contains($msg, 'failed to authenticate')) {
                        $this->testMessage = '❌ Mail error: Authentication failed.';
                    } else {
                        $this->testMessage = '❌ Mail error: ' . $e->getMessage();
                    }
                }
            } elseif ($type === 'imap') {
                try {
                    // Ensure function exists
                    if (!function_exists('imap_open')) {
                        $this->testMessage = '❌ IMAP not supported: PHP IMAP extension is not installed.';
                        return;
                    }

                    $mailbox = "{" . $this->envVars['IMAP_HOST'] . ":" . $this->envVars['IMAP_PORT'] . "/imap/" . $this->envVars['IMAP_ENCRYPTION'];

                    if (($this->envVars['IMAP_VALIDATE_CERT'] ?? 'true') === 'false') {
                        $mailbox .= "/novalidate-cert";
                    }

                    $mailbox .= "}INBOX";

                    // Clear previous error stack
                    imap_errors();

                    $inbox = @imap_open($mailbox, $this->envVars['IMAP_USERNAME'], $this->envVars['IMAP_PASSWORD']);

                    if ($inbox) {
                        imap_close($inbox);
                        $this->testMessage = '✅ IMAP connection successful!';
                    } else {
                        $errors = imap_errors();
                        $lastError = is_array($errors) ? end($errors) : 'Unknown IMAP error.';

                        if (str_contains(strtolower($lastError), 'authentication failed')) {
                            $this->testMessage = '❌ IMAP error: Invalid username or password.';
                        } elseif (str_contains(strtolower($lastError), 'can\'t open stream')) {
                            $this->testMessage = '❌ IMAP error: Cannot connect to host (check hostname/port).';
                        } else {
                            $this->testMessage = '❌ IMAP error: ' . $lastError;
                        }
                    }
                } catch (\Throwable $e) {
                    $this->testMessage = '❌ IMAP crash: ' . $e->getMessage();
                }
            }
        } catch (\Exception $e) {
            $this->testMessage = '❌ Unexpected error: ' . $e->getMessage();
        }
    }


    public function getEnvDescription($key): string
    {
        $descriptions = [
            'APP_NAME' => 'The name of your application',
            'APP_ENV' => 'Application environment (local, production, etc.)',
            'APP_KEY' => 'Application encryption key',
            'APP_DEBUG' => 'Enable debug mode (true/false)',
            'APP_URL' => 'Application URL',
            'DB_CONNECTION' => 'Database driver (mysql, pgsql, sqlite, etc.)',
            'DB_HOST' => 'Database host',
            'DB_PORT' => 'Database port',
            'DB_DATABASE' => 'Database name',
            'DB_USERNAME' => 'Database username',
            'DB_PASSWORD' => 'Database password',
            'MAIL_MAILER' => 'Mail driver smtp',
            'MAIL_HOST' => 'Mail server host',
            'MAIL_PORT' => 'Mail server port',
            'MAIL_USERNAME' => 'Mail username',
            'MAIL_PASSWORD' => 'Mail password',
            'MAIL_ENCRYPTION' => 'Mail encryption (tls, ssl, etc.)',
            'MAIL_FROM_ADDRESS' => 'Default from address',
            'MAIL_FROM_NAME' => 'Default from name',
            'IMAP_HOST' => 'IMAP server host',
            'IMAP_PORT' => 'IMAP server port',
            'IMAP_ENCRYPTION' => 'IMAP encryption (ssl, tls, etc.)',
            'IMAP_VALIDATE_CERT' => 'Validate IMAP certificate (true/false)',
            'IMAP_USERNAME' => 'IMAP username',
            'IMAP_PASSWORD' => 'IMAP password',
        ];

        return $descriptions[$key] ?? '';
    }

    public function render()
    {
        return view('livewire.installer.environment')->layout('installer.body');
    }
}
