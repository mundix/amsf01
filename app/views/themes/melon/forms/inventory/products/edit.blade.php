@extends('themes.melon.tpls.page')
@section('content')
    <div class="widget box">
        <div class="widget-header">
            <h4><i class="icon-reorder"></i>Nuevo Producto</h4>
        </div>
        <div class="widget-content">
            {{ Form::model($entity,['route'=>'product_update','method'=>'POST','role'=>'form','class'=>'form-horizontal row-border']) }}

                <div class="form-group">
                    {{ Form::label('name','Nombre Producto',['class'=>'col-md-2 control-label']) }}
                    <div class="col-md-10">
                        {{ Form::text('name',null,['placeholder'=>'Requerido','class'=>'form-control']) }}
                    </div>
                </div>
                @if(isset($categories))
                <div class="form-group">
                    {{ Form::label('category_id','Categoría',['class'=>'col-md-2 control-label']) }}
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-4">
                                {{ Form::select('category_id',$categories,null,['class'=>'col-md-12 select2 full-width-fix required']) }}
                            </div>
                        </div>
                        <div class="row" id="sub-category">
                            <div class="col-md-4"></div>
                        </div>
                    </div>
                </div>
                @endif
                <div class="form-group">
                    {{ Form::label('description','Descripción Producto',['class'=>'col-md-2 control-label']) }}
                    <div class="col-md-10">
                        {{ Form::textarea('description',null,['placeholder'=>'Escriba una descripción del producto...','class'=>'input-block-level']) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('sku','Código SKU',['class'=>'col-md-2 control-label']) }}
                    <div class="col-md-10">
                        {{ Form::text('sku',null,['placeholder'=>'(Optional) Código único físico. ','class'=>'form-control']) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('price','Precio',['class'=>'col-md-2 control-label']) }}
                    <div class="col-md-10">
                        {{ Form::text('price',null,['placeholder'=>'Requerido','class'=>'form-control']) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('min_price','Precio Mínimo',['class'=>'col-md-2 control-label']) }}
                    <div class="col-md-10">
                        {{ Form::text('min_price',null,['placeholder'=>'(Optional)','class'=>'form-control']) }}
                    </div>
                </div>
                @if(isset($itbis))
                    <div class="form-group">
                        {{ Form::label('itbis_id','ITBIS',['class'=>'col-md-2 control-label']) }}
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-4">
                                    {{ Form::select('itbis_id',$itbis,null,['class'=>'col-md-12 select2 full-width-fix required']) }}
                                </div>
                            </div>
                            <div class="row" id="sub-category">
                                <div class="col-md-4"></div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="form-group">
                    {{ Form::label('discount_apply','Aplicar Descuento',['class'=>'col-md-2 control-label']) }}
                    <div class="col-md-9">
                        <label class="checkbox">
                            {{ Form::checkbox('discount_apply',1) }}
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('discount','Descuento %',['class'=>'col-md-2 control-label']) }}
                    <div class="col-md-10">
                        {{ Form::text('discount',null,['class'=>'form-control']) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('stock','Disponible en inventario',['class'=>'col-md-2 control-label']) }}
                    <div class="col-md-10">
                        {{ Form::text('stock',null,['class'=>'form-control']) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('min_stock','Mínimo disponible en inventario',['class'=>'col-md-2 control-label']) }}
                    <div class="col-md-10">
                        {{ Form::text('min_stock',null,['class'=>'form-control']) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('available','Displnible',['class'=>'col-md-2 control-label']) }}
                    <div class="col-md-9">
                        <label class="checkbox">
                            {{ Form::checkbox('available',1) }}
                        </label>
                    </div>
                </div>
                <div class="form-actions">
                    <input type="submit" value="Guardar" class="btn btn-primary pull-right">
                </div>

            {{ Form::close() }}
        </div>
    </div>
@stop