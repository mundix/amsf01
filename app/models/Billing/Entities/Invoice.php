<?php
namespace Billing\Entities;

class Invoice extends \Eloquent {
	protected $fillable = ["order_id","total_paid","pay_days","pay_date","ncf_sequency_id","rnc"];

//	public function InvoicePayment()
//	{
//		return $this->hasMany("InvoicePayment");
//	}

	public function order()
	{
		return $this->belongsTo('\Billing\Entities\Order');
	}
	public function payments()
	{
		return $this->hasMany('\Billing\Entities\InvoicePayment');
	}

}