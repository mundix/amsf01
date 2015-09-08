<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UpdateNcfTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('ncf', function(Blueprint $table)
		{
//			DB::statement('SET FOREIGN_KEY_CHECKS=0;');
//			$table->integer('type_id')->unsigned()->after('id');
//			$table->foreign('type_id')->references('id')->on('ncf_types');
//	        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('ncf', function(Blueprint $table)
		{
			
		});
	}

}
