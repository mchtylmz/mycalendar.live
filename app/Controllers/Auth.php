<?php

namespace App\Controllers;

class Auth extends BaseController
{
	public function index()
	{
		return $this->login();
	}

	public function login()
	{
		return view('auth/login');
	}

	public function login_post()
	{
		return redirect()->to('/auth/login')->withInput()->with('error', 'error');
	}

	public function register()
	{
		return view('auth/register');
	}

	public function forgotPassword()
	{
		return view('auth/forgot_password');
	}

	public function logout()
	{
		session()->destroy();
		return redirect()->to('/auth/login');
	}
}
