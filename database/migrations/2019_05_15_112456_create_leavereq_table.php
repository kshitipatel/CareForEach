<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLeavereqTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('leavereq', function(Blueprint $table)
		{
			$table->integer('lrid', true);
			$table->string('e_emailid');
			$table->date('requestdate');
			$table->string('reason');
			$table->date('leaveenddate');
			$table->date('leavestartdate');
			$table->string('status');
			$table->text('e_token', 65535);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('leavereq');
	}

}
