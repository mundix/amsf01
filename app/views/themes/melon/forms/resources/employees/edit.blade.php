@extends('themes.melon.tpls.page')
@section('content')
<!--=== Page Content ===-->
<!--=== Inline Tabs ===-->
<div class="row">
    <div class="col-md-12">
        <!-- Tabs-->
        <div class="tabbable tabbable-custom tabbable-full-width">
            {{--<ul class="nav nav-tabs">--}}
                {{--<li class="active"><a href="#tab_overview" data-toggle="tab">Overview</a></li>--}}
                {{--<li><a href="#tab_edit_account" data-toggle="tab">Edit Account</a></li>--}}
            {{--</ul>--}}
            <div class="tab-content row">
                <!--=== Overview ===-->
                <div class="tab-pane " id="tab_overview">
                    <div class="col-md-3">
                        <div class="list-group">
                            <li class="list-group-item no-padding">
                                <img src="assets/img/demo/avatar-large.jpg" alt="">
                            </li>
                            <a href="javascript:void(0);" class="list-group-item">Projects</a>
                            <a href="javascript:void(0);" class="list-group-item">Messages</a>
                            <a href="javascript:void(0);" class="list-group-item"><span class="badge">3</span>Friends</a>
                            <a href="javascript:void(0);" class="list-group-item">Settings</a>
                        </div>
                    </div>

                    <div class="col-md-9">
                        <div class="row profile-info">
                            <div class="col-md-7">
                                <div class="alert alert-info">You will receive all future updates for free!</div>
                                <h1>John Doe</h1>

                                <dl class="dl-horizontal">
                                    <dt>Description lists</dt>
                                    <dd>A description list is perfect for defining terms.</dd>
                                    <dt>Euismod</dt>
                                    <dd>Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.</dd>
                                    <dd>Donec id elit non mi porta gravida at eget metus.</dd>
                                    <dt>Malesuada porta</dt>
                                    <dd>Etiam porta sem malesuada magna mollis euismod.</dd>
                                    <dt>Felis euismod semper eget lacinia</dt>
                                    <dd>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</dd>
                                </dl>

                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt laoreet dolore magna aliquam tincidunt erat volutpat laoreet dolore magna aliquam tincidunt erat volutpat.</p>
                            </div>
                            <div class="col-md-5">
                                <div class="widget">
                                    <div class="widget-header">
                                        <h4><i class="icon-reorder"></i> Sales</h4>
                                    </div>
                                    <div class="widget-content">
                                        <div id="chart_filled_blue" class="chart"></div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- /.row -->

                        <div class="row">
                            <div class="col-md-12">
                                <div class="widget">
                                    <div class="widget-content">
                                        <table class="table table-hover table-striped">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th class="hidden-xs">Username</th>
                                                <th>Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Joey</td>
                                                <td>Greyson</td>
                                                <td class="hidden-xs">joey123</td>
                                                <td><span class="label label-success">Approved</span></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Wolf</td>
                                                <td>Bud</td>
                                                <td class="hidden-xs">wolfy</td>
                                                <td><span class="label label-info">Pending</span></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Darin</td>
                                                <td>Alec</td>
                                                <td class="hidden-xs">alec82</td>
                                                <td><span class="label label-warning">Suspended</span></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Andrea</td>
                                                <td>Brenden</td>
                                                <td class="hidden-xs">andry</td>
                                                <td><span class="label label-danger">Blocked</span></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /Striped Table -->
                        </div> <!-- /.row -->
                    </div> <!-- /.col-md-9 -->
                </div>
                <!-- /Overview -->

                <!--=== Edit Account ===-->
                <div class="tab-pane active" id="tab_edit_account">
                    {{--<form class="form-horizontal" action="#">--}}
                        {{ Form::model($user,['route'=>'update_account','method'=>'PUT','role'=>'form','class'=>'form-horizontal', 'novalidate']) }}
                        <div class="col-md-12">
                            <div class="widget">
                                <div class="widget-header">
                                    <h4>General Information</h4>
                                </div>
                                <div class="widget-content">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {{ Form::label('full_name','Nombre Completo',['class'=>'col-md-4 control-label']) }}
                                                <div class="col-md-8">
                                                    {{ Form::text('full_name',null,['placeholder'=>'Requerido','class'=>'form-control']) }}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                {{ Form::label('phone','Tel&eacute;fono',['class'=>'col-md-4 control-label']) }}
                                                <div class="col-md-8">
                                                    {{ Form::text('phone',$user->candidate->phone,['placeholder'=>'Requerido','class'=>'form-control',"autocomplete"=>"off"]) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {{ Form::label('gender','G&eacute;nero',['class'=>'col-md-4 control-label']) }}
                                                <div class="col-md-8">
                                                    {{Form::select('gender',['male'=>"Hombre",'female'=>"Mujer"],$user->candidate->gender,['class'=>'col-md-12 select2 full-width-fix required'])}}
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                {{ Form::label('available','Displnible',['class'=>'col-md-2 control-label']) }}
                                                <div class="col-md-9">
                                                    <label class="checkbox">
                                                        {{ Form::checkbox('available',1,$user->candidate->available) }}
                                                    </label>
                                                </div>
                                            </div>

                                        </div>
                                    </div> <!-- /.row -->
                                </div> <!-- /.widget-content -->
                            </div> <!-- /.widget -->
                        </div> <!-- /.col-md-12 -->

                        <div class="col-md-12 form-vertical no-margin">
                            <div class="widget">
                                <div class="widget-header">
                                    <h4>Settings</h4>
                                </div>
                                <div class="widget-content">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-2">
                                            <strong class="subtitle padding-top-10px">Correo permanente</strong>
                                            <p class="text-muted">{{$user->type}}</p>
                                        </div>

                                        <div class="col-md-8 col-lg-10">
                                            <div class="form-group">
                                                {{--<label class="control-label padding-top-10px">Email:</label>--}}
                                                {{--<input type="text" name="username" class="form-control" value="john.doe" disabled="disabled">--}}

                                                {{ Form::label('email','Correo',['class'=>'control-label padding-top-10px']) }}
                                                {{ Form::text('email',null,['disabled'=>'disabled','class'=>'form-control']) }}

                                            </div>
                                        </div>
                                    </div> <!-- /.row -->
                                    <div class="row">
                                        <div class="col-md-4 col-lg-2">
                                            <strong class="subtitle">Cambio de contrase&ntilde;a</strong>
                                            <p class="text-muted"></p>
                                        </div>
                                        <div class="col-md-8 col-lg-10">
                                            <div class="form-group">
                                                <label class="control-label">Nueva contrase&ntilde;a:</label>
                                                <input type="password" name="password" class="form-control" placeholder="Dejar en blanco para no cambiar contrase&ntilde;a">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Repita contrase&ntilde;a::</label>
                                                <input type="password" name="password_confirmation" class="form-control" placeholder="Dejar en blanco para no cambiar contrase&ntilde;a">
                                            </div>
                                        </div>
                                    </div> <!-- /.row -->
                                </div> <!-- /.widget-content -->
                            </div> <!-- /.widget -->

                            <div class="form-actions">
                                <input type="submit" value="Actualizar Cuenta" class="btn btn-primary pull-right">
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