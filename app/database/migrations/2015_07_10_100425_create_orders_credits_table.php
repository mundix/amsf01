<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersCreditsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders_credits', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer("order_id")->unsigned();
			$table->float("amount",2);
			$table->foreign("order_id")->references("id")->on("orders");
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
		Schema::drop('orders_credits');
	}

}
