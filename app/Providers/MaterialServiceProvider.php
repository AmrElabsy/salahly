<?php

namespace App\Providers;

use App\Services\MaterialService;
use Illuminate\Support\ServiceProvider;

class MaterialServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(MaterialService::class, function($app) {
            return new MaterialService();
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
