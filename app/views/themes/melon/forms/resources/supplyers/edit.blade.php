@extends('themes.melon.tpls.page')
@section('content')
    <div class="widget box">
        <div class="widget-header">
            <h4><i class="icon-reorder"></i>Suplidor: <strong>{{ $entity->name }}</strong></h4>
        </div>
        <div class="widget-content">
            {{ Form::model($entity,['route'=>'supplyer_update','method'=>'POST','role'=>'form','class'=>'form-horizontal row-border']) }}
            <div class="form-group">
                {{ Form::label('name','Nombre cliente',['class'=>'col-md-2 control-label']) }}
                <div class="col-md-10">
                    {{ Form::text('name',null,['placeholder'=>'Requerido','class'=>'form-control']) }}
                    {{ Form::hidden('id',null) }}
                </div>
            </div>

            <div class="form-group">
                {{ Form::label('rnc','RNC',['class'=>'col-md-2 control-label']) }}
                <div class="col-md-10">
                    {{ Form::text('rnc',null,['placeholder'=>'','class'=>'form-control']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('phone','Tel&eacute;fono',['class'=>'col-md-2 control-label']) }}
                <div class="col-md-10">
                    {{ Form::text('phone',null,['placeholder'=>'(Opcional)','class'=>'form-control']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('contact_name','Nombre de Contacto',['class'=>'col-md-2 control-label']) }}
                <div class="col-md-10">
                    {{ Form::text('contact_name',null,['placeholder'=>'(Opcional)','class'=>'form-control']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('description','Alguna descripci&oacute;n',['class'=>'col-md-2 control-label']) }}
                <div class="col-md-10">
                    {{ Form::textarea('description',null,['placeholder'=>'Escriba una descripci&oacute;n sobre este cliente','class'=>'input-block-level']) }}
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