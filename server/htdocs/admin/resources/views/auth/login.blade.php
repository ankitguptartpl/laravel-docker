@section('page_styles')
@stop
@extends('layouts.login-layout')
@section('content')
    <div class="animate form login_form">
        <section class="login_content">
            <a href="{{url('/')}}" class="">
                <img src="{{asset('public/frontend/images/logo1.png')}}" alt="{{config('app.name')}} Logo"
                     title="{{config('app.name')}}">
            </a>
            {{ Form::open(['url' => route('auth.login'),'id'=>'authentication','class'=>'form-signin','novalidate'=>true]) }}
            <h1>Admin Login</h1>
            <div>
                {{Form::email('email_address',NULL,['class'=>'form-control','placeholder'=>'Please Enter Email','autofocus'])}}
                <div class="error">{{ $errors->first('email_address') }}</div>
            </div>
            <div>
                {{Form::password('password',['class'=>'form-control','placeholder'=>'Please Enter Password'])}}
                <div class="error">{{ $errors->first('password') }}</div>
            </div>
            {{Form::hidden('current_timezone',NULL,['id'=>'current-timezone'])}}
            <div>
                <button class="btn btn-primary col-md-12 submit" type="submit">Log in</button>
            </div>

            <div class="clearfix"></div>

            <div class="separator">
                <p class="change_link">Forgot Password?
                    <a href="{{route('auth.forgot-password.view')}}" class="to_register"> Click here to reset </a>
                </p>
                <div>
                    <p>{{'©'.date('Y').' All Rights Reserved '.config('app.name')}}</p>
                </div>
            </div>
            </form>
        </section>
    </div>
@stop
@section('page_scripts')
    <script src="{{assets("custom/js/get-timezone.js")}}"></script>
    <script type="text/javascript">
        $(function() {
            let tz = jstz.determine();
            let timezone = tz.name();
            $('#current-timezone').val(timezone);
        });
    </script>
@stop
