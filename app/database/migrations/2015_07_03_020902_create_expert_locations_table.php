<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpertLocationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('expert_locations', function(Blueprint $table)
		{
            $table->increments('id');

            $table->integer('expert_id')->unsigned();

            $table->string('address', 1000);
            $table->string('city', 255);
            $table->string('state', 255);
            $table->string('country', 255);
            $table->string('zip', 20);
            $table->float('fees');
            $table->float('latitude');
            $table->float('longitude');
            $table->string('status', 50);

            $table->foreign('expert_id')->references('id')->on('experts');

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
