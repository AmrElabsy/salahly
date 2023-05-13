<?php
<<<<<<< HEAD

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

        Route::group(["prefix" => "customer", "as" => "customer."], function() {
            Route::get("/deleted", "CustomerController@deleted")->name("deleted");
            Route::get("/restore/{customer}", "CustomerController@restore")->name("restore");
            Route::get("/forcedelete/{customer}", "CustomerController@forceDelete")->name("forceDelete");
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

        Route::group(["prefix" => "attendance", "as" => "attendance."], function () {
            Route::get("/attend/{employee}", "AttendanceController@attend")->name("attend");
            Route::get("/leave/{employee}", "AttendanceController@leave")->name("leave");
            Route::get("/{year}", "AttendanceController@index")->name("year");
            Route::get("/{year}/{month}", "AttendanceController@index")->name("month");

        });

        Route::resources([
            "device" => "DeviceController",
            "customer" => "CustomerController",
            "status" => "StatusController",
            "branch" => "BranchController",
            "problem" => "ProblemController",
            "employee" => "EmployeeController",
            "attendance" => "AttendanceController",
            "material" => "MaterialController",
            "supply"=>"SupplyController",
            "user"=>"UserController",
            "feedback"=>"FeedbackController",
        ]);
    });
});

?>
=======
    
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
    
    Route::group(["namespace" => "App\Http\Controllers",
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect',
            'localizationRedirect',
            'localeViewPath']], function () {
        Auth::routes(["register" => false]);
        
        Route::group(["middleware" => "auth"], function () {
            Route::get('/', "HomeController@index")->name("home");
            Route::get('/home', "HomeController@index")->name('home');
            
            Route::group(["prefix" => "customer",
                "as" => "customer."], function () {
                Route::get("/deleted", "CustomerController@deleted")->name("deleted");
                Route::get("/restore/{customer}", "CustomerController@restore")->name("restore");
                Route::get("/forcedelete/{customer}", "CustomerController@forceDelete")->name("forceDelete");
            });
            
            Route::group(["prefix" => "device",
                "as" => "device."], function () {
                Route::get("/deleted", "DeviceController@deleted")->name("deleted");
                Route::get("/restore/{device}", "DeviceController@restore")->name("restore");
                Route::get("/forcedelete/{device}", "DeviceController@forceDelete")->name("forceDelete");
            });
            
            Route::group(["prefix" => "employee",
                "as" => "employee."], function () {
                Route::get("/deleted", "EmployeeController@deleted")->name("deleted");
                Route::get("/restore/{employee}", "EmployeeController@restore")->name("restore");
                Route::get("/forcedelete/{employee}", "EmployeeController@forceDelete")->name("forceDelete");
            });
            
            Route::group(["prefix" => "material",
                "as" => "material."], function () {
                Route::get("/deleted", "MaterialController@deleted")->name("deleted");
                Route::get("/restore/{material}", "MaterialController@restore")->name("restore");
                Route::get("/forcedelete/{material}", "MaterialController@forceDelete")->name("forceDelete");
            });
            
            Route::group(["prefix" => "user",
                "as" => "user."], function () {
                Route::get("/deleted", "UserController@deleted")->name("deleted");
                Route::get("/restore/{user}", "UserController@restore")->name("restore");
                Route::get("/forcedelete/{user}", "UserController@forceDelete")->name("forceDelete");
            });
            
            Route::group(["prefix" => "supply",
                "as" => "supply."], function () {
                Route::get("/deleted", "SupplyController@deleted")->name("deleted");
                Route::get("/restore/{supply}", "SupplyController@restore")->name("restore");
                Route::get("/forcedelete/{supply}", "SupplyController@forceDelete")->name("forceDelete");
            });
            
            Route::group(["prefix" => "attendance",
                "as" => "attendance."], function () {
                Route::get("/attend/{employee}", "AttendanceController@attend")->name("attend");
                Route::get("/leave/{employee}", "AttendanceController@leave")->name("leave");
                Route::get("/{year}", "AttendanceController@index")->name("year");
                Route::get("/{year}/{month}", "AttendanceController@index")->name("month");
            });
    
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
            ]);
    
        });
    });
>>>>>>> 973b07cbc376b1a940ab1bfee4bcd823a043a3b0
