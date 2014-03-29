<?php

class SearchController extends BaseController {

	public function grabList()
	{
		// grab search criteria with input::get function
		$category = Input::get('category');
		$input = Input::get('input');
		
		// pull all results from the SQL database and store to a JSON var
		$results = DB::table('forms')->select()->where($category, $input)->get();

		return View::make('index', array('results' => $results));
	}
};