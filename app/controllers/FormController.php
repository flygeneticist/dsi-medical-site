<?php

class FormController extends BaseController {

	public function generateForm($jobId="") // set $jobId == '' for the new forms case
	{
		if ($jobId == "") // NEW FORM
		{
			return View::make('form');
		}
		else //Form::find($jobId)
		{
			// pull the old form data from the DB
			$oldFormData = Form::find($jobId);
			// generate an old form view based off DB data
			return "OLD FORM: <br/>".$oldFormData;
		}
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
			return "Your OLD form <h3>".$jobId."</h3> has been submitted!";
		}
		else // NEW FORM
		{
			// post to the DB as an INSERT call
			//Form::new()
			//Form::save()
			//DB::table('forms')->insert($data);
			return "Your NEW form <h3>".$jobId."</h3> has been submitted!";
		}
	}
};