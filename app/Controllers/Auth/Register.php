<?php

namespace App\Controllers\Auth;

class Register extends Auth
{

	public function index()
	{
		return view('auth/register');
	}

	public function post()
	{
		post_method();

		$getRule = $this->user->getRule('insert');
		$this->user->setValidationRules($getRule);

		$user = [
			'first_name'  => $this->request->getPost('first_name'),
			'last_name'   => $this->request->getPost('last_name'),
			'email'       => $this->request->getPost('email'),
			'password'    => $this->request->getPost('password')
		];
		if (!$this->user->save($user)) {
			// error
			return redirect()->back()->withInput()->with('errors', $this->user->errors());
		}

		// success
    return redirect()->route('auth.login')->with('success', lang('Auth.register.success'));
	}
}
