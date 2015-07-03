<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventRegistrationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('event_registrations', function(Blueprint $table)
		{
            $table->increments('id');

            $table->string('status', 50);

            $table->foreign('event_id')->references('id')->on('events');

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
		Schema::table('event_registrations', function(Blueprint $table)
		{
			//
		});
	}

}
