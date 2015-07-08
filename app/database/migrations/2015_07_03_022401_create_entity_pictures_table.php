<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntityPicturesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('entity_pictures', function(Blueprint $table)
		{
            $table->increments('id');

            $table->integer('type_id')->unsigned();
            $table->string('entity_type', 255);             // expert, institute etc.
            $table->string('file_name', 255);
            $table->string('file_saved_name', 255);

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
		Schema::table('entity_pictures', function(Blueprint $table)
		{
			//
		});
	}

}
