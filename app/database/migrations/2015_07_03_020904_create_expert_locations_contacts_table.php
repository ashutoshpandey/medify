<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpertLocationContactsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('expert_location_contacts', function(Blueprint $table)
		{
            $table->increments('id');

            $table->integer('location_id')->unsigned();

            $table->string('contact', 20);
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
		Schema::table('expert_location_contacts', function(Blueprint $table)
		{
			//
		});
	}

}
