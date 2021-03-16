<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table          = 'users';
    protected $primaryKey     = 'id';
    protected $returnType     = 'App\Entities\UserEntity';
    protected $useSoftDeletes = true;
    protected $allowedFields = [
      'first_name', 'last_name', 'phone', 'email', 'role', 'image', 'app_key', 'password', 'reset_token', 'last_seen'
    ];
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $dynamicRules       = [
      'login'   => [
        'email'       => 'required|valid_email',
        'password'    => 'required|min_length[6]'
      ],
      'insert'   => [
        'first_name'  => 'required|string|min_length[2]',
        'last_name'   => 'required|string|min_length[2]',
        'email'       => 'required|valid_email|is_unique[users.email,email,{email}]',
        'password'    => 'required|min_length[6]'
      ],
      'update'   => [
        'first_name'  => 'string|min_length[2]',
        'last_name'   => 'string|min_length[2]',
        'phone'       => 'numeric|permit_empty',
        'email'       => 'valid_email|is_unique[users.email,email,{email}]',
      ],
      'changePassword' => [
        'password'    => 'required|min_length[6]',
        'repassword'  => 'required|min_length[6]|matches[password]',
      ]
    ];
    protected $validationMessages = [];
    protected $skipValidation     = false;
    protected $allowCallbacks     = true;
    protected $beforeInsert       = ['passwordHash', 'newAppkey'];
    protected $beforeUpdate       = ['passwordHash'];

    public function getRule(string $rule) : array
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

    public function changePassword(int $id, string $password, string $repassword) : bool
    {
      if ($password != $repassword) {
        return false;
      }
      return $this->update($id, ['password' => $password, 'reset_token' => null]) ? true:false;
    }

    public function updateLastSeen(int $id) : void
    {
      $this->update($id, ['last_seen' => date('Y-m-d H:i:s')]);
    }

    public function login(string $email, string $password)
    {
      $user = $this->where('email', $email)->first();
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
