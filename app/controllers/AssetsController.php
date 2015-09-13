<?php

/**
 * Este controller, contendra los assets necesarios
 * como javascript y css para los templates
*/
use Inventory\Repositories\ProductRepo;
use Billing\Repositories\ReportsRepo;

class AssetsController extends BaseController
{
    protected $productRepo;
    protected $reportsRepo;

    public function __construct(ProductRepo $productRepo,
                                ReportsRepo $reportsRepo
    )
    {
        $this->productRepo			= $productRepo;
        $this->reportsRepo	        = $reportsRepo;
    }

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
        return [
            'total_inventory_amount'    => $this->productRepo->getTotalProductsAmount(),
            'total_inventory_products'  => $this->productRepo->getTotalProducts(),
            'total_today_sales'         => $this->reportsRepo->getTodayTotalSales(),
            'total_today_amount_sales'  => $this->reportsRepo->getTodayTotalAmountSales(),
        ];
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