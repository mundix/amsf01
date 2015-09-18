<div class="crumbs">
    <ul id="breadcrumbs" class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="{{ route('home') }}">Dashboard</a>
        </li>
        {{--<li class="current">--}}
        {{--<a href="pages_calendar.html" title="">Calendar</a>--}}
        {{--</li>--}}
    </ul>

    <ul class="crumb-buttons">
        <li><a href="#" title=""><i class="icon-signal"></i><span>Statistics</span></a></li>
        <li class="dropdown"><a href="#" title="" data-toggle="dropdown"><i class="icon-tasks"></i><span>Inventario <strong>({{$data['total_inventory_products']}})</strong></span><i class="icon-angle-down left-padding"></i></a>
            <ul class="dropdown-menu pull-right">
                <li><a href="{{ Route("product_add") }}" title=""><i class="icon-plus"></i>Agregar Nuevo Producto</a></li>
                <li><a href="{{ Route("client_add") }}" title=""><i class="icon-plus"></i>Agregar Nuevo Cliente</a></li>
                <li><a href="{{ Route("products") }}" title=""><i class="icon-reorder"></i>Productos</a></li>
                <li><a href="{{ Route("make_sale") }}" title=""><i class="icon-reorder"></i>Crear Venta </a></li>
            </ul>
        </li>
        <li class="range">
            <a href="#">
                <i class="icon-calendar"></i>
                <span></span>
                <i class="icon-angle-down"></i>
            </a>
        </li>
        <li >
            <a href="#">
            {{ date('j/n/Y, h:m A') }}
            </a>
        </li>
    </ul>
</div>

@include('themes.melon.commons.alerts')
