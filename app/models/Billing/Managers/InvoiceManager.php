<?php

namespace Inventory\Managers;

use Commons\Managers\BaseManager;
use \Billing\Entities\Invoice;

class InvoiceManager extends  BaseManager
{
    public function getRules()
    {
        $rules = [
            'product_id'          => 'required',
            'qty'                 => 'required',
        ];
        return $rules;
    }

    public function prepareData($post)
    {

    }

}