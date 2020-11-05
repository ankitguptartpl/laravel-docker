<!DOCTYPE html>
<html lang="en">
@include('includes.master.head')
<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <!-- sidebar menu -->
            @include('includes.master.sidebar-menu')
            <!-- /sidebar menu -->

            <!-- top navigation -->
            @include('includes.master.top-navigation')
            <!-- /top navigation -->

            <div class="right_col" role="main">
            <!-- page content -->
            @include('includes.master.flash-messages')

            @yield('content')
            <!-- /page content -->
            </div>

{{--            @include('includes.master.footer')--}}
    </div>
</div>

@include('includes.master.scripts')
</body>
</html>
