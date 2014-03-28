<?php

class FormController extends BaseController {

	public function generateForm($jobId="") // set $jobId == '' for the new forms case
	{
		$jobId = Input::get('jobId');

		if ($jobId == "") // NEW FORM
		{
			return View::make('form');
		}
		else //Form::find($jobId)
		{
			// pull the old form data from the DB
			$oldFormData = json_encode(DB::table('form')->where('JobNumber', $jobId)->select());
			// generate an old form view based off DB data
			return "OLD FORM: <br/>".$oldFormData;
		}
	}


	public function submitForm()
	{
		$data = Input::all();
		$formType = $data['formType'];
		
		if ($formType == null) // OLD FORM
		{
			// post to the DB as an UPDATE call
			//DB::table('forms')->where(JobNumber, $jobId)->update($data);
			return "Your OLD form <h3>".$jobId."</h3> has been submitted!";
		}
		else // NEW FORM
		{
			// post to the DB as an INSERT call
			//DB::table('forms')->insert($data);
			return "Your NEW form <h3>".$jobId."</h3> has been submitted!";
		}
	}
};