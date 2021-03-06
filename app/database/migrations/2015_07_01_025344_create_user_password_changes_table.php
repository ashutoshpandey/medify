<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPasswordChangesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_password_changes', function(Blueprint $table)
		{
            $table->increments('id');

            $table->integer('user_id')->unsigned();

            $table->string('old_password', 255);
            $table->string('new_password', 255);
            $table->string('status', 50);

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
		Schema::table('user_password_changes', function(Blueprint $table)
		{
			//
		});
	}

}
