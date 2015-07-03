<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentLogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('appointment_logs', function(Blueprint $table)
		{
            $table->increments('id');

            $table->string('status', 50);

            $table->foreign('appointment_id')->references('id')->on('appointments');

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
		Schema::table('appointment_logs', function(Blueprint $table)
		{
			//
		});
	}

}
