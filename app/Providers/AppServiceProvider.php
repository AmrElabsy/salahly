<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}
	
	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		Blade::directive('admin', function ()
		{
			return "<?php if(auth()->user()->hasRole('Admin')) { ?>";
		});
	
		Blade::directive('endadmin', function ()
		{
			return "<?php } ?>";
		});
		
		Blade::directive('employee', function ()
		{
			return "<?php if(auth()->user()->hasRole('Employee')) { ?>";
		});
		
		Blade::directive('endemployee', function ()
		{
			return "<?php } ?>";
		});
    }
}
