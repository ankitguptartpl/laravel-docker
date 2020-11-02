<?php

namespace App\Domains\HttpResponse\Web;

use Lucid\Foundation\Job;
use Symfony\Component\HttpKernel\Exception\HttpException;

/**
 * Class RedirectWithErrorJob
 *
 * @purpose : This job redirect user to given route with a error message else redirect back to user
 *
 * @created_by : Arif Khan
 * @created_at : 30th Oct, 2019 at 11.30 PM
 *
 * @package App\Domains\HttpResponse\Web
 */
class RedirectWithErrorJob extends Job
{
    protected $redirect_route_name = null;
    protected $error_message;
    protected $route_param = [];

    /**
     * RedirectWithErrorJob constructor.
     *
     * @purpose : This job redirect user to given route with a error message else redirect back to user
     *
     * @created_by : Arif Khan
     * @created_at : 30th Oct, 2019 at 11.30 PM
     *
     * @param $e ( Exception object )
     */
    public function __construct($e)
    {
        // Get Error message from exception object
        $this->error_message = $e->getMessage();

        // If Exception is throw manually then get redirect_route_name and route_param from header
        if($e instanceof HttpException)
        {
            $headers = $e->getHeaders();
            if($headers['redirect_route_name']) $this->redirect_route_name=$headers['redirect_route_name'];
            if($headers['route_param']) $this->route_param=$headers['route_param'];
        }

        // Report error to exception handler for sending error mail
        report($e);
    }

    /**
     *
     * @purpose : This job redirect user to given route with a error message else redirect back to user
     *
     * @created_by : Arif Khan
     * @created_at : 30th Oct, 2019 at 11.30 PM
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle()
    {
        // Set Error message in flash session
        request()->session()->flash(config('custom-config.response.flash_message.flash_error_message_key'), $this->error_message);

        // If redirect_route_name is available or error generated manually then redirect user to set redirect route name
        if(!empty($this->redirect_route_name))
        {
            return redirect()->route($this->redirect_route_name, $this->route_param);
        }
        else
        {
            // Else send user to redirect back with some system error
            return redirect()->back();
        }
    }
}
