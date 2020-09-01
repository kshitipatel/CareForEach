<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTaskTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('task', function(Blueprint $table)
		{
			$table->integer('taskid', true);
			$table->string('e_emailid');
			$table->string('c_emailid');
			$table->date('date');
			$table->text('task_title', 65535);
			$table->text('task_desc', 65535);
			$table->text('status', 65535);
			$table->date('task_date');
			$table->date('status_date');
			$table->string('time');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('task');
	}

}
