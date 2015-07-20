<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstituteContactsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('institute_contacts', function(Blueprint $table)
		{
            $table->increments('id');

            $table->integer('institute_id')->unsigned();

            $table->string('contact', 20);
            $table->string('status', 50);

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
		Schema::table('institute_contacts', function(Blueprint $table)
		{
			//
		});
	}

}
