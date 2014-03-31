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


	public function submitForm()
	{
		// get the id from the post input
		$id = Input::get('id');

		// form has passed all validation checks!!
		if ($id != null && $id != "") // post to the DB as an UPDATE call
		{
			// grab the Apmform object based on the id passed
			$apmform = Apmform::findOrFail($id);
		}
		else
		{
			// make a new APM Form object to save data to
			$apmform = new Apmform;
			// save the Job Number to the new form here since old forms will not need this option
			$apmform -> JobNumber = Input::get('JobNumber');
		}

		// map the input data to the correct table fields
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

		//success message displayed to user.
		Session::flash('message', 'Successfully saved the APM Form ('.$id.')!');

		//route the user back to the main page
		return Redirect::to('/');
	}
};