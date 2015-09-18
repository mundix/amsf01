<?php

namespace Billing\Entities;

class InvoicePayment extends \Eloquent
{
	protected $fillable = ['invoice_id','amount'];
	protected $table = "invoices_payments";

	public function invoice()
	{
		return $this->belongsTo('\Billing\Entities\Invoice');
	}
}