<?php

namespace Billing\Repositories;

use Commons\Repositories\BaseRepo;
use \Billing\Entities\Invoice;
use \Billing\Entities\InvoicePayment;
use \Billing\Entities\Order;
use Carbon\Carbon;

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
            "pay_days"  => isset($data[1]["pay_days"])?$data[1]["pay_days"]:0,
            "pay_date"  => isset($data[1]["pay_days"])?Carbon::now()->addWeekdays((int)$data[1]["pay_days"]):Carbon::now(),
            "rnc"  => isset($data[1]['rnc'])?$data[1]['rnc']:""
        ];

        $invoice = Invoice::create($params);

        if(isset($data[1]['payment']))
        {
            foreach($data[1]['payment'] as $key=>$payment)
            {
                $params = [
                    "invoice_id"=>$invoice->id,
                    "amount"=>str_replace(",","",$payment),
                    "payment_method"=>trim($data[1]['payment_method'][$key]),
                ];
                InvoicePayment::create($params);
            }
        }
        $status = $this->get_status_order_by_payments(['total'=>$data[2]['total.neto'],'total_paid'=>$total],$data['type']);
        $entity = Order::find($order_id);
        $entity->status = $status;
        $entity->save();
        return $order_id;
    }

    /**
     * Add payments to the orders
    */
    public function add_payments($payments = [],$order_id = null)
    {
        $total = 0;
        if(isset($payments['payment']))
        {
            foreach($payments as $payment)
            {
                $total += (float)$payment;
            }
        }

        $order = Order::find($order_id);
        if(isset($payments['payment']))
        {
            foreach($payments['payment'] as $key=>$payment)
            {
                $params = [
                    "invoice_id"=>$order->invoice->id,
                    "amount"=>str_replace(",","",$payment),
                    "payment_method"=>trim($payments['payment_method'][$key]),
                ];
                InvoicePayment::create($params);
            }
        }

        $total_paid = 0;
        foreach($order->invoice->payments as $payment)
            $total_paid += $payment->amount;

        $params = ["total_paid"=>$total_paid];
        $order->invoice->fill($params);
        $order->invoice->save();

        $status = $this->get_status_order_by_payments(['total'=>$order->sub_total,'total_paid'=>$total_paid],$order->type);
        $entity = Order::find($order_id);
        $entity->status = $status;
        $entity->save();
        return $order_id;
    }

    private function get_status_order_by_payments($payments = [],$type = "sale")
    {
        if($type == 'sale')
        {

            if((float)$payments['total']>(float)$payments['total_paid'])
            {
                return "status_credit";
            }elseif((float)$payments['total']<=(float)$payments['total_paid'])
            {
                return "completed";
            }
        }elseif($type == 'buy')
        {
            if((float)$payments['total']>(float)$payments['total_paid'])
            {
                return "pending_payment";
            }elseif((float)$payments['total']<=(float)$payments['total_paid'])
            {
                return "completed";
            }
        }
        return "pending";

    }

}