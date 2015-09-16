@extends('themes.melon.tpls.layout')

@section('content')
    <script>
        $(document).ready(function(){
            "use strict";

            App.init(); // Init layout and core plugins
            Plugins.init(); // Init all plugins
            FormComponents.init(); // Init all form-specific plugins
        });
    </script>
    {{--Ordenes de Venta--}}
    <div class="row">
        <div class="col-md-12">
            <div class="widget box">
                <div class="widget-header">
                    <h4><i class="icon-reorder"></i> Mis Ordenes</h4>
                    <div class="toolbar no-padding">
                        <div class="btn-group">
                            <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
                        </div>
                    </div>
                </div>
                <div class="widget-content">
                    @if(isset($sales))
                        <table class="table table-striped table-bordered table-hover table-checkable  datatable ">
                            <thead>
                            <tr>
                                <th class="checkbox-column">
                                    <input type="checkbox" class="uniform">
                                </th>
                                <th>Factura</th>
                                <th>Fecha</th>
                                <th>Tipo</th>
                                <th>Estatus</th>
                                <th>Total</th>
                                <th class="hidden-xs"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sales as $order)
                                <tr>
                                    <td class="checkbox-column">
                                        <input type="checkbox" class="uniform">
                                    </td>
                                    <td><a href="#">{{$order->id}}</a></td>
                                    <td><a href="#">{{$order->created_at->format('d/n/Y h:m A')}}</a></td>
                                    <td><a href="">{{$order->type_title}}</a></td>
                                    <td>{{$order->status_title}}</td>
                                    <td>RD$ {{number_format($order->sub_total,2)}}</td>
                                    <td>
                                        <a href="{{Route('invoices',[$order->id])}}">Factura</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class='empty'>No hay categorías disponibles.</p>
                    @endif
                </div>
                <div class="widget-content">
                    @if(isset($shopings))
                        <table class="table table-striped table-bordered table-hover table-checkable  datatable">
                            <thead>
                            <tr>
                                <th class="checkbox-column">
                                    <input type="checkbox" class="uniform">
                                </th>
                                <th>Factura</th>
                                <th>Fecha</th>
                                <th>Tipo</th>
                                <th>Estatus</th>
                                <th>Total</th>
                                <th class="hidden-xs"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($shopings as $order)
                                <tr>
                                    <td class="checkbox-column">
                                        <input type="checkbox" class="uniform">
                                    </td>
                                    <td><a href="#">{{$order->id}}</a></td>
                                    <td><a href="#">{{$order->created_at->format('d/n/Y h:m A')}}</a></td>
                                    <td><a href="">{{$order->type_title}}</a></td>
                                    <td>{{$order->status_title}}</td>
                                    <td>RD$ {{number_format($order->sub_total,2)}}</td>
                                    <td></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class='empty'>No hay categorías disponibles.</p>
                    @endif
                </div>

            </div>
        </div>
    </div>
    {{--Fin Ordenes de Venta--}}



@stop