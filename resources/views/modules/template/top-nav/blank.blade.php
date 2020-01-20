<!doctype html>
<html>
<head>
           <title>{{ $template['page_title'] }}</title>
        @include('template::top-nav.includes.meta')
        <!-- plugins css place after main css is loaded -->
            @yield('plugins-css')
</head>
<body class="hold-transition wysihtml5-supported skin-blue layout-top-nav">
<!-- Site wrapper -->
<div class="wrapper">
        <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
        <!--header start-->
        @include('template::top-nav.includes.header_blank')
        <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
        <!--main content start-->
            @yield('content')
        <!-- **********************************************************************************************************************************************************
        MAIN FOOTER
        *********************************************************************************************************************************************************** -->
        <!--main footer start-->

        @include('template::top-nav.includes.footer')

</div>
        <!-- js placed at the end of the document so the pages load faster -->
        @include('template::top-nav.includes.scripts')

        <!-- plugins script place after maing js is loaded -->
            @yield('plugins-script')

</body>
</html>