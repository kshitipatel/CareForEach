<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMyVenderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('my_vender', function(Blueprint $table)
		{
			$table->integer('vid', true);
			$table->string('contactpersonname');
			$table->string('companyname');
			$table->string('contact');
			$table->string('email');
			$table->string('address');
			$table->string('city');
			$table->string('productname');
			$table->string('photo');
			$table->string('c_emailid');
			$table->text('mail_data', 65535);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('my_vender');
	}

}
