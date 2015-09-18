<?php
namespace HireMe\Entities;

class Client extends \Eloquent
{
	protected $fillable = ['type','rnc','name','contact_name','address','phone','cellphone','email','comments','available'];
}