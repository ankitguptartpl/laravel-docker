<?php

namespace App\Domains\HttpResponse\Web;

use Lucid\Foundation\Job;

/**
 * Class ReturnWithViewJob
 *
 * @purpose : This job render a given view
 *
 * @created_by : Arif Khan
 * @created_at : 30th Oct, 2019 at 11.30 PM
 *
 * @package App\Domains\HttpResponse\Web
 */
class ReturnWithViewJob extends Job
{
    protected $status;
    protected $data;
    protected $headers;
    protected $template;

    /**
     * ReturnWithViewJob constructor.
     *
     * @purpose : This job render a given view
     *
     * @created_by : Arif Khan
     * @created_at : 30th Oct, 2019 at 11.30 PM
     *
     * @param $template
     * @param array $data
     * @param int $status
     * @param array $headers
     */
    public function __construct($template, $data = [], $status = 200, array $headers = [])
    {
        $this->template = $template;
        $this->data = $data;
        $this->status = $status;
        $this->headers = $headers;
    }

    /**
     * handle()
     *
     * @purpose : This job render a given view
     *
     * @created_by : Arif Khan
     * @created_at : 30th Oct, 2019 at 11.30 PM
     *
     * @return \Illuminate\Http\Response
     */
    public function handle()
    {
        return response()->view($this->template, $this->data, $this->status, $this->headers);
    }
}
