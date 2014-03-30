<?php

class FormController extends BaseController {

	public function generateForm($jobId="") // set $jobId == '' for the new forms case
	{
		if ($jobId == "")
		{
			// create an empty APM Form to pass in
			$apmformdata = new Apmform;
		}
		else
		{
			// pull the old form data from the DB
			$apmformdata = Apmform::find($jobId);
		}

		// render the page with the correct data passed in
		return View::make('form')
			->with('apmformdata', $apmformdata);
	}

	public function submitForm()
	{
		$data = Input::all();
		$jobId = $data['JobNumber'];

		if ($formType == 'old') // OLD FORM
		{
			// post to the DB as an UPDATE call
			//DB::table('forms')->where(JobNumber, $jobId)->update($data);
			//Form::where('JobNumber', '=', $data['JobNumber'])
			//	->update(array('field' => 'value')); // add the form data fields!!
		}
		else // NEW FORM
		{
			// post to the DB as an INSERT call
			//Form::new()
			//Form::save()
			//DB::table('forms')->insert($data);
		}

		return "<h3>The APM Form ".$jobId." has been submitted!</h3>";
	}
};