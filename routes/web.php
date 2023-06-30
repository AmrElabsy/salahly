<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([
    "namespace" => "App\Http\Controllers",
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {
    Auth::routes(["register" => false]);

    Route::group(["middleware" => "auth"], function() {
        Route::get('/', "HomeController@index")->name("home");
        Route::get('/home', "HomeController@index")->name('home');
	
		Route::group([
			"prefix" => "money",
			"as" => "money."
		], function () {
			Route::get('/', "MoneyController@index")->name('index');
			Route::get('/{month}', "MoneyController@month")->name('month');
			
		});

		/**
        Route::group(["prefix" => "branch", "as" => "branch."], function() {
            Route::get("/deleted", "BranchController@deleted")->name("deleted");
            Route::get("/restore/{branch}", "BranchController@restore")->name("restore");
            Route::get("/forcedelete/{branch}", "BranchController@forceDelete")->name("forceDelete");
        });

        Route::group(["prefix" => "customer", "as" => "customer."], function() {
            Route::get("/deleted", "CustomerController@deleted")->name("deleted");
            Route::get("/restore/{customer}", "CustomerController@restore")->name("restore");
            Route::get("/forcedelete/{customer}", "CustomerController@forceDelete")->name("forceDelete");
        });

        Route::group(["prefix" => "category", "as" => "category."], function() {
            Route::get("/deleted", "CategoryController@deleted")->name("deleted");
            Route::get("/restore/{category}", "CategoryController@restore")->name("restore");
            Route::get("/forcedelete/{category}", "CategoryController@forceDelete")->name("forceDelete");
        });

        Route::group(["prefix" => "device", "as" => "device."], function() {
            Route::get("/deleted", "DeviceController@deleted")->name("deleted");
            Route::get("/restore/{device}", "DeviceController@restore")->name("restore");
            Route::get("/forcedelete/{device}", "DeviceController@forceDelete")->name("forceDelete");
        });

        Route::group(["prefix" => "employee", "as" => "employee."], function() {
            Route::get("/deleted", "EmployeeController@deleted")->name("deleted");
            Route::get("/restore/{employee}", "EmployeeController@restore")->name("restore");
            Route::get("/forcedelete/{employee}", "EmployeeController@forceDelete")->name("forceDelete");
        });

        Route::group(["prefix" => "material", "as" => "material."], function() {
            Route::get("/deleted", "MaterialController@deleted")->name("deleted");
            Route::get("/restore/{material}", "MaterialController@restore")->name("restore");
            Route::get("/forcedelete/{material}", "MaterialController@forceDelete")->name("forceDelete");
        });

        Route::group(["prefix" => "user", "as" => "user."], function() {
            Route::get("/deleted", "UserController@deleted")->name("deleted");
            Route::get("/restore/{user}", "UserController@restore")->name("restore");
            Route::get("/forcedelete/{user}", "UserController@forceDelete")->name("forceDelete");
        });

        Route::group(["prefix" => "supply", "as" => "supply."], function() {
            Route::get("/deleted", "SupplyController@deleted")->name("deleted");
            Route::get("/restore/{supply}", "SupplyController@restore")->name("restore");
            Route::get("/forcedelete/{supply}", "SupplyController@forceDelete")->name("forceDelete");
        });
		
        Route::group(["prefix" => "service", "as" => "service."], function() {
            Route::get("/deleted", "ServiceController@deleted")->name("deleted");
            Route::get("/restore/{service}", "ServiceController@restore")->name("restore");
            Route::get("/forcedelete/{service}", "ServiceController@forceDelete")->name("forceDelete");
        });
		 * */

        Route::group(["prefix" => "attendance", "as" => "attendance."], function () {
            Route::get("/attend/{user}", "AttendanceController@attend")->name("attend");
            Route::get("/leave/{user}", "AttendanceController@leave")->name("leave");
            Route::get("/{year}", "AttendanceController@index")->name("year");
            Route::get("/{year}/{month}", "AttendanceController@index")->name("month");

        });

        Route::group(["middleware" => "auth"], function () {

            Route::resources(["device" => "DeviceController",
                "customer" => "CustomerController",
                "status" => "StatusController",
                "branch" => "BranchController",
                "problem" => "ProblemController",
                "employee" => "EmployeeController",
                "attendance" => "AttendanceController",
                "material" => "MaterialController",
                "supply" => "SupplyController",
                "word" => "WordController",
                "user" => "UserController",
                "role" => "RoleController",
                "permission" => "PermissionController",
                "category" => "CategoryController",
                "feedback" => "FeedbackController",
                'service' => "ServiceController",
                'holiday' => "HolidayController",
                'weekend' => "WeekendController",
            ]);
            
            Route::group(["prefix" => "stock", "as" => "stock."], function () {
                Route::resources([
                    "supply" => "StoredSupplyController",
                    "material" => "StoredMaterialController",
                    "materialreturn" => "MaterialReturnController",
                    "materialwaste" => "MaterialWasteController",
                    "supplyreturn" => "SupplyReturnController",
                ]);

				/**
                Route::group(["prefix" => "supply", "as" => "supply."], function() {
                    Route::get("/deleted", "StoredSupplyController@deleted")->name("deleted");
                    Route::get("/restore/{supply}", "StoredSupplyController@restore")->name("restore");
                    Route::get("/forcedelete/{supply}", "StoredSupplyController@forceDelete")->name("forceDelete");
                });

                Route::group(["prefix" => "material", "as" => "material."], function() {
                    Route::get("/deleted", "StoredMaterialController@deleted")->name("deleted");
                    Route::get("/restore/{material}", "StoredMaterialController@restore")->name("restore");
                    Route::get("/forcedelete/{material}", "StoredMaterialController@forceDelete")->name("forceDelete");
                });
				 * */
            });
        });
    });
});

