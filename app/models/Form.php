<?php

class Form extends Eloquent {
	protected $table = 'forms';
	public $timestamps = false;
	
	// Get the unique identifier for the form.
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	//Get the JobNumber for the user.
	public function getAuthPassword()
	{
		
		return $this->JobNumber;
	}


	
}