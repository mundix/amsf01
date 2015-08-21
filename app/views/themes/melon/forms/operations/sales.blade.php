@extends('themes.melon.tpls.page')

@section('content')
    <div class="widget box" ng-app="AmSisFactura">
        <div class="widget-header">
            <h4><i class="icon-reorder"></i>Buscar productos</h4>
        </div>
        <div class="widget-content" ng-controller="SearchCtrl">
            {{ Form::open(['route'=>'product_save','method'=>'POST','role'=>'form','class'=>'form-horizontal row-border']) }}
            <div class="form-group">
                <div class="col-md-10">
                    {{ Form::text('search',null,['placeholder'=>'Nombre, Código','class'=>'form-control','ng-model'=>'searchInput','ng-change'=>'search()']) }}
                </div>
            </div>
            {{ Form::close() }}
            <div id="resultlist">
                <table class="table table-hover">
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
                    <tr id="product-@{{ product.id }}"  class="product-result" ng-repeat="product in products">
                        <td>@{{ product.id }}</td>
                        <td>@{{ product.name }}</td>
                        <td>@{{ product.category.name }}</td>
                        <td>@{{ product.price }}</td>
                        <td>@{{ product.stock}}</td>
                        <td><a href="" data-product-id="@{{product.id}}" data-product="@{{ product }}"><i class="icon-plus-sign"></i></a></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>



    </div>
    <div class="row">
        <!--=== Simple Table ===-->
        <div class="col-md-6">
            <div class="widget box">
                <div class="widget-header">
                    <h4><i class="icon-reorder"></i> Resumen de Productos</h4>
                    <div class="toolbar no-padding">
                        <div class="btn-group">
                            <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
                        </div>
                    </div>
                </div>
                <div class="widget-content">
                    <table class="table table-hover" id="products-list">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>nombre</th>
                            <th>categoria</th>
                            <th>precio</th>
                            <th>stock</th>
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
        <!--=== Color Pickers ===-->
        <div class="col-md-6">
            <div class="widget box">
                <div class="widget-header">
                    <h4><i class="icon-reorder"></i> Total Resumen</h4>
                </div>
                <div class="widget-content">
                    <form class="form-horizontal row-border" action="#">
                        <div class="form-group">
                            {{--<label class="col-md-3 control-label">HEX format:</label>--}}
                            <div class="col-md-12">
                                <input type="text"  name="cashier" class="form-control" disabled id="cashier"  placeholder="S/. 0.00">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-9">
                                <label class="checkbox">
                                    <input type="checkbox" value="1" name="apply_itbis" id="apply_itbis">
                                    Aplicar ITBIS
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Descuento </label>
                            <div class="col-md-10">
                                <label class="radio-inline">
                                    <input type="radio" name="discount" id="discount_na" value="-1" checked="checked">
                                    No aplica
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="discount" role="percent" id="discount_percent" value="1">
                                    Porciento %
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="discount" role="money" id="discount_amount" value="2" >
                                    Monto RD$
                                </label>
                            </div>
                        </div>
                        <div class="form-group" id="discount_div" style="display:none;">
                            <label class="col-md-3 control-label">Valor</label>
                            <div class="col-md-9">
                                <input type="text" disabled id="discount_total" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">NCF</label>
                            <div class="col-md-9">
                                <input type="text" name="ncf" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            {{--<label class="col-md-3 control-label">HEX format:</label>--}}
                            <div class="col-md-12">
                                <input type="text"  name="sub_total" class="form-control" disabled id="subtotal" role="money"  placeholder="S/. 0.00">
                            </div>
                        </div>
                    </form>
                </div> <!-- /.widget-content -->
            </div>
        </div>
        <!-- /Color Pickers -->
@stop