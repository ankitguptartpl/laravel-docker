<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
</head>
<body style="background-color: #ffffff;width: 100%; margin:0;padding:0;-webkit-font-smoothing: antialiased;  ">
<table border="0" width="100%" cellpadding="0" cellspacing="0" style="font-family:Arial, Helvetica, sans-serif">
    <!-- ////// =========== START HEADER =========== //////  -->
    <!-- SPACE -->
    <tr>
        <td height="50"></td>
    </tr>
    <tr bgcolor="#FFF">
        <td width="100%" align="center" valign="top" bgcolor="ffffff"><!-- main content -->
            <table width="700" border="0" cellpadding="0" cellspacing="0" align="center" class="container top-header-left" bgcolor="#FFF">
                <!-- Header -->
                <tr>
                    <td>
                        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="FFFFFF" style="border: 2px solid #EEE; " >
                            @include('mail.includes.logo')
                            @include('mail.includes.header')
                            <!-- Yield Email content  -->
                            @yield('content')
                            @include('mail.includes.footer')
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td height="30"></td>
    </tr>
</table>
</body>
</html>

