<!DOCTYPE html>
<html lang="en">
@include('includes.master.head')
<body class="nav-md">
<div class="container body">
    <div class="main_container">
    @include('includes.master.navigation')
    @include('includes.master.header')
        <div class="right_col" role="main">
            <div class="">
                @include('includes.master.flash-messages')
                @yield('content')
            </div>
        </div>
        @include('includes.master.footer')
    </div>
</div>
@include('includes.master.scripts')
</body>
</html>
