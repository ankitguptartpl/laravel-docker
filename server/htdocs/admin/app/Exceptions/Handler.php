<?php

namespace App\Exceptions;

use App\Domains\Email\SendMailJob;
use Illuminate\Auth\AuthenticationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * report()
     *
     * Report or log an exception.
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param Throwable $exception
     * @throws Throwable
     */
    public function report(Throwable $exception)
    {
        $request = request();
        $error_handling_config = config('custom-config.response.exception-handling');

        if($exception instanceof HttpException)
        {
            $status_code = $exception->getStatusCode();
        }
        else
        {
            $status_code = $exception->getCode();
        }

        /**==================================================================================================*/
        /*------------------< Start Email Error Report if SEND_ERROR_EMAIL config in ON >-------------------*/

        if(!empty($error_handling_config['send_error_email']) && !in_array($status_code,$error_handling_config['dont_reported_error_codes']))
        {
            // Send Email of error reporting
            $email_data = array(
                'to' => $error_handling_config['error_report_to_email'],
                'cc' => $error_handling_config['error_report_cc_emails'],
                'subject' => config('app.name').' | '.__('response/exception-handling.error_reporting_email.subject').$error_handling_config['error_env'],
                'exception' => [
                    'code' => $status_code,
                    'file' => $exception->getFile(),
                    'line' => $exception->getLine(),
                    'message' => $exception->getMessage()
                ],
                'exception_description' => $exception,
                'request' => [
                    'method' => $request->getMethod(),
                    'url' => $request->getRequestUri(),
                    'param' => json_encode($request->all())
                ],
                'request_description' => $request,
                'user' => $request->user()
            );

            $mail = new SendMailJob($email_data,'mail.error-reporting');
            $mail->handle();
        }

        /*------------------< / End Email Error Report if SEND_ERROR_EMAIL config in ON >-------------------*/        /*------------------< Start Email Error Report if SEND_ERROR_EMAIL config in ON >-------------------*/

        parent::report($exception);
    }

    /**
     * render()
     *
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @param Throwable $exception
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response|\Symfony\Component\HttpFoundation\Response|void
     * @throws Throwable
     */
    public function render($request, Throwable $exception)
    {
        if ($request->expectsJson())
        {
            $http_status_code = config('custom-config.response.http-status-code.internal_server_error');
            $response = [
                'http_status_code' => $http_status_code,
                'error_code' => config('custom-config.response.error-code.internal_server_error'),
                'message' => $exception->getMessage(),
                'data' => null
            ];

            return response()->json($response, $http_status_code);
        }

        // Setup Error Pages here for Web Backend

        return parent::render($request, $exception);
    }

    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson())
        {
            $http_status_code = config('custom-config.response.http-status-code.unauthorized');

            $response = [
                'http_status_code' => $http_status_code,
                'error_code' => config('custom-config.response.error-code.invalid_access_token'),
                'message' => __('user/error-messages.invalid_access_token'),
                'data' => null
            ];

            return response()->json($response, $http_status_code);
        }

        // Redirect to login url from here
        return redirect()->route('auth.login.view');
    }
}
