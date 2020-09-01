<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaymentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('payment', function(Blueprint $table)
		{
			$table->integer('paymentid', true);
			$table->integer('customerid');
			$table->integer('oid');
			$table->string('e_emailid');
			$table->string('c_emailid');
			$table->integer('amount');
			$table->string('paymenttype');
			$table->date('date');
			$table->date('reminddate');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('payment');
	}

}
