<?php

namespace HireMe\Repositories;
use Commons\Repositories\BaseRepo;
use HireMe\Entities\Supplyer;

class SupplyerRepo extends BaseRepo
{
    public function getModel()
    {
        return new Supplyer();
    }
    public function newSupplyer()
    {
        $entity = new Supplyer();
        return $entity;
    }


}