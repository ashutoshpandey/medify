<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpertSocialProfilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('expert_social_profiles', function(Blueprint $table)
		{
            $table->increments('id');

            $table->integer('expert_id')->unsigned();
            $table->string('profile_type', 255);                // facebook, twitter etc.
            $table->string('url', 255);
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
		Schema::table('expert_achievements', function(Blueprint $table)
		{
			//
		});
	}

}
