<!DOCTYPE html>
<html lang="ar" dir="rtl">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>

<!-- HEADER META STARTS->
    @include('base_layout.components.header.header_meta')
        <!-- HEADER META ENDS-->

    @yield('style')
</head>
<!-- END HEAD -->

<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
<div class="page-wrapper">
    <!-- BEGIN HEADER -->
@includeIf('base_layout.components.header.header')
<!-- END HEADER -->
    <!-- BEGIN HEADER & CONTENT DIVIDER -->
    <div class="clearfix"></div>
    <!-- END HEADER & CONTENT DIVIDER -->
    <!-- BEGIN CONTAINER -->
    <div class="page-container">
        <!-- BEGIN SIDEBAR -->
        <div class="page-sidebar-wrapper">
            <!-- BEGIN SIDEBAR -->
        @includeIf('base_layout.components.nav')
        <!-- END SIDEBAR -->
        </div>
        <!-- END SIDEBAR -->

    <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">

            <!-- BEGIN CONTENT BODY -->
            <div class="page-content">
                <!-- BEGIN PAGE HEADER-->
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{session('error')}}
                    </div>
                @elseif(session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
            @endif
            @yield('breadcrumb')
            @yield('body')
            <!-- END PAGE HEADER-->
            </div>
            <!-- END CONTENT BODY -->
        </div>
        <!-- END CONTENT -->
    </div>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
@includeIf('base_layout.components.footer.footer')
<!-- END FOOTER -->
</div>
<!-- BEGIN QUICK NAV -->

<!-- END QUICK NAV -->


<!-- FOOTER META STARTS -->
@includeIf('base_layout.components.footer.footer_meta')
<!-- FOOTER META ENDS -->
@yield('script')

</body>

</html>