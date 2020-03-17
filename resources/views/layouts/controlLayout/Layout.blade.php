<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="ar">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <!--  HEAD META STATRS -->
@includeIf('layouts.controlLayout.components.header.header_meta')
<!--  HEAD META ENDS -->
@yield('style')
<!-- END HEAD -->
</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
<div class="page-wrapper">
    <!-- BEGIN HEADER -->
        @includeIf('layouts.controlLayout.components.header.header')
    <!-- END HEADER -->
    <!-- BEGIN HEADER & CONTENT DIVIDER -->
    <div class="clearfix"> </div>
    <!-- END HEADER & CONTENT DIVIDER -->
    <!-- BEGIN CONTAINER -->
    <div> <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
        <!-- BEGIN SIDEBAR -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    @includeIf('layouts.controlLayout.components.nav')
    <!-- END SIDEBAR -->
    </div>
    <!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            @yield('body')
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
    <!-- BEGIN QUICK SIDEBAR -->

    <!-- END QUICK SIDEBAR --><div class="page-container">
    </div>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
    @includeIf('layouts.controlLayout.components.footer.footer')
    <!-- END FOOTER -->
</div>
<!-- BEGIN QUICK NAV -->
<div class="quick-nav-overlay"></div>
<!-- END QUICK NAV -->
<!--[if lt IE 9]>
<!-- FOOTER META STATRS -->
@includeIf('layouts.ControlLayout.components.footer.footer_meta')
<!--  FOOTER META ENDS -->
@yield('script')
<!-- END THEME LAYOUT SCRIPTS -->
</body>

</html>