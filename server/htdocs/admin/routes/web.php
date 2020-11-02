<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/**-----------------------------< Start Admin route without Auth >---------------------------------*/

Route::get('/', ['as'=>'auth.login.view','uses' => 'AuthController@loginView']);
Route::post('/login',['as'=>'auth.login','uses' => 'AuthController@login']);

Route::get('/forgot-password',['as'=>'auth.forgot-password.view','uses' => 'AuthController@forgotPasswordView']);
Route::post('/forgot-password',['as'=>'auth.forgot-password','uses' => 'AuthController@forgotPassword']);

Route::get('/reset-password/{token}',['as'=>'auth.reset-password.view','uses' => 'AuthController@resetPasswordView']);
Route::post('/reset-password',['as'=>'auth.reset-password','uses' => 'AuthController@resetPassword']);

Route::get('/verify-email/{token}',['as'=>'auth.verify-email.view','uses' => 'AuthController@verifyEmailView']);

Route::get('/logout',['as'=>'auth.logout','uses' => 'AuthController@logout']);

/**-----------------------------< / End Admin route without Auth >---------------------------------*/

/*-------------------------------------------------------------------------------------------------*/

/**------------------------------< Start Admin route with Auth >-----------------------------------*/

Route::group(['middleware' => ['auth']], function() {

    Route::get('/dashboard',['as'=>'dashboard','uses' => 'DashboardController@dashboardView']);

});
/**------------------------------< / End Admin route with Auth >-----------------------------------*/
