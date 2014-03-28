<?php

class SearchController extends BaseController {

	public function grabList()
	{
		// search results function
		$category = Input::get('category');
		$input = Input::get('input');
		
		// pull all results from the SQL database and store to a JSON var
		$results = null //DB::table('forms')->select('*', "CONCAT('form/', JobNumber) as OldLink")->where($category, $input);
		
		// if the result is not zero (NRF) return them to the search table
		if ($results != null) 
		{
			return $results;
		}
		
		return "No results were found for your search!";
	}
};