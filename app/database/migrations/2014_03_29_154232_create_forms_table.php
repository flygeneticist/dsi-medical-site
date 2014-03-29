<?php

use Illuminate\Database\Migrations\Migration;

class CreateApmformsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apmforms', function($table) {
            $table->increments('id');
            $table->char('JobNumber', 15);
            $table->dateTime('APMTime')->nullable();
            $table->string('Contractor', 100)->nullable();
            $table->string('JobsiteName', 100)->nullable();
            $table->integer('NumberOfTests')->nullable();
            $table->string('JobsiteAddress', 100)->nullable();
            $table->string('JobsiteCity', 50)->nullable();
            $table->char('JobsiteState', 2)->nullable();
            $table->char('JobsiteZIP', 5)->nullable();
            $table->string('ContactDayShift', 100)->nullable();
            $table->char('ContactDayShiftCell', 12)->nullable();
            $table->string('ContactNightshift', 100)->nullable();
            $table->char('ContactNightShiftCell', 12)->nullable();
            $table->dateTime('Dateofnotification')->nullable();
            $table->string('SecurityContact', 100)->nullable();
            $table->char('TestType', 20)->nullable();
            $table->dateTime('DatePrimeDay')->nullable();
            $table->dateTime('DatePrimeNight')->nullable();
            $table->dateTime('DateAddDay')->nullable();
            $table->dateTime('DateAddNight')->nullable();
            $table->char('TimePrimeDay_notUsed', 10)->nullable();
            $table->char('TimePrimeNight_notUsed', 10)->nullable();
            $table->char('TimeAddDay_notUsed', 10)->nullable();
            $table->char('TimeAddNight_notUsed', 10)->nullable();
            $table->char('TimeEndPrimeDay', 10)->nullable();
            $table->char('TimeEndPrimeNight', 10)->nullable();
            $table->char('TimeEndAddDay', 10)->nullable();
            $table->char('TimeEndAddNight', 10)->nullable();
            $table->bit('AdditionalPrimeDay', 1)->nullable();
            $table->bit('AdditionalPrimeNight', 1)->nullable();
            $table->bit('AdditionalAddDay', 1)->nullable();
            $table->bit('AdditionalAddNight', 1)->nullable();
            $table->bit('SafeArea', 1)->nullable();
            $table->bit('Worktrailer', 1)->nullable();
            $table->bit('Bathroom', 1)->nullable();
            $table->bit('PortalJohn', 1)->nullable();
            $table->integer('BathFeet')->nullable();
            $table->bit('RunningWater', 1)->nullable();
            $table->bit('DrinkingWater', 1)->nullable();
            $table->string('ASPClinicName', 100)->nullable();
            $table->string('ASPClinicAddress', 100)->nullable();
            $table->string('ASPClinicCity', 50)->nullable();
            $table->char('ASPClinicState', 2)->nullable();
            $table->char('ASPClinicZIP', 5)->nullable();
            $table->string('ASPClinicContact', 100)->nullable();
            $table->char('ASPClinicPhone', 12)->nullable();
            $table->char('ASPClinicFax', 12)->nullable();
            $table->string('OccClinicName', 100)->nullable();
            $table->string('OccClinicAddress', 100)->nullable();
            $table->string('OccClinicCity', 50)->nullable();
            $table->char('OccClinicState', 2)->nullable();
            $table->char('OccClinicZIP', 5)->nullable();
            $table->string('OccClinicContact', 100)->nullable();
            $table->char('OccClinicPhone', 12)->nullable();
            $table->char('OccClinicFax', 12)->nullable();
            $table->string('Collectors', 100)->nullable();
            $table->char('CollectorsPhone', 12)->nullable();
            $table->char('CollectorsCell', 12)->nullable();
            $table->string('Cost', 50)->nullable();
            $table->string('Mileage', 50)->nullable();
            $table->string('Allowance', 50)->nullable();
            $table->string('CompletedBy', 50)->nullable();
            $table->dateTime('ConfirmedDate')->nullable();
            $table->dateTime('ConfirmedEmailDate')->nullable();
            $table->dateTime('ConfirmedFaxDate')->nullable();
            $table->dateTime('Modified')->nullable();
            $table->string('Howfar', 20)->nullable();
            $table->string('TimePrimeDay', 20)->nullable();
            $table->string('TimePrimeNight', 20)->nullable();
            $table->string('TimeAddDay', 20)->nullable();
            $table->string('TimeAddNight', 20)->nullable();
            $table->string('ContactDayShiftGE', 100)->nullable();
            $table->char('ContactDayShiftCellGE', 12)->nullable();
            $table->string('comments', 1000)->nullable();
            $table->string('GEContact', 100)->nullable();
            $table->char('GECell', 12)->nullable();
            $table->string('FSR', 4)->nullable();
            $table->bit('Billable', 1)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('forms');
    }

}