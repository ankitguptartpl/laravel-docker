<?php

namespace App\Domains\HttpResponse\Api;

use Illuminate\Routing\ResponseFactory;
use Lucid\Foundation\Job;

/**
 * Class ReturnSuccessJob
 *
 * @purpose : This function return json success response with 200 https code and some data
 *
 * @created_by : Arif Khan
 * @created_at : 30th Oct, 2019 at 11.30 PM
 *
 * @package App\Domains\HttpResponse\Api
 */
class ReturnSuccessJob extends Job
{
    protected $http_status_code;
    protected $content;
    protected $headers;
    protected $options;

    /**
     * ReturnSuccessWithDataJob constructor.
     *
     * @purpose : This function return json success response with 200 https code and some data
     *
     * @created_by : Arif Khan
     * @created_at : 30th Oct, 2019 at 11.30 PM
     *
     * @param string $message message to be sent as response
     * @param array $data data to be sent as response
     */
    public function __construct($message,$data)
    {

        $this->http_status_code = config('custom-config.response.http-status-code.success');

        $this->content = [
            'http_status_code' => $this->http_status_code,
            'error_code' => null,
            'message' => $message,
            'data' => $data
        ];
    }

    /**
     * handle()
     *
     * @purpose : This function return json success response with 200 https code and some data
     *
     * @created_by : Arif Khan
     * @created_at : 30th Oct, 2019 at 11.30 PM
     * @param ResponseFactory $factory
     * @return \Illuminate\Http\JsonResponse
     */
    public function handle(ResponseFactory $factory)
    {
        return $factory->json($this->content, $this->http_status_code);
    }
}
