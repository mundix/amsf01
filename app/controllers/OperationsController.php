<?php

use Inventory\Repositories\ProductCategoryRepo;
use Inventory\Repositories\ProductRepo;
use Billing\Repositories\OrderRepo;
use HireMe\Repositories\ClientRepo;
use Billing\Repositories\NcfRepo;
use Billing\Repositories\InvoiceRepo;
use HireMe\Repositories\SupplyerRepo;

class OperationsController extends AssetsController
{
//	protected $productRepo;
	protected $productCategoryRepo;
	protected $orderRepo;
	protected $clientRepo;
	protected $ncfRepo;
	protected $invoiceRepo;
	protected $supplyerRepo;

	public function __construct(
		ProductRepo $productRepo,
		ProductCategoryRepo $productCategoryRepo,
		OrderRepo $orderRepo,
		ClientRepo $clientRepo,
		NcfRepo $ncfRepo,
		InvoiceRepo $invoiceRepo,
		SupplyerRepo $supplyerRepo
	)
	{
		$this->productRepo          = $productRepo;
		$this->productCategoryRepo  = $productCategoryRepo;
		$this->orderRepo			= $orderRepo;
		$this->clientRepo			= $clientRepo;
		$this->ncfRepo				= $ncfRepo;
		$this->invoiceRepo			= $invoiceRepo;
		$this->supplyerRepo			= $supplyerRepo;

	}

	public function sales()
	{
		$products 		= $this->productRepo->all('id','DESC');
		$ncfTypes		= $this->ncfRepo->getTypesByLocationId(Auth::User()->location_id);
		$clients		= $this->clientRepo->all('id','ASC');
		$javascripts 	= array_merge($this->getScripts(),$this->getJsDataTables(),['js/sales.js']);
		$styles			= array_merge($this->getCssGeneral(),['css/cashier.css']);
		$data 			= $this->getProductsData();

		return View::make("themes/{$this->theme}/forms/operations/sales",compact('products','javascripts','data','styles','clients','ncfTypes'));
	}
	public function credit()
	{
		$clients		= $this->clientRepo->all('id','ASC');
		$javascripts 	= array_merge($this->getScripts(),$this->getJsUI(),['js/credits.js']);
		$styles			= array_merge($this->getCssGeneral(),['css/cashier.css']);
		$data 			= $this->getProductsData();

		return View::make("themes/{$this->theme}/forms/operations/credits",compact('products','javascripts','data','styles','clients','ncfTypes'));
	}

	public function buy()
	{
		$products 		= $this->productRepo->all('id','DESC');
		$ncfTypes		= $this->ncfRepo->getTypesByLocationId(Auth::User()->location_id);
		$supplyers		= $this->supplyerRepo->getList();
		$javascripts 	= array_merge($this->getScripts(),$this->getJsDataTables(),['js/buy.js']);
		$styles			= array_merge($this->getCssGeneral(),['css/cashier.css']);
		$data 			= $this->getProductsData();

		return View::make("themes/{$this->theme}/forms/operations/buy",compact('products','javascripts','data','styles','supplyers','ncfTypes'));
	}

	public function saveSales()
	{

		$order_id = $this->invoiceRepo->create($this->orderRepo->create(Input::all()));
		return Redirect::route('invoices',[$order_id]);
	}
	public function saveBuy()
	{
		$this->orderRepo->create(Input::all(),"buy");
		return Redirect::route('home');
	}
	public function saveCredit()
	{

		$order_id = $this->invoiceRepo->create($this->orderRepo->createCredit(Input::all()));
		return Redirect::route('invoices',[$order_id]);
	}

}
