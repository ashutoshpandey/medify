<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpertLocationTimingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('expert_location_timings', function(Blueprint $table)
		{
            $table->increments('id');

            $table->integer('location_id')->unsigned();
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->string('day_name', 20);
            $table->string('status', 50);

            $table->foreign('location_id')->references('id')->on('expert_locations');

            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('expert_locations', function(Blueprint $table)
		{
			//
		});
	}

}
