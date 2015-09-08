<?php
use Billing\Entities\Ncf;
use Billing\Entities\NcfSequency;
use Billing\Repositories\NcfTypeRepo;

class NCFTableSeeder extends Seeder
{
	public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table("ncf")->truncate();
        DB::table("ncf_sequencies")->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


        foreach([
                    ['prefix'=>'A0100100101','name'=>'Factura General 1','range'=>[1,10],'location'=>1],
                    ['prefix'=>'A0100100114','name'=>'Casos Especiales','range'=>[1,100],'location'=>2]
                ] as $ncf)
        {

            $ntr = new NcfTypeRepo();
            $code = (int)$ntr->getCodeByPrefix($ncf['prefix']);
            $type = $ntr->getByCode($code);

            $ini = $ncf['range'][0];
            $end = $ncf['range'][1];
            $location = $ncf['location'];
            $ncf = Ncf::create([
                'prefix'        => $ncf['prefix'],
                'type_id'        => $type->id,
                'name'        => $ncf['name'],
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
//

	}

}