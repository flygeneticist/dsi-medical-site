<?php

use Illuminate\Database\Migrations\Migration;

class CreateLoginsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logins', function($table) {
            $table->increments('id');
            $table->integer('userID')->primary();
            $table->dateTime('times')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('logins');
    }

}