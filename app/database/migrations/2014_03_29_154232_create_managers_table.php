<?php

use Illuminate\Database\Migrations\Migration;

class CreateManagersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('managers', function($table) {
            $table->increments('mangerID');
            $table->string('firstName', 40)->nullable();
            $table->string('lastName', 40)->nullable();
            $table->string('title', 50)->nullable();
            $table->string('address', 100)->nullable();
            $table->string('city', 50)->nullable();
            $table->char('state', 2)->nullable();
            $table->char('zip', 5)->nullable();
            $table->char('phone', 12)->nullable();
            $table->char('fax', 12)->nullable();
            $table->char('cell', 12)->nullable();
            $table->string('email', 80)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('managers');
    }

}