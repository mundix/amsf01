<?php
use Billing\Entities\Ncf;
use Billing\Entities\NcfSequency;

class NCFTableSeeder extends Seeder {

	public function run()
    {
//        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
//        DB::table("ncf")->truncate();
//        DB::table("ncf_sequencies")->truncate();
//        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $prefix = "A0100100102";
        $ini = 1;
        $end = 20;
        $location = 1;

        $ncf = Ncf::create([
            'prefix'        => $prefix,
            'location_id'   => $location
        ]);

        for ($i = $ini; $i <= $end; $i++)
        {
            NcfSequency::create([
                'ncf_id'    =>$ncf->id,
                'sequency'  => str_pad($i,8,0,STR_PAD_LEFT)
            ]);
        }

	}

}