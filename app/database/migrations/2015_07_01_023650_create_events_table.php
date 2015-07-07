<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('events', function(Blueprint $table)
		{
            $table->increments('id');

            $table->integer('expert_id')->unsigned();
            $table->integer('institute_id')->unsigned();
            $table->dateTime('event_date');
            $table->text('description');
            $table->float('latitude');
            $table->float('longitude');
            $table->string('address', 1000);
            $table->string('city', 255);
            $table->string('state', 255);
            $table->string('country', 255);
            $table->string('status', 50);

            $table->foreign('expert_id')->references('id')->on('experts');
            $table->foreign('institute_id')->references('id')->on('institutes');

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
		Schema::table('events', function(Blueprint $table)
		{
			//
		});
	}

}
