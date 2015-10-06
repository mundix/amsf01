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
                <a href="{{ Route('supplyer_add') }}" class="btn btn-lg btn-info">Crear Suplidor</a>
            </div>
            <div class="widget box">
                <div class="widget-header">
                    <h4><i class="icon-reorder"></i> Nuestros Suplidores</h4>
                    <div class="toolbar no-padding">
                        <div class="btn-group">
                            <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
                        </div>
                    </div>
                </div>

                <div class="widget-content">
                    @if(isset($supplyers))
                        <table class="table table-striped table-bordered table-hover table-checkable  datatable table-responsive" data-display-length="50">
                            <thead>
                                <tr>
                                    <th class="checkbox-column">
                                        <input type="checkbox" class="uniform">
                                    </th>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Tel&eacute;fono</th>
                                    <th>Contacto</th>
                                    <th class="hidden-xs"></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($supplyers as $supplyer)
                                <tr>
                                    <td class="checkbox-column">
                                        <input type="checkbox" class="uniform">
                                    </td>
                                    <td><a href="{{ route('supplyer_edit',[$supplyer->id]) }}">{{$supplyer->id}}</a></td>
                                    <td><a href="{{ route('supplyer_edit',[$supplyer->id]) }}">{{$supplyer->name}}</a></td>
{{--                                    <td>{{$supplyer->user->type}}</td>--}}
                                    <td>{{$supplyer->phone}}</td>
                                    <td>{{$supplyer->contact_name}}</td>
                                    {{--<td><a href="mailto:{{$employee->user->email}}">{{$employee->user->email}}</a></td>--}}
                                    <td>
                                        <a href="{{ Route('supplyer_edit',[$supplyer->id]) }}">Editar</a>
                                        <a href="#" class="delete_entity" data-entity-route="{{route("supplyer_delete",[$supplyer->id])}}">Eliminar</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                </div>
                @else
                    <p class='empty'>No hay suplidores disponibles.</p>
                @endif
            </div>
        </div>
    </div>
    <!-- /Normal -->
@stop