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
        <h4></h4>
        <form class="form-horizontal row-border" id="operation_form" action="{{ Route('make_credit') }}" method="POST">
            <div class="col-md-8">
                <div class="widget box">
                    <div class="widget-header">
                        <h4><i class="icon-reorder"></i> Factura por Cobrar</h4>
                    </div>
                    <div class="widget-content">
                        <div class="form-group">
                            {{--<label class="col-md-3 control-label">HEX format:</label>--}}
                            <div class="col-md-12">
                                <div class="cashier-box">
                                    <input type="number" min="0" name="cashier" class="form-control"  id="cashier"  placeholder="S/. 0.00">
                                </div>
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
                        </div>
                        <div class="client_info widget-content" style="display:inline-block;">
                            <div class="widget box">
                                <div class="widget-header">
                                    <h4><i class="icon-user"></i>Datos Cliente</h4>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-9 inputs">
                                        <input type="text" name="pay_date" placeholder="Fecha Vencimiento" class="form-control datepicker">
                                    </div>
                                    <div class="col-md-9 inputs">
                                        <input type="text" name="client_name" placeholder="Nombre" class="form-control">
                                    </div>
                                    <div class="col-md-9 inputs">
                                        <input type="text" name="phone" placeholder="Tel&eacute;fono" class="form-control">
                                    </div>
                                    <div class="col-md-9 inputs">
                                        <input type="text" name="rnc" placeholder="RNC" class="form-control">
                                    </div>
                                </div>
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