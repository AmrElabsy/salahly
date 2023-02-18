<?php

namespace App\Providers;

use App\Services\ProblemService;
use Illuminate\Support\ServiceProvider;

class ProblemServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ProblemService::class, function($app) {
            return new ProblemService();
        });
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
