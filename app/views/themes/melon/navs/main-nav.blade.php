<ul id="nav">
    <li class="current">
        <a href="{{ Route('home') }}">
            <i class="icon-dashboard"></i>
            Inicio
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
                <a href="{{Route('clients')}}">
                    <i class="icon-user"></i>
                    Clientes
                </a>
            </li>
            <li>
                <a href="{{Route('employees')}}">
                    <i class="icon-user"></i>
                    Empleados
                </a>
            </li>
            <li>
                <a href="{{Route('supplyers')}}">
                    <i class="icon-building"></i>
                    Suplidores
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
                <a href="{{ route('make_buy') }}">
                    <i class="icon-hand-left"></i>
                    Compras
                </a>
            </li>
            <li>
                <a href="{{ route('make_credit') }}">
                    <i class="icon-hand-left"></i>
                    Cr&eacute;dito
                </a>
            </li>
            <li>
                <a href="{{ route('debts_pay') }}">
                    <i class="icon-hand-left"></i>
                    Cuentas por Pagar
                </a>
            </li>
            <li>
                <a href="{{ route('accounts_receivable') }}">
                    <i class="icon-hand-left"></i>
                    Cuentas por Cobrar
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
                <a href="{{Route('reports_sale')}}">
                    <i class="icon-angle-right"></i>
                    Ventas
                </a>
            </li>
            <li>
                <a href="{{Route('reports_buy')}}">
                    <i class="icon-angle-right"></i>
                    Compras
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="icon-angle-right"></i>
                    Productos
                </a>
            </li>
        </ul>
    </li>
</ul>