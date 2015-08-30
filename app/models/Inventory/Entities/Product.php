<?php

namespace Inventory\Entities;

class Product extends \Eloquent
{
	protected $fillable = [
		'name',
		'description',
		'category_id',
		'sku',
		'stock',
		'min_stock',
		'price',
		'min_price',
		'discount',
		'discount_apply',
		'user_id',
		'date_in',
		'date_out',
		'available',
		'fix_itbis',
	];
	protected $perPage = 20;

//	/**
//	 * Setear el precio del producto y el precio minmio
//	*/
//	public function setPriceAttribute($value)
//	{
//		$this->attribute['price'] = str_replace(",","",$value);
//	}


	public function user()
	{
		return $this->belongsTo('HireMe\Entities\User');
	}

	/**
	 * Relacion de Producto con categoria.
	*/
	public function category()
	{
		return $this->belongsTo('Inventory\Entities\ProductCategory');
	}

	public function itbis()
	{
		return $this->belongsTo('Billing\Entities\Itbis');
	}


}