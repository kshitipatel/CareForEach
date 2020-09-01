<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product', function(Blueprint $table)
		{
			$table->integer('pid', true);
			$table->string('pname');
			$table->string('pcode');
			$table->text('pdesc', 65535);
			$table->integer('price');
			$table->text('pphoto', 65535);
			$table->integer('stock');
			$table->integer('subcatid');
			$table->string('c_emailid');
			$table->integer('minimum_stock');
			$table->integer('msprice');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product');
	}

}
