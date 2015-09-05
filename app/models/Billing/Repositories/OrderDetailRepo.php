<?php

namespace Billing\Repositories;
use Commons\Repositories\BaseRepo;
use \Billing\Entities\OrderDetail;

class OrderDetailRepo extends BaseRepo
{
    public function getModel()
    {
        return new OrderDetail();
    }
    public function newOrderDetail()
    {
        $entity = new OrderDetail();
        return $entity;
    }
}