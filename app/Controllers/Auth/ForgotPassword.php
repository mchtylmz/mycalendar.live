<?php

namespace App\Controllers\Auth;

class ForgotPassword extends Auth
{

	public function index()
	{
		return view('auth/forgot-password');
	}

	public function post()
	{
		post_method();

		if (!$this->validate(['email' => 'required|valid_email'])) {
			// error
			return redirect()->back()->withInput()->with('error', lang('Auth.forgotPassword.email'));
		}

		$user = $this->user->where('email', $this->request->getPost('email'))->first();
		if (!$user) {
			// error
      return redirect()->back()->with('error', lang('Auth.forgotPassword.email'));
    }

		// reset token
		$user->reset_token = random_string('alnum', 24);
		if (!$this->user->save($user)) {
			// error
			return redirect()->back()->withInput()->with('error', lang('Auth.email.errorPasswordSendLink'));
		}

		// send reset password link
		$email = new \App\Libraries\Email;
		$sendEmail = $email->to($user->email)->reset_password_link([
			'fullname'    => $user->getFullname(),
			'reset_token' => $user->reset_token
		]);
		if (!$sendEmail) {
			// error
			return redirect()->back()->withInput()->with('error', lang('Auth.email.errorPasswordSendLink'));
		}
		// success
    return redirect()->route('auth.login')->with('success', lang('Auth.forgotPassword.success'));
	}

}
