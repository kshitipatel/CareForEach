<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompanyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('company', function(Blueprint $table)
		{
			$table->integer('cid', true);
			$table->string('c_emailid');
			$table->bigInteger('mobile');
			$table->string('cname');
			$table->string('personname');
			$table->text('address', 65535);
			$table->string('designation');
			$table->integer('ctid');
			$table->integer('totalemp');
			$table->string('password');
			$table->string('regdate');
			$table->string('c_photo');
			$table->string('cstatus');
			$table->unique(['c_emailid','mobile'], 'emailid');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('company');
	}

}
