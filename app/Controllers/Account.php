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
    }

    public function profile(string $username)
    {
        if (auth_check() && $username == auth_user()->username) {
            $user = auth_user();
        } else {
            $user = $this->user->where('username', clean_string($username))->first();
            if (!$user)
                return redirect()->to('/');
        }

        $data['PageTitle'] = $user->getFullname();
        $data['User'] = $user;
        return view('account/profile', $data);
    }

    public function updateProfile()
    {
        $data['PageTitle'] = auth_user()->getFullname();
        return view('account/update-profile', $data);
    }

    public function updateProfilePost()
    {
        post_method();

        $getRule = $this->user->getRule('update');
        $this->user->setValidationRules($getRule);

        $new_data = [
            'id' => clean_number(session('user_id')),
            'username' => $this->request->getPost('username'),
            'first_name' => $this->request->getPost('first_name'),
            'last_name' => $this->request->getPost('last_name'),
            'phone' => $this->request->getPost('phone'),
            'email' => $this->request->getPost('email'),
            'about' => $this->request->getPost('content'),
            'facebook' => $this->request->getPost('facebook'),
            'twitter' => $this->request->getPost('twitter'),
            'instagram' => $this->request->getPost('instagram'),
            'whatsapp' => $this->request->getPost('whatsapp'),
            'telegram' => $this->request->getPost('telegram'),
            'discord' => $this->request->getPost('discord'),
            'youtube' => $this->request->getPost('youtube'),
            'linkedin' => $this->request->getPost('linkedin'),
            'event_upcoming' => intval($this->request->getPost('event_upcoming') ?? 7),
            'email_notification' => $this->request->getPost('email_notification') ? '1' : '0',
            'sms_notification' => $this->request->getPost('sms_notification') ? '1' : '0',
            'phone_privacy' =>  intval($this->request->getPost('phone_privacy') ?? '0'),
            'wa_privacy' => intval($this->request->getPost('wa_privacy')  ?? '0')
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
        // cache clean
        cache()->clean();
        // success
        return redirect()->back()->with('success', lang('Account.success'));
    }

    public function changePassword()
    {
        $data['PageTitle'] = auth_user()->getFullname();

        return view('account/change-password', $data);
    }

    public function changePasswordPost()
    {
        post_method();

        if (!password_verify($this->request->getPost('oldpassword'), auth_user()->password)) {
            return redirect()->back()->with('error', lang('Account.changePassword.oldPasswordNotVerify'));
        }

        $getRule = $this->user->getRule('changePassword');
        if (!$this->validate($getRule)) {
            return redirect()->back()->with('error', lang('Account.changePassword.passwordMismatch'));
        }

        $change = $this->user->changePassword(
            auth_user()->id,
            $this->request->getPost('password'),
            $this->request->getPost('repassword')
        );
        if (!$change)
            return redirect()->back()->with('errors', $this->user->errors());
        // cache clean
        cache()->clean();
        // success
        return redirect()
            ->route('account.changePassword')
            ->with('success', lang('Account.changePassword.success'));
    }

    public function logout()
    {
        session()->remove(['user_id', 'user_appkey', 'logged_in']);
        session()->destroy();
        return redirect()->to('/');
    }
}
