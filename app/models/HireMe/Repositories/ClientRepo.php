<?php

namespace HireMe\Repositories;
use Commons\Repositories\BaseRepo;
use HireMe\Entities\Client;

class ClientRepo extends BaseRepo
{
    public function getModel()
    {
        return new Client;
    }
}