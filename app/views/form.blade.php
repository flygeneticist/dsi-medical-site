<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="text/javascript" href="bootstrap.js" />
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
            <form id="ApmNewForm" action="{{url('form-handler')}}" method="post">
                {{ Form::token() }}
                <input name="formtype" type="hidden" value="new"/>
                <div id="group1">
                    <div class="textborder form-group">
                        <h2>Basic Information</h2>
                        {{ $errors->first('dateofapm', '<span class="error">:message</span>') }}<br/>
                        <label>Date of APM:</label><input type="date" name="dateofapm" maxlength=20 required/>
                        {{ $errors->first('contractorFirstName', '<span class="error">:message</span>') }}<br/>
                        <label>Contractor First Name:</label><input type="text" name="contractorFirstName" size=20 required/>
                        {{ $errors->first('contractorLastName', '<span class="error">:message</span>') }}<br/>
                        <label>Contractor Last name:</label><input type="text" name="contractorLastName" size=20 required/>
                        {{ $errors->first('JobID', '<span class="error">:message</span>') }}<br/>
                        <label>Job Number (XXXXXXXXXX):</label><input type="text" name="JobID" size=10 minlength=10 maxlength=10 required/>
                        {{ $errors->first('fsrponum', '<span class="error">:message</span>') }}<br/>
                        <label>FSR-PO#:</label><input type="text" name="fsrponum" size=10 maxlength=15 required/>
                        {{ $errors->first('billable', '<span class="error">:message</span>') }}<br/>
                        <label>Billable?</label><select name="billable"><option value=1>Yes</option><option value=0>No</option></select>
                        {{ $errors->first('jobsitename', '<span class="error">:message</span>') }}<br/>
                        <label>Jobsite Name:</label><input type="text" name="jobsitename" size=30 required/>
                        {{ $errors->first('number', '<span class="error">:message</span>') }}<br/>
                        <label>Number of Tests (Approximate):</label><input type="number" size=4 min=1 name="numoftests" required/>
                        {{ $errors->first('jobsiteaddress', '<span class="error">:message</span>') }}<br/>
                        <label>Jobsite Address:</label><input type="text" name="jobsiteaddress" size=40 required/>
                        {{ $errors->first('jobsitecity', '<span class="error">:message</span>') }}<br/>
                        <label>City:</label><input type="text" name="jobsitecity" size=20 required/>
                        {{ $errors->first('jobsitestate', '<span class="error">:message</span>') }}<br/>
                        <label>State:</label><input type="text" name="jobsitestate" size=2 minlength=2 maxlength=2 required/>
                        {{ $errors->first('jobsitezip', '<span class="error">:message</span>') }}<br/>
                        <label>Zip Code:</label><input type="text" name="jobsitezip" size=5 minlength=2 maxlength=5 required/>
                    </div><br/>
                </div>

                <div class="gapdiv"></div>

                <div id="group2">
                    <div class="textborder form-group">
                        <h2>On-Site and GE Contact Information</h2>
                        <div class="contact">  
                            <strong>On-Site Contact (Dayshift)</strong><br/>
                            <label>First Name:</label><input type="text" name="DayContactFirstName"/><br/>
                            <label>Last Name:</label><input type="text" name="DayContactLastName"/><br/>
                            <label>Cell Phone:</label><input type="tel" name="DayContactPhone"/><br/>
                            <label>Email Address:</label><input type="email" name="DayContactEmail"/><br/>
                        </div>
                        <div class="contact">
                            <strong>On-Site Contact (Nightshift)</strong><br/>
                            <label>First Name:</label><input type="text" name="NightContactFirstName"/><br/>
                            <label>Last Name:</label><input type="text" name="NightContactLastName"/><br/>
                            <label>Cell Phone:</label><input type="text" name="NightContactPhone"/><br/>
                            <label>Email Address:</label><input type="email" name="NightContactEmail"/><br/>
                        </div>
                        <div style="clear:both;">
                            <strong>GE Contact</strong><br/>
                            <label>First Name:</label><input type="text" name="GEFirstName"/><br/>
                            <label>Last Name:</label><input type="text" name="GELastName"/><br/>
                            <label>Cell Phone:</label><input type="tel" name="GEPhone"/><br/>
                            <label>Email Address:</label><input type="email" name="GEemail"/><br/>
                        </div>
                    </div>
                </div>

                <div class="gapdiv"></div>

                <div id="group3" style="clear:both;">
                    <div class="textborder form-group">
                        <h2>Gate Security Information</h2>
                        <p><strong>APM notification to Gate Security for Collectors Arrival</strong></p>
                        <label>Date of notification(MM/DD/YY):</label><input type="date" name="SecurityNotifyDate"/><br/>
                        <label>Security contact Name:</label><input type="text" name="SecurityName"/><br/>
                        <label>Type Of Testing:</label><select name="typeoftesting"><option value="preEmp">Pre Employment</option><option value="random">Random</option><option value="other">Other</option></select><br/>
                    </div>
                </div>

                <div class="gapdiv"></div>

                <div id="group4">
                    <div class="textborder form-group">
                        <div>
                            <h2>Testing Schedule</h2>
                            <label><strong>Primary Test Date:  </strong></label><input type="date" name="primarytestdate"/><br/>
                            <strong>Day Shift:  </strong><br/>
                            <label>Start Date/Time(MM/DD/YY hh:mm):</label><input type="datetime-local" name="TstDtPrimaryDS_StartDate"/><br/>
                            <label>Finish Date/Time:</label><input type="datetime-local" name="TstDtPrimaryDS_FinishDate"/><br/>
                            <label>Additional Collectors Required?</label><select name="TstDtPrimaryDS__addColl"><option value=1>Yes</option><option value=0>No</option></select><br/>
                            <strong>Night Shift:  </strong><br/>
                            <label>Start Date/Time:</label><input type="datetime-local" name="TstDtPrimaryNS_StartDate"/><br/>
                            <label>Finish Date/Time:</label><input type="datetime-local" name="TstDtPrimaryNS_FinishDate"/><br/>
                            <label>Additional Collectors Required?</label><select name="TstDtPrimaryNS_addColl"><option value=1>Yes</option><option value=0>No</option></select><br/>
                        </div>
                        <div>
                            <label><strong>Additional Test Date:  </strong></label><input type="date" name="primarytestdate"/><br/>
                            <strong>Day Shift:  </strong><br/>
                            <label>Start Date/Time:</label><input type="datetime-local" name="TstDtAdditionalDS_StartDate"/><br/>
                            <label>Finish Date/Time: </label><input type="datetime-local" name="TstDtAdditionalDS_FinishDate"/><br/>
                            <label>Additional Collectors Required?</label><select name="TstDtAdditionalDS_addColl"><option value=1>Yes</option><option value=0>No</option></select><br/>
                            <strong>Night Shift:  </strong><br/>
                            <label>Start Date/Time:</label><input type="datetime-local" name="TstDtAdditionalNS_StartDate"/><br/>
                            <label>Finish Date/Time:</label><input type="datetime-local" name="TstDtAdditionalNS_FinishDate"/><br/>
                            <label>Additional Collectors Required?</label><select name="TstDtAdditionalNS_addColl"><option value=1>Yes</option><option value=0>No</option></select><br/>
                        </div>
                        <div>
                            <label><strong>Comments:  </strong></label><br/>
                            <textarea name="comments" rows="3" cols="100" style="margin: 2px 0px; width: 300px; height: 50px;">Please enter any special instructions or comments here...</textarea><br/>
                        </div>
                    </div>
                </div>

                <div class="gapdiv"></div>

                <div id="group5" style="clear:both;">
                    <div class="textborder form-group">
                        <h2>Worksite Amenities</h2>
                        <h3>Does the worksite have the following?</h3>
                        <label>Safe confidential / private work area with a table:</label><select name="workArea"><option value=1>Yes</option><option value=0>No</option></select><br/>
                        <label>Work Trailer:</label><select name="workTrailer"><option value=1>Yes</option><option value=0>No</option></select><br/>
                        <label>Bathroom:</label><select name="bathroom"><option value=1>Yes</option><option value=0>No</option></select><br/>
                        <label>Port-a-john:</label><select name="PortPot"><option value=1>Yes</option><option value=0>No</option></select><br/>
                        <label>How far, in feet, is the Collector's Work <br/>Area from the bathroom / Port-a-john?</label><input name="DistToRestroom" type="text" /><br/>
                        <label>Running water for washing hands:</label><select name="runningWater"><option value=1>Yes</option><option value=0>No</option></select><br/>
                        <label>Drinking Water:</label><select name="drinkingWater"><option value=1>Yes</option><option value=0>No</option></select><br/>
                    </div>
                </div>

                <div class="article">
                    <h3 style="color:#d9534f";><u>Note:</u> Collectors MUST bring a picture ID <br/>to all job site locations.</h3>
                    <h2>All forms below are for DSI personnel ONLY!</h2>
                </div>

                <div>
                    <div class="dsionly" id="group6">
                        <div class="textborder form-group">
                            <h2>Clinic Contact Information</h2>
                            <div>
                                <h3>Assigned Service Provider</h3>
                                <label>Clinic Name:</label><input type="text" name="Clinic1Name"/><br/>
                                <label>Clinic Address:</label><input type="text" name="Clinic1Address1"/><br/>
                                <label>City:</label><input type="text" name="Clinic1City"/><br/>
                                <label>State:</label><input type="text" name="Clinic1State"/><br/>
                                <label>Zip Code:</label><input type="text" name="Clinic1ZipCode"/><br/>
                                <strong>Contact Person:  </strong><br/>
                                <label>First Name:</label><input type="text" name="ClinicalContact1FirstName"/><br/>
                                <label>Last Name:</label><input type="text" name="ClinicalContact1LastName"/><br/>
                                <label>Phone #:</label><input type="tel" name="ClinicalContact1Phone"/><br/>
                                <label>Fax #:</label><input type="tel" name="ClinicalContact1Fax"/><br/>
                            </div>
                            <div>
                                <h3>Alternate Health Clinic (injuries randoms)</h3>
                                <label>Clinic Name:</label><input type="text" name="Clinic2Name"/><br/>
                                <label>Clinic Address:</label><input type="text" name="Clinic2Address1"/><br/>
                                <label>City:</label><input type="text" name="Clinic2City"/><br/>
                                <label>State:</label><input type="text" name="Clinic2State"/><br/>
                                <label>Zip Code:</label><input type="text" name="Clinic2ZipCode"/><br/>
                                <strong>Contact Person:  </strong><br/>
                                <label>First Name:</label><input type="text" name="ClinicalContact2FirstName"/><br/>
                                <label>Last Name:</label><input type="text" name="ClinicalContact2LastName"/><br/>
                                <label>Phone #:</label><input type="tel" name="ClinicalContact2Phone"/><br/>
                                <label>Fax #:</label><input type="tel" name="ClinicalContact2Fax"/><br/>
                            </div>
                        </div>
                    </div>

                    <div class="gapdiv"></div>

                    <div class="dsionly" id="group7" style="clear:both;">
                        <div class="textborder form-group">
                            <h2>Collector Information</h2>
                            <label>Collectors Name:</label><input type="text" name="CollectorName"/><br/>
                            <label>Collectors Phone #:</label><input type="tel" name="CollectorPhone"/><br/>
                            <label>Cell Phone #:</label><input type="tel" name="CollectorCell"/><br/>
                            <label>Special Offset Cost:</label><input type="text" name="CollectorCostOffset"/><br/>
                            <label>Mileage:</label><input type="text" name="CollectorMilage"/><br/>
                            <label>Allowance:</label><input type="number" name="CollectorAllowance"/><br/>
                            <label>Completed By DSI:</label><input type="date" name="CompletedByDSI"/><br/>
                            <label>Confirmed with APM on (mm/dd/yy):</label><input type="date" name="ConfirmedAPM"/><br/>
                            <label>E-mail (mm/dd/yy):</label><input type="date" name="ConfirmedEmail"/><br/>
                            <label>Fax (mm/dd/yy):</label><input type="date" name="ConfirmedFax"/><br/>
                        </div>    
                    </div>
                </div>

                <div class="form-group">
                    <h3 style="color:#428bca;">Please double check all data before submitting it!</h3>
                    <label>By checking this box, I herby certify that the above <br/>
                    information is correct to the best of my knowledge:&nbsp;&nbsp;</label><input type="checkbox" value="false" required/><br/><br/>
                    <button type="submit" class="btn btn-success btn-lg" style="margin-right: 100px;">Submit</button>
                    <a href="/" class="btn btn-danger btn-lg" role="button">Cancel</a>
                </div>
            </form>
        </div>
      </div>
  </body>
</html>
