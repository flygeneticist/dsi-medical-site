<!DOCTYPE html>
<html>
<head>
    <title>DSI Medical Services,Inc. Drug & Alcohol Program Management Services</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <!-- Optimized mobile viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    {{ HTML::style('bootstrap.css') }}
</head>
<body>
    <nav class="navbar navbar-default" role="navigation" style="background: #FFF;">
	    <div class="navbar-header" style="float: left;">
	    	<a href="http://dsimed.com/APM/"><img src={{asset('logo2.jpg')}} alt="DSI Medical Logo"></a>
	    </div>
	    <div class="title">
                    <center><h2>DSI Atlantic Plant Maintenance Form</h2></center>
            </div>
            <a href={{url('logout')}} class="btn btn-danger" type="button" style="float: right;">Logout</a>
            @if (Auth::user()->role == 4)
            	<!--Show the Admin button-->
            	<a href={{url('admin')}} class="btn btn-primary" type="button" style="float: right;">Admin</a>
            @endif
	</nav> 

    <div class="main-form-page" style="clear: all; padding-left: 10px; padding-right: 10px;">
        <div class="FormContactDetails">
            <p><strong>For any questions or issues with the form please contact:</strong></p>
            <p><strong>Joseph F. Whelan, Carol Masterson, or Susan Hough</strong></p>
            <p style="padding-left: 10px;">
                <strong>Phone: 800-770-0531</strong><br />
                <strong>E-Mail: apm@dsimed.com</strong><br />
                <strong>Fax: 215-957-0640</strong><br />
            </p>
        </div>
        
        <div class="gapdiv"></div>
            <!-- check for flash notification message -->
            @if(Session::has('flash_notice'))
                <div id="flash_notice"><p class="bg-danger"><h3>{{ Session::get('flash_notice') }}</h3></p></div>
            @elseif(Session::has('region_err'))
                <div id="region_err"><span class="error"><h4>{{ Session::get('region_err') }}</h4></span></div>
            @endif
            <div style="margin-bottom:20px;">
                {{ Form::model($apmformdata, array('id' => 'apm_form', 'method' => 'POST', 'route' => 'form.update')) }}
                {{ Form::token() }}
                
                <!-- Id for a form should be saved as a hidden form field for mapping-->
                 @if (($apmformdata->id) != "")
                    {{ Form::hidden('id', $apmformdata->id) }}
                 @else
                    {{ Form::hidden('id') }}
                 @endif

                <div id="group1">
                    <div class="textborder form-group">
                        <h2>APM Job Information</h2>
                        {{ Form::label('APMTime', 'Date of Request:') }}
                        @if (($apmformdata->id) != "")
                            {{ Form::hidden('APMTime', $apmformdata->APMTime) }}
                            {{ $apmformdata->APMTime }}
                        @else
                            {{ Form::text('APMTime', date('m/d/Y'), array('placeholder'=>'MM/DD/YYYY')) }}
                        @endif
                        {{ $errors->first('APMTime', '<span class="error">:message</span>') }}<br/>

                        {{ Form::label('JobNumber', 'Job Number (XXXXXX-XXX):') }}
                        @if (($apmformdata->id) != "")
                            {{ Form::hidden('JobNumber', $apmformdata->JobNumber) }}
                            {{ $apmformdata->JobNumber }}
                        @else
                            {{ Form::text('JobNumber') }}
                        @endif
                        {{ $errors->first('JobNumber', '<span class="error">:message</span>') }}<br/>

                        {{ Form::label('JobsiteName', 'Jobsite Name:') }}
                        {{ Form::text('JobsiteName') }}
                        {{ $errors->first('JobsiteName', '<span class="error">:message</span>') }}<br/>
                        
                        {{ Form::label('NumberOfTests', 'Number of Tests:') }}
                        {{ Form::text('NumberOfTests') }}
                        {{ $errors->first('NumberOfTests', '<span class="error">:message</span>') }}<br/>
                        
                        {{ Form::label('JobsiteAddress', 'Jobsite Address:') }}
                        {{ Form::text('JobsiteAddress') }}
                        {{ $errors->first('JobsiteAddress', '<span class="error">:message</span>') }}<br/>
                        
                        {{ Form::label('JobsiteCity', 'City:') }}
                        {{ Form::text('JobsiteCity') }}
                        {{ $errors->first('JobsiteCity', '<span class="error">:message</span>') }}<br/>
                        
                        {{ Form::label('JobsiteState', 'State:') }}
                        {{ Form::text('JobsiteState') }}
                        {{ $errors->first('JobsiteState', '<span class="error">:message</span>') }}<br/>
                        
                        {{ Form::label('JobsiteZIP', 'Zip Code:') }}
                        {{ Form::text('JobsiteZIP') }}
                        {{ $errors->first('JobsiteZIP', '<span class="error">:message</span>') }}<br/>
                    </div><br/>
                </div>

                <div class="gapdiv"></div>

                <div id="group2">
                    <div class="textborder form-group">
                        <h2>On-Site / APM Contact Information</h2>
                        <div>  
                            <strong>On-Site Contact (Dayshift)</strong><br/>
                            
                            {{ Form::label('ContactDayShift', 'Name:') }}
                            {{ Form::text('ContactDayShift') }}
                            {{ $errors->first('ContactDayShift', '<span class="error">:message</span>') }}<br/>
                            
                            {{ Form::label('ContactDayShiftCell', 'Cell phone:') }}
                            {{ Form::text('ContactDayShiftCell', null, array('placeholder'=>'XXX-XXX-XXXX')) }}
                            {{ $errors->first('ContactDayShiftCell', '<span class="error">:message</span>') }}<br/>
                        </div>
                        <div class="minigapdiv"></div>
                        <div>
                            <strong>On-Site Contact (Nightshift)</strong><br/>
                            
                            {{ Form::label('ContactNightshift', 'Name:') }}
                            {{ Form::text('ContactNightshift') }}
                            {{ $errors->first('ContactNightshift', '<span class="error">:message</span>') }}<br/>
                            
                            {{ Form::label('ContactNightShiftCell', 'Cell phone:') }}
                            {{ Form::text('ContactNightShiftCell', null, array('placeholder'=>'XXX-XXX-XXXX')) }}
                            {{ $errors->first('ContactNightShiftCell', '<span class="error">:message</span>') }}<br/>
                        </div>
                    </div>
                    <div class="gapdiv"></div>

                <div id="group8">
                    <div class="textborder form-group">    
                        <h2>GE Manager Information</strong></h2>
                        {{ Form::label('GEContact', 'Name:') }}
                        {{ Form::text('GEContact') }}
                        {{ $errors->first('GEContact', '<span class="error">:message</span>') }}<br/>
                        
                        {{ Form::label('GECell', 'Cell phone:') }}
                        {{ Form::text('GECell', null, array('placeholder'=>'XXX-XXX-XXXX')) }}
                        {{ $errors->first('GECell', '<span class="error">:message</span>') }}<br/>
                    </div>
                </div>

                <div class="gapdiv"></div>

                <div id="group3" style="clear:both;">
                    <div class="textborder form-group">
                        <h2>Gate Security Information</h2>
                        <strong>APM notification to Gate Security for Collectors Arrival</strong><br/>
                        
                        {{ Form::label('Dateofnotification', 'Date of Notification:') }}
                        {{ Form::text('Dateofnotification', null, array('placeholder'=>'MM/DD/YYYY')) }}
                        {{ $errors->first('Dateofnotification', '<span class="error">:message</span>') }}<br/>
                        
                        {{ Form::label('SecurityContact', 'Security Contact Name:') }}
                        {{ Form::text('SecurityContact') }}
                        {{ $errors->first('SecurityContact', '<span class="error">:message</span>') }}<br/>
          
                        {{ Form::label('GateSecurityContactNo', 'Security Contact Number:') }}
                        {{ Form::text('GateSecurityContactNo', null) }}
                        {{ $errors->first('GateSecurityContactNo', '<span class="error">:message</span>') }}<br/>
                    </div>
                </div>

                <div class="gapdiv"></div>

                    <div class="textborder form-group" id="group4">
                            <h2>Testing Schedule</h2>
                        <div>                        
                            {{ Form::label('DatePrimeDay', 'Primary Test Date:') }}<br/>
                            {{ Form::text('DatePrimeDay', null, array('placeholder'=>'MM/DD/YYYY')) }}
                            {{ $errors->first('DatePrimeDay', '<span class="error">:message</span>') }}<br/>
                            <div class='hugger'>
	                            <h4>Day Shift:</h4>
	                            {{ Form::label('TimePrimeDay', 'Start Time:') }}
	                            {{ Form::text('TimePrimeDay', null, array('placeholder'=>'hh:mm AM/PM')) }}
	                            {{ $errors->first('TimePrimeDay', '<span class="error">:message</span>') }}<br/>
	                            
	                            {{ Form::label('TimeEndPrimeDay', 'Finish Time:') }}
	                            {{ Form::text('TimeEndPrimeDay', null, array('placeholder'=>'hh:mm AM/PM')) }}
	                            {{ $errors->first('TimeEndPrimeDay', '<span class="error">:message</span>') }}<br/>
	                            
	                            	                            
	                            {{ Form::label('NumberOfTestsDay', 'Number of Tests:') }}
	                            {{ Form::text('NumberOfTestsDay', null) }}
	                            {{ $errors->first('NumberOfTestsDay', '<span class="error">:message</span>') }}<br/>
	                            
                            </div>
                            <div class='wrapper'>
	                            <h4>Night Shift:</h4>
	                            {{ Form::label('TimePrimeNight', 'Start Time:') }}
	                            {{ Form::text('TimePrimeNight', null, array('placeholder'=>'hh:mm AM/PM')) }}
	                            {{ $errors->first('TimePrimeNight', '<span class="error">:message</span>') }}<br/>
	                            
	                            {{ Form::label('TimeEndPrimeNight', 'Finish Time:') }}
	                            {{ Form::text('TimeEndPrimeNight', null, array('placeholder'=>'hh:mm AM/PM')) }}
	                            {{ $errors->first('TimeEndPrimeNight', '<span class="error">:message</span>') }}<br/>
	                            
	                            	                            
	                            {{ Form::label('NumberOfTestsNight', 'Number of Tests:') }}
	                            {{ Form::text('NumberOfTestsNight', null) }}
	                            {{ $errors->first('NumberOfTestsNight', '<span class="error">:message</span>') }}<br/>

                            </div>
                        </div>
                        <div class="minigapdiv"></div>
                        <div>   
                            {{ Form::label('comments', 'Comments:') }}<br/>
                            {{ Form::textarea('comments', null, array('placeholder'=>'Enter any comments or details here...', 'size' => '90x7')) }}                        
                            {{ $errors->first('comments', '<span class="error">:message</span>') }}<br/>
                        </div>
                    </div>

                <div class="gapdiv"></div>

                <div id="group5" style="clear:both;">
                    <div class="textborder form-group">
                        <h2>Worksite Testing Area</h2>
                        <h3>Does the worksite have the following?</h3>
                        
                        {{ Form::label('SafeArea', 'Safe confidential / private work area with a table:') }}
                        {{Form::select('SafeArea', array(null => '', '1' => 'Yes', '0' => 'No')) }}
                        {{ $errors->first('SafeArea', '<span class="error">:message</span>') }}<br/>
                        
                        {{ Form::label('Worktrailer', 'Work Trailer:') }}
                        {{Form::select('Worktrailer', array(null => '', '1' => 'Yes', '0' => 'No')) }}
                        {{ $errors->first('Worktrailer', '<span class="error">:message</span>') }}<br/>
                        
                        {{ Form::label('Bathroom', 'Bathroom:') }}
                        {{Form::select('Bathroom', array(null => '', '1' => 'Yes', '0' => 'No')) }}
                        {{ $errors->first('Bathroom', '<span class="error">:message</span>') }}<br/>
                        
                        {{ Form::label('PortalJohn', 'Port-a-john:') }}
                        {{Form::select('PortalJohn', array(null => '', '1' => 'Yes', '0' => 'No')) }}
                        {{ $errors->first('PortalJohn', '<span class="error">:message</span>') }}<br/>
                        
                        {{ Form::label('BathFeet', "How far, in feet, is the Collector's Work Area from the bathroom / Port-a-john?") }}
                        {{ Form::text('BathFeet', null, array('placeholder'=>'feet')) }}   
                        {{ $errors->first('BathFeet', '<span class="error">:message</span>') }}<br/>
                        
                        {{ Form::label('RunningWater', 'Running water for washing hands:') }}
                        {{Form::select('RunningWater', array(null => '', '1' => 'Yes', '0' => 'No')) }}
                        {{ $errors->first('RunningWater', '<span class="error">:message</span>') }}<br/>
                        
                        {{ Form::label('DrinkingWater', 'Drinking Water:') }}
                        {{Form::select('DrinkingWater', array(null => '', '1' => 'Yes', '0' => 'No')) }}
                        {{ $errors->first('DrinkingWater', '<span class="error">:message</span>') }}<br/>
                    </div>
                </div>

                <div class="article">
                    <h3 style="color:#d9534f";><u>Note:</u> Collectors MUST bring a photo ID and appropriate footware to all job sites!</h3>
                </div>

                    <div class="dsionly textborder form-group" id="group6">
                            <h2>Clinic Contact Information</h2>
                            <h4><i>DSI USE ONLY</i></h4>
                            <div class="hugger">
                                <h3>Assigned Service Provider</h3>
                                
                                {{ Form::label('ASPClinicName', 'Clinic Name:') }}
                                {{ Form::text('ASPClinicName') }}   
                                {{ $errors->first('ASPClinicName', '<span class="error">:message</span>') }}<br/>                              
                                
                                {{ Form::label('ASPClinicAddress', 'Clinic Address:') }}
                                {{ Form::text('ASPClinicAddress') }}   
                                {{ $errors->first('ASPClinicAddress', '<span class="error">:message</span>') }}<br/>                                
                                
                                {{ Form::label('ASPClinicCity', 'City:') }}
                                {{ Form::text('ASPClinicCity') }}   
                                {{ $errors->first('ASPClinicCity', '<span class="error">:message</span>') }}<br/>
                                
                                {{ Form::label('ASPClinicState', 'State:') }}
                                {{ Form::text('ASPClinicState') }} 
                                {{ $errors->first('ASPClinicState', '<span class="error">:message</span>') }}<br/>  
                                
                                {{ Form::label('ASPClinicZIP', 'Zip code:') }}
                                {{ Form::text('ASPClinicZIP') }} 
                                {{ $errors->first('ASPClinicZIP', '<span class="error">:message</span>') }}<br/>
				<div class="minigapdiv"></div>
                                {{ Form::label('ASPClinicContact', 'Contact Person:') }}
                                {{ Form::text('ASPClinicContact') }} 
                                {{ $errors->first('ASPClinicContact', '<span class="error">:message</span>') }}<br/>
                                
                                {{ Form::label('ASPClinicPhone', 'Phone number:') }}
                                {{ Form::text('ASPClinicPhone', null, array('placeholder'=>'XXX-XXX-XXXX')) }} 
                                {{ $errors->first('ASPClinicPhone', '<span class="error">:message</span>') }}<br/>
                                
                                {{ Form::label('ASPClinicFax', 'Fax Number:') }}
                                {{ Form::text('ASPClinicFax', null, array('placeholder'=>'XXX-XXX-XXXX')) }} 
                                {{ $errors->first('ASPClinicFax', '<span class="error">:message</span>') }}<br/>
                            </div>
                        </div>

                    <div class="gapdiv"></div>

                    <div class="dsionly textborder form-group" id="group7">
                            <h2>Collector Information</h2>
                            <h4><i>DSI USE ONLY</i></h4>
                         <div class="hugger">
                            <h3></h3>   
                            {{ Form::label('Collectors', 'Name:') }}
                            {{ Form::text('Collectors') }}
                            {{ $errors->first('Collectors', '<span class="error">:message</span>') }}<br/>
                            
                            {{ Form::label('CollectorsPhone', 'Phone Number:') }}
                            {{ Form::text('CollectorsPhone', null, array('placeholder'=>'XXX-XXX-XXXX')) }}
                            {{ $errors->first('CollectorsPhone', '<span class="error">:message</span>') }}<br/>
                            
                            {{ Form::label('CollectorsCell', 'Cell Number:') }}
                            {{ Form::text('CollectorsCell', null, array('placeholder'=>'XXX-XXX-XXXX')) }}
                            {{ $errors->first('CollectorsCell', '<span class="error">:message</span>') }}<br/>
                            
                            {{ Form::label('Cost', 'Special Offset Cost:') }}
                            {{ Form::text('Cost') }}
                            {{ $errors->first('Cost', '<span class="error">:message</span>') }}<br/>
                            
                            {{ Form::label('Mileage', 'Mileage:') }}
                            {{ Form::text('Mileage') }}
                            {{ $errors->first('Mileage', '<span class="error">:message</span>') }}<br/>
                            
                            {{ Form::label('Allowance', 'Allowance:') }}
                            {{ Form::text('Allowance') }}
                            {{ $errors->first('Allowance', '<span class="error">:message</span>') }}<br/>
                            
                            {{ Form::label('CompletedBy', 'Completed By DSI:') }}
                            {{ Form::text('CompletedBy') }}
                            {{ $errors->first('CompletedBy', '<span class="error">:message</span>') }}<br/>
                            
                            {{ Form::label('ConfirmedDate', 'Confirmed with APM on:') }}
                            {{ Form::text('ConfirmedDate', null, array('placeholder'=>'MM/DD/YYYY')) }}
                            {{ $errors->first('ConfirmedDate', '<span class="error">:message</span>') }}<br/>
                            
                            {{ Form::label('ConfirmedEmailDate', 'Emailed on:') }}
                            {{ Form::text('ConfirmedEmailDate', null, array('placeholder'=>'MM/DD/YYYY')) }}                            
                            {{ $errors->first('ConfirmedEmailDate', '<span class="error">:message</span>') }}<br/>
                        </div>    
                    </div>
                </div>
                
 		<div class="gapdiv"></div>

                <div class="form-group" style="clear:all;">
                    <h3 style="color:#428bca;">Please double check all data before submitting it!</h3>
                    <input type="submit" class="btn btn-success btn-lg" style="margin-right: 50px;" role="button" name="submit" value="Submit Form"/>
                    @if ($print_button)
                    	<input type="submit" class="btn btn-info btn-lg" style="margin-right: 50px;" role="button"  name="print" value="Print Form"/>
                    @endif
                    <a href={{url('/')}} class="btn btn-danger btn-lg" type="button">Cancel Changes</a>
                </div>
            {{ Form::close() }}
        </div>
      </div>
      <!--Placed JS files at end of page to allow for faster load times-->
      {{ HTML::script('jquery-1.11.0.min.js') }}
      {{ HTML::script('jquery-form-validator.js') }}
  </body>
</html>