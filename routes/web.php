<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'namespace' => 'AdminAuth', 'middleware' => 'web', 'guard' => 'admin'], function () {

    # Authentication Routes...
    $this->get('login', 'LoginController@showLoginForm'); //Done
    $this->post('login', 'LoginController@login');
    $this->post('logout', 'LoginController@logout');

    # Registration Routes...
    $this->get('register', 'RegisterController@showRegistrationForm'); //Done
    $this->post('register', 'RegisterController@register'); //Done

    # Password Reset Routes...
    $this->post('password/email', 'ForgotPasswordController@sendResetLinkEmail');
    $this->get('password/reset', 'ForgotPasswordController@showLinkRequestForm');
    $this->post('password/reset', 'ResetPasswordController@reset');
    $this->get('password/reset/{token}', 'ResetPasswordController@showResetForm');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/admin-home', 'AdminHomeController@index');
