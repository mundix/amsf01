<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders_details', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer("order_id")->unsigned();
			$table->integer("product_id")->unsigned();
			$table->integer("qty");
			$table->float("price");

			$table->foreign("order_id")->references("id")->on("orders");
			$table->foreign("product_id")->references("id")->on("products");
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
		Schema::drop('orders_details');
	}

}
