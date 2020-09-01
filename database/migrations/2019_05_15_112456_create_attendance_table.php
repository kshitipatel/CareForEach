<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAttendanceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('attendance', function(Blueprint $table)
		{
			$table->integer('attid', true);
			$table->string('logintime');
			$table->string('logouttime');
			$table->date('date');
			$table->string('e_emailid');
			$table->string('long_login');
			$table->string('late_login');
			$table->string('long_logout');
			$table->string('late_logout');
			$table->string('location');
			$table->string('location_logout');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('attendance');
	}

}
