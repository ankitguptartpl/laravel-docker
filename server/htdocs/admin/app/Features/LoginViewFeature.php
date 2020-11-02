<?php

namespace App\Features;

use App\Domains\HttpResponse\Web\RedirectWithSuccessJob;
use App\Domains\HttpResponse\Web\ReturnWithViewJob;
use Illuminate\Support\Facades\Auth;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

/**
 * Class LoginViewFeature
 *
 * @purpose : This class is used for return login view
 *
 * @created_by : Arif Khan
 * @created_at : 30th Oct, 2019 at 11.30 PM
 *
 * @package App\Features
 */
class LoginViewFeature extends Feature
{
    /**
     * handle()
     *
     * @purpose : This function is used for return login view
     *
     * @created_by : Arif Khan
     * @created_at : 30th Oct, 2019 at 11.30 PM
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Http\Response
     */
    public function handle(Request $request)
    {
        // If User is Already Logged In
        if(Auth::user())
        {
            $after_login_redirect_url = config('custom-config.auth.after_login_redirect_url.super_admin');
            return $this->run(RedirectWithSuccessJob::class,[
                'redirect_route_name' => $after_login_redirect_url,
                'success_message' => '',
                'route_param' => []
            ]);
        }

        // Else Return Login View
        return $this->run(ReturnWithViewJob::class,[
            'template' => 'auth.login'
        ]);
    }
}
