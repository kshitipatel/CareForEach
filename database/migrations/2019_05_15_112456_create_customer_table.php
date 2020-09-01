<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customer', function(Blueprint $table)
		{
			$table->integer('customerid', true);
			$table->string('customername');
			$table->string('customercompanyname');
			$table->date('date');
			$table->string('e_emailid');
			$table->string('c_emailid');
			$table->bigInteger('customercontactnum');
			$table->string('customeremailid');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('customer');
	}

}
