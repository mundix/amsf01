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

    protected function getJsUI()
    {
        return [
            'melon/plugins/pickadate/picker.js',
            'melon/plugins/pickadate/picker.date.js',
            'melon/plugins/pickadate/picker.time.js',
            'melon/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.js',
//            'melon/js/demo/ui_general.js',
        ];
    }
    protected function getScripts()
    {
        return ['melon/plugins/bootbox/bootbox.min.js',
            'js/jquery/plugin/numeral.min.js',
            'https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js',
            'js/app.js'];
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