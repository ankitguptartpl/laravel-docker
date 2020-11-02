@if(session('flash_success_message'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('flash_success_message') }}
    </div>
@endif
@if(session('flash_error_message'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        {{ session('flash_error_message') }}
    </div>
@endif
