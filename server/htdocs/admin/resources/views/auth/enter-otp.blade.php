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
                <h2 class="title">Enter OTP</h2>
                <small class="subtext">Sent on your Email ID and Mobile App via Push Notification</small>
                <div class="input-fields-wrapper otpInput">
                    <div class="input-field d-flex">
                        <input type="text" maxlength="1">
                        <input type="text" maxlength="1">
                        <input type="text" maxlength="1">
                        <input type="text" maxlength="1">
                    </div>
                    <p class="d-flex justify-content-between align-items-center">
                        <span class="resend-code theme-color text-uppercase">resend code</span>
                        <span class="remaining-time">00:59</span>
                    </p>
                </div>
                <button type="button" class="btn btn-primary">Verify</button>
                <div class="text-center forgot-password">
                    <a href="" class="theme-color text-uppercase">back to login</a>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@stop
