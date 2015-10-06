<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
//		DB::table('orders')->truncate();
//		DB::table('orders_details')->truncate();
//		DB::table('products')->truncate();
//		DB::table('products_categories')->truncate();
//
////		DB::table('supplyers')->truncate();
////		DB::table('clients')->truncate();
//
//		DB::table('invoices')->truncate();
//		DB::table('invoices_details')->truncate();
//		DB::table('invoices_payments')->truncate();
//
////		DB::table('ncf')->truncate();
////		DB::table('ncf_sequencies')->truncate();
//
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');

//        $this->call("CategoryTableSeeder");
//        $this->call("CandidateTableSeeder");
//        $this->call("NCFTableSeeder");
//        $this->call("CategoryProductTableSeeder");

//        $this->call("ItbisTableSeeder");
//        $this->call("NCFTypesTableSeeder");
//        $this->call("NCFTableSeeder");
//        $this->call("ProductTableSeeder");
//		 $this->call('UserTableSeeder');
//		 $this->call('LocationsTableSeeder');
	}

}
