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
		$javascripts = $this->getJsDataTables();
		$categories = $this->productCategoryRepo->getList();
		$data = $this->getProductsData();
		return View::make("themes/{$this->theme}/pages/inventory/products/productscategories/show",compact('categories','javascripts','data'));
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
//		dd(Input::all());

		$entity = $this->productCategoryRepo->newCategory();
		$entity->slug = \Str::slug(Input::get('name'));
		$entity->available = 1;
		$manager = new ProductCategoryManager($entity,Input::all());

		$manager->save();
		return Redirect::route('home');

	}
	public function edit()
	{
//		return View::make("themes/{$this->theme}/pages/inventory/products/show");
	}
	public function show($sluge,$id)
	{
//		return View::make("themes/{$this->theme}/pages/inventory/products/show");
//		return "presentando el producto $id";
	}
}
