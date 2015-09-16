<?php

/**
 * Este controller, contendra los assets necesarios
 * como javascript y css para los templates
*/
use Inventory\Repositories\ProductRepo;
use Billing\Repositories\ReportsRepo;
use Billing\Repositories\OrderRepo;

class AssetsController extends BaseController
{
    protected function getJsDataTables()
    {
        return [
            //DataTable Plugins
            'melon/plugins/datatables/jquery.dataTables.min.js',
            'melon/plugins/datatables/tabletools/TableTools.min.js',
            'melon/plugins/datatables/colvis/ColVis.min.js',
            'melon/plugins/datatables/columnfilter/jquery.dataTables.columnFilter.js',
            'melon/plugins/datatables/DT_bootstrap.js',
            //apps
            'melon/js/app.js',
            'melon/js/plugins.js',
            'melon/js/plugins.form-components.js',
        ];
    }
    protected function getCssDataTable()
    {
        return [];
    }

    public function getProductsData()
    {
        $productRepo = new ProductRepo();
        $reportReport =  new ReportsRepo();
        return [
            'total_inventory_amount'    => $productRepo->getTotalProductsAmount(),
            'total_inventory_products'  => $productRepo->getTotalProducts(),
            'total_today_sales'         => $reportReport->getTodayTotalSales(),
            'total_today_amount_sales'  => $reportReport->getTodayTotalAmountSales(),
            'total_today_buy'           => $reportReport->getTodayTotalBuy(),
            'total_today_amount_buy'    => $reportReport->getTodayTotalAmountBuy(),
        ];
    }

    public function getOrdersSales()
    {
        $orderRepo = new OrderRepo();
        return $orderRepo->getAllbyType("sale");
    }

    public function getOrdersBuy()
    {
        $orderRepo = new OrderRepo();
        return $orderRepo->getAllbyType("buy");
    }

    public function cashierStyle()
    {
        return [
            'css/cashier.css'
        ];
    }

    public function getCssGeneral()
    {
        return [
            'css/style.css'
        ];
    }
}