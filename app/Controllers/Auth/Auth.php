<?php

namespace App\Controllers\Auth;

use \App\Controllers\BaseController;
use \App\Models\UserModel;

class Auth extends BaseController
{
    /**
     * @var UserModel
     */
    protected $user;

    public function __construct()
	{
		$this->user = new UserModel();
	}

	public function index()
	{
		if (auth_check()) {
			return redirect()->route('my.events');
		}
		return redirect()->route('auth.login');
	}
}
