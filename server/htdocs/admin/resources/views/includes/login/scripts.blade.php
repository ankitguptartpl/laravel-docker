<!-- ---------------- Import Custom Ajax class ----------- -->
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
