<?php

class Email extends Eloquent {
	protected $table = 'emails';
	public $timestamps = false;
	
	// Get the unique id for the form.
	public function getIdentifier()
	{
		return $this->getKey();
	}	
}