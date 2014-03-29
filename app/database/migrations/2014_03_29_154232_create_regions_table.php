<?php

use Illuminate\Database\Migrations\Migration;

class CreateRegionsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regions', function($table) {
            $table->increments('id');
            $table->integer('regionID')->primary();
            $table->string('areaCovered', 40);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('regions');
    }

}