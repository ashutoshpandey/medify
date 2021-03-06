<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpertServicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('expert_services', function(Blueprint $table)
		{
            $table->increments('id');

            $table->integer('expert_id')->unsigned();

            $table->string('name');
            $table->text('details');
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
		Schema::table('expert_services', function(Blueprint $table)
		{
			//
		});
	}

}
