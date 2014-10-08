<!DOCTYPE html>
<html>
<head>
	<title>DSI Medical Services,Inc. Drug & Alcohol Program Management Services</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<!-- Optimized mobile viewport -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	{{ HTML::style('bootstrap.css') }}
	<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	{{ HTML::script('bootstrap.min.js') }}
</head>
  <body>
  	<nav class="navbar navbar-default" role="navigation" style="background: #FFF;">
	    <div class="navbar-header" style="float: left;">
	    	<a href="http://dsimed.com/APM/"><img src={{asset('logo2.jpg')}} alt="DSI Medical Logo"></a>
	    </div>
	    <div class="title">
                    <center><h2>Create and Search APM Forms</h2></center>
            </div>
            <a href={{url('logout')}} class="btn btn-danger" type="button" style="float: right;">Logout</a>
            @if (Auth::user()->role >= 2)
            	<!--Show the Admin button-->
            	<a href={{url('admin')}} class="btn btn-primary" type="button" style="float: right;">Admin</a>
            @endif
	</nav>

        <div class="searchBar" style="clear: all;">
            <form id="ApmSearch" action="{{url('search')}}" method="post">
                {{ Form::token() }}
                <div class="search-form-body form-group" style="border:0;">
	                <div class="form-group" style="float: left;">
	                    <a href={{url('form')}} class="btn btn-primary" tabindex="1">New Form</a>
	                    <a href={{url('search/all')}} class="btn btn-primary" tabindex="2">All Forms</a>
	                </div>
	                <div class="form-group" style="float: right;">
	                	<div class="form-group" style="float: left;">
	                	<input type="text" class="form-control" placeholder="Search" autofocus="autofocus" name="input" tabindex="3" required/>
	                	</div>
	                	<div class="form-group" style="float: right;">
	                      	<select id="category" type="button" class="btn btn-default  dropdown-toggle" name="category" tabindex="4" required>
		                        <option value='' selected style='display:none;'>Select a category</option>
		                        <option value="APMTime">APM Date</option>
		                        <option value="JobNumber">Job Number</option>
		                        <option value="JobsiteCity">Jobsite City</option>
		                        <option value="JobsiteState">Jobsite State</option>
	                      	</select>
                      		<button class="btn btn-primary" type="submit" tabindex="5" onclick="if($('#category option:selected').text()=='Select a category') {alert('Select a category to search by!'); return false;} else {return true;}" value="Search">Submit</button>
                      		</div>
	                </div>
                </div>
            </form>
        </div>


        <div class="gapdiv"></div>

        <div class="searchResults">
            <table id="resultsTable" class="table table-hover table-condensed table-responsive">
               <thead>
                  <tr>
                     <th>Job Number</th>
                     <th>APM Date</th>
                     <th>Jobsite</th>
                     <th>City</th>
                     <th>State</th>
                     <th>Link</th>
                  </tr>
               </thead>
               <tbody>
                  <!-- these are the results of the search query -->
                  @if ($results != null)
                    @foreach ($results as $row)
                      <tr>
                        <td> {{{ $row->JobNumber }}} </td>
                        <td> {{{ $row->APMTime }}} </td>
                        <td> {{{ $row->JobsiteName }}} </td>
                        <td> {{{ $row->JobsiteCity }}} </td>
                        <td> {{{ strtoupper($row->JobsiteState) }}} </td> 
                        <td> {{ link_to_route('form.show', 'Edit', array('id' => $row->id)) }} </td>
                      </tr> 
                    @endforeach 
              </tbody> 
            </table> 
                  @else
                      </tbody>
                    </table>
                   	<!-- check for temp flash notification message -->
		        @if(Session::has('flash_notice'))
		            <div id="flash_notice"><h3>{{ Session::get('flash_notice') }}</h3></div>
		            <!-- check for site update messages to print out--> 
		            @if (Session::has('site_update'))
		            	<div id='site_update'>{{ Session::get('site_update') }}</div>
		            @endif
	               	@elseif (Session::has('send_notice'))
	  		    <div id='dialog-modal'>
	  			<center>
	  			    <h4>APM Form was submitted successfully!<br/>
	  			    An alert email has been sent to DSI Medical staff.<br/><br/>
	  			    <h4>To get a printable copy of the Job Form:</h4>
	  			    <p style="align: left;">
	  			    	1. Search for the Job number in the search field.<br/>
	  			    	2. Click the EDIT link in the search results table.<br/>
	  			    	3. Click the "Print Form" button at the bottom of the page.<br/>
	  			    </p>
	  			</center>
	  		    </div>
	               	@else
                    	    <center><h4>No results were found for your search!</h4></center>
                  	@endif
                  @endif
        </div>
    </div>
  </body>
</html>