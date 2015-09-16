<?php
/**
 * Created by PhpStorm.
 * User: clementepichardo
 * Date: 9/13/15
 * Time: 2:20 PM
 */

namespace Billing\Repositories;
use Commons\Repositories\BaseRepo;
use Billing\Entities\Order;
use Illuminate\Support\Facades\DB;

class ReportsRepo extends BaseRepo
{
    public function getModel()
    {
        return new Order;
    }

    public function getTodayTotalSales()
    {
        return Order::where('created_at','>=',date('Y-n-j'))
            ->where('type','sale')
            ->get()
            ->count();
    }
    public function getTodayTotalBuy()
    {
        return Order::where('created_at','>=',date('Y-n-j'))
            ->where('type','buy')
            ->get()
            ->count();
    }

    public function getTodayTotalAmountSales()
    {
        $total_inventory_amount = Order::where('created_at','>=',date('Y-n-j'))
            ->where('type','sale')
            ->sum('sub_total');
        return $total_inventory_amount;
    }
    public function getTodayTotalAmountBuy()
    {
        $total_inventory_amount = Order::where('created_at','>=',date('Y-n-j'))
            ->where('type','buy')
            ->sum('sub_total');
        return $total_inventory_amount;
    }

}