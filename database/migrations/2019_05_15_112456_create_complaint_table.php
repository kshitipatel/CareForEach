<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateComplaintTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('complaint', function(Blueprint $table)
		{
			$table->integer('complaintid', true);
			$table->string('e_emailid');
			$table->date('date');
			$table->text('description', 65535);
			$table->string('subject');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('complaint');
	}

}
