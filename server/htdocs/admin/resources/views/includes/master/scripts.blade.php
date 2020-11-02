<!-- Bootstrap -->
<script src="{{assets("theme/js/bootstrap.bundle.min.js")}}"></script>
<!-- NProgress -->
<script src="{{assets("theme/js/nprogress.js")}}"></script>
<!-- Custom Theme Scripts -->
<script src="{{assets("theme/js/custom.js")}}"></script>

<script>
    $(".alert").delay(5000).fadeOut();
</script>

<!-- show loader before loading of a page -->
<script type="text/javascript">
    $(document).ready(function() {
        $("#page-loader").fadeOut("slow");
    })
</script>

@yield('page_scripts')
