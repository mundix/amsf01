<?php

namespace Billing\Entities;

class Ncf extends \Eloquent
{
	protected $fillable = [];
	protected $table = "ncf";

	public function ncftype()
	{
		return $this->belongsTo('NcfType');
	}

	public function ncfsequency()
	{
		return $this->hasMany('NcfSequency');
	}

}