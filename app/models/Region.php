<?php

class Region extends Eloquent {
	protected $table = 'regions';
	public $timestamps = false;
	
	// Get the unique id for the form.
	public function getIdentifier()
	{
		return $this->getKey();
	}
}