<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="text/javascript" href="bootstrap.js" />
    <title>DSI Medical Services,Inc. Drug & Alcohol Program Management Services</title>
  </head>
  <body>
    <div class="main-search-page" style="padding: 10px 10px 0px 10px;">
        <div class="searchBar">
            <form id="ApmSearch" action="{{url('search-handler')}}" method="post">
                {{ Form::token() }}
                <div class="search-form-header">
                    <center><h2>Create and Search APM Forms</h2></center>
                </div>
                <div class="search-form-body" style="border:0;">
                    <a href="form" class="btn btn-success">New Form</a>
                    <div style="float: right;">
                        <select name="category" tabindex="1" required>
                          <option value='' disabled selected style='display:none;'>Select a category</option>
                          <option value="JobNumber">Job Number</option>
                          <option value="FSR">FSR Number</option>
                          <option value="APMTime">APM Date</option>
                          <option value="JobsiteCity">Jobsite City</option>
                          <option value="JobsiteState">Jobsite State</option>
                        </select>
                        <input type="search" autofocus="autofocus" name="input" tabindex="2"  placeholder="Search..." required/> 
                        <button class="btn btn-info" type="submit" tabindex="3" value="Search">Submit</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="gapdiv"></div>

        <!--IF result count greater than 0, show this div-->
        <div class="searchResults">
            <table class="table table-hover table-condensed">
               <thead class="table">
                  <tr>
                     <th>JobID</th>
                     <th>FSR</th>
                     <th>Created</th>
                     <th>Jobsite</th>
                     <th>City</th>
                     <th>State</th>
                     <th>Edit</th>
                  </tr>
               </thead>
               <tbody>
                  <!-- these are the results of the search query -->
               </tbody>
            </table>
        </div>
    </div>
  </body>
</html>