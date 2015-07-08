<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpertReviewsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('expert_reviews', function(Blueprint $table)
		{
            $table->increments('id');

            $table->integer('expert_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->string('description');
            $table->string('status', 50);

            $table->foreign('expert_id')->references('id')->on('experts');
            $table->foreign('user_id')->references('id')->on('users');

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
		Schema::table('expert_reviews', function(Blueprint $table)
		{
			//
		});
	}

}
