<?php

namespace Billing\Repositories;
use Commons\Repositories\BaseRepo;
use \Billing\Entities\Ncf;

class NcfRepo extends BaseRepo
{
    public function getModel()
    {
        return new Ncf;
    }

    public function getTypesByLocationId($location_id)
    {
        return Ncf::
            where('location_id',$location_id)
            ->orderBy('prefix','ASC')
            ->groupBy('type_id')
            ->get();
    }

}