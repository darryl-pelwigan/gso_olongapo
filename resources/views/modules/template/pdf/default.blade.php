<!doctype html>
<html>
<head>
           <title>{{ $template['page_title'] }} </title>
        @include('template::pdf.includes.meta')
        <!-- plugins css place after main css is loaded -->
            @yield('plugins-css')
</head>
<body>
@yield('header')

@yield('content')

@include('template::pdf.includes.scripts')

        <!-- plugins script place after maing js is loaded -->
@yield('plugins-script')

</body>
</html>
