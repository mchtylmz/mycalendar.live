<?php

namespace App\Models;

use CodeIgniter\Model;

class EventSubscriberModel extends Model
{
    protected $table          = 'event_subscriber';
    protected $primaryKey     = 'id';
    protected $returnType     = 'App\Entities\EventSubscriberEntity';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
      'event_id', 'user_id', 'request_subscribe', 'request_message'
    ];
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules    = [
        'user_id'   => 'required|numeric',
        'event_id'  => 'required|numeric',
    ];
    protected $validationMessages = [];
    protected $skipValidation     = false;
    protected $allowCallbacks     = true;
    protected $beforeInsert       = [];
    protected $afterInsert        = [];
    protected $beforeUpdate       = [];
    protected $afterUpdate        = [];



}
