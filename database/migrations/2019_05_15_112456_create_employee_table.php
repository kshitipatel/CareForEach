<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmployeeTable extends Migration {


	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('employee', function(Blueprint $table)
		{
			$table->integer('eid', true);
			$table->string('ename');
			$table->string('dob');
			$table->string('joiningdate');
			$table->string('designation');
			$table->string('photo');
			$table->string('edu');
			$table->string('e_emailid');
			$table->bigInteger('mobilenum');
			$table->text('address', 65535);
			$table->string('password');
			$table->string('c_emailid');
			$table->string('status');
			$table->unique(['e_emailid','mobilenum'], 'emailid');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('employee');
	}

}
