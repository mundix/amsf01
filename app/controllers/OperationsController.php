<?php

use Inventory\Repositories\ProductCategoryRepo;
use Inventory\Repositories\ProductRepo;
use Billing\Repositories\OrderRepo;
//use Inventory\Managers\SalesManager;
use HireMe\Repositories\ClientRepo;
use Billing\Repositories\NcfRepo;

class OperationsController extends AssetsController
{
	protected $productRepo;
	protected $productCategoryRepo;
	protected $orderRepo;
	protected $clientRepo;
	protected $ncfRepo;

	public function __construct(ProductRepo $productRepo,
								ProductCategoryRepo $productCategoryRepo,
								OrderRepo $orderRepo,
								ClientRepo $clientRepo,
								NcfRepo $ncfRepo)
	{
		$this->productRepo          = $productRepo;
		$this->productCategoryRepo  = $productCategoryRepo;
		$this->orderRepo			= $orderRepo;
		$this->clientRepo			= $clientRepo;
		$this->ncfRepo				= $ncfRepo;
	}

	public function sales()
	{
		$products 		= $this->productRepo->all('id','DESC');
		$ncfTypes		= $this->ncfRepo->getTypesByLocationId(Auth::User()->location_id);
		$clients		= $this->clientRepo->all('id','ASC');
		$javascripts 	= $this->getJsDataTables();

		array_push($javascripts,
			'melon/plugins/bootbox/bootbox.min.js',
			'js/jquery/plugin/numeral.min.js',
			'https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js',
			'js/cashier.js',
			'js/app.js'
		);

		$styles				= $this->getCssGeneral();
		array_push(
			$styles,
			'css/cashier.css'
		);
		$data 			= $this->getProductsData();

		return View::make('themes/melon/forms/operations/sales',compact('products','javascripts','data','styles','clients','ncfTypes'));
	}

	public function save()
	{
		$this->orderRepo->create(Input::all());
//		echo "<pre>";
//		print_r(Session::get('order.products'));
//		$entity = $this->orderRepo->newOrder();
//		$manager = new SalesManager($entity,Input::all());
////		exit();
//		$new_order_id = $manager->save();
//		print_r($manager->products);
//		exit();
//		return Redirect::route('products');

	}

}
