
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <title>Dashboard | Sistema de Inventarios Awesome Media</title>

    <!--=== CSS ===-->
    {{--{{ asset('bootstrap/css/bootstrap.min.css')}}--}}
    <!-- Bootstrap -->
    <link href="{{ asset('melon/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- jQuery UI -->
    <!--<link href="{{ asset('melon/plugins/jquery-ui/jquery-ui-1.10.2.custom.css') }}" rel="stylesheet" type="text/css" />-->
    <!--[if lt IE 9]>
    <link rel="stylesheet" type="text/css" href="{{ asset('melon/plugins/jquery-ui/jquery.ui.1.10.2.ie.css') }}"/>
    <![endif]-->

    <!-- Theme -->
    <link href="{{ asset('melon/css/main.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('melon/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('melon/css/responsive.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('melon/css/icons.css') }}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{ asset('melon/css/fontawesome/font-awesome.min.css') }}">
    <!--[if IE 7]>
    <link rel="stylesheet" href="{{ asset('melon/css/fontawesome/font-awesome-ie7.min.css') }}">
    <![endif]-->

    <!--[if IE 8]>
    <link href="{{asset('melon/css/ie8.css')}}" rel="stylesheet" type="text/css" />
    <![endif]-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>

    <!--=== JavaScript ===-->

    <script type="text/javascript" src="{{ asset('melon/js/libs/jquery-1.10.2.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('melon/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('melon/bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('melon/js/libs/lodash.compat.min.js') }}"></script>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="{{ asset('melon/js/libs/html5shiv.js') }}"></script>
    <![endif]-->

    <!-- Smartphone Touch Events -->
    <script type="text/javascript" src="{{ asset('melon/plugins/touchpunch/jquery.ui.touch-punch.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('melon/plugins/event.swipe/jquery.event.move.js') }}"></script>
    <script type="text/javascript" src="{{ asset('melon/plugins/event.swipe/jquery.event.swipe.js') }}"></script>

    <!-- General -->
    <script type="text/javascript" src="{{ asset('melon/js/libs/breakpoints.js') }}"></script>
    <script type="text/javascript" src="{{ asset('melon/plugins/respond/respond.min.js') }}"></script> <!-- Polyfill for min/max-width CSS3 Media Queries (only for IE8) -->
    <script type="text/javascript" src="{{ asset('melon/plugins/cookie/jquery.cookie.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('melon/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('melon/plugins/slimscroll/jquery.slimscroll.horizontal.min.js') }}"></script>

    <!-- Page specific plugins -->
    <!-- Charts -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="{{ asset('melon/plugins/flot/excanvas.min.js') }}"></script>
    <![endif]-->
    <script type="text/javascript" src="{{ asset('melon/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('melon/plugins/flot/jquery.flot.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('melon/plugins/flot/jquery.flot.tooltip.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('melon/plugins/flot/jquery.flot.resize.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('melon/plugins/flot/jquery.flot.time.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('melon/plugins/flot/jquery.flot.growraf.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('melon/plugins/easy-pie-chart/jquery.easy-pie-chart.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('melon/plugins/daterangepicker/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('melon/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('melon/plugins/blockui/jquery.blockUI.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('melon/plugins/fullcalendar/fullcalendar.min.js') }}"></script>

    <!-- Noty -->
    <script type="text/javascript" src="{{ asset('melon/plugins/noty/jquery.noty.js') }}"></script>
    <script type="text/javascript" src="{{ asset('melon/plugins/noty/layouts/top.js') }}"></script>
    <script type="text/javascript" src="{{ asset('melon/plugins/noty/themes/default.js') }}"></script>

    <!-- Forms -->
    <script type="text/javascript" src="{{ asset('melon/plugins/uniform/jquery.uniform.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('melon/plugins/select2/select2.min.js') }}"></script>

    <!-- App -->
    <script type="text/javascript" src="{{ asset('melon/js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('melon/js/plugins.js') }}"></script>
    <script type="text/javascript" src="{{ asset('melon/js/plugins.form-components.js') }}"></script>

    <script>
        $(document).ready(function(){
            "use strict";

            App.init(); // Init layout and core plugins
            Plugins.init(); // Init all plugins
            FormComponents.init(); // Init all form-specific plugins
        });
    </script>

    <!-- Demo JS -->
    <script type="text/javascript" src="{{ asset('melon/js/custom.js') }}"></script>
    <script type="text/javascript" src="{{ asset('melon/js/demo/pages_calendar.js') }}"></script>
    <script type="text/javascript" src="{{ asset('melon/js/demo/charts/chart_filled_blue.js') }}"></script>
    <script type="text/javascript" src="{{ asset('melon/js/demo/charts/chart_simple.js') }}"></script>
</head>

<body>

<!-- Header -->
<header class="header navbar navbar-fixed-top" role="banner">
    <!-- Top Navigation Bar -->
    <div class="container">

        <!-- Only visible on smartphones, menu toggle -->
        <ul class="nav navbar-nav">
            <li class="nav-toggle"><a href="javascript:void(0);" title=""><i class="icon-reorder"></i></a></li>
        </ul>

        <!-- Logo -->
        <a class="navbar-brand" href="index.html">
            <img src="{{ asset('melon/img/logo.png')}}" alt="logo" />
            <strong>ME</strong>LON
        </a>
        <!-- /logo -->

        <!-- Sidebar Toggler -->
        <a href="#" class="toggle-sidebar bs-tooltip" data-placement="bottom" data-original-title="Toggle navigation">
            <i class="icon-reorder"></i>
        </a>
        <!-- /Sidebar Toggler -->

        <!-- Top Left Menu -->
        <ul class="nav navbar-nav navbar-left hidden-xs hidden-sm">
            <li>
                <a href="#">
                    Mi Resumen
                </a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    Inventario
                    <i class="icon-caret-down small"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('product') }}"><i class="icon-user"></i> Mis Productos</a></li>
                    <li><a href="#"><i class="icon-calendar"></i> Mis Clientes</a></li>
                    <li><a href="#"><i class="icon-calendar"></i> Mis Proveedores</a></li>
                    <li><a href="#"><i class="icon-calendar"></i> Mis Empleados</a></li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="icon-tasks"></i> Venta</a></li>
                    <li><a href="#"><i class="icon-tasks"></i> Compra</a></li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="icon-tasks"></i> Informes</a></li>
                </ul>
            </li>
        </ul>
        <!-- /Top Left Menu -->

        <!-- Top Right Menu -->
        <ul class="nav navbar-nav navbar-right">
            <!-- Notifications -->
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-warning-sign"></i>
                    <span class="badge">5</span>
                </a>
                <ul class="dropdown-menu extended notification">
                    <li class="title">
                        <p>You have 5 new notifications</p>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <span class="label label-success"><i class="icon-plus"></i></span>
                            <span class="message">New user registration.</span>
                            <span class="time">1 mins</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <span class="label label-danger"><i class="icon-warning-sign"></i></span>
                            <span class="message">High CPU load on cluster #2.</span>
                            <span class="time">5 mins</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <span class="label label-success"><i class="icon-plus"></i></span>
                            <span class="message">New user registration.</span>
                            <span class="time">10 mins</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <span class="label label-info"><i class="icon-bullhorn"></i></span>
                            <span class="message">New items are in queue.</span>
                            <span class="time">25 mins</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <span class="label label-warning"><i class="icon-bolt"></i></span>
                            <span class="message">Disk space to 85% full.</span>
                            <span class="time">55 mins</span>
                        </a>
                    </li>
                    <li class="footer">
                        <a href="javascript:void(0);">View all notifications</a>
                    </li>
                </ul>
            </li>

            <!-- Tasks -->
            <li class="dropdown hidden-xs hidden-sm">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-tasks"></i>
                    <span class="badge">7</span>
                </a>
                <ul class="dropdown-menu extended notification">
                    <li class="title">
                        <p>You have 7 pending tasks</p>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
								<span class="task">
									<span class="desc">Preparing new release</span>
									<span class="percent">30%</span>
								</span>
                            <div class="progress progress-small">
                                <div style="width: 30%;" class="progress-bar progress-bar-info"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
								<span class="task">
									<span class="desc">Change management</span>
									<span class="percent">80%</span>
								</span>
                            <div class="progress progress-small progress-striped active">
                                <div style="width: 80%;" class="progress-bar progress-bar-danger"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
								<span class="task">
									<span class="desc">Mobile development</span>
									<span class="percent">60%</span>
								</span>
                            <div class="progress progress-small">
                                <div style="width: 60%;" class="progress-bar progress-bar-success"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
								<span class="task">
									<span class="desc">Database migration</span>
									<span class="percent">20%</span>
								</span>
                            <div class="progress progress-small">
                                <div style="width: 20%;" class="progress-bar progress-bar-warning"></div>
                            </div>
                        </a>
                    </li>
                    <li class="footer">
                        <a href="javascript:void(0);">View all tasks</a>
                    </li>
                </ul>
            </li>

            <!-- Messages -->
            <li class="dropdown hidden-xs hidden-sm">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-envelope"></i>
                    <span class="badge">1</span>
                </a>
                <ul class="dropdown-menu extended notification">
                    <li class="title">
                        <p>You have 3 new messages</p>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <span class="photo"><img src="{{ asset('melon/img/demo/avatar-1.jpg')}}" alt="" /></span>
								<span class="subject">
									<span class="from">Bob Carter</span>
									<span class="time">Just Now</span>
								</span>
								<span class="text">
									Consetetur sadipscing elitr...
								</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <span class="photo"><img src="{{ asset('melon/img/demo/avatar-2.jpg') }}" alt="" /></span>
								<span class="subject">
									<span class="from">Jane Doe</span>
									<span class="time">45 mins</span>
								</span>
								<span class="text">
									Sed diam nonumy...
								</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <span class="photo"><img src="{{ asset('melon/img/demo/avatar-3.jpg') }}" alt="" /></span>
								<span class="subject">
									<span class="from">Patrick Nilson</span>
									<span class="time">6 hours</span>
								</span>
								<span class="text">
									No sea takimata sanctus...
								</span>
                        </a>
                    </li>
                    <li class="footer">
                        <a href="javascript:void(0);">View all messages</a>
                    </li>
                </ul>
            </li>

            <!-- .row .row-bg Toggler -->
            <li>
                <a href="#" class="dropdown-toggle row-bg-toggle">
                    <i class="icon-resize-vertical"></i>
                </a>
            </li>

            <!-- Project Switcher Button -->
            <li class="dropdown">
                <a href="#" class="project-switcher-btn dropdown-toggle">
                    <i class="icon-folder-open"></i>
                    <span>Projects</span>
                </a>
            </li>

            <!-- User Login Dropdown -->
            <li class="dropdown user">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <!--<img alt="" src="{{ asset('melon/img/avatar1_small.jpg') }}" />-->
                    <i class="icon-male"></i>
                    <span class="username">John Doe</span>
                    <i class="icon-caret-down small"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="pages_user_profile.html"><i class="icon-user"></i> My Profile</a></li>
                    <li><a href="pages_calendar.html"><i class="icon-calendar"></i> My Calendar</a></li>
                    <li><a href="#"><i class="icon-tasks"></i> My Tasks</a></li>
                    <li class="divider"></li>
                    <li><a href="login.html"><i class="icon-key"></i> Log Out</a></li>
                </ul>
            </li>
            <!-- /user login dropdown -->
        </ul>
        <!-- /Top Right Menu -->
    </div>
    <!-- /top navigation bar -->

    <!--=== Project Switcher ===-->
    <div id="project-switcher" class="container project-switcher">
        <div id="scrollbar">
            <div class="handle"></div>
        </div>

        <div id="frame">
            <ul class="project-list">
                <li>
                    <a href="javascript:void(0);">
                        <span class="image"><i class="icon-desktop"></i></span>
                        <span class="title">Lorem ipsum dolor</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);">
                        <span class="image"><i class="icon-compass"></i></span>
                        <span class="title">Dolor sit invidunt</span>
                    </a>
                </li>
                <li class="current">
                    <a href="javascript:void(0);">
                        <span class="image"><i class="icon-male"></i></span>
                        <span class="title">Consetetur sadipscing elitr</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);">
                        <span class="image"><i class="icon-thumbs-up"></i></span>
                        <span class="title">Sed diam nonumy</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);">
                        <span class="image"><i class="icon-female"></i></span>
                        <span class="title">At vero eos et</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);">
                        <span class="image"><i class="icon-beaker"></i></span>
                        <span class="title">Sed diam voluptua</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);">
                        <span class="image"><i class="icon-desktop"></i></span>
                        <span class="title">Lorem ipsum dolor</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);">
                        <span class="image"><i class="icon-compass"></i></span>
                        <span class="title">Dolor sit invidunt</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);">
                        <span class="image"><i class="icon-male"></i></span>
                        <span class="title">Consetetur sadipscing elitr</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);">
                        <span class="image"><i class="icon-thumbs-up"></i></span>
                        <span class="title">Sed diam nonumy</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);">
                        <span class="image"><i class="icon-female"></i></span>
                        <span class="title">At vero eos et</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);">
                        <span class="image"><i class="icon-beaker"></i></span>
                        <span class="title">Sed diam voluptua</span>
                    </a>
                </li>
            </ul>
        </div> <!-- /#frame -->
    </div> <!-- /#project-switcher -->
</header> <!-- /.header -->

<div id="container">
    <div id="sidebar" class="sidebar-fixed">
        <div id="sidebar-content">

            <!-- Search Input -->
            <form class="sidebar-search">
                <div class="input-box">
                    <button type="submit" class="submit">
                        <i class="icon-search"></i>
                    </button>
						<span>
							<input type="text" placeholder="Search...">
						</span>
                </div>
            </form>

            <!-- Search Results -->
            <div class="sidebar-search-results">
                <i class="icon-remove close"></i>
                <!-- Documents -->
                <div class="title">
                    Documents
                </div>
                <ul class="notifications">
                    <li>
                        <a href="javascript:void(0);">
                            <div class="col-left">
                                <span class="label label-info"><i class="icon-file-text"></i></span>
                            </div>
                            <div class="col-right with-margin">
                                <span class="message"><strong>John Doe</strong> received $1.527,32</span>
                                <span class="time">finances.xls</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <div class="col-left">
                                <span class="label label-success"><i class="icon-file-text"></i></span>
                            </div>
                            <div class="col-right with-margin">
                                <span class="message">My name is <strong>John Doe</strong> ...</span>
                                <span class="time">briefing.docx</span>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /Documents -->
                <!-- Persons -->
                <div class="title">
                    Persons
                </div>
                <ul class="notifications">
                    <li>
                        <a href="javascript:void(0);">
                            <div class="col-left">
                                <span class="label label-danger"><i class="icon-female"></i></span>
                            </div>
                            <div class="col-right with-margin">
                                <span class="message">Jane <strong>Doe</strong></span>
                                <span class="time">21 years old</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div> <!-- /.sidebar-search-results -->

            <!--=== Navigation ===-->
            <ul id="nav">
                <li class="current">
                    <a href="index.html">
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
                                <i class="icon-angle-right"></i>
                                Productos
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="{{ route('product') }}">
                                        <i class="icon-angle-right"></i>
                                        Mis Productos
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('product_add') }}">
                                        <i class="icon-angle-right"></i>
                                        Agregar Producto
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('product_category') }}">
                                <i class="icon-angle-right"></i>
                                Categorias
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);">
                        <i class="icon-edit"></i>
                        Form Elements
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="form_components.html">
                                <i class="icon-angle-right"></i>
                                Form Components
                            </a>
                        </li>
                        <li>
                            <a href="form_layouts.html">
                                <i class="icon-angle-right"></i>
                                Form Layouts
                            </a>
                        </li>
                        <li>
                            <a href="form_validation.html">
                                <i class="icon-angle-right"></i>
                                Form Validation
                            </a>
                        </li>
                        <li>
                            <a href="form_wizard.html">
                                <i class="icon-angle-right"></i>
                                Form Wizard
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);">
                        <i class="icon-table"></i>
                        Tables
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="tables_static.html">
                                <i class="icon-angle-right"></i>
                                Static Tables
                            </a>
                        </li>
                        <li>
                            <a href="tables_dynamic.html">
                                <i class="icon-angle-right"></i>
                                Dynamic Tables (DataTables)
                            </a>
                        </li>
                        <li>
                            <a href="tables_responsive.html">
                                <i class="icon-angle-right"></i>
                                Responsive Tables
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="charts.html">
                        <i class="icon-bar-chart"></i>
                        Charts &amp; Statistics
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);">
                        <i class="icon-folder-open-alt"></i>
                        Pages
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="login.html">
                                <i class="icon-angle-right"></i>
                                Login
                            </a>
                        </li>
                        <li>
                            <a href="pages_user_profile.html">
                                <i class="icon-angle-right"></i>
                                User Profile
                            </a>
                        </li>
                        <li>
                            <a href="pages_calendar.html">
                                <i class="icon-angle-right"></i>
                                Calendar
                            </a>
                        </li>
                        <li>
                            <a href="pages_invoice.html">
                                <i class="icon-angle-right"></i>
                                Invoice
                            </a>
                        </li>
                        <li>
                            <a href="404.html">
                                <i class="icon-angle-right"></i>
                                404 Page
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);">
                        <i class="icon-list-ol"></i>
                        4 Level Menu
                    </a>
                    <ul class="sub-menu">
                        <li class="open-default">
                            <a href="javascript:void(0);">
                                <i class="icon-cogs"></i>
                                Item 1
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="open-default">
                                    <a href="javascript:void(0);">
                                        <i class="icon-user"></i>
                                        Sample Link 1
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="current"><a href="javascript:void(0);"><i class="icon-remove"></i> Sample Link 1</a></li>
                                        <li><a href="javascript:void(0);"><i class="icon-pencil"></i> Sample Link 1</a></li>
                                        <li><a href="javascript:void(0);"><i class="icon-edit"></i> Sample Link 1</a></li>
                                    </ul>
                                </li>
                                <li><a href="javascript:void(0);"><i class="icon-user"></i>  Sample Link 1</a></li>
                                <li><a href="javascript:void(0);"><i class="icon-external-link"></i>  Sample Link 2</a></li>
                                <li><a href="javascript:void(0);"><i class="icon-bell"></i>  Sample Link 3</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <i class="icon-globe"></i>
                                Item 2
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li><a href="javascript:void(0);"><i class="icon-user"></i>  Sample Link 1</a></li>
                                <li><a href="javascript:void(0);"><i class="icon-external-link"></i>  Sample Link 1</a></li>
                                <li><a href="javascript:void(0);"><i class="icon-bell"></i>  Sample Link 1</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <i class="icon-folder-open"></i>
                                Item 3
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

            <!-- /Navigation -->
            <div class="sidebar-title">
                <span>Notifications</span>
            </div>
            <ul class="notifications demo-slide-in"> <!-- .demo-slide-in is just for demonstration purposes. You can remove this. -->
                <li style="display: none;"> <!-- style-attr is here only for fading in this notification after a specific time. Remove this. -->
                    <div class="col-left">
                        <span class="label label-danger"><i class="icon-warning-sign"></i></span>
                    </div>
                    <div class="col-right with-margin">
                        <span class="message">Server <strong>#512</strong> crashed.</span>
                        <span class="time">few seconds ago</span>
                    </div>
                </li>
                <li style="display: none;"> <!-- style-attr is here only for fading in this notification after a specific time. Remove this. -->
                    <div class="col-left">
                        <span class="label label-info"><i class="icon-envelope"></i></span>
                    </div>
                    <div class="col-right with-margin">
                        <span class="message"><strong>John</strong> sent you a message</span>
                        <span class="time">few second ago</span>
                    </div>
                </li>
                <li>
                    <div class="col-left">
                        <span class="label label-success"><i class="icon-plus"></i></span>
                    </div>
                    <div class="col-right with-margin">
                        <span class="message"><strong>Emma</strong>'s account was created</span>
                        <span class="time">4 hours ago</span>
                    </div>
                </li>
            </ul>

            <div class="sidebar-widget align-center">
                <div class="btn-group" data-toggle="buttons" id="theme-switcher">
                    <label class="btn active">
                        <input type="radio" name="theme-switcher" data-theme="bright"><i class="icon-sun"></i> Bright
                    </label>
                    <label class="btn">
                        <input type="radio" name="theme-switcher" data-theme="dark"><i class="icon-moon"></i> Dark
                    </label>
                </div>
            </div>

        </div>
        <div id="divider" class="resizeable"></div>
    </div>
    <!-- /Sidebar -->

    <div id="content">
        <div class="container">
            <!-- Breadcrumbs line -->
            <div class="crumbs">
                <ul id="breadcrumbs" class="breadcrumb">
                    <li>
                        <i class="icon-home"></i>
                        <a href="index.html">Dashboard</a>
                    </li>
                    <li class="current">
                        <a href="pages_calendar.html" title="">Calendar</a>
                    </li>
                </ul>

                <ul class="crumb-buttons">
                    <li><a href="charts.html" title=""><i class="icon-signal"></i><span>Statistics</span></a></li>
                    <li class="dropdown"><a href="#" title="" data-toggle="dropdown"><i class="icon-tasks"></i><span>Users <strong>(+3)</strong></span><i class="icon-angle-down left-padding"></i></a>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="form_components.html" title=""><i class="icon-plus"></i>Add new User</a></li>
                            <li><a href="tables_dynamic.html" title=""><i class="icon-reorder"></i>Overview</a></li>
                        </ul>
                    </li>
                    <li class="range"><a href="#">
                            <i class="icon-calendar"></i>
                            <span></span>
                            <i class="icon-angle-down"></i>
                        </a></li>
                </ul>
            </div>
            <!-- /Breadcrumbs line -->

            <!--=== Page Header ===-->
            <div class="page-header">
                <div class="page-title">
                    <h3>Resumen</h3>
                    <span>Good morning, Edmundo Pichardo!</span>
                </div>
                <!-- Page Stats -->
                <ul class="page-stats">
                    <li>
                        <div class="summary">
                            <span>New orders</span>
                            <h3>17,561</h3>
                        </div>
                        <div id="sparkline-bar" class="graph sparkline hidden-xs">20,15,8,50,20,40,20,30,20,15,30,20,25,20</div>
                        <!-- Use instead of sparkline e.g. this:
                        <div class="graph circular-chart" data-percent="73">73%</div>
                        -->
                    </li>
                    <li>
                        <div class="summary">
                            <span>My balance</span>
                            <h3>$21,561.21</h3>
                        </div>
                        <div id="sparkline-bar2" class="graph sparkline hidden-xs">20,15,8,50,20,40,20,30,20,15,30,20,25,20</div>
                    </li>
                </ul>
                <!-- /Page Stats -->
            </div>
            <!-- /Page Header -->

            <!--=== Page Content ===-->
            <!--=== Statboxes ===-->
            <div class="row row-bg"> <!-- .row-bg -->
                <div class="col-sm-6 col-md-3">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-content">
                            <div class="visual cyan">
                                <div class="statbox-sparkline">30,20,15,30,22,25,26,30,27</div>
                            </div>
                            <div class="title">Clients</div>
                            <div class="value">4 501</div>
                            <a class="more" href="javascript:void(0);">View More <i class="pull-right icon-angle-right"></i></a>
                        </div>
                    </div> <!-- /.smallstat -->
                </div> <!-- /.col-md-3 -->

                <div class="col-sm-6 col-md-3">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-content">
                            <div class="visual green">
                                <div class="statbox-sparkline">20,30,30,29,22,15,20,30,32</div>
                            </div>
                            <div class="title">Feedbacks</div>
                            <div class="value">714</div>
                            <a class="more" href="javascript:void(0);">View More <i class="pull-right icon-angle-right"></i></a>
                        </div>
                    </div> <!-- /.smallstat -->
                </div> <!-- /.col-md-3 -->

                <div class="col-sm-6 col-md-3 hidden-xs">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-content">
                            <div class="visual yellow">
                                <i class="icon-dollar"></i>
                            </div>
                            <div class="title">Total Profit</div>
                            <div class="value">$42,512.61</div>
                            <a class="more" href="javascript:void(0);">View More <i class="pull-right icon-angle-right"></i></a>
                        </div>
                    </div> <!-- /.smallstat -->
                </div> <!-- /.col-md-3 -->

                <div class="col-sm-6 col-md-3 hidden-xs">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-content">
                            <div class="visual red">
                                <i class="icon-user"></i>
                            </div>
                            <div class="title">Visitors</div>
                            <div class="value">2 521 719</div>
                            <a class="more" href="javascript:void(0);">View More <i class="pull-right icon-angle-right"></i></a>
                        </div>
                    </div> <!-- /.smallstat -->
                </div> <!-- /.col-md-3 -->
            </div> <!-- /.row -->
            <!-- /Statboxes -->

            <!--=== Blue Chart ===-->
            <div class="row">
               @yield('content')
            </div> <!-- /.row -->
            <!-- /Blue Chart -->

            <div class="row">

            </div> <!-- /.row -->
            <!-- /Page Content -->
        </div>
        <!-- /.container -->

    </div>
</div>

</body>
</html>