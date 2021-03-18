<?php

namespace App\Controllers\Auth;

use Exception;

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
		try {
            if (!$this->user->save($user))
                return redirect()->back()->withInput()->with('errors', $this->user->errors());
        } catch (Exception $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }

        // success
        return redirect()->route('auth.login')->with('success', lang('Auth.register.success'));
	}
}
