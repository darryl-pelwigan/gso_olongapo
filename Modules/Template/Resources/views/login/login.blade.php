<!doctype html>
<html>
<head>
           <title>{{ $template['page_title'] }}</title>
        @include('template::login.includes.meta')
        <!-- plugins css place after main css is loaded -->
            @yield('plugins-css')
</head>
<body class="hold-transition login-page">
<!-- Site wrapper -->
<div class="wrapper">

            @yield('content')


</div>
        <!-- js placed at the end of the document so the pages load faster -->
        @include('template::top-nav.includes.scripts')

        <!-- plugins script place after maing js is loaded -->
            @yield('plugins-script')

</body>
</html>