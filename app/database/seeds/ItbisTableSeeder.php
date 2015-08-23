<?php
use Billing\Entities\Itbis;

class ItbisTableSeeder extends Seeder {

	public function run()
	{
        DB::table("itbis")->truncate();

        Itbis::create([
            'id'            =>  1,
            'name'          =>  'General',
            'value'         =>  18.00,
            'available'     =>  true,
        ]);
        Itbis::create([
            'id'              => 2,
            'name'          =>  'Excentos',
            'value'         =>  00.00,
            'available'     =>  true,
        ]);
        Itbis::create([
            'id'            =>  3,
            'name'          =>  'Subsidiados',
            'value'         =>  05.00,
            'available'     =>  true,
        ]);
        Itbis::create([
            'id'            => 4,
            'name'          =>  'Especial',
            'value'         =>  10.00,
            'available'     =>  true,
        ]);
	}

}