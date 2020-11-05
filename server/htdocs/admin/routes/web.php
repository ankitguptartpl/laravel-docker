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
use App\Http\Controllers\CmsPagesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FaqController;

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

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function() {

    Route::get('dashboard',[DashboardController::class, 'dashboardView'])->name('dashboard');
    Route::get('cms-pages', [CmsPagesController::class, 'cmsPagesListView'])->name('cms.list');
    Route::match(['get','post'],'/cms-pages/edit/{id}', [CmsPagesController::class, 'cmsPagesEdit'])->name('cms.edit');
    Route::match(['get','post'],'/faqs/add', [FaqController::class, 'add'])->name('faq.add');
    Route::match(['get','post'],'/faqs/edit/{id}', [FaqController::class, 'edit'])->name('faq.edit');
    Route::get('faqs/list', [FaqController::class, 'list'])->name('faq.list');
    Route::get('faqs/delete/{id}', [FaqController::class, 'destroy'])->name('faq.delete');

});
/**------------------------------< / End Admin route with Auth >-----------------------------------*/
