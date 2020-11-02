<?php

return [

    /*
    |--------------------------------------------------------------------------
    | SEND_ERROR_REPORT_EMAILS
    |--------------------------------------------------------------------------
    |
    | This config is use to ON/OFF send email when any email occur in system
    |
    |
    */

    'send_error_email' => env('SEND_ERROR_EMAIL',0),


    /*
    |--------------------------------------------------------------------------
    | ERROR_REPORT_EMAILS
    |--------------------------------------------------------------------------
    |
    | This config is use to set emails . When any error occure in system
    | then system send email notifications to these emails
    |
    |
    */

    'error_report_to_email' => 'arif.khan@ranosys.com',

    'error_report_cc_emails' => [
        'arif.khan@ranosys.com'
    ],


    /*
    |--------------------------------------------------------------------------
    | APP_ENV
    |--------------------------------------------------------------------------
    |
    | This config is define error env of email error report
    |
    |
    */

    'error_env' => env('APP_ENV','local'),

    /*
    |--------------------------------------------------------------------------
    | REPORTED_ERROR_CODES
    |--------------------------------------------------------------------------
    |
    | This config is define on which error code we need to send email error report
    |
    |
    */

    'dont_reported_error_codes' => [
        200,400,401,403,404,422,429
    ]

];
