<?php

class DashboardController extends AssetsController
{
	/**
	 * Presenta Formulario de login
	*/
	public function index()
	{
		$data = $this->getProductsData();
		return View::make('themes/melon/pages/dashboard',compact('data'));
	}

	public function test()
	{
		$data = $this->getProductsData();
		return $data;
	}
}
