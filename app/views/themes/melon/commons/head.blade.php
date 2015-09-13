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

    @if(isset($styles) && sizeof($styles) && is_array($styles))
        @foreach($styles as $css)
            <link rel="stylesheet" href="{{asset($css)}}">
            @endforeach
            @endif

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

            @if(isset($javascripts) && sizeof($javascripts) && is_array($javascripts))
                @foreach($javascripts as $js)
                    <script type="text/javascript" src="{{asset($js)}}"></script>
                @endforeach
            @endif

            @yield('scripts')

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
