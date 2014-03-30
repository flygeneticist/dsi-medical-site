<?php
// CHECK FOR AUTHORIZED ACCESS WHEN URI IS NOT LOGIN FROM
//Route::when('form*', 'auth');
//Route::when('/', 'auth');

// ALL OF THE ROUTES FOR SIMPLE STATIC PAGE GET CALLS
Route::get('/', function() 
{
	$results = array();
	return View::make('index', array('results' => $results));
});

Route::get('error', function()
{
	return View::make('error');
});

// SEND ALL OTHER APM FORM REQUESTS TO FORM CONTROLLER
Route::get('form/{id?}', array('uses' => 'FormController@generateForm', 'as' => 'form.show'));
Route::post('form/{id?}', array('before' => 'csrf', 'uses' => 'FormController@submitForm', 'as' => 'form.update'));

// HANDLE LOGIN REQUESTS WITH LOGIN CONTROLLER
Route::get('login', array('uses' => 'LoginController@showLogin'));
Route::post('login', array('before' => 'csrf', 'uses' => 'LoginController@doLogin'));
Route::get('logout', array('uses' => 'LoginController@doLogout'));

// SEND SEARCH REQUESTS TO SEARCH CONTROLLER
Route::post('search', array('before' => 'csrf', 'uses' => 'SearchController@grabList'));
