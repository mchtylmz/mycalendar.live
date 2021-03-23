<?php

namespace App\Controllers\Auth;

class Login extends Auth
{

	public function index()
	{
	    $data['PageTitle'] = lang('Auth.login.title');
		return view('auth/login', $data);
	}

	public function post()
	{
		post_method();

		if (!$this->validate($this->user->getRule('login'))) {
			return redirect()->back()->withInput()->with('error', lang('Auth.login.error'));
		}

		$user = $this->user->login($this->request->getPost('username'), $this->request->getPost('password'));
		if (!$user) {
			return redirect()->back()->withInput()->with('error', lang('Auth.login.error'));
		}

		// new session
		session()->set([
			'logged_in'   => time(),
			'user_id'     => $user->id,
			'user_appkey' => $user->app_key
		]);

		// success
		return redirect()->route('my.calendar');
	}

}
