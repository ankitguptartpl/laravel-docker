<?php

namespace App\Features;

use App\Data\Models\User;
use App\Domains\HttpResponse\Web\RedirectWithErrorJob;
use App\Domains\HttpResponse\Web\RedirectWithSuccessJob;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

/**
 * Class LoginFeature
 *
 * @purpose : This class is used for authenticate user
 *
 * @created_by : Arif Khan
 * @created_at : 30th Oct, 2019 at 11.30 PM
 *
 * @package App\Features
 */
class LoginFeature extends Feature
{
    /**
     * handle()
     *
     * @purpose : This class is used for authenticate user
     *
     * @created_by : Arif Khan
     * @created_at : 30th Oct, 2019 at 11.30 PM
     *
     * @param Request $request
     * @param LoginRequest $validation_rules
     * @return mixed
     */
    public function handle(Request $request, LoginRequest $validation_rules)
    {
        try
        {
            // Get request param values
            $email_address = $request->input('email_address');
            $password = $request->input('password');
            $current_login = $request->input('current_timezone');

            // Get User from database
            $user = User::where(['email_address'=>$email_address])->first();

            // Check if user exist in database and user is authenticated user
            if (empty($user) || !(Hash::check($password, $user->password)))
            {
                $error = [
                    'http_code' => config('custom-config.response.http-status-code.unauthorized'),
                    'error_code' => config('custom-config.response.error-code.invalid_credentials'),
                    'message' => __('auth.error_messages.invalid_credentials'),
                    'redirect_route_name' => 'auth.login.view',
                    'route_param' => []
                ];

                abort($error['http_code'], $error['message'], $error);
            }

            // Check if user blocked by admin
            if ($user->is_blocked == config('custom-config.auth.static_values.is_blocked.yes'))
            {
                $error = [
                    'http_code' => config('custom-config.response.http-status-code.unauthorized'),
                    'error_code' => config('custom-config.response.error-code.invalid_credentials'),
                    'message' => __('auth.error_messages.blocked_by_admin'),
                    'redirect_route_name' => 'auth.login.view',
                    'route_param' => []
                ];

                abort($error['http_code'], $error['message'], $error);
            }

            // Login User
            Auth::login($user);

            // set current timezone in session
            $request->session()->put('local_timezone',$current_login);

            // Redirect user to dashboard
            $after_login_redirect_url = config('custom-config.auth.after_login_redirect_url.super_admin');
            return $this->run(RedirectWithSuccessJob::class,[
                'redirect_route_name' => $after_login_redirect_url,
                'success_message' =>  __('auth.success_messages.logged_in_successfully'),
                'route_param' => []
            ]);
        }
        catch (\Exception $e)
        {
            // Return Error Response
            return $this->run(new RedirectWithErrorJob($e));
        }
    }
}
