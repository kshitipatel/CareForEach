<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMessageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('message', function(Blueprint $table)
		{
			$table->integer('msgid', true);
			$table->date('datetime');
			$table->string('e_emailid');
			$table->string('c_emailid');
			$table->string('text');
			$table->string('sender');
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
		Schema::drop('message');
	}

}
