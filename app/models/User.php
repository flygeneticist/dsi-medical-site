<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	protected $table = 'users';
	protected $hidden = array('password');

	// Get the unique identifier for the user.
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	//Get the password for the user.
	public function getAuthPassword()
	{
		return $this->password;
	}

}