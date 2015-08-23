<?php
use Billing\Entities\Itbis;

class ItbisTableSeeder extends Seeder {

	public function run()
	{
        Itbis::create([
            'id'            =>  1,
            'name'          =>  'General',
            'value'         =>  18.00,
            'available'     =>  true,
        ]);
        Itbis::create([
            'id'              => 2,
            'name'          =>  'Excentos',
            'value'         =>  0.00,
            'available'     =>  true,
        ]);
        Itbis::create([
            'id'            =>  3,
            'name'          =>  'Subsidiados',
            'value'         =>  5.00,
            'available'     =>  true,
        ]);
        Itbis::create([
            'id'            => 3,
            'name'          =>  'Especial',
            'value'         =>  10.00,
            'available'     =>  true,
        ]);
	}

}