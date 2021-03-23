<?php

namespace App\Controllers\Auth;

use Exception;
use \App\Libraries\Email;

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

		if (!$this->validate(['username' => 'required|string|min_length[3]'])) {
			return redirect()->back()->withInput()->with('error', lang('Auth.forgotPassword.email'));
		}

		$user = $this->user
            ->orWhere('email', clean_string($this->request->getPost('username')))
            ->orWhere('username', clean_string($this->request->getPost('username')))
            ->first();
		if (!$user) {
            return redirect()->back()->with('error', lang('Auth.forgotPassword.email'));
        }

		// reset token
		$user->reset_token = random_string('alnum', 27);
        try {
            if (!$this->user->save($user))
                throw new Exception(lang('Auth.email.errorPasswordSendLink'));
        } catch (Exception $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }

        // send reset password link
		$email = new Email;
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
