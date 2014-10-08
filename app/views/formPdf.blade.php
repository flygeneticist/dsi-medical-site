<!DOCTYPE html>
<html>
<head>
	<title>DSI Medical Services,Inc. Drug & Alcohol Program Management Services</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<!-- Optimized mobile viewport -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<style>
		h1 {
		  margin: 0.67em 0;
		  font-size: 2em;
		}
		h1,
		h2,
		h3,
		h4,
		h5,
		h6,
		.h1,
		.h2,
		.h3,
		.h4,
		.h5,
		.h6 {
		  font-family: Helvetica, Arial, sans-serif;
		  font-weight: 500;
		  line-height: 1.1;

		}
		
		h1,
		h2,
		h3 {
		  margin-top: 5px;
		  margin-bottom: 5px;
		}
		
		h4,
		h5,
		h6 {
		  margin-top: 5px;
		  margin-bottom: 5px;
		}
		
		h1,
		.h1 {
		  font-size: 30px;
		}
		
		h2,
		.h2 {
		  font-size: 24px;
		}
		
		h3,
		.h3 {
		  font-size: 18px;
		}
		
		h4,
		.h4 {
		  font-size: 14px;
		}
		
		strong {
		  font-weight: bold;
		}
		
		html {
		  font-size: 62.5%;
		}
		
		body {
		  font-family: Helvetica, Arial, sans-serif;
		  font-size: 14px;
		  line-height: 1.43;
		  margin:0;
		  padding:0;
		  color: #000000;
		  background-color: #ffffff;
		}
		
		a {
		  color: #428bca;
		  text-decoration: none;
		  margin-bottom: 0px;
		}

		.textborder {
		    border: 1px solid #000000;
		    padding: 0px 0px 0px 0px;
		    clear: both;
		}

		span {
		    color: #b94a48;
		}

		.minigapdiv {
		    clear: both;
		    height: 5px;
		}

		.dsionly {
		  background-color: #CAD3CA;
		}

		.gt {
		  background-color: #cacad3;
		}
		
		.input-append button.add-on {
		    height: inherit !important;
		}

		div.form-section {
		  margin: 0px, 0px, 0px, 0px;
		}
	</style>
</head>
<body>
    <div class="main-form-page" style="padding-left: 10px; padding-right: 10px;">
    	<center><h2>DSI Atlantic Plant Maintenance Form<h2></center>
        <div class="FormContactDetails">
            <p>For any questions or issues with the form please contact: Joseph F. Whelan, Carol Masterson, or Susan Hough</p>
            <p><strong>Phone:</strong> 800-770-0531&nbsp;&nbsp;&nbsp;&nbsp;<strong>E-Mail:</strong> apm@dsimed.com&nbsp;&nbsp;&nbsp;&nbsp;<strong>Fax:</strong> 215-957-0640</p>
        </div>
        <div>
            {{ Form::model($apmformdata, array('id' => 'apm_form', 'method' => 'POST', 'route' => 'form.update')) }}             
                <div id="group1">
                    <div class="textborder form-group">
                        <strong>{{ Form::label('APMTime', 'Date of APM:') }}&nbsp;&nbsp;</strong>
                        {{ $apmformdata->APMTime }}<br/>

                        <strong>{{ Form::label('JobNumber', 'Job Number:') }}&nbsp;&nbsp;</strong>
                        {{ $apmformdata->JobNumber }}<br/>

                        <strong>{{ Form::label('JobsiteName', 'Jobsite Name:') }}&nbsp;&nbsp;</strong>
                        {{ $apmformdata->JobsiteName }}<br/>
                        
                        <strong>{{ Form::label('NumberOfTests', 'Number of Tests (Approximate):') }}&nbsp;&nbsp;</strong>
                        {{ $apmformdata->NumberOfTests }}<br/>
                        
                        <strong>{{ Form::label('JobsiteAddress', 'Jobsite Address:') }}&nbsp;&nbsp;</strong><br/>
                        {{ $apmformdata->JobsiteAddress }} {{ $apmformdata->JobsiteCity }} {{ $apmformdata->JobsiteState }}, {{ $apmformdata->JobsiteZIP }}
                    </div>
                </div>

                <div class="minigapdiv"></div>

                <div id="group2">
                    <div class="textborder form-group">
                    <div class="gt">
                        <h3>On-Site / APM Contact Information</h3>
                    </div>
                        <table>
                        <tr>
                        	<th><strong>On-Site Contact (Dayshift)</strong></th>
                            	<th style="padding-left:25px;"><strong>On-Site Contact (Nightshift)</strong></th>
                        </tr>
                        <tr>
                        	<td>
                        		<strong>{{ Form::label('ContactDayShift', 'Name:') }}&nbsp;&nbsp;</strong>
                            		{{ $apmformdata->ContactDayShift }}<br/>
                            		<strong>{{ Form::label('ContactDayShiftCell', 'Cell phone:') }}&nbsp;&nbsp;</strong>
                            		{{ $apmformdata->ContactDayShiftCell }}<br/>
                        	</td>
                        	<td style="padding-left:25px;">
                        		<strong>{{ Form::label('ContactNightShift', 'Name:') }}&nbsp;&nbsp;</strong>
                            		{{ $apmformdata->ContactNightshift }}<br/>
                            		<strong>{{ Form::label('ContactNightShiftCell', 'Cell phone:') }}&nbsp;&nbsp;</strong>
                            		{{ $apmformdata->ContactNightShiftCell }}<br/>
                            	</td>
                        </tr>
                       	</table>
                            
                    </div>
                </div>
                <div class="minigapdiv"></div>

                <div id="group8">
                    <div class="textborder form-group">
                    <div class="gt">    
                        <h3>GE Manager Information</strong></h3>
                    </div>
                             <strong>{{ Form::label('GEContact', 'Name:') }}&nbsp;&nbsp;</strong>
                            {{ $apmformdata->GEContact }}<br/>
                            
                            <strong>{{ Form::label('GECell', 'Cell phone:') }}&nbsp;&nbsp;</strong>
                            {{ $apmformdata->GECell }}<br/>
                    </div>
                </div>
                
		<div class="minigapdiv"></div>
		
                    <!-- MANAGER DATA GOES HERE! -->
                    @if (@managerInfo != null)
	                    <div id="group9" style="clear:both;">
	                    	<div class="textborder form-group">
	                    	<h3>Region Safety Manager(s)</h3>	
	                    	@foreach ($managerInfo as $manager)
		                    <p>
		                    	<strong>{{{ $manager->firstName.' '.$manager->lastName}}}</strong><br/>
		                    	{{{ 'Phone: '.$manager->phone.', Fax: '.$manager->fax.', Cell: '.$manager->cell.', Email: '.$manager->email }}}
		                    </p>
		                @endforeach 
	                       </div>
	                    </div>
		   @endif
                <div class="minigapdiv"></div>

                <div id="group3" style="clear:both;">
                    <div class="textborder form-group">
                        <div class="gt">
	                        <h3>Gate Security Information</h3>
	                </div>
                        <strong>APM notification to Gate Security for Collectors Arrival</strong><br/>
                        
                        <strong>{{ Form::label('Dateofnotification', 'Date of Notification:') }}&nbsp;&nbsp;</strong>
                        @if ($apmformdata->Dateofnotification == null || $apmformdata->Dateofnotification == '01/01/1900')
                		&nbsp;
            		@else
            			{{ $apmformdata->Dateofnotification }}<br/>
            		@endif
                    		
                        <strong>{{ Form::label('SecurityContact', 'Security Contact Name:') }}&nbsp;&nbsp;</strong>
                        {{ $apmformdata->SecurityContact }}<br/>
                        
                        <strong>{{ Form::label('GateSecurityContactNo', 'Security Contact Number:') }}&nbsp;&nbsp;</strong>
                        @if ($apmformdata->GateSecurityContactNo == null)
                        	&nbsp;
                        @else                     
	                        {{ $apmformdata->GateSecurityContactNo}}<br/>
	                @endif
                    </div>
                </div>

                <div class="minigapdiv"></div>

                <div id="group4">
                    <div class="textborder form-group">
                     	<div class="gt"> 
                        	<h3>Testing Schedule</h3> 
                        </div>
                        
                        <table border="0">
			  <tr>
			    <th></th>
			    <th colspan="2"><h4><strong>Primary Test Date</strong></h4></th>
			  </tr>
			  <tr>
			    <th></th>
			    <th><strong>Day Shift</strong></th>
			    <th><strong>Night Shift</strong></th>
			    <th><strong>Day Shift</strong></th>
			    <th><strong>Night Shift</strong></th>
			  </tr>
			  <tr>
			    <td><strong>Test Date</strong></td>
			    <td>
			    	@if ($apmformdata->DatePrimeDay == null || $apmformdata->DatePrimeDay == '01/01/1900')
                        		&nbsp;
                    		@else
                    			<center>{{ $apmformdata->DatePrimeDay }}</center>
                    		@endif
			    </td>
			    <td>
			    	@if ($apmformdata->DatePrimeDay == null || $apmformdata->DatePrimeDay == '01/01/1900')
                        		&nbsp;
                    		@else
                    			<center>{{ $apmformdata->DatePrimeDay }}</center>
                    		@endif
			   </td>
			  </tr>
			  <tr>
			    <td><strong>Start Time</strong></td>
			    <td><center>{{ $apmformdata->TimePrimeDay }}</center></td>
			    <td><center>{{ $apmformdata->TimePrimeNight }}</center></td>
			  </tr>
			  <tr>
			    <td><strong>End Time</strong></td>
			    <td><center>{{ $apmformdata->TimeEndPrimeDay }}</center></td>
			    <td><center>{{ $apmformdata->TimeEndPrimeNight }}</center></td>
			  </tr>
			  <tr>
			    <td><strong>Number of Tests</strong></td>
			    <td><center>{{ $apmformdata->NumberOfTestsDay }}</center></td>
			    <td><center>{{ $apmformdata->NumberOfTestsNight }}</center></td>
			  </tr>
		        </table>

                        <div>   
                            <strong>{{ Form::label('comments', 'Comments:') }}<br/>&nbsp;&nbsp;</strong>
                            {{ $apmformdata->comments }}<br/>
                        </div>
                    </div>
                </div>

                <div class="minigapdiv"></div>

                <div id="group5" style="clear:both;">
                    <div class="textborder form-group">
                     	<div class="gt"> 
                        	<h3>Worksite Testing Area</h3>
                        </div>
                        <h4>Does the worksite have the following?</h4>
                        
                        <strong>{{ Form::label('SafeArea', 'Safe confidential / private work area with a table:') }}&nbsp;&nbsp;</strong>
                        @if ($apmformdata->SafeArea == 1)
                        	YES
                    	@elseif ($apmformdata->SafeArea == 0)
                    		NO
                    	@endif
                        <br/>
                        
                        <strong>{{ Form::label('Worktrailer', 'Work Trailer:') }}&nbsp;&nbsp;</strong>
                        @if ($apmformdata->Worktrailer == 1)
                        	YES
                    	@elseif ($apmformdata->Worktrailer == 0)
                    		NO
                    	@endif
                        <br/>
                        
                        <strong>{{ Form::label('Bathroom', 'Bathroom:') }}&nbsp;&nbsp;</strong>
                        @if ($apmformdata->Bathroom == 1)
                        	YES
                    	@elseif ($apmformdata->Bathroom == 0)
                    		NO
                    	@endif
                        <br/>
                        
                        <strong>{{ Form::label('PortalJohn', 'Port-a-john:') }}&nbsp;&nbsp;</strong>
                        @if ($apmformdata->PortalJohn == 1)
                        	YES
                    	@elseif ($apmformdata->PortalJohn == 0)
                    		NO
                    	@endif
                        <br/>
                        
                        <strong>{{ Form::label('BathFeet', "How far, in feet, is the Collector's Work Area from the bathroom / Port-a-john?") }}&nbsp;&nbsp;</strong>
                        {{ $apmformdata->BathFeet }}<br/>
                        
                        <strong>{{ Form::label('RunningWater', 'Running water for washing hands:') }}&nbsp;&nbsp;</strong>
                        @if ($apmformdata->RunningWater == 1)
                        	YES
                    	@elseif ($apmformdata->RunningWater == 0)
                    		NO
                    	@endif
                        <br/>
                        
                        <strong>{{ Form::label('DrinkingWater', 'Drinking Water:') }}&nbsp;&nbsp;</strong>
                        @if ($apmformdata->DrinkingWater == 1)
                        	YES
                    	@elseif ($apmformdata->DrinkingWater == 0)
                    		NO
                    	@endif
                        <br/>
                    </div>
                </div>

                <div class="article">
                    <h3 style="color:#d9534f";><u>Note:</u> Collectors MUST bring a photo ID and appropriate footware to all job sites!</h3>
                </div>

                    <div class="textborder form-group" id="group6">
                   	<div class="dsionly"> 
                            <h3>Clinic Contact Information</h3>
                            <h4><i>DSI Use Only</i></h4>
                        </div>
                        <div>
                            <table>
                            <thead>
                            	<tr>
                            		<th><h4>Assigned Service Provider</h4></th>
                            	</tr>
                            </thead>
                            </tbody>
                            	<tr>
                            		<td>
                            			<strong>{{ Form::label('ASPClinicName', 'Clinic Name:') }}&nbsp;&nbsp;</strong>
                                		{{ $apmformdata->ASPClinicName }}   <br/>
                                
                                		<strong>{{ Form::label('ASPClinicAddress', 'Clinic Address:') }}&nbsp;&nbsp;</strong>
                                		{{ $apmformdata->ASPClinicAddress }}   <br/>
                                
                               			<strong>{{ Form::label('ASPClinicCity', 'City:') }}&nbsp;&nbsp;</strong>
                                		{{ $apmformdata->ASPClinicCity }}   <br/>
                                
                                		<strong>{{ Form::label('ASPClinicState', 'State:') }}&nbsp;&nbsp;</strong>
                                		{{ $apmformdata->ASPClinicState }} <br/>
                                
                                		<strong>{{ Form::label('ASPClinicZIP', 'Zip code:') }}&nbsp;&nbsp;</strong>
                                		{{ $apmformdata->ASPClinicZIP }} <br/>
                                		<br/>
                                		<br/>
                                		<strong>{{ Form::label('ASPClinicContact', 'Contact Person:') }}&nbsp;&nbsp;</strong>
                               			{{ $apmformdata->ASPClinicContact }} <br/>
                                
                                		<strong>{{ Form::label('ASPClinicPhone', 'Phone number:') }}&nbsp;&nbsp;</strong>
                                		{{ $apmformdata->ASPClinicPhone }} <br/>
                                
                                		<strong>{{ Form::label('ASPClinicFax', 'Fax Number:') }}&nbsp;&nbsp;</strong>
                                		{{ $apmformdata->ASPClinicFax }} <br/>
                            		</td>
                            	</tr>
                           </tbody>
                          </table>
                     </div> 
                    </div> 

                    <div class="minigapdiv"></div>

                    <div class="textborder form-group" id="group7">
                    	<div class="dsionly"> 
                            <h3>Collector Information</h3>
                            <h4><i>DSI Use Only</i></h4>
                       </div> 
                         <div class="hugger">
                            <h4></h4>   
                            <strong>{{ Form::label('Collectors', 'Name:') }}&nbsp;&nbsp;</strong>
                            {{ $apmformdata->Collectors }}<br/>
                            
                            <strong>{{ Form::label('CollectorsPhone', 'Phone Number:') }}&nbsp;&nbsp;</strong>
                            {{ $apmformdata->CollectorsPhone }}<br/>
                            
                            <strong>{{ Form::label('CollectorsCell', 'Cell Number:') }}&nbsp;&nbsp;</strong>
                            {{ $apmformdata->CollectorsCell }}<br/>
                            
                            <strong>{{ Form::label('Cost', 'Special Offset Cost:') }}&nbsp;&nbsp;</strong>
                            {{ $apmformdata->Cost }}<br/>
                            
                            <strong>{{ Form::label('Mileage', 'Mileage:') }}&nbsp;&nbsp;</strong>
                            {{ $apmformdata->Mileage }}<br/>
                            
                            <strong>{{ Form::label('Allowance', 'Allowance:') }}&nbsp;&nbsp;</strong>
                            {{ $apmformdata->Allowance }}<br/>
                            <br/>
                            <strong>{{ Form::label('CompletedBy', 'Completed By DSI:') }}&nbsp;&nbsp;</strong>
                            {{ $apmformdata->CompletedBy }}<br/>
                            
                            <strong>{{ Form::label('ConfirmedDate', 'Confirmed with APM on (MM/DD/YYYY):') }}&nbsp;&nbsp;</strong>
                            {{ $apmformdata->ConfirmedDate }}<br/>
                            
                            <strong>{{ Form::label('ConfirmedEmailDate', 'Emailed on (MM/DD/YYYY):') }}</strong>
                            {{ $apmformdata->ConfirmedEmailDate }}<br/>
                        </div>    
                    </div>
                </div>
            {{ Form::close() }}
        </div>
      </div>
  </body>
</html>