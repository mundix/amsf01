<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string("name");
			$table->text("description",200);
			$table->string("slug");
			$table->string("sku");
			$table->integer("stock");
			$table->integer("min_stock");
			$table->float("price",15,2);
			$table->double("min_price",15,2);
			$table->double("discount",15,2);
			$table->boolean("discount_apply");
			$table->integer("user_id")->unsigned();
			$table->foreign("user_id")->references("id")->on("users");
			$table->date("date_in");
			$table->date("date_out");
			$table->integer("category_id")->unsigned();
			$table->foreign("category_id")->references("id")->on("products_categories");
			$table->boolean("available");
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
		Schema::drop('products');
	}

}
