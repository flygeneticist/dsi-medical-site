<?php
// CHECK FOR AUTHORIZED ACCESS WHEN URI IS NOT LOGIN FROM
//Route::when('form*', 'auth');
//Route::when('/', 'auth');

// ALL OF THE ROUTES FOR SIMPLE STATIC PAGE GET CALLS
Route::get('/', function() 
{
	return View::make('index');
});

Route::get('error', function()
{
	return View::make('error');
});

// SEND ALL APM FORM REQUESTS TO FORM CONTROLLER
Route::get('form/{jobId?}', 'FormController@generateForm'); // pass call build the correct view based on JobId
Route::post('form-handler/{jobId?}', array('before' => 'csrf', 'uses' => 'FormController@submitForm'));

// HANDLE LOGIN REQUESTS WITH LOGIN CONTROLLER
Route::get('login', array('uses' => 'LoginController@showLogin'));
Route::post('login', array('before' => 'csrf', 'uses' => 'LoginController@doLogin'));
Route::get('logout', array('uses' => 'LoginController@doLogout'));

// SEND SEARCH REQUESTS TO SEARCH CONTROLLER
Route::post('search-handler', array('before' => 'csrf', 'uses' => 'SearchController@grabList'));
