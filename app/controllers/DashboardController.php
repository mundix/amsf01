<?php

class DashboardController extends AssetsController
{

	public function __construct()
	{

	}
	/**
	 * Presenta Formulario de login
	*/
	public function index()
	{
		$data 			= $this->getProductsData();
		$javascripts 	= $this->getScripts();
		$sales 			= $this->getOrdersSales();
		$shopings 		= $this->getOrdersBuy();

		return View::make('themes/melon/pages/dashboard',compact('data','javascripts','sales','shopings'));
	}

	public function test()
	{
		$data = $this->getProductsData();
		return $data;
	}
}
