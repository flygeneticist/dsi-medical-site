<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="text/javascript" href="jquery-1.11.0.min.js" />
    {{ HTML::style('bootstrap.css') }}
    <title>DSI Medical Services,Inc. Drug & Alcohol Program Management Services</title>
    </head>
<body>
    <center><h1>DSI Altlantic Maintainence Plant Form<h1></center>
    <div class="main-form-page" style="padding-left: 10px; padding-right: 10px;">
        <div class="FormContactDetails">
            <p><strong>In case of and questions or issues with the form please contact:</strong></p>
            <p><strong>Joseph F. Whelan, Carol Masterson, or Susan Hough</strong></p>
            <p style="padding-left: 10px;">
                <strong>Phone: 800-770-0531</strong><br />
                <strong>E-Mail: apm@dsimed.com</strong><br />
                <strong>Fax: 215-957-0640</strong><br />
            </p>
        </div>

        <nav id="group0">
            <div class="textborder">  
                <h2>Jump to Section</h2>
                <div style="margin-bottom:5px;">
                    <!-- Clicking a grouptakes the user to a specific archor link -->
                    <a href="#group1" class="btn btn-primary btn-sm" role="button">Basic Info</a>
                    <a href="#group2" class="btn btn-primary btn-sm" role="button">On-Site/GE Contacts Info</a>
                    <a href="#group3" class="btn btn-primary btn-sm" role="button">Gate Security Info</a>
                    <a href="#group4" class="btn btn-primary btn-sm" role="button">Test Schedule</a>
                </div>
                <div>
                    <a href="#group5" class="btn btn-primary btn-sm" role="button">Worksite Ammenities</a>
                    <a href="#group6" class="btn btn-primary btn-sm" role="button">Testing Clinic Info</a>
                    <a href="#group7" class="btn btn-primary btn-sm" role="button">Collector Info</a>
                </div>
            </div>
        </nav>

        <div class="gapdiv"></div>

        <div style="margin-bottom:20px;">
            {{ Form::model($apmformdata, array('method' => 'POST', 'route' => array('form.update', $apmformdata -> id))) }}
                {{ Form::token() }}
                <input name="id" type="hidden" value=""/>
                <div id="group1">
                    <div class="textborder form-group">
                        <h2>Basic Information</h2>
                        
                        {{ $errors->first('APMTime', '<span class="error">:message</span>') }}<br/>
                        {{ Form::label('APMTime', 'Date of APM (MM/DD/YYYY):') }}
                        {{ Form::text('APMTime') }}
                        
                        {{ $errors->first('Contractor', '<span class="error">:message</span>') }}<br/>
                        {{ Form::label('Contractor', 'Contractor name:') }}
                        {{ Form::text('Contractor') }}


                        {{ $errors->first('JobNumber', '<span class="error">:message</span>') }}<br/>
                        {{ Form::label('JobNumber', 'Job Number (10-digits)') }}
                        {{ Form::text('JobNumber') }}

                        {{ $errors->first('FSR', '<span class="error">:message</span>') }}<br/>
                        {{ Form::label('FSR', 'FSR-PO#:') }}
                        {{ Form::text('FSR') }}

                        {{ $errors->first('Billable', '<span class="error">:message</span>') }}<br/>
                        {{ Form::label('Billable', 'Billable?') }}
                        <?php echo Form::select('Billable', array('1' => 'Yes', '0' => 'No')); ?>

                        {{ $errors->first('JobsiteName', '<span class="error">:message</span>') }}<br/>
                        {{ Form::label('JobsiteName', 'Jobsite Name:') }}
                        {{ Form::text('JobsiteName') }}

                        {{ $errors->first('NumberOfTests', '<span class="error">:message</span>') }}<br/>
                        {{ Form::label('NumberOfTests', 'Number of Tests (Approximate):') }}
                        {{ Form::text('NumberOfTests') }}

                        {{ $errors->first('JobsiteAddress', '<span class="error">:message</span>') }}<br/>
                        {{ Form::label('JobsiteAddress', 'Jobsite Address:') }}
                        {{ Form::text('JobsiteAddress') }}

                        {{ $errors->first('JobsiteCity', '<span class="error">:message</span>') }}<br/>
                        {{ Form::label('JobsiteCity', 'City:') }}
                        {{ Form::text('JobsiteCity') }}

                        {{ $errors->first('JobsiteState', '<span class="error">:message</span>') }}<br/>
                        {{ Form::label('JobsiteState', 'State:') }}
                        {{ Form::text('JobsiteState') }}

                        {{ $errors->first('JobsiteZIP', '<span class="error">:message</span>') }}<br/>
                        {{ Form::label('JobsiteZIP', 'Zip Code:') }}
                        {{ Form::text('JobsiteZIP') }}
                    </div><br/>
                </div>

                <div class="gapdiv"></div>

                <div id="group2">
                    <div class="textborder form-group">
                        <h2>On-Site and GE Contact Information</h2>
                        <div class="contact">  
                            <strong>On-Site Contact (Dayshift)</strong><br/>
                            {{ $errors->first('ContactDayShift', '<span class="error">:message</span>') }}<br/>
                            {{ Form::label('ContactDayShift', 'Name:') }}
                            {{ Form::text('ContactDayShift') }}

                            {{ $errors->first('ContactDayShiftCell', '<span class="error">:message</span>') }}<br/>
                            {{ Form::label('ContactDayShiftCell', 'Cell phone:') }}
                            {{ Form::text('ContactDayShiftCell') }}
                        </div>
                        <div class="contact">
                            <strong>On-Site Contact (Nightshift)</strong><br/>
                            {{ $errors->first('ContactNightShift', '<span class="error">:message</span>') }}<br/>
                            {{ Form::label('ContactNightShift', 'Name:') }}
                            {{ Form::text('ContactNightShift') }}

                            {{ $errors->first('ContactNightShiftCell', '<span class="error">:message</span>') }}<br/>
                            {{ Form::label('ContactNightShiftCell', 'Cell phone:') }}
                            {{ Form::text('ContactNightShiftCell') }}
                        </div>
                        <div style="clear:both;">
                            <strong>GE Contact</strong><br/>
                            {{ $errors->first('GEContact', '<span class="error">:message</span>') }}<br/>
                            {{ Form::label('GEContact', 'Name:') }}
                            {{ Form::text('GEContact') }}

                            {{ $errors->first('GECell', '<span class="error">:message</span>') }}<br/>
                            {{ Form::label('GECell', 'Cell phone:') }}
                            {{ Form::text('GECell') }}
                        </div>
                    </div>
                </div>

                <div class="gapdiv"></div>

                <div id="group3" style="clear:both;">
                    <div class="textborder form-group">
                        <h2>Gate Security Information</h2>
                        <strong>APM notification to Gate Security for Collectors Arrival</strong>
                        {{ $errors->first('Dateofnotification', '<span class="error">:message</span>') }}<br/>
                        {{ Form::label('Dateofnotification', 'Date of Notification (MM/DD/YYYY):') }}
                        {{ Form::text('Dateofnotification') }}

                        {{ $errors->first('SecurityContact', '<span class="error">:message</span>') }}<br/>
                        {{ Form::label('SecurityContact', 'Security Contact Name:') }}
                        {{ Form::text('SecurityContact') }}

                        {{ $errors->first('TestType', '<span class="error">:message</span>') }}<br/>
                        {{ Form::label('TestType', 'Type Of Testing:') }}
                        <?php echo Form::select('TestType', array('preEmp'=>'Pre Employment', "random"=>'Random', 'other'=>'Other')); ?>
                    </div>
                </div>

                <div class="gapdiv"></div>

                <div id="group4">
                    <div class="textborder form-group">
                        <div>
                            <h2>Testing Schedule</h2>
                        
                            <h3>Primary Test Date</h3>
                            {{ $errors->first('DatePrimeDay', '<span class="error">:message</span>') }}<br/>
                            {{ Form::label('DatePrimeDay', 'Primary Test Date:') }}<br/>
                            {{ Form::text('DatePrimeDay') }}

                            <h4>Day Shift:</h4>
                            {{ $errors->first('TimePrimeDay', '<span class="error">:message</span>') }}<br/>
                            {{ Form::label('TimePrimeDay', 'Start Time (hh:mm AM/PM):') }}
                            {{ Form::text('TimePrimeDay') }}

                            {{ $errors->first('TimeEndPrimeDay', '<span class="error">:message</span>') }}<br/>
                            {{ Form::label('TimeEndPrimeDay', 'Finish Time (hh:mm AM/PM):') }}
                            {{ Form::text('TimeEndPrimeDay') }}

                            {{ $errors->first('AdditionalPrimeDay', '<span class="error">:message</span>') }}<br/>
                            {{ Form::label('AdditionalPrimeDay', 'Additional Collectors Required?') }}
                            <?php echo Form::select('AdditionalPrimeDay', array('1' => 'Yes', '0' => 'No')); ?>
                            
                            <h4>Night Shift:</h4>
                            {{ $errors->first('TimePrimeNight', '<span class="error">:message</span>') }}<br/>
                            {{ Form::label('TimePrimeNight', 'Start Time (hh:mm AM/PM):') }}
                            {{ Form::text('TimePrimeNight') }}

                            {{ $errors->first('TimeEndPrimeNight', '<span class="error">:message</span>') }}<br/>
                            {{ Form::label('TimeEndPrimeNight', 'Finish Time (hh:mm AM/PM):') }}
                            {{ Form::text('TimeEndPrimeNight') }}

                            {{ $errors->first('AdditionalPrimeNight', '<span class="error">:message</span>') }}<br/>
                            {{ Form::label('AdditionalPrimeNight', 'Additional Collectors Required?') }}
                            <?php echo Form::select('AdditionalPrimeNight', array('1' => 'Yes', '0' => 'No')); ?>                        </div>
                        
                        <div>
                            <h3>Additional Test Date</h3>
                            {{ $errors->first('DateAddDay', '<span class="error">:message</span>') }}<br/>
                            {{ Form::label('DateAddDay', 'Additional Test Date:') }}<br/>
                            {{ Form::text('DateAddDay') }}

                            <h4>Day Shift:</h4>
                            {{ $errors->first('TimeAddDay', '<span class="error">:message</span>') }}<br/>
                            {{ Form::label('TimeAddDay', 'Start Time (hh:mm AM/PM):') }}
                            {{ Form::text('TimeAddDay') }}

                            {{ $errors->first('TimeEndAddDay', '<span class="error">:message</span>') }}<br/>
                            {{ Form::label('TimeEndAddDay', 'Finish Time (hh:mm AM/PM):') }}
                            {{ Form::text('TimeEndAddDay') }}

                            {{ $errors->first('AdditionalAddDay', '<span class="error">:message</span>') }}<br/>
                            {{ Form::label('AdditionalAddDay', 'Additional Collectors Required?') }}
                            <?php echo Form::select('AdditionalAddDay', array('1' => 'Yes', '0' => 'No')); ?>
                            
                            <h4>Night Shift:</h4>
                            {{ $errors->first('TimeAddNight', '<span class="error">:message</span>') }}<br/>
                            {{ Form::label('TimeAddNight', 'Start Time (hh:mm AM/PM):') }}
                            {{ Form::text('TimeAddNight') }}

                            {{ $errors->first('TimeEndAddNight', '<span class="error">:message</span>') }}<br/>
                            {{ Form::label('TimeEndAddNight', 'Finish Time (hh:mm AM/PM):') }}
                            {{ Form::text('TimeEndAddNight') }}

                            
                            {{ $errors->first('AdditionalAddNight', '<span class="error">:message</span>') }}<br/>
                            {{ Form::label('AdditionalAddNight', 'Additional Collectors Required?') }}
                            <?php echo Form::select('AdditionalAddNight', array('1' => 'Yes', '0' => 'No')); ?>
                        </div>
                        <div>   
                            {{ $errors->first('comments', '<span class="error">:message</span>') }}<br/>
                            {{ Form::label('comments', 'Comments:') }}<br/>
                            {{ Form::textarea('comments') }}                        
                        </div>
                    </div>
                </div>

                <div class="gapdiv"></div>

                <div id="group5" style="clear:both;">
                    <div class="textborder form-group">
                        <h2>Worksite Amenities</h2>
                        <h3>Does the worksite have the following?</h3>
                        {{ $errors->first('SafeArea', '<span class="error">:message</span>') }}<br/>
                        {{ Form::label('SafeArea', 'Safe confidential / private work area with a table:') }}
                        <?php echo Form::select('SafeArea', array('1' => 'Yes', '0' => 'No')); ?>
                        
                        {{ $errors->first('Worktrailer', '<span class="error">:message</span>') }}<br/>
                        {{ Form::label('Worktrailer', 'Work Trailer:') }}
                        <?php echo Form::select('Worktrailer', array('1' => 'Yes', '0' => 'No')); ?>
                        
                        {{ $errors->first('Bathroom', '<span class="error">:message</span>') }}<br/>
                        {{ Form::label('Bathroom', 'Bathroom:') }}
                        <?php echo Form::select('Bathroom', array('1' => 'Yes', '0' => 'No')); ?>
                        
                        {{ $errors->first('PortalJohn', '<span class="error">:message</span>') }}<br/>
                        {{ Form::label('PortalJohn', 'Port-a-john:') }}
                        <?php echo Form::select('PortalJohn', array('1' => 'Yes', '0' => 'No')); ?>
                        
                        {{ $errors->first('BathFeet', '<span class="error">:message</span>') }}<br/>
                        {{ Form::label('BathFeet', "How far, in feet, is the Collector's Work Area from the bathroom / Port-a-john?") }}
                        {{ Form::text('BathFeet') }}   

                        {{ $errors->first('RunningWater', '<span class="error">:message</span>') }}<br/>
                        {{ Form::label('RunningWater', 'Running water for washing hands:') }}
                        <?php echo Form::select('RunningWater', array('1' => 'Yes', '0' => 'No')); ?>
                        
                        {{ $errors->first('DrinkingWater', '<span class="error">:message</span>') }}<br/>
                        {{ Form::label('DrinkingWater', 'Drinking Water:') }}
                        <?php echo Form::select('DrinkingWater', array('1' => 'Yes', '0' => 'No')); ?>
                    </div>
                </div>

                <div class="article">
                    <h3 style="color:#d9534f";><u>Note:</u> Collectors MUST bring a photo ID to all job sites!</h3>
                    <h2>All forms below are for DSI personnel ONLY!</h2>
                </div>

                <div>
                    <div class="dsionly" id="group6">
                        <div class="textborder form-group">
                            <h2>Clinic Contact Information</h2>
                            <div>
                                <h3>Assigned Service Provider</h3>
                                {{ $errors->first('ASPClinicName', '<span class="error">:message</span>') }}<br/>
                                {{ Form::label('ASPClinicName', 'Clinic Name:') }}
                                {{ Form::text('ASPClinicName') }}   
                                                              
                                {{ $errors->first('ASPClinicAddress', '<span class="error">:message</span>') }}<br/>
                                {{ Form::label('ASPClinicAddress', 'Clinic Address:') }}
                                {{ Form::text('ASPClinicAddress') }}   
                                                                
                                {{ $errors->first('ASPClinicCity', '<span class="error">:message</span>') }}<br/>
                                {{ Form::label('ASPClinicCity', 'City:') }}
                                {{ Form::text('ASPClinicCity') }}   
                                
                                {{ $errors->first('ASPClinicState', '<span class="error">:message</span>') }}<br/>
                                {{ Form::label('ASPClinicState', 'State:') }}
                                {{ Form::text('ASPClinicState') }} 
                                  
                                {{ $errors->first('ASPClinicZIP', '<span class="error">:message</span>') }}<br/>
                                {{ Form::label('ASPClinicZIP', 'Zip code:') }}
                                {{ Form::text('ASPClinicZIP') }} 
                                
                                <strong>Contact Person:</strong><br/>
                                {{ $errors->first('ASPClinicContact', '<span class="error">:message</span>') }}<br/>
                                {{ Form::label('ASPClinicContact', 'Name:') }}
                                {{ Form::text('ASPClinicContact') }} 
                                
                                {{ $errors->first('ASPClinicPhone', '<span class="error">:message</span>') }}<br/>
                                {{ Form::label('ASPClinicPhone', 'Phone number:') }}
                                {{ Form::text('ASPClinicPhone') }} 
                                
                                {{ $errors->first('ASPClinicFax', '<span class="error">:message</span>') }}<br/>
                                {{ Form::label('ASPClinicFax', 'Fax Number:') }}
                                {{ Form::text('ASPClinicFax') }} 
                            </div>
                            <div>
                                <h3>Alternate Health Clinic (injuries randoms)</h3>
                                {{ $errors->first('OccClinicName', '<span class="error">:message</span>') }}<br/>
                                {{ Form::label('OccClinicName', 'Clinic Name:') }}
                                {{ Form::text('OccClinicName') }}   
                                                              
                                {{ $errors->first('OccClinicAddress', '<span class="error">:message</span>') }}<br/>
                                {{ Form::label('OccClinicAddress', 'Clinic Address:') }}
                                {{ Form::text('OccClinicAddress') }}   
                                                                
                                {{ $errors->first('OccClinicCity', '<span class="error">:message</span>') }}<br/>
                                {{ Form::label('OccClinicCity', 'City:') }}
                                {{ Form::text('OccClinicCity') }}   
                                
                                {{ $errors->first('OccClinicState', '<span class="error">:message</span>') }}<br/>
                                {{ Form::label('OccClinicState', 'State:') }}
                                {{ Form::text('OccClinicState') }} 
                                  
                                {{ $errors->first('OccClinicZIP', '<span class="error">:message</span>') }}<br/>
                                {{ Form::label('OccClinicZIP', 'Zip code:') }}
                                {{ Form::text('OccClinicZIP') }} 
                                
                                <strong>Contact Person:</strong><br/>
                                {{ $errors->first('OccClinicContact', '<span class="error">:message</span>') }}<br/>
                                {{ Form::label('OccClinicContact', 'Name:') }}
                                {{ Form::text('OccClinicContact') }} 
                                
                                {{ $errors->first('OccClinicPhone', '<span class="error">:message</span>') }}<br/>
                                {{ Form::label('OccClinicPhone', 'Phone number:') }}
                                {{ Form::text('OccClinicPhone') }} 
                                
                                {{ $errors->first('OccClinicFax', '<span class="error">:message</span>') }}<br/>
                                {{ Form::label('OccClinicFax', 'Fax Number:') }}
                                {{ Form::text('OccClinicFax') }} 
                            </div>
                        </div>
                    </div>

                    <div class="gapdiv"></div>

                    <div class="dsionly" id="group7" style="clear:both;">
                        <div class="textborder form-group">
                            <h2>Collector Information</h2>
                            {{ $errors->first('Collectors', '<span class="error">:message</span>') }}<br/>
                            {{ Form::label('Collectors', 'Name:') }}
                            {{ Form::text('Collectors') }}
                            
                            {{ $errors->first('CollectorsPhone', '<span class="error">:message</span>') }}<br/>
                            {{ Form::label('CollectorsPhone', 'Phone Number:') }}
                            {{ Form::text('CollectorsPhone') }}
                            
                            {{ $errors->first('CollectorsCell', '<span class="error">:message</span>') }}<br/>
                            {{ Form::label('CollectorsCell', 'Cell Number:') }}
                            {{ Form::text('CollectorsCell') }}
                            
                            {{ $errors->first('Cost', '<span class="error">:message</span>') }}<br/>
                            {{ Form::label('Cost', 'Special Offset Cost:') }}
                            {{ Form::text('Cost') }}
                            
                            {{ $errors->first('Mileage', '<span class="error">:message</span>') }}<br/>
                            {{ Form::label('Mileage', 'Mileage:') }}
                            {{ Form::text('Mileage') }}
                            
                            {{ $errors->first('Allowance', '<span class="error">:message</span>') }}<br/>
                            {{ Form::label('Allowance', 'Allowance:') }}
                            {{ Form::text('Allowance') }}
                            
                            {{ $errors->first('CompletedBy', '<span class="error">:message</span>') }}<br/>
                            {{ Form::label('CompletedBy', 'Completed By DSI:') }}
                            {{ Form::text('CompletedBy') }}
                            
                            {{ $errors->first('ConfirmedDate', '<span class="error">:message</span>') }}<br/>
                            {{ Form::label('ConfirmedDate', 'Confirmed with APM on (MM/DD/YYYY):') }}
                            {{ Form::text('ConfirmedDate') }}
                            
                            {{ $errors->first('ConfirmedFaxDate', '<span class="error">:message</span>') }}<br/>
                            {{ Form::label('ConfirmedFaxDate', 'Faxed on (MM/DD/YYYY):') }}
                            {{ Form::text('ConfirmedFaxDate') }}

                            {{ $errors->first('ConfirmedEmailDate', '<span class="error">:message</span>') }}<br/>
                            {{ Form::label('ConfirmedEmailDate', 'Emailed on (MM/DD/YYYY):') }}
                            {{ Form::text('ConfirmedEmailDate') }}                            
                            
                        </div>    
                    </div>
                </div>

                <div class="form-group">
                    <h3 style="color:#428bca;">Please double check all data before submitting it!</h3>
                    <button type="submit" class="btn btn-success btn-lg" style="margin-right: 100px;">Submit</button>
                    <a href="/" class="btn btn-danger btn-lg" role="button">Cancel</a>
                </div>
            {{ Form::close() }}
        </div>
      </div>
  </body>
</html>
