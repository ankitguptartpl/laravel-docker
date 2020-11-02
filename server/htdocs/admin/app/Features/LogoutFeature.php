<?php

namespace App\Features;

use App\Domains\HttpResponse\Web\RedirectWithSuccessJob;
use Illuminate\Support\Facades\Auth;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

class LogoutFeature extends Feature
{
    /**
     * handle()
     *
     * @purpose : This function is used for logout user
     *
     * @created_by : Arif Khan
     * @created_at : 30th Oct, 2019 at 11.30 PM
     *
     * @param Request $request This is request object
     * @return \Illuminate\Http\Response
    */
    public function handle(Request $request)
    {
        Auth::logout();
        return $this->run(RedirectWithSuccessJob::class,[
            'redirect_route_name' => 'auth.login.view',
            'success_message' => __('auth.success_messages.logged_out_successfully'),
            'route_param' => []
        ]);
    }
}
