<?php

namespace Billing\Repositories;
use Commons\Repositories\BaseRepo;
use \Billing\Entities\Itbis;

class ItbisRepo extends BaseRepo
{
    public function getModel()
    {
        return new Itbis;
    }

    public function getItbisFormSelect()
    {
        $itbis = $this->getModel()->all();
        $data = [];
        foreach($itbis as $i)
            $data[$i->id] ="{$i->name} ({$i->value})";
        return $data;
    }
}