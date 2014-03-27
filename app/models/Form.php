<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Form extends Eloquent implements UserInterface, RemindableInterface {

	protected $table = 'forms';

	//Get the JobId for the form
	public function getJobId()
	{
		return $this->jobId;
	}

}

JobNumber	char(15)
APMTime	datetime	
Contractor	varchar(100)
JobsiteName	varchar(100)
NumberOfTests	int(11)	
JobsiteAddress	varchar(100)
JobsiteCity	varchar(50)
JobsiteState	char(2)
JobsiteZIP	char(5)
ContactDayShift	varchar(100)
ContactDayShiftCell	char(12)
ContactNightshift	varchar(100)
ContactNightShiftCell	char(12)
Dateofnotification	datetime	
SecurityContact	varchar(100)
TestType	char(20)
DatePrimeDay	datetime	
DatePrimeNight	datetime	
DateAddDay	datetime	
DateAddNight	datetime	
TimePrimeDay_notUsed	char(10)
TimePrimeNight_notUsed	char(10)
TimeAddDay_notUsed	char(10)
TimeAddNight_notUsed	char(10)
TimeEndPrimeDay	char(10)
TimeEndPrimeNight	char(10)
TimeEndAddDay	char(10)
TimeEndAddNight	char(10)
AdditionalPrimeDay	bit(1)	
AdditionalPrimeNight	bit(1)	
AdditionalAddDay	bit(1)	
AdditionalAddNight	bit(1)	
SafeArea	bit(1)	
Worktrailer	bit(1)	
Bathroom	bit(1)	
PortalJohn	bit(1)	
BathFeet	int(11)	
RunningWater	bit(1)	
DrinkingWater	bit(1)	
ASPClinicName	varchar(100)
ASPClinicAddress	varchar(100)
ASPClinicCity	varchar(50)
ASPClinicState	char(2)
ASPClinicZIP	char(5)
ASPClinicContact	varchar(100)
ASPClinicPhone	char(12)
ASPClinicFax	char(12)
OccClinicName	varchar(100)
OccClinicAddress	varchar(100)
OccClinicCity	varchar(50)
OccClinicState	char(2)
OccClinicZIP	char(5)
OccClinicContact	varchar(100)
OccClinicPhone	char(12)
OccClinicFax	char(12)
Collectors	varchar(100)
CollectorsPhone	char(12)
CollectorsCell	char(12)
Cost	varchar(50)
Mileage	varchar(50)
Allowance	varchar(50)
CompletedBy	varchar(50)
ConfirmedDate	datetime	
ConfirmedEmailDate	datetime
ConfirmedFaxDate	datetime
Modified	datetime	
Howfar	varchar(20)
TimePrimeDay	varchar(20)
TimePrimeNight	varchar(20)
TimeAddDay	varchar(20)
TimeAddNight	varchar(20)
ContactDayShiftGE	varchar(100)
ContactDayShiftCellGE	char(12)
comments	varchar(1000)
GEContact	varchar(100)
GECell	char(12)
FSR	varchar(4)
Billable	bit(1)