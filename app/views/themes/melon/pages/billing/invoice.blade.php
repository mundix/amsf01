@extends('themes.melon.tpls.page')
@section('content')
<div class="col-md-12">
    <div class="widget invoice">
        <div class="widget-header">
            <div class="pull-left">
                <h2>Factura <strong>{{ $order->status_title }}</strong></h2>
            </div>
            <div class="pull-right">
                <p class="invoice-nr"><strong>Invoice:</strong> #{{$order->id}}-{{$order->invoice->id}}</p>
                <p class="invoice-date">{{ $order->created_at->format('j/n/Y') }}</p>
            </div>
        </div>
        <div class="widget-content">
            <div class="row">
                <!--=== Adresses ===-->
                <div class="col-md-6 ">
                    <h3>Informaci&oacute;n</h3>

                    <address>
                        {{--<strong>RNC</strong><br>--}}
                        {{--{{ $order->invoice->rnc }}<br>--}}
                        {{--Mt. Prospect, IL 60000<br>--}}
                        <abbr title="Phone">RNC</abbr> {{ $order->invoice->rnc }}
                    </address>
                </div>
                <div class="col-md-6 align-right">
                    {{--<h3>Company Information</h3>--}}

                    {{--<address>--}}
                        {{--<strong>Twitter, Inc.</strong><br>--}}
                        {{--795 Folsom Ave, Suite 600<br>--}}
                        {{--San Francisco, CA 94107<br>--}}
                        {{--<abbr title="Phone">P:</abbr> (123) 456-7890--}}
                    {{--</address>--}}
                </div>

                <!-- /Adresses -->

                <!--=== Table ===-->
                <div class="col-md-12">
                    <table class="table table-striped table-hover table-responsive" data-display-length="50">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Producto</th>
                            <th class="hidden-xs">Categor&iacute;a</th>
                            <th class="hidden-xs">Cantidad</th>
                            <th class="hidden-xs">Precio unidad</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order->details as $detail)
                        <tr>
                            <td>1</td>
                            <td>{{ $detail->product->name }}</td>
                            <td class="hidden-xs">{{ $detail->product->category->name  }}</td>
                            <td class="hidden-xs">{{$detail->qty}}</td>
                            <td class="hidden-xs">$ {{number_format($detail->product->price,2)}}</td>
                            <td>$ {{ number_format($detail->price,2) }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /Table -->
            </div>

            <div class="row padding-top-10px">
                <div class="col-md-6">
                    <div class="well">
                        <p><strong>Notes: </strong> Este es un modelo de Factura de prueba, este modelo esta sujetos a cambios solicitados por el cliente. </p>
                    </div>
                </div>

                <div class="col-md-6 align-right">
                    <ul class="list-unstyled amount padding-bottom-5px">
                        <li><strong>Subtotal:</strong> ${{ number_format($order->total,2) }}</li>
                        {{--<li><strong>Delivery:</strong> $5</li>--}}
                        <li><strong>DESCUENTO ({{number_format($order->discount_percent,2)}}%):</strong> ${{number_format($order->discount,2)}}</li>
                        <li><strong>ITBIS ({{number_format($order->itbis,2)}}%):</strong> ${{number_format($order->itbis_amount,2)}}</li>
                        <li class="total"><strong>Total:</strong> ${{ number_format($order->sub_total,2) }}</li>
                    </ul>
                    <hr>
                    <ul class="list-unstyled amount padding-bottom-5px">
                        <li><strong>Total Pagado:</strong> ${{ number_format($order->invoice->total_paid,2) }}</li>
                        @if($order->sub_total > $order->invoice->total_paid )
                            <li><strong>Total por Pagar:</strong> ${{ number_format($order->sub_total - $order->invoice->total_paid,2) }}</li>
                        @endif
                        {{--<li><strong>Delivery:</strong> $5</li>--}}
                        {{--<li><strong>DESCUENTO ({{number_format($order->discount_percent,2)}}%):</strong> ${{number_format($order->discount,2)}}</li>--}}
{{--                        <li><strong>ITBIS ({{number_format($order->itbis,2)}}%):</strong> ${{number_format($order->itbis_amount,2)}}</li>--}}
{{--                        <li class="total"><strong>Total:</strong> ${{ number_format($order->sub_total,2) }}</li>--}}
                    </ul>

                    <div class="buttons">
                        <a class="btn btn-default btn-lg" href="javascript:void(0);" onclick="javascript:window.print();"><i class="icon-print"></i> Print</a>
                        <a class="btn btn-success btn-lg" href="javascript:void(0);">Proceed to Payment <i class="icon-angle-right"></i></a>
                    </div>
                </div>
            </div> <!-- /.row -->
        </div>
    </div> <!-- /.widget box -->
</div>
@stop