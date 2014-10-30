<?php

class FormController extends BaseController {

	public function generateForm($id="") // set $jobId == '' for the new forms case
	{
		if ($id == "")
		{
			// create an empty APM Form to pass in
			$apmformdata = new Apmform;
			$print_button = false;
		}
		else
		{
			// pull the old form data from the DB
			$apmformdata = Apmform::find($id);
			$print_button = true;
		}

		// render the page with the correct data passed in
		return View::make('form')
			->with('apmformdata', $apmformdata)
			->with('print_button', $print_button);
	}


	public function submitForm()
	{
		// determine submit button type used (print vs submit)
		if(Input::get('submit')) 
		{
		  	 // select all managers with in the region given by the JobNumber
			$regionId = substr(Input::get('JobNumber'),0,3);
			$jobNumber = Input::get('JobNumber');
			$APMTime = Input::get('APMTime');
			$id = Input::get('id');
			$jobCheck = Apmform::where('JobNumber', $jobNumber)->where('APMTime','=', $APMTime)->get();
			$emptyCheck = Apmform::where('JobNumber', 'XXXXXXXXXXX')->get();
			 
			if ( ($id == "" || $id == null) && $jobCheck != $emptyCheck )
			{
				// return user to the form page with their old form data passed in + error messages
			        return Redirect::to('form')
			        	->withInput()
			        	->with('region_err','Job Number / Request Date combination already exists in the database!<br/>Please use a different number and resubmit!');
			}
			else 
			{
				$lnkManagers = lnkRegionsManager::where('regionID', $regionId)->lists('managerID');
				
				if ($lnkManagers == array())
				{
					// return user to the form page with their old form data passed in + error messages
				        return Redirect::to('form/'.$id)
				        	->withInput()
				        	->with('region_err','First three(3) digits of the Job Number do not match with a region.<br/>Valid region codes are: 302, 303, 305 307, 338');
				}
				else
				{
				   // pull down manager data from the Managers table
				    $managerInfo = Manager::whereIn('id', $lnkManagers)->where('active', 1)->get();
				
				   // check that the form elements meet the required criteria
				    $rules = array(
				    	// Main section information rules
				        'JobNumber' => array('required', 'regex:/[0-9A-Za-z]{6}\-[0-9A-Za-z]{3}/'),
				        'APMTime' => array('required', 'regex:/[0-9]{2}\/[0-9]{2}\/[0-9]{4}/'),
				        'JobsiteName' => array('required'),
				        'NumberOfTests' => array('required', 'integer'),
				        'JobsiteAddress' => array('required'),
				        'JobsiteCity' => array('required'),
				        'JobsiteState' => array('required', 'size:2'),
				        'JobsiteZIP' => array('required', 'size:5'),
				        
				        // GE Contact information rules
				        'GEContact' => array("regex:/^[\pL\s]+$/u"),
				        'GECell' => array('regex:/[0-9]{3}\-[0-9]{3}\-[0-9]{4}/'),
				        
				        // Security information rules
				        'Dateofnotification' => array('required', 'regex:/[0-9]{2}\/[0-9]{2}\/[0-9]{4}/'),
				        'SecurityContact' => array("regex:/^[\pL\s]+$/u"),
				        
				        // Testing schedule rules
				        'DatePrimeDay' => array('required'),	
					'TimePrimeDay' => array('required_without:TimePrimeNight', 'regex:/[0-9]{2}\:[0-9]{2} [AMPamp]{2}/'),
					'TimePrimeNight' => array('required_without:TimePrimeDay', 'regex:/[0-9]{2}\:[0-9]{2} [AMPamp]{2}/'),
					'TimeEndPrimeDay' => array('required_with:TimePrimeDay', 'regex:/[0-9]{2}\:[0-9]{2} [AMPamp]{2}/'),
					'TimeEndPrimeNight' => array('required_with:TimePrimeNight', 'regex:/[0-9]{2}\:[0-9]{2} [AMPamp]{2}/'),
					'NumberOfTestsDay' => array('integer'),
					'NumberOfTestsNight' => array('integer'),
							
					// Worksite Amenities rules (all required)
					'SafeArea' => array('required', 'in:"1","0"'),
					'Worktrailer' => array('required', 'in:"1","0"'),
					'Bathroom' => array('required', 'in:"1","0"'),
					'PortalJohn' => array('required', 'in:"1","0"'),
					'BathFeet' => array('required', 'numeric'),
					'RunningWater' => array('required', 'in:"1","0"'),
					'DrinkingWater' => array('required', 'in:"1","0"'),
					
					// Clinical Contact info rules	
				        'ASPClinicAddress'=> array('required_with:ASPClinicName'),
					'ASPClinicCity'=> array('required_with:ASPClinicName'),
					'ASPClinicState'=> array('required_with:ASPClinicName', 'size:2'),
					'ASPClinicZIP'=> array('required_with:ASPClinicName', 'size:5'),
					'ASPClinicPhone'=> array('required_with:ASPClinicContact', 'regex:/[0-9]{3}\-[0-9]{3}\-[0-9]{4}/'),
					'ASPClinicFax'=> array('regex:/[0-9]{3}\-[0-9]{3}\-[0-9]{4}/'),
					
					// Collector Info + DSI rules
					'CollectorsPhone' => array('required_with:Collectors', 'regex:/[0-9]{3}\-[0-9]{3}\-[0-9]{4}/'),
					'CollectorsCell' => array('regex:/[0-9]{3}\-[0-9]{3}\-[0-9]{4}/'),
					'ConfirmedDate' => array('required_with:CompletedBy', 'regex:/[0-9]{2}\/[0-9]{2}\/[0-9]{4}/'),
					'ConfirmedEmailDate' => array('required_with:CompletedBy', 'regex:/[0-9]{2}\/[0-9]{2}\/[0-9]{4}/'),
				    );
			
				    $messages = array(
				    	'required' => 'This field is required.',
				    	'same' => 'The :attribute and :other must match.',
			   		'size' => 'This field must be exactly :size characters.',
					'between' => 'This field must be between :min - :max.',
			    		'in' => 'The :attribute must be one of the following types: :values',
			    		'required_with' => 'The :attribute is required.',
			    		'regex' => 'The :attribute does not match the expected format.',
				    );
			
				    $validation = Validator::make(Input::all(), $rules);
				
				    if ($validation->fails())
				    {
				        // return user to the form page with their old form data passed in + error messages
				        return Redirect::to('form/'.$id)
				        	->withInput()
				        	->withErrors($validation);
				    }
				    else 
				    {
					// get the id from the post input
					$id = Input::get('id');
					
					// set an update vs create template trigger var 
					$email_type = "new"; // default to new form
					
					// form has passed all validation checks!!
					if ($id != "")
					{
						// grab the Apmform object based on the id passed
						$apmform = Apmform::find($id);
						$email_type = "old"; // update email type to old form template
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
			
					$apmform -> DatePrimeDay = Input::get('DatePrimeDay');
			
					$apmform -> TimePrimeDay = Input::get('TimePrimeDay');
					$apmform -> TimePrimeNight = Input::get('TimePrimeNight');
					$apmform -> TimeEndPrimeDay = Input::get('TimeEndPrimeDay');
					$apmform -> TimeEndPrimeNight = Input::get('TimeEndPrimeNight');
			
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
			
					$apmform -> Collectors = Input::get('Collectors');
					$apmform -> CollectorsPhone = Input::get('CollectorsPhone');
					$apmform -> CollectorsCell = Input::get('CollectorsCell');
					$apmform -> Cost = Input::get('Cost');
					$apmform -> Mileage = Input::get('Mileage');
					$apmform -> Allowance = Input::get('Allowance');
					$apmform -> CompletedBy = Input::get('CompletedBy');
					$apmform -> ConfirmedDate = Input::get('ConfirmedDate');
					$apmform -> ConfirmedEmailDate = Input::get('ConfirmedEmailDate');
			
					$apmform -> comments = Input::get('comments');
					$apmform -> GEContact = Input::get('GEContact');
					$apmform -> GECell = Input::get('GECell');
					
					$apmform -> GateSecurityContactNo = Input::get('GateSecurityContactNo');
					$apmform -> NumberOfTestsNight = Input::get('NumberOfTestsNight');
					$apmform -> NumberOfTestsDay = Input::get('NumberOfTestsDay');


					try // try to save the new APM Form to the database
					{
						$apmform -> save(); //save the apmform to the DB
					}
					catch(Exception $e) // catch the unique error resulting from a JobNumber being duplicated 
					{
						// Rollback the database
						DB::rollback();
						// pass user back to the form view along with their Apmform data and an error to display
						$apmformdata = $apmform;
						return View::make('form')
							->with('apmformdata', $apmformdata)
							->with('region_err', 'Error writing to the database!');
					}		
				    }
				   	
			   	//route the user to the success page for form PDF creation and notification emailing
				return Redirect::to('formSuccess/update')
					->with('apmform', $apmform)
					->with('managerInfo', $managerInfo)
					->with('email_type', $email_type);
			}
		}	
	} 
	// DO NOT update the database and simply pass form data into the PDF generator if PRINT is chosen
	elseif(Input::get('print')) 
	{
		 // select all managers with in the region given by the JobNumber
		   $regionId = substr(Input::get('JobNumber'),0,3);

		   $lnkManagers = lnkRegionsManager::where('regionID', $regionId)->lists('managerID');

		   // pull down manager data from the Managers table
		    $managerInfo = Manager::whereIn('id', $lnkManagers)->where('active', 1)->get();
			
		// create new object to hold data
		$apmform = new Apmform;
		// save the current form data for print rendering
		$apmform -> JobNumber = Input::get('JobNumber');
	  	$apmform -> APMTime = Input::get('APMTime');
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

		$apmform -> DatePrimeDay = Input::get('DatePrimeDay');

		$apmform -> TimePrimeDay = Input::get('TimePrimeDay');
		$apmform -> TimePrimeNight = Input::get('TimePrimeNight');
		$apmform -> TimeEndPrimeDay = Input::get('TimeEndPrimeDay');
		$apmform -> TimeEndPrimeNight = Input::get('TimeEndPrimeNight');

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

		$apmform -> Collectors = Input::get('Collectors');
		$apmform -> CollectorsPhone = Input::get('CollectorsPhone');
		$apmform -> CollectorsCell = Input::get('CollectorsCell');
		$apmform -> Cost = Input::get('Cost');
		$apmform -> Mileage = Input::get('Mileage');
		$apmform -> Allowance = Input::get('Allowance');
		$apmform -> CompletedBy = Input::get('CompletedBy');
		$apmform -> ConfirmedDate = Input::get('ConfirmedDate');
		$apmform -> ConfirmedEmailDate = Input::get('ConfirmedEmailDate');

		$apmform -> comments = Input::get('comments');
		$apmform -> GEContact = Input::get('GEContact');
		$apmform -> GECell = Input::get('GECell');
		
		$apmform -> GateSecurityContactNo = Input::get('GateSecurityContactNo');
		$apmform -> NumberOfTestsNight = Input::get('NumberOfTestsNight');
		$apmform -> NumberOfTestsDay = Input::get('NumberOfTestsDay');
		
		//route the user to the success page for form PDF creation and notification emailing
		return Redirect::to('formSuccess/print')
			->with('apmform', $apmform)
			->with('managerInfo', $managerInfo);
	}
    }    		
};