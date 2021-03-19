<?php

namespace App\Controllers\Auth;

class ResetPassword extends Auth
{

	public function get(string $token)
	{
		$user = $this->user->where('reset_token', $token)->first();
		if (!$user) {
			return redirect()->to('auth.forgotpassword')->with('error', lang('Auth.invalidRequest'));
		}

		$data['PageTitle'] = lang('Auth.resetPassword.title');

		return view('auth/reset-password', $data);
	}

	public function post(string $token)
	{
		post_method();

		$getRule = $this->user->getRule('changePassword');
		if (!$this->validate($getRule)) {
			return redirect()->back()->withInput()->with('error', lang('Auth.resetPassword.passwordMismatch'));
		}

		$user = $this->user->where('reset_token', $token)->first();
		if (!$user) {
			return redirect()->back()->withInput()->with('error', lang('Auth.invalidRequest'));
		}

		if (!$this->user->changePassword($user->id, $this->request->getPost('password'), $this->request->getPost('repassword'))) {
			// error
			return redirect()->back()->withInput()->with('errors', $this->user->errors());
		}

		// success
        return redirect()->route('auth.login')->with('success', lang('Auth.resetPassword.success'));
	}
}
