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
        <div class="col-md-12">
            <div class="box col-md-12 left">
                <a href="{{ Route('employee_add') }}" class="btn btn-lg btn-info">Crear Empleado</a>
            </div>
            <div class="widget box">
                <div class="widget-header">
                    <h4><i class="icon-reorder"></i> Nuestros Empleados</h4>
                    <div class="toolbar no-padding">
                        <div class="btn-group">
                            <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
                        </div>
                    </div>
                </div>

                <div class="widget-content">
                    @if(isset($employees))
                        <table class="table table-striped table-bordered table-hover table-checkable  datatable table-responsive" data-display-length="50">
                            <thead>
                                <tr>
                                    <th class="checkbox-column">
                                        <input type="checkbox" class="uniform">
                                    </th>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Acceso</th>
                                    <th>Tel&eacute;fono</th>
                                    <th>Email</th>
                                    <th class="hidden-xs"></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($employees as $employee)
                                <tr>
                                    <td class="checkbox-column">
                                        <input type="checkbox" class="uniform">
                                    </td>
                                    <td>
                                        <a href="#">
                                            {{$employee->id}}
                                        </a>
                                    </td>
                                    <td><a href="#">{{$employee->user->full_name}}</a></td>
                                    <td>{{$employee->user->type_title}}</td>
                                    <td>{{$employee->phone}}</td>
                                    <td><a href="mailto:{{$employee->user->email}}">{{$employee->user->email}}</a></td>
                                    <td>
                                        @if(is_super_admin() || is_admin())
                                            <a href="#">Editar</a>
                                            <a href="#" class="delete_entity" data-entity-route="{{route("employee_delete",[$employee->id])}}">Eliminar</a>
                                            <a href="#" class="reset_entity_password" data-entity-route="{{route("employee_reset",[$employee->id])}}">Reset</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                </div>
                @else
                    <p class='empty'>No hay empleados disponibles.</p>
                @endif
            </div>
        </div>
    </div>
    <!-- /Normal -->
@stop