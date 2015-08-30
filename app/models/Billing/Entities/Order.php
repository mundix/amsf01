<?php

namespace Billing\Entities;

class Order extends \Eloquent {
	protected $fillable = [];

	public function ncf()
	{
		return $this->belongsTo('Billing\Entities\User');
	}

}