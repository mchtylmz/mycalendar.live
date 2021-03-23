<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $returnType = 'App\Entities\UserEntity';
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'username', 'first_name', 'last_name', 'phone', 'email', 'role', 'image', 'about', 'facebook', 'twitter', 'instagram', 'youtube', 'linkedin', 'email_notification', 'sms_notification', 'event_upcoming', 'app_key', 'password', 'reset_token', 'last_seen'
    ];
    protected $useTimestamps = false;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    protected $validationRules = [];
    protected $dynamicRules = [
        'login' => [
            'username' => 'required|string|min_length[3]',
            'password' => 'required|min_length[6]'
        ],
        'insert' => [
            'username' => 'permit_empty|is_unique[users.username,username,{username}]',
            'first_name' => 'required|string|min_length[2]',
            'last_name' => 'required|string|min_length[2]',
            'email' => 'required|valid_email|is_unique[users.email,email,{email}]',
            'password' => 'required|min_length[6]',
        ],
        'update' => [
            'first_name' => 'string|min_length[2]',
            'last_name' => 'string|min_length[2]',
            'phone' => 'numeric|permit_empty',
            'email' => 'valid_email|is_unique[users.email,email,{email}]',
            'username' => 'is_unique[users.username,username,{username}]',
        ],
        'changePassword' => [
            'password' => 'required|min_length[6]',
            'repassword' => 'required|min_length[6]|matches[password]',
        ]
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $allowCallbacks = true;
    protected $beforeInsert = ['passwordHash', 'newAppkey', 'newUsername'];
    protected $beforeUpdate = ['passwordHash'];

    public function getRule(string $rule): array
    {
        return $this->dynamicRules[$rule];
    }

    public function passwordHash(array $data)
    {
        if (!isset($data['data']['password'])) {
            return $data;
        }
        $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        return $data;
    }

    public function newAppkey(array $data)
    {
        if (isset($data['data']['app_key'])) {
            return $data;
        }
        helper('text');
        $data['data']['app_key'] = random_string('alnum', 16);
        return $data;
    }

    public function newUsername(array $data)
    {
        if (isset($data['data']['username'])) {
            return $data;
        }
        $data['data']['username'] = generate_permalink(
            $data['data']['first_name'] .'-'. $data['data']['last_name'] .'-'. time()
        );
        return $data;
    }

    public function changePassword(int $id, string $password, string $repassword): bool
    {
        if ($password != $repassword) {
            return false;
        }
        try {
            return $this->update($id, ['password' => $password, 'reset_token' => null]);
        } catch (\ReflectionException $e) {
            return false;
        }
    }

    public function updateLastSeen(int $id): void
    {
        try {
            $this->update($id, ['last_seen' => date('Y-m-d H:i:s')]);
        } catch (\ReflectionException $e) {

        }
    }

    public function login(string $username_or_email, string $password)
    {
        $user = $this
            ->orWhere('email', clean_string($username_or_email))
            ->orWhere('username', clean_string($username_or_email))
            ->first();
        if (!$user || !password_verify($password, $user->password)) {
            // error
            return false;
        }
        // update last seen
        $this->updateLastSeen($user->id);
        // success
        return $user;
    }
}
