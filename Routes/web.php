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

Route::prefix('clients')->middleware('auth')->group(function() {
	Route::get('', 'ClientController@index')->name('clients.index');
	Route::get('create', 'ClientController@create')->name('clients.create');
	Route::get('{client}/edit', 'ClientController@edit')->name('clients.edit');
	Route::get('import', 'ClientController@import')->name('clients.import');

	Route::get('select/{text}', 'ClientController@select');

	/*Route::get('select', 'ClientController@import')->name('clients.import');*/

	Route::post('', 'ClientController@store')->name('clients.store');
	Route::put('{client}', 'ClientController@update')->name('clients.update');
	Route::delete('{client}/destroy', 'ClientController@destroy')->name('clients.destroy');		
});


Route::prefix('setting_client')->middleware('auth')->group(function() {
	Route::put('', 'SettingClientController@update')->name('setting_client.update');

});


Route::prefix('shipping_companies')->middleware('auth')->group(function() {
	Route::post('', 'ShippingCompanyController@store')->name('shipping_companies.store');
	Route::get('import', 'ShippingCompanyController@import')->name('clients.shipping_companies.import');
}); 

