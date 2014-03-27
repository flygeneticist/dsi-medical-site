<?php

class FormController extends BaseController {

	public function generateForm($jobId = "") // set $jobId == '' for the new forms case
	{
		$data = Input::all();

		if ($jobId == "") // NEW FORM
		{
			// generate a new form view
			return "NEW FORM";
		}
		else if ($jobId != "") //Form::find($jobId)
		{
			// generate an old form view based off DB data
			return "OLD FORM: " .$jobId;
		}
		else // ERROR PAGE
		{
			throw new NotFoundHttpException;
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
		else // NEW FORM
		{
			// post to the DB as an INSERT call

		}
	}
};