<?php

class DocumentController extends BaseController {

	public function submitPdf()
	{
	       // YOU NEED THIS FILE BEFORE YOU CAN RUN DOMPDF
		define('INCLUDE_PATH', '/home/dsimedic/apm/vendor/dompdf/dompdf');
		@ini_set("include_path", INCLUDE_PATH);
		require_once('dompdf_config.inc.php');

		// grab session data passed from the redirect
		$apmformdata = Session::get('apmform');
		$managerInfo = Session::get('managerInfo');
		$email_template = Session::get('email_type');
		
		// setup emails to send out notice to GE Regional managers
		$managers = array();
		foreach ($managerInfo as $manager)
		{
			array_push($managers, $manager->email);
		}

		// setup emails to send out notice to DSI team members
		$emails = array();
		$DSI_users = Email::where('active', 1)->get();
		foreach ($DSI_users as $dsi_user)
		{
			array_push($emails, $dsi_user->email);
		}

		// render the PDF with the correct data passed in
		$html = View::make('formPdf')
			->with('apmformdata', $apmformdata)
			->with('managerInfo', $managerInfo);

		// setup and generate the PDF
		$dompdf = new DOMPDF();
		$dompdf->load_html($html);
		$dompdf->render();
		$pdf = $dompdf->output();

		// download the file to the server.
		$file_to_save = './pdf/'.$apmformdata->JobNumber.'.pdf';
    		file_put_contents($file_to_save, $pdf);
		
		// choose correct email body template to use depending on form status
		if ($email_template == 'new') {
			$email_body = 'emails.formCreate';
		} else {
			$email_body = 'emails.formUpdate';
		}
			
		// setup final array to pass into the email scope
		$data = array('files'=>$file_to_save, 'emails'=>$emails, 'managers'=>$managers);

		// send out the confirmation email with attached PDF
		Mail::later(10,$email_body, array('JobNumber'=>$apmformdata->JobNumber, 'APMTime'=>$apmformdata->APMTime), function($message) use ($data) {
			$message->to($data['emails'])
				->cc($data['managers'])
				->cc('helpdesk@drugscan.com') // notify drugscan helpdesk of new or updated form
				->subject('APM Form Notice')
				->attach($data['files'])
				->priority(2);
		});

		// send user back to the homepage with success message
		return Redirect::to('/')
			->with('send_notice', '');
	}
	
	
	public function printPdf()
	{
		// YOU NEED THIS FILE BEFORE YOU CAN RUN DOMPDF
		define('INCLUDE_PATH', '/home/dsimedic/apm/vendor/dompdf/dompdf');
		@ini_set("include_path", INCLUDE_PATH);
		require_once('dompdf_config.inc.php');

		// grab session data passed from the redirect
		$apmformdata = Session::get('apmform');
		
		// select all managers with in the region given by the JobNumber
		$regionId = substr($apmformdata->JobNumber,0,3);
		$lnkManagers = lnkRegionsManager::where('regionID', $regionId)->lists('managerID');
		$managerInfo = Manager::whereIn('id', $lnkManagers)->where('active', 1)->get();

		// render the page with the correct data passed in
		$html = View::make('formPdf')
			->with('apmformdata', $apmformdata)
			->with('managerInfo', $managerInfo)
			->with('regionId', $regionId);
		
		// setup and generate the PDF
		$dompdf = new DOMPDF();
		$dompdf->load_html($html);
		$dompdf->render();
		
		// output the pdf to a new window.
		$file_to_save = './pdf/'.$apmformdata->JobNumber.'.pdf';
    		$dompdf->stream($file_to_save, array("Attachment" => 0));

	}
}