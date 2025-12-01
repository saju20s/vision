<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckInstallerRequirements
{
    public function handle(Request $request, Closure $next)
    {
        if (!$this->checkRequirements()) {
            // Jodi requirements na met hoy, tahole requirements page e pathai dibo
            return redirect()->route('installer.requirements');
        }

        return $next($request);
    }

    protected function checkRequirements(): bool
    {
        $requirements = [
            'PHP >= 8.2' => version_compare(PHP_VERSION, '8.2.0', '>='),
            'imap' => extension_loaded('imap'),
            'BCMath' => extension_loaded('bcmath'),
            'Ctype' => extension_loaded('ctype'),
            'JSON' => extension_loaded('json'),
            'Mbstring' => extension_loaded('mbstring'),
            'OpenSSL' => extension_loaded('openssl'),
            'PDO' => extension_loaded('pdo'),
            'Tokenizer' => extension_loaded('tokenizer'),
            'XML' => extension_loaded('xml'),
        ];

        // Sob requirement true hole return true, nahole false
        return !in_array(false, $requirements, true);
    }
}
