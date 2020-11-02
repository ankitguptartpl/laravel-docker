<?php

namespace App\Http\Controllers;

use App\Features\LoginViewFeature;
use App\Features\LoginFeature;
use App\Features\ForgotPasswordViewFeature;
use App\Features\ForgotPasswordFeature;
use App\Features\ResetPasswordViewFeature;
use App\Features\ResetPasswordFeature;
use App\Features\VerifyEmailViewFeature;
use App\Features\LogoutFeature;
use Lucid\Foundation\Http\Controller;

/**
 * Class AuthController
 *
 * @purpose : This controller is used for authentication purpose
 *
 * @created_by : Arif Khan
 * @created_at : 30th Oct, 2019 at 11.30 PM
 *
 * @package App\Http\Controllers
 */
class AuthController extends Controller
{
    /**
     * loginView()
     *
     * @purpose : This function is used for return login view
     *
     * @created_by : Arif Khan
     * @created_at : 30th Oct, 2019 at 11.30 PM
     *
     * @return \Illuminate\Http\Response
     */
    public function loginView()
    {
        return $this->serve(LoginViewFeature::class);
    }

    /**
     * login()
     *
     * @purpose : This function is used for authenticate user
     *
     * @created_by : Arif Khan
     * @created_at : 30th Oct, 2019 at 11.30 PM
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return $this->serve(LoginFeature::class);
    }

    /**
     * forgotPasswordView()
     *
     * @purpose : This function is used for return forgot password view
     *
     * @created_by : Arif Khan
     * @created_at : 30th Oct, 2019 at 11.30 PM
     *
     * @return \Illuminate\Http\Response
     */
    public function forgotPasswordView()
    {
        return $this->serve(ForgotPasswordViewFeature::class);
    }

    /**
     * forgotPassword()
     *
     * @purpose : This function is used for send forgot password email
     *
     * @created_by : Arif Khan
     * @created_at : 30th Oct, 2019 at 11.30 PM
     *
     * @return \Illuminate\Http\Response
     */
    public function forgotPassword()
    {
        return $this->serve(ForgotPasswordFeature::class);
    }

    /**
     * loginView()
     *
     * @purpose : This function is used for return reset password view
     *
     * @created_by : Arif Khan
     * @created_at : 30th Oct, 2019 at 11.30 PM
     *
     * @return \Illuminate\Http\Response
     */
    public function resetPasswordView()
    {
        return $this->serve(ResetPasswordViewFeature::class);
    }

    /**
     * resetPassword()
     *
     * @purpose : This function is used for reset password of user
     *
     * @created_by : Arif Khan
     * @created_at : 30th Oct, 2019 at 11.30 PM
     *
     * @return \Illuminate\Http\Response
     */
    public function resetPassword()
    {
        return $this->serve(ResetPasswordFeature::class);
    }

    /**
     * verifyEmailView()
     *
     * @purpose : This function is used for return verify email view
     *
     * @created_by : Arif Khan
     * @created_at : 30th Oct, 2019 at 11.30 PM
     *
     * @return \Illuminate\Http\Response
     */
    public function verifyEmailView()
    {
        return $this->serve(VerifyEmailViewFeature::class);
    }

    /**
     * logout()
     *
     * @purpose : This function is used for logout user
     *
     * @created_by : Arif Khan
     * @created_at : 30th Oct, 2019 at 11.30 PM
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        return $this->serve(LogoutFeature::class);
    }
}
