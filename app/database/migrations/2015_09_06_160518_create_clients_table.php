<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clients', function(Blueprint $table)
		{
			$table->increments('id');
			$table->enum('type',['person','company']);
			$table->string('rnc')->unique();
			$table->string('noid')->unique();
			$table->string('name');
			$table->string('contact_name');
			$table->string('addess');
			$table->string('phone');
			$table->string('cellphone');
			$table->string('email');
			$table->text('comments');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('clients');
	}

}
