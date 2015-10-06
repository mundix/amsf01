@extends('themes.melon.tpls.page')
@section('content')
    <div class="widget box">
        <div class="widget-header">
            <h4><i class="icon-reorder"></i>Categoría <strong>{{$entity->name}}</strong></h4>
        </div>
        <div class="widget-content">
            {{ Form::model($entity,['route'=>'product_category_update','method'=>'POST','role'=>'form','class'=>'form-horizontal row-border']) }}
                <div class="form-group">
                    {{ Form::label('name','Nombre Producto',['class'=>'col-md-2 control-label']) }}
                    <div class="col-md-10">
                        {{ Form::text('name',null,['placeholder'=>'Requerido','class'=>'form-control']) }}
                        {{ Form::hidden('id',null) }}
                    </div>
                </div>
                @if (isset($categories))
                {{--<div class="form-group">--}}
                    {{--{{ Form::label('category_id','Categoría',['class'=>'col-md-2 control-label']) }}--}}
                    {{--<div class="col-md-10">--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-md-4">--}}
                                {{--{{ Form::select('category_id',$categories,null,['class'=>'col-md-12 select2 full-width-fix required']) }}--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="row" id="sub-category">--}}
                            {{--<div class="col-md-4"></div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                @endif
                <div class="form-group">
                    {{ Form::label('description','Descripción Producto',['class'=>'col-md-2 control-label']) }}
                    <div class="col-md-10">
                        {{ Form::textarea('description',null,['placeholder'=>'Escriba una descripción de la categoría...','class'=>'input-block-level']) }}
                    </div>
                </div>

                <div class="form-actions">
                    <input type="submit" value="Guardar" class="btn btn-primary pull-right">
                </div>

            {{ Form::close() }}
        </div>
    </div>
@stop