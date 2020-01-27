<!doctype html>
<html>
<head>
           <title>{{ $template['page_title'] }}</title>
        @include('template::admin-layouts.includes.meta')
        <!-- plugins css place after main css is loaded -->
            @yield('plugins-css')
</head>
<body class="skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
        <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
        <!--header start-->
        @include('template::admin-layouts.includes.header')

        <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
        <!--sidebar start-->
             @yield('left-sidebar-menu')


        <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
        <!--main content start-->

            @yield('content')

        <!-- **********************************************************************************************************************************************************
        MAIN FOOTER
        *********************************************************************************************************************************************************** -->
        <!--main footer start-->

        @include('template::admin-layouts.includes.footer')

        <!-- **********************************************************************************************************************************************************
        MAIN CONTROLLER SIDEBAR
        *********************************************************************************************************************************************************** -->
        <!--main controler-sidebar start-->
        @include('template::admin-layouts.includes.controler-sidebar')
</div>
        <!-- js placed at the end of the document so the pages load faster -->
        @include('template::admin-layouts.includes.scripts')

        <!-- plugins script place after maing js is loaded -->
            @yield('plugins-script')

</body>

{{-- <script type="text/javascript">

    $(document).ready(function(){
        alert("FYI: OLD PROGRAMMER NAG CODE NITONG GSO AAH!. hehehehehhe");

    });

</script> --}}
</html>