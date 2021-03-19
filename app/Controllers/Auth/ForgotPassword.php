<?php

namespace App\Controllers\Auth;

use Exception;

class ForgotPassword extends Auth
{

	public function index()
	{
	    $data['PageTitle'] = lang('Auth.forgotPassword.title');
		return view('auth/forgot-password', $data);
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
        try {
            if (!$this->user->save($user))
                throw new Exception(lang('Auth.email.errorPasswordSendLink'));
        } catch (Exception $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
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
