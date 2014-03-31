<?php

class Manager extends Eloquent {
	protected $table = 'managers';
	public $timestamps = false;
	
	// Get the unique id for the form.
	public function getIdentifier()
	{
		return $this->getKey();
	}
}