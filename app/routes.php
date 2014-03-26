<?php
/* 
All of the wildcard routes to send requests to filters for checks that need to run
*/
/*// check for authorized access
Route::when('/', 'auth');
Route::when('index', 'auth');
Route::when('newform', 'auth');*/

// send the form requests to the check-form filter

/* 
All of the routes for simple static page GET calls 
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


Route::get('newform', function()
{
	return View::make('newform');
});


/* 
Route to handle the GET generation of an old-form from a call to the database
*/
Route::get('form/{jobID?}', function($jobID = null)
{
	if ($jobID == null)
		// throw an error message, as there cannot be an old job form without a JobID attached
		return View::make('error');
	else
		// pass call to a Controller to build the correct view???
		return View::make('oldform/'.$jobID);
});


/*
All of the form submission handlers (CSRF checks)
*/
Route::post('login-handler', array('before' => 'csrf', function()
{
	if (true) //if the username and password exist in the DB allow the site index
	{ 
		// set cookies for the session while the browser is open, or for 1 day
		return Redirect::to('index');
	}
	else //else send back to login screen
	{
		return Redirect::to('login');
	}
}));


Route::post('search-handler', array('before' => 'csrf',  function()
{
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


Route::post('form-handler', array('before' => 'csrf', function()
{
	$data = Input::all();
	$formtype = Input::get('formtype');
	return FormController@renderform($formtype, $data);
}));