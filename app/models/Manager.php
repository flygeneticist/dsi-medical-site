<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	protected $table = 'managers';

	//Get the ManagerId for the manager.
	public function getManagerId()
	{
		return $this->managerId;
	}

}