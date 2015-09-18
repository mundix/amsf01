<?php

//use Billing\Entities\Invoice;
use Billing\Entities\Order;
use Billing\Repositories\InvoiceRepo;

class InvoicesController extends AssetsController
{
	protected $invoiceRepo;
	public function __construct(InvoiceRepo $invoiceRepo)
	{
		$this->invoiceRepo = $invoiceRepo;
	}
	public function show($id)
	{
		$order = Order::find($id);

		$styles				= $this->getCssGeneral();
//		array_push(
//			$styles,
//			'css/cashier.css'
//		);
		$data 			= $this->getProductsData();
		$javascripts = [
			'js/jquery/plugin/numeral.min.js',
			'js/app.js'
		];

		return View::make('themes/melon/pages/billing/invoice',compact('products','javascripts','data','styles','order'));


	}
}
