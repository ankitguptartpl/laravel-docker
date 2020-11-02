<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{csrf_token()}}" />
    <meta name="url" content="{{url('/').'/'}}" />
    <meta name="assets-url" content="{{assets('/')}}" />

    <title>{{config('app.name')}}</title>
    <link rel="icon" href="{{assets("theme/images/favicon.ico")}}" type="image/ico" />


    <!-- Bootstrap core CSS -->
    <link href="{{assets("theme/css/bootstrap.min.css")}}" rel="stylesheet">

    <!-- Font awesome styles -->
    <link href="{{assets("theme/css/font-awesome.min.css")}}" rel="stylesheet">

    <!-- NProgress -->
    <link href="{{assets("theme/css/nprogress.css")}}" rel="stylesheet">

    <!-- Animate.css -->
    <link href="{{assets("theme/css/animate.min.css")}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{assets("theme/css/custom.min.css")}}" rel="stylesheet">

    <!-- Custom Developer Style -->
    <link href="{{assets("theme/css/custom-dev.css")}}" rel="stylesheet">

    <!-- icheck css -->

    <!-- Toastr styles -->

    <!-- jQuery -->
    <script src="{{assets("theme/js/jquery.min.js")}}"></script>

    <!-- Bootstrap -->

    <!-- Sweet Alert JS -->

    <!-- Data tables -->

    <!-- Select 2 Dropdown -->

    <!-- Date Range Picker -->

    <!-- datepicker3 -->

    <!-- Theme styles -->

    <!-- Developer styles -->

    <!-- Javascript language JS(message) -->

    <!-- Toastr JS -->

    <!-- Select 2 Dropdown js -->

    <!-- Toastr JS -->

    <!-- Font Awesome styles -->

    <!-- Page styles -->
    @yield('page_styles')
</head>
