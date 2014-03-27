<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Region extends Eloquent implements UserInterface, RemindableInterface {

	protected $table = 'regions';

	//Get the regionId for the region.
	public function getRegionId()
	{
		return $this->regionId;
	}

}