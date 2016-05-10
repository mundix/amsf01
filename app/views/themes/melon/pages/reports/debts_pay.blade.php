@extends('themes.melon.tpls.page')
@section('content')
    <script>
        $(document).ready(function()
        {
            "use strict";
            App.init(); // Init layout and core plugins
            Plugins.init(); // Init all plugins
            FormComponents.init(); // Init all form-specific plugins
        });
    </script>
    <div class="row">
        <hr>
        <div class="col-md-12">
            <div class="widget box">
                <div class="widget-header">
                    <h4><i class="icon-reorder"></i> </h4>
                </div>
                <div class="widget-content">
                    {{Form::open(['route'=>'reports_buy','method'=>'POST','role'=>'form','class'=>'form-horizontal row-border'])}}
                    <div class="form-group">
                        <label class="col-md-2 control-label"><i class="icon-calendar"></i>Rango Fecha</label>
                        <div class="col-md-4">
                            {{ Form::text('range_date',Input::get('range_date'),['placeholder'=>'dd/mm/yyy','class'=>'form-control range ']) }}
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary">Buscar</button>
                        </div>
                    </div>
                    {{Form::close()}}
                </div> <!-- /.widget-content -->
            </div>
        </div>
        <div class="col-md-12">
            <div class="widget box">
                <div class="widget-header">
                    <h4><i class="icon-reorder"></i>Cuentas por Pagar</h4>
                    <div class="toolbar no-padding">
                        <div class="btn-group">
                            <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
                        </div>
                    </div>
                </div>
                @if(isset($orders) && $orders)
                    <div class="widget-content">
                        <table class="table table-striped table-bordered table-hover table-checkable  datatable table-tabletools table-responsive" data-display-length="50">
                            <thead>
                            <tr>
                                <th class="checkbox-column">
                                    <input type="checkbox" class="uniform">
                                </th>
                                <th>Factura</th>
                                <th>Fecha</th>
                                <th>Suplidor</th>
                                {{--<th>Cliente</th>--}}
                                <th>Tipo</th>
                                {{--<th>Estatus</th>--}}
                                <th>Total</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td class="checkbox-column">
                                        <input type="checkbox" class="uniform">
                                    </td>
                                    <td><a href="#">{{$order->id}}</a></td>
                                    <td><a href="#">{{$order->created_at->format('d/n/Y h:m A')}}</a></td>
                                    {{--<td><a href="">{{$order->user->full_name}}</a></td>--}}
                                    <td><a href="">{{$order->supplyer->name}}</a></td>
                                    <td><a href="">{{$order->type_title}}</a></td>
                                    {{--<td>{{$order->status_title}}</td>--}}
                                    <td>RD$ {{number_format($order->sub_total,2)}}</td>
                                    <td style="text-align: center;">
                                        <a class="btn btn-xs btn-info" href="{{route('debts_pay_show',[$order->id])}}" >Ver</a>
                                        {{--<a href="{{Route('invoices',[$order->id])}}">Factura</a>--}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class='empty'>No hay categorías disponibles.</p>
                @endif
            </div>
        </div>
    </div>
    <!-- /Normal -->
@stop