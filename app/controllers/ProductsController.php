<?php

use Inventory\Repositories\ProductCategoryRepo;
use Inventory\Repositories\ProductRepo;
use Inventory\Managers\ProductManager;
use Billing\Repositories\ItbisRepo;
use Inventory\Managers\ProductUpdateManager;

class ProductsController extends AssetsController
{
	protected $productRepo;
	protected $productCategoryRepo;
	protected $itbisRepo;

	public function __construct(ProductRepo $productRepo,ProductCategoryRepo $productCategoryRepo,ItbisRepo $itbisRepo)
	{
		$this->productRepo          = $productRepo;
		$this->productCategoryRepo  = $productCategoryRepo;
		$this->itbisRepo  			= $itbisRepo;
	}

	public function index()
	{
		$products = $this->productRepo->all('id','DESC');
		$javascripts = $this->getJsDataTables();
		$data = $this->getProductsData();
		return View::make("themes/{$this->theme}/pages/inventory/products/show",compact('products','javascripts','data'));
	}

	/**
	 * Formulario de Agregar Producto
	*/
	public function add()
	{
		$categories = $this->productCategoryRepo->getList();
		$itbis 		= $this->itbisRepo->getItbisFormSelect();
		$data 		= $this->getProductsData();
		return View::make("themes/{$this->theme}/forms/inventory/products/add",compact('categories','data','itbis'));
	}
	/**
	 * Guardando la entidad atraves del manager.
	*/
	public function save()
	{
		$entity = $this->productRepo->newProduct();
		$manager = new ProductManager($entity,Input::all());
		$manager->save();
		return Redirect::route('products');
	}
	public function edit($slug,$id)
	{
		$entity = $this->productRepo->find($id);
		$categories = $this->productCategoryRepo->getList();
		$itbis 		= $this->itbisRepo->getItbisFormSelect();
		$data = $this->getProductsData();
		return View::make("themes/{$this->theme}/forms/inventory/products/edit",compact('entity','categories','data','itbis'));
	}

	public function update()
	{
		$entity = $this->productRepo->find(Input::get("id"));
		$manager = new ProductUpdateManager($entity,Input::all());
		$manager->save();
		return Redirect::route("product_edit",[$entity->slug,$entity->id]);
	}

	public function show($sluge,$id)
	{
		return "presentando el producto $id";
	}

	public function search()
	{
		$input = Input::get('search');
		if($result = $this->productRepo->search($input))
			return  $result;
		return FALSE;
	}
}
