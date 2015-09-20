<?php

use HireMe\Repositories\SupplyerRepo;
use HireMe\Managers\SupplayerRegisterManager;
use HireMe\Managers\SupplyerUpdateManager;

class SupplyersController extends AssetsController
{
	protected $supplyerRepo;
	public function __construct(SupplyerRepo $supplyerRepo)
	{
		$this->supplyerRepo = $supplyerRepo;
	}
	public function dashboard()
	{
		$supplyers = $this->supplyerRepo->all('name','DESC');
		$javascripts = ['melon/plugins/bootbox/bootbox.min.js',
			'js/jquery/plugin/numeral.min.js',
			'https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js',
			'js/app.js'];
		$data = $this->getProductsData();
		return View::make("themes/{$this->theme}/pages/resources/supplyers/dashboard",compact('supplyers','data','javascripts'));
	}
	public function add()
	{
		$javascripts = $this->getJsDataTables();
		$data = $this->getProductsData();
		return View::make("themes/{$this->theme}/forms/resources/supplyers/add",compact('data','javascripts'));
	}
	public function save()
	{
		$entity = $this->supplyerRepo->newSupplyer();
		$manager = new SupplayerRegisterManager($entity,Input::all());
		$manager->save();

		\Session::push('form.validation.success','Nuevo suplidor creado.');
		return Redirect::route('supplyers');
	}
	public function edit($id)
	{
		$entity = $this->supplyerRepo->find($id);
		$javascripts = $this->getJsDataTables();
		$data = $this->getProductsData();
		return View::make("themes/{$this->theme}/forms/resources/supplyers/edit",compact('entity','data','javascripts'));
	}
	public function update()
	{
		$entity = $this->supplyerRepo->find(Input::get('id'));
		$manager = new SupplyerUpdateManager($entity,Input::all());
		$manager->save();
		\Session::push('form.validation.success','Suplidor actualizado.');

		return Redirect::route('supplyer_edit',[$entity->id]);

	}

	public function delete($id)
	{
		$entity = $this->supplyerRepo->find($id);
		$entity->forceDelete();
		\Session::push('form.validation.success','El suplidor fu&eacute; eliminado.');
		return Redirect::route('supplyers');
	}
}
