<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UpdateInvoicesPaymentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('invoices_payments', function(Blueprint $table)
		{
			$table->enum('payment_method',['cash','credit_card','check','transfer'])->after("amount");
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('invoices_payments', function(Blueprint $table)
		{
			$table->dropColumn('payment_method');
		});
	}

}
