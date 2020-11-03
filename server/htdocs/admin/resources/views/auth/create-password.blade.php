@section('page_styles')
@stop
@extends('layouts.login-layout')
@section('content')
    <div class="auth-container bgChange">
        <div class="auth-content">
            <!-- form -->
            {{ Form::open(['url' => '','id'=>'authentication','novalidate'=>true]) }}
                <img src="{{asset('theme/images/logo.png')}}" alt="logo" class="logo">
                <h2 class="title">Create Password</h2>
                <small class="subtext">Enter your new password</small>
                <div class="input-fields-wrapper">
                    <div class="input-field">
                        {{Form::password('password',['placeholder'=>'Enter New Password'])}}
                        <p class="validation-msg"></p>
                        <img src="{{asset('theme/images/eye.png')}}" alt="eye" class="eye-icon">
                    </div>
                    <div class="input-field">
                        {{Form::password('password',['placeholder'=>'Confirm Password'])}}
                        <p class="validation-msg"></p>
                        <img src="{{asset('theme/images/eye.png')}}" alt="eye" class="eye-icon">
                    </div>
                </div>
                <button type="button" class="btn btn-primary">create new password</button>
            {{ Form::close() }}
        </div>
    </div>
@stop
