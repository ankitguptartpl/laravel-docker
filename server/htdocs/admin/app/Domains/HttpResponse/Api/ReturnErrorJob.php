<?php

namespace App\Domains\HttpResponse\Api;

use Lucid\Foundation\Job;
use Symfony\Component\HttpKernel\Exception\HttpException;

/**
 * Class ReturnErrorJob
 *
 * @purpose : This function return json error response with error https code and error data
 *
 * @created_by : Arif Khan
 * @created_at : 30th Oct, 2019 at 11.30 PM
 *
 * @package App\Domains\HttpResponse\Api
 */
class ReturnErrorJob extends Job
{
    protected $http_status_code;
    protected $content;
    protected $headers=[];
    protected $options;

    /**
     * ReturnExceptionErrorJob constructor.
     *
     * @purpose : This function return json error response with error https code and error data
     *
     * @created_by : Arif Khan
     * @created_at : 30th Oct, 2019 at 11.30 PM
     *
     * @param $e ( Exception object )
     */
    public function __construct($e)
    {
        // Set Specific Error
        $this->http_status_code = config('custom-config.response.http-status-code.internal_server_error');
        $error_code = config('custom-config.response.error-code.internal_server_error');

        // Get error message from exception object
        $error_message = $e->getMessage();

        // If Exception is throw manually the get http_status_code and error_code from header
        if($e instanceof HttpException)
        {
            $this->http_status_code = $e->getStatusCode();
            $headers = $e->getHeaders();
            if($headers['error_code']) $error_code=$headers['error_code'];
        }

        $this->content = [
            'http_status_code' => $this->http_status_code,
            'error_code' => $error_code,
            'message' => $error_message,
            'data' => null
        ];

        // Report error to exception handler for sending error mail
        report($e);
    }

    /**
     * handle()
     *
     * @purpose : This function return json error response with error https code and error data
     *
     * @created_by : Arif Khan
     * @created_at : 30th Oct, 2019 at 11.30 PM
     * @return \Illuminate\Http\JsonResponse
     */
    public function handle()
    {
        return response()->json($this->content, $this->http_status_code, $this->headers, $this->options);
    }
}
