<?php

class FormController extends BaseController {

	public function generateForm($id="") // set $jobId == '' for the new forms case
	{
		if ($id == "")
		{
			// create an empty APM Form to pass in
			$apmformdata = new Apmform;
		}
		else
		{
			// pull the old form data from the DB
			$apmformdata = Apmform::find($id);
		}

		// render the page with the correct data passed in
		return View::make('form')
			->with('apmformdata', $apmformdata);
	}

	public function submitForm($id="")
	{
		// validation rules 
		$rules = array(
			'JobNumber' => 'required|size:10|regex:/^\S{6,10}$/',
			'APMTime' => 'required|date_format:Y-m-d H:i:s',
			'Contractor' => 'required',
			'JobsiteName' => 'required',
			'NumberOfTests' => 'required|min:1|integer',
			'JobsiteAddress' => 'required',
			'JobsiteCity' => 'required',
			'JobsiteState' => 'required|alpha|size:2',
			'JobsiteZIP' => 'required|regex:/^\d{5}(-\d{4})?$/',
			'ContactDayShift' => 'required',
			'ContactDayShiftCell' => 'required',
			'ContactNightshift' => 'required',
			'ContactNightShiftCell' => 'required',
			'Dateofnotification' => 'date_format:Y-m-d H:i:s',
			'SecurityContact' => 'between:2,23',
			'GEContact' => 'required',
			'GECell' => 'required',
			'TestType' => 'required',
			'FSR' => 'required|alpha_num|max:4',
			'Billable' => 'integer|size:1',

			'DatePrimeDay' => 'date_format:Y-m-d H:i:s',
			'TimePrimeDay' => 'date_format:h:i A',
			'TimeEndPrimeDay' => 'date_format:h:i A',
			'TimePrimeNight' => 'date_format:h:i A',
			'TimeEndPrimeNight' => 'date_format:h:i A',
			'AdditionalPrimeDay' => 'integer|size:1',
			'AdditionalPrimeNight' => 'integer|size:1',

			'DateAddDay' => 'date_format:Y-m-d H:i:s',
			'TimeAddDay' => 'date_format:h:i A',
			'TimeEndAddDay' => 'date_format:h:i A',
			'TimeAddNight' => 'date_format:h:i A',
			'TimeEndAddNight' => 'date_format:h:i A',
			'AdditionalAddDay' => 'integer|size:1',
			'AdditionalAddNight' => 'integer|size:1',

			'SafeArea' => 'integer',
			'Worktrailer' => 'integer',
			'Bathroom' => 'integer',
			'PortalJohn' => 'integer',
			'BathFeet' => 'integer|min:1',
			'RunningWater' => 'integer',
			'DrinkingWater' => 'integer',
			
			'ASPClinicState' => 'alpha|size:2',
			'ASPClinicZIP' => 'regex:/^\d{5}(-\d{4})?$/',
			'OccClinicState' => 'alpha|size:2',
			'OccClinicZIP' => 'regex:/^\d{5}(-\d{4})?$/',
			
			'Cost' => 'numeric|min:0',
			'Mileage' => 'numeric|min:0',
			'Allowance' => 'numeric|min:0',
			
			'CompletedBy' => 'date_format:Y-m-d H:i:s',
			'ConfirmedDate' => 'date_format:Y-m-d H:i:s',
			'ConfirmedEmailDate' => 'date_format:Y-m-d H:i:s',
			'ConfirmedFaxDate' => 'date_format:Y-m-d H:i:s'
		);
		
		$messages = array(
			'required' => 'This field is required!',
			'min' => 'Input given is not long enough.',
			'max' => 'Input given is too long.',
			'alpha' => 'Input can only contain letters.',
			'integer' => 'Input must be an integer value.',
			'numeric' => 'Input must be an numeric value.',
			'match' => 'Input given does not match the required format.',
			'date_format:d/m/y' => 'Input must a date (MM/DD/YYYY) (ex. 04/23/2012).',
			'date_format:h:i A' => 'Input must a time (HH:MM AM/PM) (ex. 05:38 PM).',
			'date_format:Y-m-d H:i:s' => 'Input must a date/time (YYYY-MM-DD HH:mm:ss).'
			);

		// compare all input to the validation rules and return bool
		$validator = Validator::make(Input::all(), $rules, $messages);

		// process the checks and take action accordingly
		if ($validator->fails()) 
		{
			// Return to the form page with error messages
			return Redirect::to('form/'.$id)
				->withErrors($validator)
				->withInput(Input::all());
		} 
		else 
		{
			// form has passed all validation checks!!
			if ($id > 1) // post to the DB as an UPDATE call
			{
				// grab the Apmform object based on the id passed
				$apmform = Apmform::find($id);
				// map the input data to the correct table fields
			  	$apmform -> id = Input::get('id');
			  	$apmform -> JobNumber = Input::get('JobNumber');
			  	$apmform -> APMTime = Input::get('APMTime');
			  	$apmform -> Contractor = Input::get('Contractor');
			  	$apmform -> JobsiteName = Input::get('JobsiteName');
			  	$apmform -> NumberOfTests = Input::get('NumberOfTests');
			  	$apmform -> JobsiteAddress = Input::get('JobsiteAddress');
			  	$apmform -> JobsiteCity = Input::get('JobsiteCity');
			 	$apmform -> JobsiteState = Input::get('JobsiteState');
			  	$apmform -> JobsiteZIP = Input::get('JobsiteZIP');
				$apmform -> ContactDayShift = Input::get('ContactDayShift');
				$apmform -> ContactDayShiftCell = Input::get('ContactDayShiftCell');
				$apmform -> ContactNightshift = Input::get('ContactNightshift');
				$apmform -> ContactNightShiftCell = Input::get('ContactNightShiftCell');
				$apmform -> Dateofnotification = Input::get('Dateofnotification');
				$apmform -> SecurityContact = Input::get('SecurityContact');
				$apmform -> TestType = Input::get('TestType');

				$apmform -> DatePrimeDay = Input::get('DatePrimeDay');
				$apmform -> DatePrimeNight = Input::get('DatePrimeNight');
				$apmform -> DateAddDay = Input::get('DateAddDay');
				$apmform -> DateAddNight = Input::get('DateAddNight');

				$apmform -> TimePrimeDay = Input::get('TimePrimeDay');
				$apmform -> TimePrimeNight = Input::get('TimePrimeNight');
				$apmform -> TimeEndPrimeDay = Input::get('TimeEndPrimeDay');
				$apmform -> TimeEndPrimeNight = Input::get('TimeEndPrimeNight');

				$apmform -> TimeAddDay = Input::get('TimeAddDay');
				$apmform -> TimeAddNight = Input::get('TimeAddNight');
				$apmform -> TimeEndAddDay = Input::get('TimeEndAddDay');
				$apmform -> TimeEndAddNight = Input::get('TimeEndAddNight');

				$apmform -> AdditionalPrimeDay = Input::get('AdditionalPrimeDay');
				$apmform -> AdditionalPrimeNight = Input::get('AdditionalPrimeNight');
				$apmform -> AdditionalAddDay = Input::get('AdditionalAddDay');
				$apmform -> AdditionalAddNight = Input::get('AdditionalAddNight');

				$apmform -> SafeArea = Input::get('SafeArea');
				$apmform -> Worktrailer = Input::get('Worktrailer');
				$apmform -> Bathroom = Input::get('Bathroom');
				$apmform -> PortalJohn = Input::get('PortalJohn');
				$apmform -> BathFeet = Input::get('BathFeet');
				$apmform -> RunningWater = Input::get('RunningWater');
				$apmform -> DrinkingWater = Input::get('DrinkingWater');

				$apmform -> ASPClinicName = Input::get('ASPClinicName');
				$apmform -> ASPClinicAddress = Input::get('ASPClinicAddress');
				$apmform -> ASPClinicCity = Input::get('ASPClinicCity');
				$apmform -> ASPClinicState = Input::get('ASPClinicState');
				$apmform -> ASPClinicZIP = Input::get('ASPClinicZIP');
				$apmform -> ASPClinicContact = Input::get('ASPClinicContact');
				$apmform -> ASPClinicPhone = Input::get('ASPClinicPhone');
				$apmform -> ASPClinicFax = Input::get('ASPClinicFax');
				$apmform -> OccClinicName = Input::get('OccClinicName');
				$apmform -> OccClinicAddress = Input::get('OccClinicAddress');
				$apmform -> OccClinicCity = Input::get('OccClinicCity');
				$apmform -> OccClinicState = Input::get('OccClinicState');
				$apmform -> OccClinicZIP = Input::get('OccClinicZIP');
				$apmform -> OccClinicContact = Input::get('OccClinicContact');
				$apmform -> OccClinicPhone = Input::get('OccClinicPhone');
				$apmform -> OccClinicFax = Input::get('OccClinicFax');

				$apmform -> Collectors = Input::get('Collectors');
				$apmform -> CollectorsPhone = Input::get('CollectorsPhone');
				$apmform -> CollectorsCell = Input::get('CollectorsCell');
				$apmform -> Cost = Input::get('Cost');
				$apmform -> Mileage = Input::get('Mileage');
				$apmform -> Allowance = Input::get('Allowance');
				$apmform -> CompletedBy = Input::get('CompletedBy');
				$apmform -> ConfirmedDate = Input::get('ConfirmedDate');
				$apmform -> ConfirmedEmailDate = Input::get('ConfirmedEmailDate');
				$apmform -> ConfirmedFaxDate = Input::get('ConfirmedFaxDate');

				$apmform -> comments = Input::get('comments');
				$apmform -> GEContact = Input::get('GEContact');
				$apmform -> GECell = Input::get('GECell');
				$apmform -> FSR = Input::get('FSR');
				$apmform -> Billable = Input::get('Billable');

				//save the apmform to the DB
				$apmform -> save();

				// success message displayed to user.
				Session::flash('message', 'Successfully updated APM Form ('.$id.')!');
			}
			else
			{
				// post to the DB as an INSERT call
				$apmform = new Apmform;
				// Call the DB method to map the input to the table fields
				//????????????????

				//save the apmform to the DB
				$apmform -> save();

				// success message displayed to user.
				Session::flash('message', 'Successfully created an APM Form ('.$id.')!');
			}
		}
		// route the user back to the main page
		return Redirect::to('index');
	}
};