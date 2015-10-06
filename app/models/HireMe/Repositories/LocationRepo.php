<?php

namespace HireMe\Repositories;
use Commons\Repositories\BaseRepo;
use HireMe\Entities\Location;

class LocationRepo extends BaseRepo
{
    public function getModel()
    {
        return new Location();
    }
    public function newSupplyer()
    {
        $entity = new Location();
        return $entity;
    }



}