<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWishlistCustTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wishlist_cust', function(Blueprint $table)
		{
			$table->integer('wcid', true);
			$table->string('custname');
			$table->date('expecteddate');
			$table->string('custemailid');
			$table->bigInteger('custmobile');
			$table->text('custaddress', 65535);
			$table->string('cust_company_name');
			$table->text('custdesc', 65535);
			$table->string('e_emailid');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('wishlist_cust');
	}

}
