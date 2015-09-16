<?php

namespace Billing\Repositories;
use Commons\Repositories\BaseRepo;
use \Billing\Entities\InvoicePayment;

class InvoicePaymentRepo extends BaseRepo
{
    public function getModel()
    {
        return new InvoicePayment;
    }
    public function newInvoicePayment()
    {
        $entity = new InvoicePayment();
        return $entity;
    }


}