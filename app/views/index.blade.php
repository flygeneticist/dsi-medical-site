<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="text/javascript" href="jquery-1.11.0.min.js" />
    <title>DSI Medical Services,Inc. Drug & Alcohol Program Management Services</title>
  </head>
  <body>
    <div class="main-search-page" style="padding: 10px 10px 0px 10px;">
        <div class="searchBar">
            <form id="ApmSearch" action="{{url('search')}}" method="post">
                {{ Form::token() }}
                <div class="search-form-header">
                    <center><h2>Create and Search APM Forms</h2></center>
                </div>
                <div class="search-form-body" style="border:0;">
                    <a href="form" class="btn btn-success" tabindex="1">New Form</a>
                    <div style="float: right;">
                        <select name="category" tabindex="2" required>
                          <option value='' disabled selected style='display:none;'>Select a category</option>
                          <option value="JobNumber">Job Number</option>
                          <option value="FSR">FSR Number</option>
                          <option value="JobsiteCity">Jobsite City</option>
                          <option value="JobsiteState">Jobsite State</option>
                        </select>
                        <input type="search" autofocus="autofocus" name="input" tabindex="3"  placeholder="Search..." required/> 
                        <button class="btn btn-info" type="submit" tabindex="4" value="Search">Submit</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="gapdiv"></div>

        <!--IF result count greater than 0, show this div-->
        <div class="searchResults">
            <table class="table table-hover table-condensed table-responsive">
               <thead class="table">
                  <tr>
                     <th>Job Number</th>
                     <th>FSR</th>
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
                        <td> {{ $row->JobNumber }} </td>
                        <td> {{ $row->FSR }} </td>
                        <td> {{ substr($row->APMTime,0,10) }} </td>
                        <td> {{ $row->JobsiteName }} </td>
                        <td> {{ $row->JobsiteCity }} </td>
                        <td> {{ $row->JobsiteState }} </td> 
                        <td> {{ link_to_route('form.show', 'Edit', ['id' => $row->JobNumber]) }} </td>
                      </tr>
                    @endforeach
                      </tbody>
                    </table>
                  @else
                      </tbody>
                    </table>
                    <p>"No results were found for your search!"<p>
                  @endif
        </div>
    </div>
  </body>
</html>