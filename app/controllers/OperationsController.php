<?php

use Inventory\Repositories\ProductCategoryRepo;
use Inventory\Repositories\ProductRepo;
use Billing\Repositories\OrderRepo;
use HireMe\Repositories\ClientRepo;
use Billing\Repositories\NcfRepo;
use Billing\Repositories\InvoiceRepo;

class OperationsController extends AssetsController
{
//	protected $productRepo;
	protected $productCategoryRepo;
	protected $orderRepo;
	protected $clientRepo;
	protected $ncfRepo;
	protected $invoiceRepo;

	public function __construct(
		ProductRepo $productRepo,
		ProductCategoryRepo $productCategoryRepo,
		OrderRepo $orderRepo,
		ClientRepo $clientRepo,
		NcfRepo $ncfRepo,
		InvoiceRepo $invoiceRepo
	)
	{
		$this->productRepo          = $productRepo;
		$this->productCategoryRepo  = $productCategoryRepo;
		$this->orderRepo			= $orderRepo;
		$this->clientRepo			= $clientRepo;
		$this->ncfRepo				= $ncfRepo;
		$this->invoiceRepo			= $invoiceRepo;

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
			'js/sales.js',
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

	public function buy()
	{
		$products 		= $this->productRepo->all('id','DESC');
		$ncfTypes		= $this->ncfRepo->getTypesByLocationId(Auth::User()->location_id);
		$clients		= $this->clientRepo->all('id','ASC');
		$javascripts 	= $this->getJsDataTables();

		array_push($javascripts,
			'melon/plugins/bootbox/bootbox.min.js',
			'js/jquery/plugin/numeral.min.js',
			'https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js',
			'js/buy.js',
			'js/app.js'
		);

		$styles				= $this->getCssGeneral();
		array_push(
			$styles,
			'css/cashier.css'
		);
		$data 			= $this->getProductsData();

		return View::make('themes/melon/forms/operations/buy',compact('products','javascripts','data','styles','clients','ncfTypes'));
	}

	public function saveSales()
	{
		$this->invoiceRepo->create($this->orderRepo->create(Input::all()));
		return Redirect::route('home');
	}
	public function saveBuy()
	{
		$this->orderRepo->create(Input::all(),"buy");
		return Redirect::route('home');
	}

}
