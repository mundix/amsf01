<?php

namespace Billing\Repositories;

use Commons\Repositories\BaseRepo;
use \Billing\Entities\Invoice;
use \Billing\Entities\InvoicePayment;
use \Billing\Entities\Order;

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
    /**
     * @param Array $data
     * @return Int ($order_id)
    */
    public function create($data = [])
    {
        $total = 0;
        if(isset($data[1]['payment']))
        {
            foreach($data[1]['payment'] as $payment)
            {
                $total += (float)$payment;
            }
        }

        $order_id = $data[0];

        $params = [
            "order_id"  => $order_id,
            "total_paid"  => str_replace(",","",$total),
            "rnc"  => isset($data[1]['rnc'])?$data[1]['rnc']:"",
        ];

        $invoice = Invoice::create($params);

        if(isset($data[1]['payment']))
        {
            foreach($data[1]['payment'] as $key=>$payment)
            {
                $params = [
                    "invoice_id"=>$invoice->id,
                    "amount"=>str_replace(",","",$payment),
                    "payment_method"=>$data[1]['payment_method'][$key],
                ];
                InvoicePayment::create($params);
            }
        }
        $status = $this->get_status_order_by_payments(['total'=>$data[2]['total.neto'],'total_paid'=>$total]);
        $entity = Order::find($order_id);
        $entity->status = $status;
        $entity->save();
        return $order_id;
    }

    private function get_status_order_by_payments($payments = [])
    {
        if((float)$payments['total']>(float)$payments['total_paid'])
        {
            return "pending_payment";
        }elseif((float)$payments['total']<=(float)$payments['total_paid'])
        {
            return "completed";
        }else
            return "pending";
    }

}