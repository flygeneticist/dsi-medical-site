<?php

use Illuminate\Database\Migrations\Migration;

class CreateLnkregionsmanagersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lnkregionsmanagers', function($table) {
            $table->increments('index');
            $table->integer('managerID');
            $table->integer('regionID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('lnkregionsmanagers');
    }

}