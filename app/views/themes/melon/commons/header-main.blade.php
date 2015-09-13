<header class="header navbar navbar-fixed-top" role="banner">
    <!-- Top Navigation Bar -->
    <div class="container">
        <!-- Only visible on smartphones, menu toggle -->
        <ul class="nav navbar-nav">
            <li class="nav-toggle"><a href="javascript:void(0);" title=""><i class="icon-reorder"></i></a></li>
        </ul>
        <!-- Logo -->
        <a class="navbar-brand" href="{{ Route('home') }}">
            {{--<img src="{{ asset('melon/img/logo.png')}}" alt="logo" />--}}
            <strong>AM</strong> SYSINVOICE
        </a>
        <!-- /logo -->
        <!-- Sidebar Toggler -->
        <a href="#" class="toggle-sidebar bs-tooltip" data-placement="bottom" data-original-title="Toggle navigation">
            <i class="icon-reorder"></i>
        </a>
        <!-- /Sidebar Toggler -->
        <!-- Top Left Menu -->
        {{--@include('themes.melon.navs.nav-left')--}}
        <!-- /Top Left Menu -->

        <!-- Top Right Menu -->
        @include('themes.melon.navs.nav-right')
                <!-- /Top Right Menu -->
    </div>
    <!-- /top navigation bar -->
    <!--=== Project Switcher ===-->
</header> <!-- /.header -->