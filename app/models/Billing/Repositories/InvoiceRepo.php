<?php

namespace Billing\Repositories;
use Commons\Repositories\BaseRepo;
use \Billing\Entities\Invoice;
use \Billing\Entities\InvoicePayment;

class InvoiceRepo extends BaseRepo
{
    public function getModel()
    {
        return new Invoice;
    }
    public function newInvoice()
    {
        $entity = new Invoice();
        return $entity;
    }

    public function create($data = [])
    {
        echo "<pre>";
        print_r($data);
//        exit();
        $total = 0;
        if(isset($data[1]['payment']))
        {
            foreach($data[1]['payment'] as $payment)
            {
                $total += (float)$payment;
            }
        }

         $order_id = $data[0];
         $post = $data[1];

        $params = [
            "order_id"  => $order_id,
            "total_paid"  => $total,
            "rnc"  => $data[1]['rnc'],
        ];
        $invoice = Invoice::create($params);
        $params = [
            ""=>""
        ];
        InvoicePayment::create($params);
        print_r($params);
        exit();
//        print_r($post['payment_method']);

    }

}