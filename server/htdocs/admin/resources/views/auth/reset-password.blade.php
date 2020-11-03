@section('page_styles')
@stop
@extends('layouts.login-layout')
@section('content')
<div class="auth-container bgChange">
    <div class="auth-content">
        <!-- form -->
        {{ Form::open(['url' => '','id'=>'authentication','novalidate'=>true]) }}
        <img src="{{asset('theme/images/logo.png')}}" alt="logo" class="logo">
        <h2 class="title">Reset Password</h2>
        <small class="subtext">Enter your Registered Email Id to send you Password Reset instructions</small>
        <div class="input-fields-wrapper">
            <div class="input-field">
                {{Form::email('email_address',NULL,['placeholder'=>'Email ID','autofocus'])}}
            </div>
        </div>
        <button type="button" class="btn btn-primary">continue</button>
        <div class="text-center forgot-password">
            <a href="" class="theme-color text-uppercase">back to login</a>
        </div>
        {{ Form::close() }}
    </div>
</div>
@stop