<?php

use Inventory\Repositories\ProductCategoryRepo;
use Inventory\Repositories\ProductRepo;
use Inventory\Managers\ProductManager;
use \Billing\Repositories\NcfSequencyRepo;

class OperationsController extends AssetsController
{
	protected $productRepo;
	protected $productCategoryRepo;
	protected $ncfSequencyRepo;

	public function __construct(ProductRepo $productRepo,ProductCategoryRepo $productCategoryRepo,NcfSequencyRepo $ncfSequencyRepo)
	{
		$this->productRepo          = $productRepo;
		$this->productCategoryRepo  = $productCategoryRepo;
		$this->ncfSequencyRepo		= $ncfSequencyRepo;
	}

	public function sales()
	{
		$products 		= $this->productRepo->all('id','DESC');
		$javascripts 	= $this->getJsDataTables();

		array_push($javascripts,
			'melon/plugins/bootbox/bootbox.min.js',
			'js/jquery/plugin/numeral.min.js',
			'https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js',
			'js/cashier.js',
			'js/app.js'
		);

		$styles 		= $this->cashierStyle();
		$data 			= $this->getProductsData();

		return View::make('themes/melon/forms/operations/sales',compact('products','javascripts','data','styles'));
	}

	public function add()
	{
		echo "<pre>";
		$post = Input::all();
		print_r($post);
		/**
		 * Discount Types
		 * -1 -  N/A
		 * 1  - Percent
		 * 2  - Amount
		*/
		$discount = 0;
		$total = 0;
		$sub_total = 0;
		if($post['discount'] > -1)
		{
			if($post['discount'] == 1)
			{
				$discount = ((float)$post['discount_total'])/100;
			}elseif($post['discount'] == 2)
			{
				$discount = (float)$post['discount_total'];
			}
			$params['discount'] = $discount;
		}

		foreach($post['product_id'] as $key => $item_id)
		{
//			echo "$key => $item_id";
			$p = $this->productRepo->find($item_id);
			$price 	= (float)$p->price;
			$qty   	= (float)$post['qty'][$key];
			$p_total	= $qty *  $price;
			$total += $p_total;
			$params['products'][] = ['id'=>$p->id,'price'=>$p->price,'qty'=>$qty,'total'=>$p_total];
			echo "<br/>";
		}
		$ncf 				= json_decode($this->ncfSequencyRepo->getNext(Auth::User()->location_id))[0];
		$params['ncf'] 		= "{$ncf->ncf->prefix}{$ncf->sequency}";
		$params['total']	= $total;

		print_r($params);

	}

}
