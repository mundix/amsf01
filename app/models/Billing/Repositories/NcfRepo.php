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
}