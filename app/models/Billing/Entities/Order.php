<?php

namespace Billing\Entities;

class Order extends \Eloquent
{
	protected $fillable =
		[
			'user_id',
			'type',
			'client_id',
			'supplyer_id',
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
	public function supplyer()
	{
		return $this->belongsTo('HireMe\Entities\Supplyer');
	}

	public function details()
	{
		return $this->hasMany('\Billing\Entities\OrderDetail');
	}
	//Order()->status_title
	public function getStatusTitleAttribute()
	{
		return \Lang::get('orders.status.'.$this->status);
	}
	public function getTypeTitleAttribute()
	{
		return \Lang::get('orders.types.'.$this->type);
	}

	public function invoice()
	{
		return $this->hasOne('\Billing\Entities\Invoice');
	}

}