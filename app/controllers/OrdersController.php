<?php
use Billing\Repositories\OrderRepo;

class OrdersController extends AssetsController
{
	protected $orderRepo;

	public function __construct(OrderRepo $orderRepo)
	{
		$this->orderRepo = $orderRepo;
	}

	public function sale()
	{
		$orders = $this->orderRepo->getOrderBetweenDates(Input::all());
		$javascripts = array_merge($this->getJsDataTables(), $this->getJsUI(), $this->getScripts(), ['js/reports.js']);
		$data = $this->getProductsData();
		return View::make("themes.{$this->theme}.pages.reports.sale", compact('orders', 'data', 'javascripts'));
	}

	public function buy()
	{
		$orders = $this->orderRepo->getOrderBetweenDates(Input::all(), "buy");
		$javascripts = array_merge($this->getJsDataTables(), $this->getJsUI(), $this->getScripts(), ['js/reports.js']);
		$data = $this->getProductsData();
		return View::make("themes.{$this->theme}.pages.reports.buy", compact('orders', 'data', 'javascripts'));
	}

	public function sales_by($by = 'day')
	{
		$sales = $this->orderRepo->getOrdersBy('day',Input::all());
		$javascripts = array_merge($this->getJsDataTables(), $this->getJsUI(), $this->getScripts(), ['js/reports.js']);
		$data = $this->getProductsData();
		return View::make("themes.{$this->theme}.pages.reports.sales_by", compact('sales', 'data', 'javascripts'));

	}

}
