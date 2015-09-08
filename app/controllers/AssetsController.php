<?php

/**
 * Este controller, contendra los assets necesarios
 * como javascript y css para los templates
*/
use Inventory\Repositories\ProductRepo;

class AssetsController extends BaseController
{
    protected $productRepo;

    public function __construct(ProductRepo $productRepo)
    {
        $this->productRepo = $productRepo;
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
            'total_inventory_amount' => $this->productRepo->getTotalProductsAmount(),
            'total_inventory_products' => $this->productRepo->getTotalProducts(),
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