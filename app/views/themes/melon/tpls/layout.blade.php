@include('themes.melon.commons.head')
<body>
<!-- Header -->
@include('themes.melon.commons.header-main')
<div id="container">
    @include('themes.melon.commons.sidebar')
    <!-- /Sidebar -->
    <div id="content">
        <div class="container">
            <!-- Breadcrumbs line -->
                @include('themes.melon.commons.crumbs')
            <!-- /Breadcrumbs line -->
                @include('themes.melon.commons.header')
            <!--=== Page Content ===-->
            <!--=== Statboxes ===-->
               @include('themes.melon.mods.statbox')
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
@include("themes.melon.commons.config");
</body>
</html>