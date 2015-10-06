@extends('themes.melon.tpls.page')
@section('content')
<!--=== Page Content ===-->
<!--=== Inline Tabs ===-->
<div class="row">
    <div class="col-md-12">
        <!-- Tabs-->
        <div class="tabbable tabbable-custom tabbable-full-width">
            <div class="tab-content row">
                <!--=== Edit Account ===-->
                <div class="tab-pane active" id="tab_edit_account">
                    {{--<form class="form-horizontal" action="#">--}}
                        {{ Form::open(['route'=>'employee_save','method'=>'PUT','role'=>'form','class'=>'form-horizontal', 'novalidate']) }}
                        <div class="col-md-12">
                            <div class="widget">
                                <div class="widget-header">
                                    <h4>Informaci&oacute;n del Usuario</h4>
                                </div>
                                <div class="widget-content">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {{ Form::label('email','Correo',['class'=>'col-md-4 control-label']) }}
                                                <div class="col-md-8">
                                                    {{ Form::text('email',null,['placeholder'=>'Requerido &uacute;niquco','class'=>'form-control',"autocomplete"=>"off"]) }}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                {{ Form::label('full_name','Nombre Completo',['class'=>'col-md-4 control-label']) }}
                                                <div class="col-md-8">
                                                    {{ Form::text('full_name',null,['placeholder'=>'Requerido','class'=>'form-control',"autocomplete"=>"off"]) }}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                {{ Form::label('phone','Tel&eacute;fono',['class'=>'col-md-4 control-label']) }}
                                                <div class="col-md-8">
                                                    {{ Form::text('phone',null,['placeholder'=>'Requerido','class'=>'form-control',"autocomplete"=>"off"]) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {{ Form::label('gender','G&eacute;nero',['class'=>'col-md-4 control-label']) }}
                                                <div class="col-md-8">
                                                    {{Form::select('gender',['female'=>"Mujer",'male'=>"Hombre"],null,['class'=>'col-md-12 select2 full-width-fix required'])}}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                {{ Form::label('location','Ubicai&oacute;n',['class'=>'col-md-4 control-label']) }}
                                                <div class="col-md-8">
                                                    {{Form::select('location',$locations,null,['class'=>'col-md-12 select2 full-width-fix required'])}}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                {{ Form::label('type','Acceso',['class'=>'col-md-4 control-label']) }}
                                                <div class="col-md-8">
                                                    {{Form::select('type',['admin'=>'Administrador','cashier'=>'Cajero','employee'=>'Empleado'],null,['class'=>'col-md-12 select2 full-width-fix required'])}}
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- /.row -->
                                </div> <!-- /.widget-content -->
                            </div> <!-- /.widget -->
                        </div> <!-- /.col-md-12 -->
                        <div class="col-md-12 form-vertical no-margin">
                            <div class="form-actions">
                                <input type="submit" value="Crear Cuenta" class="btn btn-primary pull-right">
                            </div>
                        </div> <!-- /.col-md-12 -->
                        {{Form::close()}}
                    {{--</form>--}}
                </div>
                <!-- /Edit Account -->
            </div> <!-- /.tab-content -->
        </div>
        <!--END TABS-->
    </div>
</div> <!-- /.row -->
<!-- /Page Content -->
@stop