@extends('themes.melon.tpls.page')

@section('content')

    <div class="row">
        <h4></h4>
        <form class="form-horizontal row-border" id="operation_form" action="{{ Route('add_sale') }}" method="POST">

            <div class="col-md-8">

                {{-- Angular Search--}}
                <div class="" ng-app="AmSisFactura">
                    <div class="widget-content" ng-controller="SearchCtrl">
                        {{ Form::open(['route'=>'product_save','method'=>'POST','role'=>'form','class'=>'form-horizontal row-border']) }}
                            <div class="form-group">
                                <div class="col-md-12">
                                    {{ Form::text('search',null,['placeholder'=>'Nombre, Código','class'=>'form-control','ng-model'=>'searchInput','ng-change'=>'search()',"id"=>"search_input"]) }}
                                </div>
                            </div>
                        {{--{{ Form::close() }}--}}
                        <div id="resultlist">
                            <table class="table table-hover table-responsive" id="search-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th class="hidden-xs">Nombre</th>
                                        {{--<th class="hidden-xs">categoria</th>--}}
                                        {{--<th class="hidden-xs">precio</th>--}}
                                        {{--<th class="hidden-xs">stock</th>--}}
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id="product-@{{ product.id }}" data-product-id="@{{product.id}}" data-product="@{{ product }}" class="product-result" ng-repeat="product in products">
                                        <td>@{{ product.id }}</td>
                                        <td>@{{ product.name }}</td>
                                        {{--                            <td>@{{ product.category.name }}</td>--}}
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
                {{--End Angulaar Search--}}

                <div class="widget box">
                    <div class="widget-content">
                        <table class="table table-hover table-responsive" id="products-list">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Categor&iacute;a</th>
                                    <th>Precio</th>
                                    <th>Itbis</th>
                                    <th>Descuento %</th>
                                    <th>Stock</th>
                                    <th>Qty</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

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
                        <div class="form-group" style="display:none;">
                            <div class="col-md-10" >
                                <div class="form-group" >
                                    <label class="col-md-2 control-label">Aplicar</label>
                                    <div class="col-md-10">
                                        <label class="checkbox-inline">
                                            <div class="checker"><span><input type="checkbox" class="uniform" value="1" name="apply_itbis" id="apply_itbis" checked="checked"></span></div>ITBIS
                                        </label>
                                        {{--<label class="checkbox-inline">--}}
                                            {{--<div class="checker"><span><input type="checkbox" class="uniform" value="1" name="apply_rnc" id="apply_rnc" ></span></div> RNC--}}
                                        {{--</label>--}}
                                        {{--<label class="checkbox-inline">--}}
                                            {{--<div class="checker"><span><input type="checkbox" class="uniform" value="1" name="apply_ncf" id="apply_ncf" ></span></div> Comprobante--}}
                                        {{--</label>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group fix-select-2-group">
                            {{--<label class="col-md-1 control-label fix-label-1"></label>--}}
                             @if(isset($clients))
                                <select name="client_id" id="client_id" class="form-control fix-selected-1">
                                    <option value="-1">Cliente</option>
                                    @foreach($clients as $client)
                                        <option value="{{$client->id}}" data-rnc-value="{{$client->rnc}}">{{ $client->name }}</option>
                                    @endforeach
                                </select>
                             @endif
                            @if(isset($ncfTypes) && sizeof($ncfTypes))
                                <select name="ncf_type_id" id="ncf_type_id" class="form-control fix-selected-1">
                                    @foreach($ncfTypes as $type)
                                        <option value="{{$type->id}}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                        <div class="client_info widget-content" style="display:inline-block;">
                            <div class="widget box">
                                <div class="widget-header">
                                    <h4><i class="icon-user"></i>Datos Cliente</h4>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-9 inputs">
                                        <input type="text" name="client_name" placeholder="Nombre" class="form-control">
                                    </div>
                                    <div class="col-md-9 inputs">
                                        <input type="text" name="rnc" placeholder="RNC" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Descuento</label>
                            <div class="col-md-10">
                                <label class="radio-inline" id="radio_discount">
                                    <input type="radio" name="discount" id="discount_na" value="-1" class="radio_discount" checked="checked">
                                    No aplica
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="discount" role="percent" id="discount_percent" class="radio_discount" value="1">
                                    Porciento
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="discount" role="money" id="discount_amount" class="radio_discount" value="2" >
                                    Monto
                                </label>
                            </div>
                        </div>
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
                        {{--Payments Methods--}}
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
                        {{--end Payments Methods--}}
                        {{--Return Payments--}}
                        <div class="form-group" id="refound">
                            <div class="row col-md-12">
                                <div class="col-md-6">
                                    <strong>Devolver $<span>0.00</span></strong>
                                </div>
                            </div>
                        </div>
                        {{--End Return Payments--}}
                        <div class="form-group">
                            {{--<label class="col-md-3 control-label">HEX format:</label>--}}
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-lg btn-info btn-block" disabled value="Generar">
                            </div>
                        </div>
                    </div> <!-- /.widget-content -->
                </div>
            </div>

        </form>

    </div><!--.row-->
@stop