@section('page_styles')
@stop
@extends('layouts.login-layout')
@section('content')
    <div class="animate form login_form">
        <div class="auth-container">
            <div class="auth-content">
                <!-- form -->
                {{ Form::open(['url' => route('auth.login'),'id'=>'authentication','novalidate'=>true]) }}
                    <img src="{{asset('theme/images/logo.png')}}" alt="logo" class="logo">
                    <h2 class="title">Hey there!</h2>
                    <small class="subtext">Welcome</small>
                    <div class="input-fields-wrapper">
                        <div class="input-field">
                            {{Form::email('email_address',NULL,['placeholder'=>'Email ID','autofocus'])}}
                            <p class="validation-msg"></p>
                        </div>
                        <div class="input-field">
                            {{Form::password('password',['placeholder'=>'Password'])}}
                            <p class="validation-msg"></p>
{{--                            <div class="error">{{ $errors->first('email_address') }}</div>--}}
                            <img src="{{asset('theme/images/eye.png')}}" alt="eye" class="eye-icon">
                        </div>
                    </div>
                    <div class="text-right forgot-link">
                        <a href="{{route('auth.forgot-password.view')}}" class="theme-color text-uppercase">Forgot Password?</a>
                    </div>
                    {{Form::hidden('current_timezone',NULL,['id'=>'current-timezone'])}}
                    <button type="button" class="btn btn-primary">sign in</button>
                </form>
            </div>
        </div>
    </div>
@stop
