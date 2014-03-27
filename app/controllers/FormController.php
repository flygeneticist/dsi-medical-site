<?php

class FormController extends BaseController {

	public function generateForm($jobId)
	{
		$data = Input::all();

		if ($jobId == null) // NEW FORM
		{
			// generate a new form view
			
		}
		else if (Form::find($jobId)) 
		{
			// generate an old form view based off DB data

		}
		else // ERROR PAGE
		{
			return View::make('error');
		}
	}

	public function submitForm()
	{
		$data = Input::all();
		$jobId = Input::get('jobId');
		if (Form::find($jobId)) // OLD FORM
		{
			// post to the DB as an UPDATE call

		}
		else // OLD FORM
		{
			// post to the DB as an INSERT call

		}
	}
};