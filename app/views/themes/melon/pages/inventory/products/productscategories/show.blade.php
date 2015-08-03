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
            <div class="widget box">
                <div class="widget-header">
                    <h4><i class="icon-reorder"></i> Managed Table</h4>
                    <div class="toolbar no-padding">
                        <div class="btn-group">
                            <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
                        </div>
                    </div>
                </div>
                <div class="widget-content">
                    @if(isset($categories))
                    <table class="table table-striped table-bordered table-hover table-checkable datatable">
                        <thead>
                        <tr>
                            <th class="checkbox-column">
                                <input type="checkbox" class="uniform">
                            </th>
                            <th>Categorías</th>
                            <th class="hidden-xs">Total Productos</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($categories as $category)
                        <tr>
                            <td class="checkbox-column">
                                <input type="checkbox" class="uniform">
                            </td>
                            <td>{{$category}}</td>
                            <td>Productos (10)</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                    <p class='empty'>No hay categorías disponibles.</p>
                @endif
            </div>
        </div>
    </div>
    <!-- /Normal -->
@stop