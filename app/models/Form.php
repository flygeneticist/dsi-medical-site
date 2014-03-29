<?php
// app/models/Form.php

class Form extends Eloquent {

	public $timestamps = false;
	protected $table = 'forms';

	// Get the unique identifier for the user.
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}
}