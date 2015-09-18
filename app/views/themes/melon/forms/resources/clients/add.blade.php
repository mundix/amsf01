@extends('themes.melon.tpls.page')
@section('content')
<div class="widget box">
    <div class="widget-header">
        <h4><i class="icon-reorder"></i>Cliente Nuevo</h4>
    </div>
    <div class="widget-content">
        {{ Form::open(['route'=>'client_add','method'=>'POST','role'=>'form','class'=>'form-horizontal row-border']) }}

        <div class="form-group">
            {{ Form::label('name','Nombre cliente',['class'=>'col-md-2 control-label']) }}
            <div class="col-md-10">
                {{ Form::text('name',null,['placeholder'=>'Requerido','class'=>'form-control']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('type','Tipo cliente',['class'=>'col-md-2 control-label']) }}
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-4">
                        {{ Form::select('type',['person'=>'Persona','company'=>'Compa&ntilde;&iacute;a'],null,['class'=>'col-md-12 select2 full-width-fix required']) }}
                    </div>
                </div>
                <div class="row" id="sub-category">
                    <div class="col-md-4"></div>
                </div>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('rnc','RNC',['class'=>'col-md-2 control-label']) }}
            <div class="col-md-10">
                {{ Form::text('rnc',null,['placeholder'=>'','class'=>'form-control']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('noid','C&eacute;dula/Passaporte',['class'=>'col-md-2 control-label']) }}
            <div class="col-md-10">
                {{ Form::text('noid',null,['placeholder'=>'(Opcional)','class'=>'form-control']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('phone','Tel&eacute;fono',['class'=>'col-md-2 control-label']) }}
            <div class="col-md-10">
                {{ Form::text('phone',null,['placeholder'=>'(Opcional)','class'=>'form-control']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('cellphone','Celular',['class'=>'col-md-2 control-label']) }}
            <div class="col-md-10">
                {{ Form::text('cellphone',null,['placeholder'=>'(Opcional)','class'=>'form-control']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('email','Correo Electr&oacute;nico',['class'=>'col-md-2 control-label']) }}
            <div class="col-md-10">
                {{ Form::text('email',null,['placeholder'=>'(Opcional)','class'=>'form-control']) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('address','La direcci&oacute;n',['class'=>'col-md-2 control-label']) }}
            <div class="col-md-10">
                {{ Form::textarea('address',null,['placeholder'=>'Escriba una direcci&oacute;n ...','class'=>'input-block-level']) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('contact_name','Nombre de Contacto',['class'=>'col-md-2 control-label']) }}
            <div class="col-md-10">
                {{ Form::text('contact_name',null,['placeholder'=>'(Opcional)','class'=>'form-control']) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('comments','Alg&uacute;n comentario',['class'=>'col-md-2 control-label']) }}
            <div class="col-md-10">
                {{ Form::textarea('comments',null,['placeholder'=>'Escriba un comentario sobre este cliente','class'=>'input-block-level']) }}
            </div>
        </div>

        <div class="form-actions">
            <input type="submit" value="Crear" class="btn btn-primary pull-right">
        </div>

        {{ Form::close() }}
    </div>
</div>
@stop