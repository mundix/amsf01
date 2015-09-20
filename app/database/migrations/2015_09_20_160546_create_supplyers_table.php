<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSupplyersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('supplyers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('contact_name');
			$table->string('phone');
			$table->text('description',300);
			$table->string('rnc');
			$table->boolean('available');
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
		Schema::drop('supplyers');
	}

}
