<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDelayTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('delay', function(Blueprint $table)
		{
			$table->integer('delayid', true);
			$table->integer('taskid');
			$table->date('delay_date');
			$table->time('time');
			$table->string('reason');
			$table->string('c_emailid');
			$table->string('e_emailid');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('delay');
	}

}
