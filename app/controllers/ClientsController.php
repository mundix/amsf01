<?php

use HireMe\Repositories\ClientRepo;
use HireMe\Managers\ClientRegisterManager;
use HireMe\Managers\ClientUpdateManager;

class ClientsController extends AssetsController
{
	protected $clientsRepo;
	public function __construct(ClientRepo $clientsRepo)
	{
		$this->clientsRepo = $clientsRepo;
	}
	public function dashboard()
	{
		$clients = $this->clientsRepo->getAllClients();
		$javascripts = ['melon/plugins/bootbox/bootbox.min.js',
			'js/jquery/plugin/numeral.min.js',
			'https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js',
			'js/app.js'];
		$data = $this->getProductsData();
		return View::make("themes/{$this->theme}/pages/resources/clients/dashboard",compact('clients','data','javascripts'));
	}
	public function add()
	{
		$javascripts = $this->getJsDataTables();
		$data = $this->getProductsData();
		return View::make("themes/{$this->theme}/forms/resources/clients/add",compact('data','javascripts'));
	}
	public function save()
	{
		$entity = $this->clientsRepo->newClient();
		$manager = new ClientRegisterManager($entity,Input::all());
		$manager->save();

		\Session::push('form.validation.success','Nuevo cliente creado.');
		return Redirect::route('clients');
	}
	public function edit($id)
	{
		$entity = $this->clientsRepo->find($id);
		$javascripts = $this->getJsDataTables();
		$data = $this->getProductsData();
		return View::make("themes/{$this->theme}/forms/resources/clients/edit",compact('entity','data','javascripts'));
	}
	public function update()
	{

		$entity = $this->clientsRepo->find(Input::get('id'));
		$manager = new ClientUpdateManager($entity,Input::all());
		$manager->save();
		\Session::push('form.validation.success','Cliente actualizado.');

		return Redirect::route('client_edit',[$entity->id]);

	}

	public function delete($id)
	{
		$entity = $this->clientsRepo->find($id);
		$entity->forceDelete();
		\Session::push('form.validation.success','El cliente fu&eacute; eliminado.');
		return Redirect::route('clients');
	}
}
