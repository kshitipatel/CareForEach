<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdermasterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ordermaster', function(Blueprint $table)
		{
			$table->integer('oid', true);
			$table->integer('grandtotal');
			$table->date('date');
			$table->string('paymentmode');
			$table->string('e_emailid');
			$table->string('c_emailid');
			$table->integer('customerid');
			$table->integer('paidamount');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ordermaster');
	}

}
