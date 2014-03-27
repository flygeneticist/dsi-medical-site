<?php
/* 
CHECK FOR AUTHORIZED ACCESS WHEN URI IS NOT LOGIN FROM
*/
/*Route::when('/', 'auth');
Route::when('index', 'auth');
Route::when('newform', 'auth');*/

/* 
ALL OF THE ROUTES FOR SIMPLE STATIC PAGE GET CALLS
*/
Route::get('/', function()
{
	return View::make('index');
});


Route::get('index', function()
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

Route::get('form', function()
{
	return View::make('form');
});


// // SEND ALL APM FORM POSTS AND GETS TO THE FORM CONTROLLER
// Route::post('form-handler', array('before' => 'csrf', 'FormController@submitForm'));

// // pass call to a Controller to build the correct view based on JobId passed
// Route::get('form/{jobId?}', 'FormController@generateForm'); 



// HANDLE LOGIN REQUESTS
Route::post('login-handler', array('before' => 'csrf', function()
{
	// authentication logic goes here
}));



// SEND SEARCH REQUESTS TO A SEARCH CONTROLLER
Route::post('search-handler', array('before' => 'csrf', function()
{
	// search results function
	$category = Input::get('category');
	$input = Input::get('input');
	
	// pull all results from the SQL database and store to a JSON var
	$results = "doggie";
	
	// if the result is not zero (NRF) return them to the search table
	if (true) 
	{
		return '<p>You tried to search for: ' .$category. ' of ' .$input. '.<p>
				<p>The result was: <br/>' .$results. '</p>';  	//  <<<<<<<<<<<<<<  FIX ME!! <<<<<<<<<<<<<<<<
	}
	else // otherwise return default message
	{
		return "No results were found for your search!";
	}
}));
