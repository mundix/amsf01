<?php

namespace Billing\Repositories;
use Commons\Repositories\BaseRepo;
use Billing\Entities\NcfSequency;
use Billing\Entities\Ncf;


class NcfSequencyRepo extends BaseRepo
{
    public function getModel()
    {
        return new NcfSequency();
    }

    public function getNext($location_id = null)
    {
        if($ncf = Ncf::where('location_id',$location_id)
            ->orderBy('prefix','ASC')
            ->take(1)
            ->first())
        {
            return NcfSequency::with([
                'ncf'=>function($q) use ($location_id)
                {
                    $q->where('location_id',$location_id);
                }
                ])
                ->where('status','available')
                ->where('ncf_id',$ncf->id)
                ->orderBy('sequency','ASC')
                ->take(1)
                ->get();
        }
        return FALSE;
    }
}