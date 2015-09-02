<?php

namespace Billing\Repositories;
use Commons\Repositories\BaseRepo;
use \Billing\Entities\Order;

class OrderRepo extends BaseRepo
{
    public function getModel()
    {
        return new Order;
    }
    public function newOrder()
    {
        $entity = new Order();
        return $entity;
    }
}