<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/login', 'AdminLoginController@showLoginForm')->name('admin.loginform');
Route::get('/admin/register', 'AdminLoginController@showRegisterForm')->name('admin.registerform');
Route::post('/admin/login', 'AdminLoginController@login')->name('admin.login');
Route::post('/admin/register', 'AdminLoginController@register')->name('admin.register');
Route::get('/admin/home', 'AdminLoginController@index')->middleware('auth:admin');
Route::get('/admin/logout', 'AdminLoginController@logout')->name('admin.logout');
