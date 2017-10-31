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

Route::get('/', 'MasterController@index');
Route::get('about', 'MasterController@about');
Route::get('boats/{slug?}', 'MasterController@boats');
// new-boats
// buy-boat
// sell-boats
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

	Route::get('banners','BannerController@index');
	Route::get('banners/add','BannerController@create');
	Route::post('banners','BannerController@store');
	Route::get('banners/edit/{id}','BannerController@edit');
	Route::post('banners/sort','BannerController@sort');
	Route::delete('banners/image','BannerController@deleteImage');
	Route::post('banners/image','BannerController@saveImage');
	Route::put('banners/{id}','BannerController@update');
	Route::delete('banners/{id}','BannerController@destroy');

	Route::get('properties','PropertyController@index');
	Route::get('properties/add','PropertyController@create');
	Route::post('properties','PropertyController@store');
	Route::get('properties/edit/{id}','PropertyController@edit');
	Route::get('properties/sort','PropertyController@propertiesCardView');
	Route::post('properties/sort','PropertyController@sort');
	Route::delete('properties/image','PropertyController@deleteImage');
	Route::post('properties/image/sort','PropertyController@sortImage');
	Route::post('properties/image','PropertyController@saveImage');
	Route::put('properties/{id}','PropertyController@update');
	Route::delete('properties/{id}','PropertyController@destroy');

	Route::get('propertytypes','PropertyTypeController@index');
	Route::post('propertytypes','PropertyTypeController@store');
	Route::delete('propertytypes/{id}','PropertyTypeController@destroy');

	
	});
