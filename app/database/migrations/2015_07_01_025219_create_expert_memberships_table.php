<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpertMembershipsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('expert_memberships', function(Blueprint $table)
		{
            $table->increments('id');

            $table->integer('expert_id')->unsigned();

            $table->string('name', 1000);
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
		Schema::table('expert_memberships', function(Blueprint $table)
		{
			//
		});
	}

}
