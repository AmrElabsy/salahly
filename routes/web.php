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

Route::get('/', function () {
    return view("layouts.app");
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group([
    "namespace" => "App\Http\Controllers",
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {
    
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
    
    Route::resources([
        "device" => "DeviceController",
        "customer" => "CustomerController",
        "status" => "StatusController",
        "branch"=>"BranchController",
    ]);
    
});