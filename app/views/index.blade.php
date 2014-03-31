<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    {{ HTML::style('bootstrap.css') }}
    {{ HTML::script('jquery-1.11.0.min.js') }}
    {{ HTML::script('jquery.validate.min.js') }}
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
                @if(Session::has('success'))
                  <div class="alert-box success">
                    <h3>{{ Session::get('success') }}</h3>
                  </div>
                @endif
                <div class="search-form-body" style="border:0;">
                    <a href={{url('form')}} class="btn btn-success" tabindex="1">New Form</a>
                    <a href={{url('search/all')}} class="btn btn-warning" tabindex="2">All Forms</a>
                    <div style="float: right;">
                        <select name="category" tabindex="3" required>
                          <option value='' disabled selected style='display:none;'>Select a category</option>
                          <option value="JobNumber">Job Number</option>
                          <option value="FSR">FSR Number</option>
                          <option value="JobsiteCity">Jobsite City</option>
                          <option value="JobsiteState">Jobsite State</option>
                        </select>
                        <input type="search" autofocus="autofocus" name="input" tabindex="4"  placeholder="Search..." required/> 
                        <button class="btn btn-info" type="submit" tabindex="5" value="Search">Submit</button>
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
                        <td> {{ link_to_route('form.show', 'Edit', ['id' => $row->id]) }} </td>
                      </tr>
                    @endforeach
                      </tbody>
                    </table>
                  @else
                      </tbody>
                    </table>
                    <h4>No results were found for your search!</h4>
                  @endif
        </div>
    </div>
  </body>
</html>