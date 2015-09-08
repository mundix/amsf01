<?php

namespace Billing\Repositories;
use Commons\Repositories\BaseRepo;
use Billing\Entities\NcfType;

class NcfTypeRepo extends BaseRepo
{
    public function getModel()
    {
        return new NcfType;
    }
    /**
     *
     * Get Type Obj By Code
     *
     * @param Int $code
     * @return Obj <NcfType>
     *
    */
    public function getByCode($code = null)
    {
        if(!is_null($code))
            return  NcfType::where('code',$code)->first();
        return FALSE;
    }

    /**
     *
     * Sustrac the las 2 digits from string prefix
     *
     * @param String $prefix
     * @return Int
    */
    public function getCodeByPrefix($prefix = null)
    {
        if(!is_null($prefix))
        {
            return substr($prefix,-2,2);
        }
    }
}