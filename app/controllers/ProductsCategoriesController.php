<?php

use Inventory\Repositories\ProductRepo;
use Inventory\Repositories\ProductCategoryRepo;
use Inventory\Managers\ProductCategoryManager;

class ProductsCategoriesController extends AssetsController
{

	protected $productCategoryRepo;
	protected $productRepo;

	public function __construct(ProductRepo $productRepo,ProductCategoryRepo $productCategoryRepo)
	{
		$this->productRepo = $productRepo;
		$this->productCategoryRepo =  $productCategoryRepo;
		$this->reportsRepo			= new \Billing\Repositories\ReportsRepo();
	}
	/**
	 *
	 * Listado de Categorias
	 *
	*/
	public function index()
	{
		$javascripts = array_merge($this->getJsDataTables(),$this->getScripts());
		$categories = $this->productCategoryRepo->getList();
		$repo = $this->productCategoryRepo;
		$data = $this->getProductsData();
		return View::make("themes/{$this->theme}/pages/inventory/products/productscategories/show",compact('categories','javascripts','data','repo'));
	}
	/**
	 * Formulario de insertar nueva categoria
	*/
	public function add()
	{
		$categories = $this->productCategoryRepo->getList();
		$data = $this->getProductsData();
		return View::make("themes/{$this->theme}/forms/inventory/productscategories/add",compact('categories','data'));
	}

	public function save()
	{
		$entity = $this->productCategoryRepo->newCategory();
		$entity->slug = \Str::slug(Input::get('name'));
		$entity->available = 1;
		$manager = new ProductCategoryManager($entity,Input::all());
		$manager->save();
		\Session::push('form.validation.success','El registro fu&eacute; guardado.');

		return Redirect::route('home');

	}
	public function edit($id)
	{
		$entity = $this->productCategoryRepo->find($id);
		$categories = $this->productCategoryRepo->getList();
		$data = $this->getProductsData();
		return View::make("themes/{$this->theme}/forms/inventory/productscategories/edit",compact('categories','data','entity'));
	}

	public function update()
	{
		$entity = $this->productCategoryRepo->find(Input::get("id"));
		$manager = new ProductCategoryManager($entity,Input::all());
		$manager->save();
		\Session::push('form.validation.success','El registro fu&eacute; editado.');
		return Redirect::route("product_category_edit",[$entity->id]);
	}

	public function show($sluge,$id)
	{
//		return View::make("themes/{$this->theme}/pages/inventory/products/show");
//		return "presentando el producto $id";
	}

	public function delete($id)
	{
		$entity = $this->productCategoryRepo->find($id);
		$entity->forceDelete();
		\Session::push('form.validation.success','El registro fu&eacute; eliminado.');
		return Redirect::route('products.categories');
	}
}
