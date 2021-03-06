<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@welcome');



//Basic User Routes
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('user')->group(function () {
    Route::post('/logout', 'Auth\LoginController@userLogout')->name('user.logout');
    Route::get('/profile', 'HomeController@show')->name('user.profile');
});

Route::group(['middleware' => 'auth'], function () {
    Route::post('/account/upgrade', 'SubscriptionController@accountUpgrade')->name('account.upgrade');
    Route::get('/account/upgrade/payment-form', 'SubscriptionController@paymentForm')->name('account.upgrade.form');
    Route::get('/account/upgrade/thankyou/{transaction_id}', 'SubscriptionController@thankyou')->name('thankyou');
});


// Socialite
Route::group(['prefix' => 'login', 'namespace' => 'Auth'], function () {
    //Google login
    Route::get('/google', 'LoginController@redirectToGoogle')->name('login.google');
    Route::get('/google/callback', 'LoginController@handleGoogleCallback');

    //Facebook login
    Route::get('/facebook', 'LoginController@redirectToFacebook')->name('login.facebook');
    Route::get('/facebook/callback', 'LoginController@handleFacebookCallback');

    //Facebook Github
    Route::get('/github', 'LoginController@redirectToGithub')->name('login.github');
    Route::get('/github/callback', 'LoginController@handleGithubCallback');
});



//Admin Routes
Route::group(['prefix' => 'portal/admin'], function () {

    Route::group(['middleware' => 'auth:admin', 'namespace' => 'Admin'], function () {
        //admin dashboard
        Route::get('/dashboard', 'AdminPagesController@index')->name('admin.dashboard');

        // Subscriptions
        Route::get('/subscriptions/pending', 'SubscriptionController@pending')->name('subscriptions.pending');
        Route::get('/subscriptions/approved', 'SubscriptionController@approved')->name('subscriptions.approved');
        Route::get('/subscriptions/denied', 'SubscriptionController@denied')->name('subscriptions.denied');
        Route::get('/subscriptions/expired', 'SubscriptionController@expired')->name('subscriptions.expired');

        //admin crud
        Route::resource('/users', 'AdminController');

        // Term CRUD
        Route::get('/terms/{id}/restore', 'TermController@restoreTerm')->name('terms.restore');
        Route::delete('/terms/{id}/force-delete', 'TermController@forceDelete')->name('terms.force-delete');
        Route::post('/terms/bulk-upload', 'TermController@bulkUpload')->name('terms.bulk-upload');
        Route::resource('terms', 'TermController');
    });

    Route::group(['namespace' => 'Auth'], function () {
        //admin login
        Route::post('/login', 'AdminLoginController@login');
        Route::get('/login', 'AdminLoginController@show')->name('admin.login');

        //admin logout
        Route::post('/logout', 'AdminLoginController@logout')->name('admin.logout');
        //admin password reset
        Route::get('/password/reset', 'AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
        Route::post('/password/email', 'AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
        Route::get('/password/reset/{token}', 'AdminResetPasswordController@showResetForm')->name('admin.password.reset');
        Route::post('/password/reset', 'AdminResetPasswordController@reset')->name('admin.password.update');

        Route::group(['middleware' => 'auth:admin'], function () {
            Route::get('/setpassword', 'SetPasswordController@create')->name('setpassword');
            Route::post('/setpassword', 'SetPasswordController@store')->name('setpassword.store');
        });
    });
});

//Invitation route
Route::get('/invitation/{user}', 'Admin\AdminController@invitation')->name('invitation');

