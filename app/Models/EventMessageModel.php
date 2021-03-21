<?php

namespace App\Models;

use CodeIgniter\Model;

class EventMessageModel extends Model
{
    protected $table          = 'event_message';
    protected $primaryKey     = 'id';
    protected $returnType     = 'App\Entities\EventMessageEntity';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
      'event_id', 'user_id', 'message'
    ];
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules    = [];
    protected $dynamicRules       = [
      'insert'   => [
        'message'   => 'required|string|min_length[3]',
        'event_id'  => 'required|numeric',
        'user_id'   => 'required|numeric'
      ],
      'update'   => [
        'message'   => 'string|min_length[3]',
        'event_id'  => 'numeric',
        'user_id'   => 'numeric'
      ]
    ];
    protected $validationMessages = [];
    protected $skipValidation     = false;
    protected $allowCallbacks     = true;
    protected $beforeInsert       = [];
    protected $afterInsert        = [];
    protected $beforeUpdate       = [];
    protected $afterUpdate        = [];

    public function getRule(string $rule) : array
  	{
  		return $this->dynamicRules[$rule];
  	}


}
