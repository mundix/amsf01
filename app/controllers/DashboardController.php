<?php
use Billing\Entities\Order;
class DashboardController extends AssetsController
{

	public function __construct()
	{

	}
	/**
	 * Presenta Formulario de login
	*/
	public function index()
	{
		$data 			= $this->getProductsData();
		$javascripts 	= $this->getScripts();
		$sales 			= $this->getOrdersSales();
		$shopings 		= $this->getOrdersBuy();

		return View::make('themes/melon/pages/dashboard',compact('data','javascripts','sales','shopings'));
	}

	public function test()
	{
		echo "<pre>";
		$order = Order::find(25);
		print_r(
				[
					"order"=>$order->id,
					"order.total"=>$order->total,
					"order.sub_total"=>$order->sub_total,
					"invoice"=>$order->invoice->id,
					"invoice.total_paid"=>$order->invoice->total_paid
				]
		);
		$total = 0;
		foreach($order->invoice->payments as $payment)
		{
			echo "Pago: {$payment->amount} ";
			$total += $payment->amount;
			echo "<br/>";
			echo "<br/>";
		}
			echo "<br/>";
		$params = ["total_paid"=>$total];
		$order->invoice->fill($params);
		$order->invoice->save(	);

		echo "Total a pagar: $total <br/>";
		return;

	}
}
