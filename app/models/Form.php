<?php

class Form extends \Eloquent {
	protected $table = 'forms';

	// Get the unique identifier for the form.
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}
}