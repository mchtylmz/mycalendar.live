<?php

namespace App\Controllers;

use \App\Models\UserModel;

class Auth extends BaseController
{
	public function __construct()
	{
		$this->user = new UserModel();
		d(
			$this->user->findAll()
		);
	}

	public function index()
	{
		if (auth_check()) {
			return redirect()->route('my_calendar');
		}
		return redirect()->route('login');
	}

	public function login()
	{
		return view('auth/login');
	}

	public function loginPost()
	{
		post_method();

		if (!$this->validate($this->user->getRule('login'))) {
			// error
			return redirect()->back()->withInput()->with('error', lang('Auth.login.error'));
		}

		$user = $this->user->login($this->request->getPost('email'), $this->request->getPost('password'));
		if (!$user) {
			// error
			return redirect()->back()->withInput()->with('error', lang('Auth.login.error'));
		}

		// new session
		session()->set([
			'logged_in'   => time(),
			'user_id'     => $user->id,
			'user_appkey' => $user->app_key
		]);

		// success
		return redirect()->route('my_calendar');
	}

	public function register()
	{
		return view('auth/register');
	}

	public function registerPost()
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
    return redirect()->route('login')->with('success', lang('Auth.register.success'));
	}

	public function forgotPassword()
	{
		return view('auth/forgot-password');
	}

	public function forgotPasswordPost()
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
		$sendEmail = $email->to('mucahityilmaz.mail@yandex.com')->reset_password_link([
			'fullname'    => $user->getFullname(),
			'reset_token' => $user->reset_token
		]);
		if (!$sendEmail) {
			// error
			return redirect()->back()->withInput()->with('error', lang('Auth.email.errorPasswordSendLink'));
		}
		// success
    return redirect()->route('login')->with('success', lang('Auth.forgotPassword.success'));
	}

	public function resetPassword(string $token)
	{
		$user = $this->user->where('reset_token',$token)->first();
		if (!$user) {
			return redirect()->to('forgot.password')->with('error', lang('Auth.invalidRequest'));
		}

		$data['pageTitle'] = 'Şifre Sıfırlama';

		return view('auth/reset-password', $data);
	}

	public function resetPasswordPost(string $token)
	{
		post_method();

		$getRule = $this->user->getRule('changePassword');
		if (!$this->validate($getRule)) {
			// error
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
    return redirect()->route('login')->with('success', lang('Auth.resetPassword.success'));
	}

	public function logout()
	{
		session()->destroy();
		return redirect()->route('login');
	}
}
