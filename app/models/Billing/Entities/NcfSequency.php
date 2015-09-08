<?php

namespace Billing\Entities;

class NcfSequency extends \Eloquent {
	protected $fillable = [];
	protected $table = 'ncf_sequencies';

	public function ncf()
	{
		return $this->belongsTo('ncf');
	}

}