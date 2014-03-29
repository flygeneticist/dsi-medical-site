<?php

use Illuminate\Database\Migrations\Migration;

class CreateEmailsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emails', function($table) {
            $table->increments('contactID');
            $table->string('firstName', 40);
            $table->string('lastName', 40);
            $table->string('email', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('emails');
    }

}