<?php

namespace Billing\Repositories;
use Commons\Repositories\BaseRepo;
use Illuminate\Support\Facades\Response;
use \Billing\Entities\Itbis;

class ItbisRepo extends BaseRepo
{
    public function getModel()
    {
        return new Itbis;
    }
}