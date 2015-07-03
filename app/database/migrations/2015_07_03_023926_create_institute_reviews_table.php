<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstituteReviewsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('institute_reviews', function(Blueprint $table)
		{
            $table->increments('id');

            $table->string('status', 50);

            $table->foreign('institute_id')->references('id')->on('institutes');
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
		Schema::table('institute_reviews', function(Blueprint $table)
		{
			//
		});
	}

}
