@extends('themes.melon.tpls.page')
@section('content')
    <div class="widget box" ng-app="AmSisFactura">
        <div class="widget-content" ng-controller="SearchCtrl">
            {{ Form::open(['route'=>'product_save','method'=>'POST','role'=>'form','class'=>'form-horizontal row-border']) }}
            <div class="form-group">
                <div class="col-md-10">
                    {{ Form::text('search',null,['placeholder'=>'Nombre, Código','class'=>'form-control','ng-model'=>'searchInput','ng-change'=>'search()',"id"=>"search_input"]) }}
                </div>
            </div>
            {{ Form::close() }}
            <div id="resultlist">
                <table class="table table-hover table-responsive" id="search-table">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>nombre</th>
                        <th class="hidden-xs">categoria</th>
                        <th class="hidden-xs">precio</th>
                        <th class="hidden-xs">stock</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr id="product-@{{ product.id }}" data-product-id="@{{product.id}}" data-product="@{{ product }}"  class="product-result" ng-repeat="product in products">
                            <td>@{{ product.id }}</td>
                            <td>@{{ product.name }}</td>
                            {{--<td>@{{ product.category.name }}</td>--}}
                            {{--<td>@{{ product.price }}</td>--}}
                            {{--<td>@{{ product.stock}}</td>--}}
                            <td><a href="" data-product-id="@{{product.id}}" data-product="@{{ product }}"><i class="icon-plus-sign"></i></a></td>
                            </a>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <form class="form-horizontal row-border" action="{{ Route('add_buy') }}" method="POST">
        <!--=== Result Table ===-->
        <div class="col-md-8">
            <div class="widget box">
                <div class="widget-header">
                    <h4><i class="icon-reorder"></i>Compra de Productos</h4>
                    <div class="toolbar no-padding">
                        <div class="btn-group">
                            <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
                        </div>
                    </div>
                </div>
                <div class="widget-content">
                    <table class="table table-hover table-responsive" id="products-list">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>nombre</th>
                            {{--<th>categoria</th>--}}
                            <th>precio lista</th>
                            {{--<th>itbis</th>--}}
                            <th>ITBIS %</th>
                            <th>ITBIS $</th>
                            <th>qty</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /Simple Table -->
        </div>
        <!--=== Cashier Resume ===-->
        <div class="col-sm-4">
            <div class="widget box">
                <div class="widget-header">
                    <h4><i class="icon-reorder"></i> Total Resumen</h4>
                </div>
                <div class="widget-content">
                        <div class="form-group">
                            {{--<label class="col-md-3 control-label">HEX format:</label>--}}
                            <div class="col-md-12">
                                <input type="text" name="cashier" class="form-control" disabled id="cashier"  placeholder="S/. 0.00">
                            </div>
                        </div>
                        {{--<div class="form-group">--}}
                            {{--<div class="col-md-10">--}}
                                {{--<div class="form-group">--}}
                                    {{--<label class="col-md-2 control-label">Aplicar</label>--}}
                                    {{--<div class="col-md-10">--}}
                                        {{--<label class="checkbox-inline">--}}
                                            {{--<div class="checker">
                                            {{--<span>--}}
                                            <input type="checkbox" class="uniform" value="1" checked="checked" style="display: none;" name="apply_itbis" id="apply_itbis">
                                            {{--</span></div>ITBIS--}}
                                        {{--</label>--}}
                                        {{--<label class="checkbox-inline">--}}
                                            {{--<div class="checker"><span><input type="checkbox" class="uniform" value="1" name="apply_rnc" id="apply_rnc" ></span></div> RNC--}}
                                        {{--</label>--}}
                                        {{--<label class="checkbox-inline">--}}
                                            {{--<div class="checker"><span><input type="checkbox" class="uniform" value="1" name="apply_ncf" id="apply_ncf" ></span></div> Comprobante--}}
                                        {{--</label>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <div class="form-group">
                            <label class="col-md-3 control-label fix-label-1">Suplidor</label>
                            {{--{{print_r($supplyers)}}--}}
                             @if(isset($supplyers))
                                {{--{{Form::select('supplyer_id',$supplyers,)}}--}}
                                {{Form::select('supplyer_id',$supplyers,null,['class'=>'form-control fix-selected-1'])}}
                                {{--<select name="supplyer_id" class="form-control fix-selected-1">--}}
                                    {{--<option value="-1">- Suplidores -</option>--}}
                                    {{--@foreach($supplyers as $supplyer)--}}
                                        {{--<option value="{{$supplyer->id}}">{{ $supplyer->name }}</option>--}}
                                    {{--@endforeach--}}
                                {{--</select>--}}
                             @endif
                        </div>
                        {{--<div class="form-group ncf_type_id" style="display: none;">--}}
                            {{--<label class="col-md-1 control-label fix-label-1"></label>--}}
                            {{--@if(isset($ncfTypes))--}}
                                {{--<select name="ncf_type_id" id="ncf_type_id" class="form-control fix-selected-1">--}}
                                    {{--@foreach($ncfTypes as $type)--}}
                                    {{--<option value="{{$type->id}}">{{ $type->name }}</option>--}}
                                     {{--@endforeach--}}
                                {{--</select>--}}
                             {{--@endif--}}
                        {{--</div>--}}
                        <div class="form-group" id="ncf_group" style="display:none;">
                            <label class="col-md-1 control-label"></label>
                            <div class="col-md-6">
                                <input type="text" name="rnc" placeholder="RNC" class="form-control">
                            </div>
                        </div>
                        <div class="form-group" >
                            <div class="row col-md-12" >
                                <button type="button" class="btn btn-sm btn-primary fix-button-1" id="add_payments"> Agregar Pagos </button>
                                <label class="checkbox-inline to_credit bs-popover" data-trigger="hover" data-placement="top" data-content="Esta factura autmaticamente pasará a ser a crédito, de lo contrario sera al contado." data-original-title="Financiamiento a crédito" >
                                    <div class="checker"><span><input type="checkbox" class="uniform" value="1" name="to_credit" id="to_credit"></span></div>A cr&eacute;dito
                                </label>
                                <select name="pay_days" class="form-control fix-selected-3" id="pay_days">
                                    @for($i=1;$i<=90;$i++)
                                        <option value="{{$i}}">{{$i}} Día{{($i>1)?"s":""}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="form-group" id="payments">
                            {{--<label class="col-md-3 control-label"></label>--}}
                            <div class="row col-md-12 payments">
                                <div class="col-md-6">
                                    <input type="number"  name="payment[]" class="form-control"   role="money" disabled placeholder="Elija Forma de Pago $0.00" value="0.00">
                                </div>
                                <select name="payment_method[]" class="form-control fix-selected-3 payments_methods">
                                    <option value="-1">Forma Pago</option>
                                    <option value="cash">Efectivo</option>
                                    <option value="credit_card">Tarjeta</option>
                                    <option value="check">Ceque</option>
                                </select>
                            </div>
                        </div>
                        {{--<div class="form-group">--}}
                            {{--<label class="col-md-2 control-label">Descuento</label>--}}
                            {{--<div class="col-md-10">--}}
                                {{--<label class="radio-inline" id="radio_discount">--}}
                                    {{--<input type="radio" name="discount" id="discount_na" value="-1" class="radio_discount" checked="checked">--}}
                                    {{--No aplica--}}
                                {{--</label>--}}
                                {{--<label class="radio-inline">--}}
                                    {{--<input type="radio" name="discount" role="percent" id="discount_percent" class="radio_discount" value="1">--}}
                                    {{--Porciento--}}
                                {{--</label>--}}
                                {{--<label class="radio-inline">--}}
                                    {{--<input type="radio" name="discount" role="money" id="discount_amount" class="radio_discount" value="2" >--}}
                                    {{--Monto--}}
                                {{--</label>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <div class="form-group" id="discount_div" style="display:none;">
                            <label class="col-md-3 control-label">Valor</label>
                            <div class="col-md-9">
                                <input type="number" name="discount_total" disabled id="discount_total" class="form-control" value="0.00">
                            </div>
                        </div>
                        <div class="form-group" id="ncf">
                            {{--<label class="col-md-3 control-label"></label>--}}
                            <div class="col-md-12">
                                <input type="text"  name="sub_total" class="form-control" disabled id="subtotal" role="money"  placeholder="S/. 0.00">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-lg btn-info btn-block" disabled value="Comprar">
                            </div>
                        </div>
                </div> <!-- /.widget-content -->
            </div>
        </div>
        <!-- /Color Pickers -->
        </form>

    </div><!--.row-->
@stop
{{-- 3,622.68--}}