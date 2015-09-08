<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer("user_id")->unsigned();

			$table->integer("client_id")->unsigned();
			$table->string("phone");
			$table->text("address",300);
			$table->string("email");
			$table->string("first_name");
			$table->string("last_name");
			$table->float("itbis",10,2);
			$table->float("itbis_amount",10,2);
			$table->string("ncf",20);
			$table->float("total",10,2);
			$table->float("sub_total",10,2);
			$table->float("discount",10,2);
			$table->float("total_credits",10,2);
			$table->float("percent_credits",10,2);
			$table->enum("status",["pending","pending payment","status credit","canceled"]);
			$table->boolean("available");

			$table->foreign("user_id")->references("id")->on("users");

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
		Schema::drop('orders');
	}

}
