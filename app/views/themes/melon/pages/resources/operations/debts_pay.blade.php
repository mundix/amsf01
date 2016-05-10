@extends('themes.melon.tpls.page')
@section('content')
    <script>
        $(document).ready(function(){
            "use strict";
            App.init(); // Init layout and core plugins
            Plugins.init(); // Init all plugins
            FormComponents.init(); // Init all form-specific plugins
        });
    </script>
    <div class="row">
        <div class="col-md-12">
            <div class="box col-md-4">
                <a href="#" class="btn btn-ls btn-info open-modal">Pagar</a>
            </div>
            <div class="widget box">
                <div class="widget-content">
                    <div class="tab-pane active" id="tab_overview">
                        <div class="col-md-9">
                            <div class="row profile-info">
                                <div class="col-md-4">
                                    {{--<div class="alert alert-info">You will receive all future updates for free!</div>--}}
                                    <h1>Proveedor: {{$order->supplyer->name}}</h1>

                                    <dl class="dl-horizontal">
                                        <dt>RNC</dt>
                                        <dd>{{$order->supplyer->rnc}}</dd>
                                        <dt>Teléfono</dt>
                                        <dd>{{$order->supplyer->phone}}</dd>
                                    </dl>
                                </div>
                                <div class="col-md-4">
                                    <div class="widget">
                                        <div class="widget-content">
                                            <dl class="dl-horizontal">
                                                <dt>Estatus</dt>
                                                <dd> {{ $order->status_title }}</dd>
                                                <dt>No. Order</dt>
                                                <dd> #{{$order->id}}</dd>
                                                <dt>No. Factura</dt>
                                                <dd> #{{$order->id}}-{{$order->invoice->id}}</dd>
                                                <dt>Sub Total RD$</dt>
                                                <dd> {{number_format($order->total,2)}}</dd>
                                                <dt>Total RD$</dt>
                                                <dd>{{number_format($order->sub_total,2)}}</dd>

                                            </dl>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="widget">
                                        <div class="widget-content">
                                            <dl class="dl-horizontal">
                                                <dt>Fecha de Creación</dt>
                                                <dd>{{$order->invoice->created_at->format("d/m/Y")}}</dd>

                                                <dt>Días</dt>
                                                <dd>{{$order->invoice->pay_days}}</dd>

                                                <dt>Fecha de Pago</dt>
                                                <dd>{{$order->invoice->paydate_format}}</dd>
                                                <dt>Total Pagado</dt>
                                                <dd>{{number_format($order->invoice->total_paid,2)}}</dd>

                                                <dt>Pendiente de Pago</dt>
                                                <dd>{{number_format($order->sub_total - $order->invoice->total_paid ,2)}}</dd>
                                                {{--<dt>Descuento RD$</dt>--}}
                                                {{--                                                <dd>{{number_format($order->discount,2)}}</dd>--}}
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- /.row -->

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="widget">
                                        <div class="widget-content">
                                            <div class="widget-header">
                                                <h4><i class="icon-reorder"></i> Detalles de los pagos</h4>
                                            </div>
                                            <table class="table table-hover table-striped">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Monto RD$</th>
                                                    <th>Forma de pago</th>
                                                    <th class="hidden-xs">Fecha</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($order->invoice->payments as $key=>$payment)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>RD$ {{number_format($payment->amount,2)}}</td>
                                                    <td class="hidden-xs">{{$payment->method_title}}</td>
                                                    <td>{{$payment->created_at->format("d/m/Y")}}</td>
                                                </tr>
                                                @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Striped Table -->
                            </div> <!-- /.row -->

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="widget">
                                        <div class="widget-content">
                                            <div class="widget-header">
                                                <h4><i class="icon-reorder"></i> Detalles de los productos</h4>
                                            </div>
                                            <table class="table table-hover table-striped">
                                                <thead>
                                                <tr>
                                                    <th># Código</th>
                                                    <th>Producto</th>
                                                    <th></th>
                                                    <th class="hidden-xs"></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($order->details as $key=>$detail)
                                                    <tr>
                                                        <td>{{$detail->product->id}}</td>
                                                        <td>{{$detail->product->name}}</td>
                                                        <td>RD$ {{number_format($detail->product->price_list,2)}}</td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Striped Table -->
                            </div> <!-- /.row -->

                        </div> <!-- /.col-md-9 -->
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /Normal -->

@stop
@include('themes.melon.mods.billing.invoice_payments')
