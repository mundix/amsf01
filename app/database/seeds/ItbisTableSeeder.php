<?php
use Billing\Entitis\Itbis;

class ItbisTableSeeder extends Seeder {

	public function run()
	{
        Itbis::create([
            'name'          =>  'General',
            'value'         =>  18.00,
            'available'     =>  true,
        ]);
        Itbis::create([
            'name'          =>  'Excentos',
            'value'         =>  0.00,
            'available'     =>  true,
        ]);
        Itbis::create([
            'name'          =>  'Subsidiados',
            'value'         =>  5.00,
            'available'     =>  true,
        ]);
        Itbis::create([
            'name'          =>  'Especial',
            'value'         =>  10.00,
            'available'     =>  true,
        ]);
	}

}