<?php

use HireMe\Entities\Location;

class LocationsTableSeeder extends Seeder {

	public function run()
	{
        Location::create([
            'id'        =>1,
            'name'      =>'Caja 1',
        ]);
        Location::create([
            'id'        =>2,
            'name'      =>'Caja 2',
        ]);
        Location::create([
            'id'        =>3,
            'name'      =>'Caja 3',
        ]);
	}

}