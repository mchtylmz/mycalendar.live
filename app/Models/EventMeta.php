<?php

namespace App\Models;

use CodeIgniter\Model;

class EventMeta extends Model
{
    protected $table          = 'event_meta';
    protected $primaryKey     = 'id';
    protected $returnType     = 'App\Entities\EventMetaEntity';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
      'event_id', 'name', 'value'
    ];
    protected $useTimestamps = false;
    protected $updatedField  = 'updated_at';

    protected $validationRules    = [];
    protected $dynamicRules       = [
      'insert'   => [
        'name'      => 'required|string|min_length[3]|max_length[500]',
        'event_id'  => 'required|numeric',
      ],
      'update'   => [
        'name'      => 'required|string|min_length[3]|max_length[500]',
        'event_id'  => 'numeric'
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
