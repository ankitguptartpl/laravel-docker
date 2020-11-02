<!DOCTYPE html>
<html lang="en">

    <!-- Include <head> CSS / JS </head>  -->
    @include('includes.login.head')

    <body class="login">
    <div>

        <div class="login_wrapper">

            <!-- Add Success / Error flash Messages -->
            @include('includes.login.flash-messages')

            <!-- Yield Page content  -->
            @yield('content')

        </div>
    </div>

        <!-- Include Header logo and navigation  -->
        @include('includes.login.footer')

        @include('includes.login.scripts')

    </body>

</html>
