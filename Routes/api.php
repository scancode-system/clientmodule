<?php

Route::prefix('clients')->middleware('auth.basic.once')->group(function() {
	
	Route::get('load/{client?}', 'Api\ClientController@load');

	Route::post('', 'Api\ClientController@store');

});


Route::prefix('client_utils')->middleware('auth.basic.once')->group(function() {
	
	Route::get('cnpj/{cnpj}', 'Api\UtilController@cnpj');
	Route::get('cep/{cep}', 'Api\UtilController@cep');

});


Route::prefix('shipping_companies')->middleware('auth.basic.once')->group(function() {
	
	Route::get('load', 'Api\ShippingCompanyController@load');

	Route::post('', 'Api\ShippingCompanyController@store');

});


