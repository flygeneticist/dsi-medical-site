<?php
// CHECK FOR AUTHORIZED ACCESS WHEN URI IS NOT LOGIN FROM
//Route::when('form*', 'auth');
//Route::when('/', 'auth');

// ALL OF THE ROUTES FOR SIMPLE STATIC PAGE GET CALLS
Route::get('/', function() 
{
	return View::make('index');
});

Route::get('login', function()
{
	return View::make('login');
});

Route::get('logout', function()
{
	return View::make('logout');
});

Route::get('error', function()
{
	return View::make('error');
});

// pass call to a Controller to build the correct view based on JobId passed
Route::get('form/{jobId?}', 'FormController@generateForm'); 

// SEND ALL APM FORM POSTS AND GETS TO THE FORM CONTROLLER
Route::post('form-handler', array('before' => 'csrf', 'FormController@submitForm'));

// HANDLE LOGIN REQUESTS
Route::post('login-handler', array('before' => 'csrf', function()
{
	// authentication logic goes here
}));

// SEND SEARCH REQUESTS TO A SEARCH CONTROLLER
Route::post('search-handler', array('before' => 'csrf', 'SearchController@grabList'));
