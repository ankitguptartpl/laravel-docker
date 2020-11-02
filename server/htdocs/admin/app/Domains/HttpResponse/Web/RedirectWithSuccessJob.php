<?php

namespace App\Domains\HttpResponse\Web;

use Lucid\Foundation\Job;

/**
 * Class RedirectWithSuccessJob
 *
 * @purpose : This job redirect user to given route with a success message
 *
 * @created_by : Arif Khan
 * @created_at : 30th Oct, 2019 at 11.30 PM
 *
 * @package App\Domains\HttpResponse\Web
 */
class RedirectWithSuccessJob extends Job
{
    protected $redirect_route_name;
    protected $success_message;
    protected $route_param;

    /**
     * RedirectWithSuccessJob constructor.
     *
     * @purpose : This job redirect user to given route with a success message
     *
     * @created_by : Arif Khan
     * @created_at : 30th Oct, 2019 at 11.30 PM
     *
     * @param string $redirect_route_name a name route of laravel
     * @param string $success_message success message
     * @param array $route_param
     */
    public function __construct(string $redirect_route_name,string $success_message,$route_param=[])
    {
        $this->redirect_route_name=$redirect_route_name;
        $this->success_message=$success_message;
        $this->route_param=$route_param;
    }

    /**
     * handle()
     *
     * @purpose : This function redirect user to given route with a success message
     *
     * @created_by : Arif Khan
     * @created_at : 30th Oct, 2019 at 11.30 PM
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle()
    {
        if(!empty($this->success_message))
        {
            request()->session()->flash(config('custom-config.response.flash_message.flash_success_message_key'), $this->success_message);
        }

        return redirect()->route($this->redirect_route_name, $this->route_param);
    }
}
