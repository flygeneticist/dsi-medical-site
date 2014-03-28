<?php

class SearchController extends BaseController {

	public function grabList()
	{
		// grab search criteria with input::get function
		$category = Input::get('category');
		$input = Input::get('input');
		
		// pull all results from the SQL database and store to a JSON var
		$rows = DB::table('forms')->select()->where($category, $input)->get();
		
		// if the result is not zero (NRF) return them to the search table
		if ($rows != null) 
		{
			foreach ($rows as $row) {
				echo $row->title; // add <tr><td> setup!!
			}
		}
		
		return "No results were found for your search!";
	}
};