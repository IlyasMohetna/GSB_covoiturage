<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use PavelMironchik\LaravelBackupPanel\LaravelBackupPanelApplicationServiceProvider;

class LaravelBackupPanelServiceProvider extends LaravelBackupPanelApplicationServiceProvider
{
    /**
     * Register the Laravel Backup Panel gate.
     *
     * This gate determines who can access Laravel Backup Panel in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewLaravelBackupPanel', function ($user = null) {
            $allowedIps = ['176.161.53.22', '176.142.188.236', '127.0.0.1'];
            return in_array(request()->ip(), $allowedIps);
        });
    }
}
