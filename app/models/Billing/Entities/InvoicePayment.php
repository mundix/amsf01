<?php

namespace Billing\Entities;

class InvoicePayment extends \Eloquent
{
	protected $fillable = ['invoice_id','amount',"payment_method"];
	protected $table = "invoices_payments";

	public function invoice()
	{
		return $this->belongsTo('\Billing\Entities\Invoice');
	}

	public function getMethodTitleAttribute()
	{
		return \Lang::get('invoices_payments.method.'.$this->payment_method);
	}

}