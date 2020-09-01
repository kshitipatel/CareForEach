<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWishlistTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wishlist', function(Blueprint $table)
		{
			$table->integer('wlid', true);
			$table->integer('pid');
			$table->string('e_emailid');
			$table->integer('qty');
			$table->date('date');
			$table->string('c_emailid');
			$table->integer('wcid');
			$table->integer('sprice');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('wishlist');
	}

}
