<?php

namespace Billing\Entities;

class Order extends \Eloquent
{
	protected $fillable =
		[
			'user_id',
			'type',
			'client_id',
			'itbis',
			'itbis_amount',
			'total',
			'sub_total',
			'discount',
			'discount_percent',
			'total_credits',
			'percent_credits',
			'status',
			'available',
			'rnc',
		];

	public function user()
	{
		return $this->belongsTo('HireMe\Entities\User');
	}
	public function client()
	{
		return $this->belongsTo('HireMe\Entities\Client');
	}
	public function orderdetail()
	{
		return $this->hasMany('OrderDetail');
	}
}