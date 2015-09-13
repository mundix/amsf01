<ul id="nav">
    <li class="current">
        <a href="#">
            <i class="icon-dashboard"></i>
            RESUMEN
        </a>
    </li>
    <li>
        <a href="javascript:void(0);">
            <i class="icon-building"></i>
            Inventario
            {{--<span class="label label-info pull-right">6</span>--}}
        </a>
        <ul class="sub-menu">
            <li>
                <a href="javascript:void(0);">
                    <i class="icon-list"></i>
                    Productos
                </a>
                <ul class="sub-menu">
                    <li >
                        <a href="{{ route('products') }}">
                            <i class="icon-list-alt"></i>
                            Todos los productos
                            <span class="arrow"></span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('product_add') }}">
                            <i class="icon-save"></i> Agregar producto
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="javascript:void(0);">
                    <i class="icon-table"></i>
                    Categorias
                </a>
                <ul class="sub-menu">
                    <li class="closed-default">
                        <a href="{{ route('products_categories') }}">
                            <i class="icon-list-alt"></i>
                            Todos las categorías
                            <span class="arrow"></span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('product_category_add') }}">
                            <i class="icon-save"></i> Agregar categoría
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
    <li>
        <a href="javascript:void(0);">
            <i class="icon-group"></i>
            Personal
        </a>
        <ul class="sub-menu">
            <li>
                <a href="#">
                    <i class="icon-user"></i>
                    Clientes
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="icon-user"></i>
                    Empleados
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="icon-building"></i>
                    Proveedores
                </a>
            </li>
        </ul>
    </li>
    <li>
        <a href="javascript:void(0);">
            <i class="icon-money"></i>
            Operaciones
        </a>
        <ul class="sub-menu">
            <li>
                <a href="{{ route('make_sale') }}">
                    <i class="icon-hand-right"></i>
                    Ventas
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="icon-hand-left"></i>
                    Compras
                </a>
            </li>
        </ul>
    </li>
    <li>
        <a href="javascript:void(0);">
            <i class="icon-table"></i>
            Informes
        </a>
        <ul class="sub-menu">
            <li>
                <a href="{{ route('make_sale') }}">
                    <i class="icon-angle-right"></i>
                    Ventas
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="icon-angle-right"></i>
                    Compras
                </a>
            </li>
        </ul>
    </li>
</ul>