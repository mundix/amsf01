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
//        $this->call("CategoryTableSeeder");
//        $this->call("CandidateTableSeeder");
//        $this->call("NCFTableSeeder");
//        $this->call("CategoryProductTableSeeder");

        $this->call("ItbisTableSeeder");
//        $this->call("ProductTableSeeder");
//		 $this->call('UserTableSeeder');
//		 $this->call('LocationsTableSeeder');
	}

}
