<?php

use Inventory\Repositories\ProductCategoryRepo;
use Inventory\Repositories\ProductRepo;
use Inventory\Managers\ProductManager;

class ProductsController extends AssetsController
{
	protected $productRepo;
	protected $productCategoryRepo;

	public function __construct(ProductRepo $productRepo,ProductCategoryRepo $productCategoryRepo)
	{
		$this->productRepo          = $productRepo;
		$this->productCategoryRepo  = $productCategoryRepo;
	}

	public function index()
	{
		$products = $this->productRepo->all('id','DESC');
		$javascripts = $this->getJsDataTables();
		$data = $this->getProductsData();
		return View::make('themes/melon/pages/inventory/products/show',compact('products','javascripts','data'));
	}

	/**
	 * Formulario de Agregar Producto
	*/
	public function add()
	{
		$categories = $this->productCategoryRepo->getList();
		$data = $this->getProductsData();
		return View::make("themes/{$this->theme}/forms/inventory/products/add",compact('categories','data'));
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
		$data = $this->getProductsData();
		return View::make("themes/{$this->theme}/forms/inventory/products/edit",compact('entity','categories','data'));
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
