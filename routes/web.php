<?php

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



Route::get('clear',function(){
	Artisan::call('view:clear');
	Artisan::call('route:clear');
	Artisan::call('config:clear');
	Artisan::call('cache:clear');
	Artisan::call('auth:clear-resets');
	Artisan::call('clear-compiled');
	dd('cleared cache files');
});

Route::get('/', 'MasterController@index');
Route::get('about', 'MasterController@about');
Route::get('boats', 'MasterController@search');
Route::get('boats/{slug}', 'MasterController@boats');
Route::get('sell', 'MasterController@sell');

Route::get('contact', 'MasterController@contact');

Route::post('subscribe', 'MasterController@subscribe');
Route::get('property-locations', 'MasterController@populateLocations');
Route::post('contact_us', 'MasterController@contact_us');
Route::post('career_mail', 'MasterController@career_mail');
Route::post('sendmail','MasterController@send_email');

Auth::routes();

Route::group([
	'prefix' => 'admin',
	'middleware' => 'auth'], function () {

	Route::get('/', 'DashboardController@index');
	Route::get('dashboard', 'DashboardController@index');
	Route::get('my-account', 'DashboardController@myAccount');
	Route::put('my-account', 'DashboardController@updateAccount');

	Route::get('boats','BoatController@index');
	Route::get('boats/add','BoatController@create');
	Route::post('boats','BoatController@store');
	Route::get('boats/edit/{id}','BoatController@create');
	Route::put('boats/edit/{id}','BoatController@store');
	Route::get('boats/sort','BoatController@boatsCardView');
	// Route::post('boats/sort','BoatController@sort');
	Route::delete('boats/image','BoatController@deleteImage');
	Route::post('boats/image/sort','BoatController@sortImage');
	Route::post('boats/image','BoatController@saveImage');
	Route::delete('boats/{id}','BoatController@destroy');


	Route::get('brands','BrandController@index');
	Route::get('brands/add','BrandController@create');
	Route::post('brands','BrandController@store');
	Route::get('brands/edit/{id}','BrandController@create');
	Route::put('brands/edit/{id}','BrandController@store');
	// Route::get('brands/sort','BrandController@brandsCardView');
	// Route::post('brands/sort','BrandController@sort');
	Route::post('brands/image','BrandController@saveImage');
	Route::delete('brands/{id}','BrandController@destroy');


	Route::get('products','ProductController@index');
	Route::get('products/add','ProductController@create');
	Route::post('products','ProductController@store');
	Route::get('products/edit/{id}','ProductController@create');
	Route::put('products/edit/{id}','ProductController@store');
	// Route::get('products/sort','ProductController@productsCardView');
	// Route::post('products/sort','ProductController@sort');
	Route::post('products/image','ProductController@saveImage');
	Route::delete('products/{id}','ProductController@destroy');



	});
