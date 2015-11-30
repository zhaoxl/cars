<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::resource('/', 'indexController');

Route::group(['namespace' => 'api'], function()
{
	Route::resource('/api/insurance_companies', 'InsuranceCompaniesController');
	Route::resource('/api/licenses', 'LicensesController');
	Route::resource('/api/car_serials', 'CarSerialsController');
});