<?php

namespace App\Providers;

use App\Models\Bill;
use App\Models\Message;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        Gate::before(function ($user, $ability) {
            return $user->hasRole('Master Admin') ? true : null;
        });

        View::composer('*', function ($view) {
            $view->with('sidebarPendingCount', Bill::where('status', 'pending')->count());
            $view->with('noReplyMessageCount', Message::doesntHave('replies')->count());
        });
    }
}
