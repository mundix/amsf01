<?php

namespace HireMe\Entities;

class Candidate extends \Eloquent
{
	protected $fillable = ['website_url','description','job_type','category_id','available','phone','gender'];
	protected $perPage = 5;

	public function user()
	{
		//Esta relacionado con un suaurio, y la relacion se creo usando los campos de 'id','id
		return $this->hasOne('HireMe\Entities\User','id','id');
	}

	/**
	 * Relacion de Categoria hacia muchos Candidatos
	*/
	public function category()
	{
		return $this->belongsTo('HireMe\Entities\Category');
	}

	public function getJobTypeTitleAttribute()
	{
		return \Lang::get('utils.job_types.'.$this->job_type);
	}

}