<?php

namespace App\Controllers;

use \App\Models\UserModel;

class Account extends BaseController
{
    /**
     * @var UserModel
     */
    protected $user;

    public function __construct()
	{
		$this->user = new UserModel();
		d(
		    auth_user()
        );
	}

	public function profile()
	{
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
			'phone' 	 => $this->request->getPost('phone'),
			'email' 	 => $this->request->getPost('email'),
		];
        // image
        if ($image = $this->request->getFile('image')) {
            if ($image->isValid() && !$image->hasMoved()) {
                $image->move(ROOTPATH . 'assets/uploads/users/', $image->getRandomName(), true);
                $new_data['image'] = 'users/' . $image->getName();
            }
        }

        try {
            if (!$this->user->save($new_data))
                return redirect()->back()->withInput()->with('errors', $this->user->errors());
        } catch (\ReflectionException $e) {
            return redirect()->back()->withInput()->with('error', lang('Account.error'));
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
