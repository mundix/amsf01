<?php

namespace Billing\Entities;

class NcfType extends \Eloquent
{
	protected $fillable = [];
	protected $table = 'ncf_types';

	public function ncf()
	{
		return $this->belongsTo('ncf');
	}

}