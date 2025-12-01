<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'check.welcome' => \App\Http\Middleware\CheckWelcomeInstaller::class,
            'check.installed' => \App\Http\Middleware\CheckInstaller::class,
            'installer.requirements' => \App\Http\Middleware\CheckInstallerRequirements::class,
            'paymentAccess' => \App\Http\Middleware\PaymentAccessMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
