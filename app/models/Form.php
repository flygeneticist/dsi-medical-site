<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent {

	protected $table = 'forms';

	// Get the unique identifier for the user.
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}
}