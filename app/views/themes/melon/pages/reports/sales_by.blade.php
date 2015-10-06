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
                    <div class="col-md-2">
                        <a href="{{Route('reports_by',['day','sale'])}}" class="btn btn-xs btn-success bs-popover" data-trigger="hover" data-placement="bottom" data-content="Ventas diarias de las órdenes" data-original-title="Reporte Ventas" >
                            <i class="icon-usd"></i> Ventas por día</a>
                    </div>
                </div>
                <div class="widget-content">
                    {{Form::open(['route'=>'reports_sale','method'=>'POST','role'=>'form','class'=>'form-horizontal row-border'])}}
                        <div class="form-group">
                            <label class="col-md-2 control-label"><i class="icon-calendar"></i>Rango Fecha</label>
                            <div class="col-md-2">
                                {{ Form::text('range_date',Input::get('range_date'),['placeholder'=>'dd/mm/yyy','class'=>'form-control range ']) }}
                            </div>
                            <div class="col-md-1">
                                <button type="submit" class="btn btn-primary">Buscar</button>
                            </div>
                            <div class="col-md-2">

                            </div>
                        </div>
                    {{Form::close()}}
                </div> <!-- /.widget-content -->
            </div>
        </div>
        <div class="col-md-12">
            <div class="widget box">
                <div class="widget-header">
                    <h4><i class="icon-reorder"></i>Informe de Ordenes de Venta</h4>
                    <div class="toolbar no-padding">
                        <div class="btn-group">
                            <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
                        </div>
                    </div>
                </div>
                @if(isset($sales) && $sales)
                    <div class="widget-content">
                        <table class="table table-striped table-bordered table-hover table-checkable  datatable table-tabletools table-responsive" data-display-length="50">
                            <thead>
                            <tr>
                                <th class="checkbox-column">
                                    <input type="checkbox" class="uniform">
                                </th>
                                <th>Fecha</th>
                                <th>Total</th>
                                <th class="hidden-xs"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sales as $sale)
                                <tr>
                                    <td class="checkbox-column">
                                        <input type="checkbox" class="uniform">
                                    </td>
                                    <td><a href="#">{{$sale->date}}</a></td>
                                    <td><a href="#">${{number_format($sale->total,2)}}</a></td>
                                    <td>

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