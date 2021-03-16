<?php

namespace App\Controllers;

use \App\Models\UserModel;

class Account extends BaseController
{
	public function __construct()
	{
		$this->user = new UserModel();
		d(
			$this->user->find(session('user_id'))
		);
	}

	public function profile()
	{
		d(
			session()->get()
		);
		$data['user'] = auth_user();

		return view('account/profile', $data);
	}

	public function updateProfile()
	{
		post_method();

		$getRule = $this->user->getRule('update');
		$this->user->setValidationRules($getRule);

		$new_data = [
			'id'  	     => clean_number(session('user_id')),
			'first_name' => $this->request->getPost('first_name'),
			'last_name'  => $this->request->getPost('last_name'),
			'phone' 	   => $this->request->getPost('phone'),
			'email' 	   => $this->request->getPost('email'),
		];
		if (!$this->user->save($new_data)) {
			// error
			return redirect()->back()->withInput()->with('errors', $this->user->errors());
		}
		dd(
			$path = $this->request->getFile('image')->store('users/', 'user_')
		);
		// image
		if ($image = $this->request->getFile('image')) {
			if (!$image->isValid()) {
				// image error
				return redirect()->back()->with('error', $image->getErrorString());
			}
			// upload
			$image->move(WRITEPATH . 'uploads/users', $image->getRandomName());
			// image update

d(
	$image->getName()
);
d(
	$image->getBasename()
);
d(
	$image->getPath()
);
			dd(
				$image
			);
		}

		// success
    return redirect()->back()->with('success', lang('Account.success'));
	}


	public function logout()
	{
		session()->remove(['user_id', 'user_appkey', 'logged_in']);
		session()->destroy();
		return redirect()->route('auth.login');
	}
}
