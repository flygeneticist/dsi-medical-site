<?php

use Illuminate\Database\Migrations\Migration;

class CreateSessionsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function($table) {
            $table->increments('id');
            $table->string('id', 255)->primary();
            $table->text('payload');
            $table->integer('last_activity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sessions');
    }

}