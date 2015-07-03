<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsuranceConnectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('insurance_connections', function(Blueprint $table)
		{
            $table->increments('id');

            $table->string('status', 50);

            $table->foreign('insurance_company_id')->references('id')->on('insurance_companies');

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
		Schema::table('insurance_connections', function(Blueprint $table)
		{
			//
		});
	}

}
