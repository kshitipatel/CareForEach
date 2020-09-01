<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNotificationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notification', function(Blueprint $table)
		{
			$table->integer('notificationid', true);
			$table->string('notification_type');
			$table->date('date');
			$table->string('notification_for');
			$table->text('notification_msg', 65535);
			$table->string('e_emailid');
			$table->string('c_emailid');
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
		Schema::drop('notification');
	}

}
