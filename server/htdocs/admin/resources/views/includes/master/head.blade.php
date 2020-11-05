<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ??  config('app.name')}} </title>

    <!-- datatable cdn -->
    <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

    <!-- Bootstrap -->
    <link href="{{asset('theme/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('theme/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('theme/css/scroller.bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('theme/css/custom.min.css')}}" rel="stylesheet">

    <!-- App css -->
    <link rel="stylesheet" href="{{asset('theme/css/app.css')}}">
    @yield('page_styles')
</head>
