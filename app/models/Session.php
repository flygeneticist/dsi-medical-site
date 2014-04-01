<?php

class Session extends Eloquent {
	protected $table = 'sessions';
	public $timestamps = false;
	
	// Get the unique id for the form.
	public function getIdentifier()
	{
		return $this->getKey();
	}
}