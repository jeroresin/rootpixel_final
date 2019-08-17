<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdminLoginController extends Controller
{
     use AuthenticatesUsers;
     protected $redirectTo = '/admin/home';

public function __construct()
{
    $this->middleware('guest:admin')->except('logout')->except('index');
}

public function index(){
      return view('admin.home');
}

public function showLoginForm()
{
      return view('admin.auth.login');
}

public function showRegisterForm()
{
      return view('admin.auth.register');
}

public function username()
{
        return 'username';
}

protected function guard()
{
      return Auth::guard('admin');
}

public function register(Request $request)
{
      $request->validate([
          'username'      => 'required|string|unique:admins',
          'email'         => 'required|string|email|unique:admins',
          'password'      => 'required|string|min:6|confirmed'
      ]);
      \App\Admin::create($request->all());
      return redirect()->route('admin.registerform')->with('success', 'Successfully register!');
}
}
