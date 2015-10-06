<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNcfSequenciesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ncf_sequencies', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('ncf_id')->unsigned();
			$table->foreign('ncf_id')->references('id')->on('ncf');
			$table->string('sequency',8);
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
		Schema::drop('ncf_sequencies');
	}

}
