<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderdetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orderdetails', function(Blueprint $table)
		{
			$table->integer('odetailid', true);
			$table->integer('pid');
			$table->integer('qty');
			$table->integer('oid');
			$table->integer('sprice');
			$table->integer('gst');
			$table->string('pname');
			$table->string('pcode');
			$table->text('pdesc', 65535);
			$table->string('pphoto');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('orderdetails');
	}

}
