<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SalaryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Services\Contracts\SalaryInterface::class,
            \App\Services\SalaryService::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
