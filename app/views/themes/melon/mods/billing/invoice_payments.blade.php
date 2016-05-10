<div id="invoice_payment" class="modal-container">
    <div id="modal-content" class="modal-container-cont rounded centered">
        <div class="modal" style="position: relative; top: auto; left: auto; margin: 0 auto; z-index: 1; width: 100%; box-sizing: border-box; display: inline;">
            <div class="modal-dialog" style="left: 0; width: 100%; padding-top: 0; padding-bottom: 10px; margin: 0;">
                @include("themes.melon.commons.loading");
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close btn-close-modal" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Ingresar Pagos</h4>
                    </div>
                    {{Form::open(['route'=>'received_payments','method'=>'POST','role'=>'form','class'=>'form-horizontal row-border','id'=>'payment-modal'])}}
                        <div class="modal-body">
                            <div class="form-group" >
                                <div class="row col-md-12" >
                                    <button type="button" class="btn btn-sm btn-primary fix-button-1" id="add_payments"> Agregar Pagos </button>
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
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="order" value="{{$order->id}}">
                            <input type="hidden" name="invoice" value="{{$order->invoice->id}}">
                            <button type="button" class="btn btn-default btn-close-modal" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary btn-make-payments">Generar pagos</button>
                        </div>
                    {{Form::close()}}
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
    </div>
</div>