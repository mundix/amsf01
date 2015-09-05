<?php

use Inventory\Repositories\ProductCategoryRepo;
use Inventory\Repositories\ProductRepo;
use Billing\Repositories\OrderRepo;
use Inventory\Managers\SalesManager;

class OperationsController extends AssetsController
{
	protected $productRepo;
	protected $productCategoryRepo;
	protected $orderRepo;

	public function __construct(ProductRepo $productRepo,ProductCategoryRepo $productCategoryRepo,OrderRepo $orderRepo)
	{
		$this->productRepo          = $productRepo;
		$this->productCategoryRepo  = $productCategoryRepo;
		$this->orderRepo			= $orderRepo;
	}

	public function sales()
	{
		$products 		= $this->productRepo->all('id','DESC');
		$javascripts 	= $this->getJsDataTables();

		array_push($javascripts,
			'melon/plugins/bootbox/bootbox.min.js',
			'js/jquery/plugin/numeral.min.js',
			'https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js',
			'js/cashier.js',
			'js/app.js'
		);

		$styles 		= $this->cashierStyle();
		$data 			= $this->getProductsData();

		return View::make('themes/melon/forms/operations/sales',compact('products','javascripts','data','styles'));
	}

	public function save()
	{
		$entity = $this->orderRepo->newOrder();
		$manager = new SalesManager($entity,Input::all());
		$new_order_id = $manager->save();

		return Redirect::route('products');

	}

}
