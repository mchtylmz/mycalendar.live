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

	public function loginPost()
	{
		return redirect()->to('/auth/login')->withInput()->with('error', 'error');
	}

	public function register()
	{
		return view('auth/register');
	}

	public function registerPost()
	{
		return redirect()->to('/auth/register')->withInput()->with('error', 'error');
	}

	public function forgotPassword()
	{
		return view('auth/forgotPassword');
	}

	public function forgotPasswordPost()
	{
		return redirect()->to('/auth/forgotPassword')->withInput()->with('error', 'error');
	}

	public function logout()
	{
		session()->destroy();
		return redirect()->to('/auth/login');
	}
}
