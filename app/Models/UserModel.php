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
      'first_name', 'last_name', 'phone', 'email', 'role', 'image', 'app_key', 'password', 'last_seen'
    ];
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $dynamicRules       = [
      'insert'   => [
        'first_name'  => 'required|alpha_space|min_length[2]',
        'last_name'   => 'required|alpha_space|min_length[2]',
        'phone'       => 'numeric|min_length[5]',
        'email'       => 'required|valid_email|is_unique[users.email,id,{id}]',
        'password'    => 'required|min_length[6]'
      ],
      'update'   => [
        'id'	        => 'required|is_natural_no_zero',
        'first_name'  => 'alpha_space|min_length[2]',
        'last_name'   => 'alpha_space|min_length[2]',
        'phone'       => 'numeric',
        'email'       => 'valid_email|is_unique[users.email,id,{id}]',
      ],
      'changePassword' => [
        'id'	        => 'required|is_natural_no_zero',
        'password'    => 'required|min_length[6]',
        'repassword'  => 'required|min_length[6]|matches[password]',
      ],
      'changeImage' => [
        'id'	        => 'required|is_natural_no_zero',
        'image'       => 'required',
      ]
    ];
    protected $validationMessages = [];
    protected $skipValidation     = false;
    protected $allowCallbacks     = true;
    protected $beforeInsert       = ['password_hash', 'new_appkey'];
    protected $beforeUpdate       = ['password_hash'];

    public function get_rule(string $rule) : array
  	{
  		return $this->dynamicRules[$rule];
  	}

    public function password_hash(array $data)
    {
      if (!isset($data['data']['password'])) {
        return $data;
      }
      $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
      return $data;
    }

    public function new_appkey(array $data)
    {
      if (isset($data['data']['app_key'])) {
        return $data;
      }
      helper('text');
      $data['data']['app_key'] = random_string('alnum', 16);
      return $data;
    }

    public function change_password(int $id, string $password, string $repassword) : bool
    {
      if ($password != $repassword) {
        return false;
      }
      return $this->update($id, ['password' => $password]);
    }

    public function update_last_seen(int $id) : void
    {
      $this->update($id, ['last_seen' => date('Y-m-d H:i:s')]);
    }
}
