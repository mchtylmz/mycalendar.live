<?php

namespace App\Controllers\Auth;

use \App\Controllers\BaseController;
use \App\Models\UserModel;

class Auth extends BaseController
{
	public function __construct()
	{
		$this->user = new UserModel();
	}

	public function index()
	{
		if (auth_check()) {
			return redirect()->route('my.calendar');
		}
		return redirect()->route('auth.login');
	}

	public function logout()
	{
		session()->destroy();
		return redirect()->route('auth.login');
	}
}
