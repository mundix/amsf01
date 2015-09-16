<?php

namespace Billing\Entities;

class InvoicePayment extends \Eloquent
{
	protected $fillable = [];
	protected $table = "invoices_payments";

	public function payment()
	{
		return $this->belongsTo("Payment");
	}
}