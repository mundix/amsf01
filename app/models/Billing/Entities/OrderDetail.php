<?php

namespace Billing\Entities;

class OrderDetail extends \Eloquent {

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
}