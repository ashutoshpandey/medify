<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpertsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('experts', function(Blueprint $table)
		{
            $table->increments('id');

            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->string('gender', 255);
            $table->string('email', 255);
            $table->string('password', 255);
            $table->string('image_name', 255);
            $table->string('saved_image_name', 255);
            $table->string('banner_image_name', 255);
            $table->string('banner_saved_image_name', 255);
            $table->text('about');
            $table->string('experience');
            $table->string('status', 50);

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
		Schema::table('experts', function(Blueprint $table)
		{
			//
		});
	}

}
