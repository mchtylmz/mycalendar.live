<?php

namespace App\Models;

use CodeIgniter\Model;

class EventsModel extends Model
{
    protected $table          = 'events';
    protected $primaryKey     = 'id';
    protected $returnType     = 'App\Entities\EventsEntity';
    protected $useSoftDeletes = true;
    protected $allowedFields = [
      'slug', 'title', 'content', 'owner', 'status', 'location', 'location_text', 'message_status', 'subscribe_status', 'start_date', 'end_date', 'start_time', 'end_time'
    ];
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $dynamicRules       = [
      'insert'   => [
        'title'  => 'required|string|min_length[3]|max_length[300]',
        'owner'  => 'required|numeric',
        'slug'   => 'string|permit_empty|max_length[300]'
      ],
      'update'   => [
        'title'  => 'string|min_length[3]|max_length[300]',
        'owner'  => 'numeric',
        'slug'   => 'string|max_length[300]'
      ]
    ];
    protected $validationMessages = [];
    protected $skipValidation     = false;
    protected $allowCallbacks     = true;
    protected $beforeInsert       = ['slug'];
    protected $afterInsert        = [];
    protected $beforeUpdate       = ['slug'];
    protected $afterUpdate        = [];
    protected $afterDelete        = ['clear'];

    public function getRule(string $rule) : array
  	{
  		return $this->dynamicRules[$rule];
  	}

    public function slug(array $data)
    {
      if (!isset($data['data']['slug'])) {
        $data['data']['slug'] = generate_permalink($data['data']['title']);
      }
      $data['data']['slug'] = generate_permalink($data['data']['slug']);
      // update slug
      return $data;
    }

    public function clear(array $data)
    {
      if (isset($data['purge']) && $data['purge']) {
          $event_id = intval($data['id'] ?? 0);
        // meta ve message sil
      }
      return $data;
    }

}
