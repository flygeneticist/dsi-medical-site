<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function($table) {
            $table->increments('id');
            $table->string('username', 20)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('password', 60)->nullable();
            $table->string('salt', 128)->nullable();
            $table->dateTime('dtCreated')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }

}