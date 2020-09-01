<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVisitEntryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('visit_entry', function(Blueprint $table)
		{
			$table->integer('veid', true);
			$table->string('e_emailid');
			$table->string('vphoto');
			$table->date('date');
			$table->string('visitername');
			$table->string('companyname');
			$table->string('area');
			$table->text('vaddress', 65535);
			$table->text('vdiscussion', 65535);
			$table->string('vtime');
			$table->bigInteger('vcontactnum');
			$table->string('visiter_emailid');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('visit_entry');
	}

}
