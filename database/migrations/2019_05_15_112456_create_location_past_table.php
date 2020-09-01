<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLocationPastTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('location_past', function(Blueprint $table)
		{
			$table->integer('lpid', true);
			$table->text('late', 65535);
			$table->text('log', 65535);
			$table->string('e_emailid');
			$table->string('date');
			$table->text('time', 65535);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('location_past');
	}

}
