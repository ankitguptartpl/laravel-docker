@extends('mail.layout.layout')
@section('header_content')
    Dear Team,
@endsection
@section('content')
    <tr>
        <td valign="top" colspan="2"  height="20" style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#373737; padding:5px 5px 5px 25px;">
            We have getting an error in {{config('app.name')}}
        </td>
    </tr>
    <tr>
        <td valign="top" colspan="2" height="20" style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#373737; padding:5px 5px 5px 25px;">
            <b>Request URL : </b> <pre> {{$email_data['request']['method']." ".$email_data['request']['url']}}</pre>
        </td>
    </tr>
    <tr>
        <td valign="top" colspan="2" height="20" style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#373737; padding:5px 5px 5px 25px;">
            <b>Request Params : </b>
            <pre>
                {{$email_data['request']['param']}}
            </pre>
        </td>
    </tr>
    <tr>
        <td valign="top" colspan="2" height="20" style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#373737; padding:5px 5px 5px 25px;">
            <b>User : </b>
            <pre>
                {{$email_data['user']}}
            </pre>
        </td>
    </tr>
    <tr>
        <td valign="top" colspan="2" height="20" style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#373737; padding:5px 5px 5px 25px;">
            <b>Error Status Code : </b> <pre> {{$email_data['exception']['code']}} </pre>
        </td>
    </tr>
    <tr>
        <td valign="top" colspan="2" height="20" style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#373737; padding:5px 5px 5px 25px;">
            <b>Error File name : </b> <pre> {{$email_data['exception']['file']}} </pre>
        </td>
    </tr>
    <tr>
        <td valign="top" colspan="2" height="20" style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#373737; padding:5px 5px 5px 25px;">
            <b>Error Line No : </b> <pre> {{$email_data['exception']['line']}} </pre>
        </td>
    </tr>
    <tr>
        <td valign="top" colspan="2" height="20" style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#373737; padding:5px 5px 5px 25px;">
            <b>Error : </b><pre> {{$email_data['exception']['message']}} </pre>
        </td>
    </tr>
    <tr>
        <td valign="top" colspan="2" height="20" style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#373737; padding:25px 0px 25px 25px;" colspan="2">
            <b>Request Description : </b>
            <pre>
                {{$email_data['request_description']}}
            </pre>
        </td>
    </tr>
    <tr>
        <td valign="top" colspan="2" height="20" style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#373737; padding:25px 0px 25px 25px;" colspan="2">
            <b>Exception Description : </b>
            <pre>
                {{$email_data['exception_description']}}
            </pre>
        </td>
    </tr>
@endsection
