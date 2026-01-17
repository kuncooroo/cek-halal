<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Policies\AdminPolicy;

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
        Gate::policy(Admin::class, AdminPolicy::class);
        View::composer('layouts.admin', function ($view) {
            $user = Auth::guard('admin')->user();
            if ($user) {
                $notifications = $user->unreadNotifications;
                $view->with('adminNotifications', $notifications);
            } else {
                $view->with('adminNotifications', collect([]));
            }
        });
    }
}