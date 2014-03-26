<?php

class ArticleController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function renderform($formtype, $data)
	{
		if ($formtype,)
		// grab input data
		$data = Input::all();
		// setup rules
		$rules = array(
			'dateofapm' => 'date',
			'contractorFirstName' => 'alpha',
			'contractorLastName' => 'alpha',
			'JobID' => array('alpha_num','size:10'),
			'fsrponum' => array('alpha_num','between:10,15'),
			'billable' => 'integer',
			'jobsitename' => array('alpha_num'),
			'numoftests' => array('integer','between:1,999999'),
			'jobsitestate' => array('alpha','size:2'),
			'jobsitezip' => array('alpha_num','size:5')
		);

		// Create a new validator instance to check input against rules.
		$validator = Validator::make($data, $rules);

		if ($validator -> passes())
		{
			// INSERT the POST form data into the 'Forms' table of the DB
			// generate a PDF for the user of the form
			// send out a mailing to all users
			return Redirect::to('index');
		}
		else
		{
			// Collect the validation error messages object.
			$errors = $validator->messages();
			// return  to original page with errors
			return Redirect::to('newform') -> withErrors($validator);
		}


			return View::make('hello');
		}
		


// render the old-form based on a call to the 'Forms' table of the DB



// newform logic

	
}));