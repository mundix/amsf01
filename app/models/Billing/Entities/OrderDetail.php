<?php

namespace Billing\Entities;

class OrderDetail extends \Eloquent
{

	protected $table = "orders_details";
	protected $fillable = [
		"order_id",
		"product_id",
		"qty",
		"price",
		"discount",
		"itbis",
	];

	public function order()
	{
		return $this->belongsTo('Order');
	}

	public function product()
	{
		return $this->belongsTo('\Inventory\Entities\Product');
	}

}