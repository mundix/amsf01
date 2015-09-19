@extends('themes.melon.tpls.page')
@section('content')
    <script>
        $(document).ready(function(){
            "use strict";
            App.init(); // Init layout and core plugins
            Plugins.init(); // Init all plugins
            FormComponents.init(); // Init all form-specific plugins
        });
    </script>
    <div class="row">
        <div class="col-md-12">
            <div class="box col-md-12 left">
                <a href="{{ Route('client_add') }}" class="btn btn-lg btn-info">Crear Cliente</a>
            </div>
            <div class="widget box">
                <div class="widget-header">
                    <h4><i class="icon-reorder"></i> Nuestros Clientes</h4>
                    <div class="toolbar no-padding">
                        <div class="btn-group">
                            <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
                        </div>
                    </div>
                </div>

                <div class="widget-content">
                    @if(isset($clients))
                        <table class="table table-striped table-bordered table-hover table-checkable  datatable">
                            <thead>
                            <tr>
                                <th class="checkbox-column">
                                    <input type="checkbox" class="uniform">
                                </th>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Tel&eacute;fono</th>
                                <th>Email</th>
                                <th>RNC</th>
                                <th class="hidden-xs"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($clients as $client)
                                <tr>
                                    <td class="checkbox-column">
                                        <input type="checkbox" class="uniform">
                                    </td>
                                    <td><a href="{{ route('client_edit',[$client->id]) }}">{{$client->id}}</a></td>
                                    <td><a href="{{ route('client_edit',[$client->id]) }}">{{$client->name}}</a></td>
                                    <td>{{$client->phone}}</td>
                                    <td><a href="mailto:{{$client->email}}">{{$client->email}}</a></td>
                                    <td>{{$client->rnc}}</td>
                                    <td>
                                        <a href="{{ Route('client_delete',[$client->id]) }}">Editar</a>
                                        <a href="#" class="delete_entity" data-entity-route="{{route("client_delete",[$client->id])}}">Eliminar</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                </div>
                @else
                    <p class='empty'>No hay clientes disponibles.</p>
                @endif
            </div>
        </div>
    </div>
    <!-- /Normal -->
@stop