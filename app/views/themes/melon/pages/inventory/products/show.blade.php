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
                    <h4><i class="icon-reorder"></i>Inventario de Productos</h4>
                    <div class="toolbar no-padding">
                        <div class="btn-group">
                            <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
                        </div>
                    </div>
                </div>
                <div class="widget-content">
                    @if(isset($products))
                        <table class="table table-striped table-bordered table-hover table-checkable  datatable table-responsive" data-display-length="50">
                            <thead>
                                <tr>
                                    <th class="checkbox-column">
                                        <input type="checkbox" class="uniform">
                                    </th>
                                    <th>ID</th>
                                    <th>Productos</th>
                                    <th>Categorías</th>
                                    <th>SKU</th>
                                    <th>Precio</th>
                                    <th class="hidden-xs">En Inventario</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td class="checkbox-column">
                                        <input type="checkbox" class="uniform">
                                    </td>
                                    <td><a href="{{ route('product_edit',[$product->slug,$product->id]) }}">{{$product->id}}</a></td>
                                    <td><a href="{{ route('product_edit',[$product->slug,$product->id]) }}">{{$product->name}}</a></td>
                                    <td><a href="">{{$product->category->name}}</a></td>
                                    <td>{{$product->sku}}</td>
                                    <td>RD$ {{number_format($product->price,2)}}</td>
                                    <td>{{(int)$product->stock}}</td>
                                    <td>
                                        <a href="#" class="delete_entity" data-entity-route="{{route("product_delete",[$product->id])}}">Eliminar</a>
                                    </td>
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