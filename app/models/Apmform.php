<?php

class Apmform extends Eloquent {
	protected $table = 'apmforms';
	public $timestamps = false;
	
	// Get the unique id for the form.
	public function getIdentifier()
	{
		return $this->getKey();
	}
}