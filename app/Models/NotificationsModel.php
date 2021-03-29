<?php

namespace App\Models;

use CodeIgniter\Model;

class NotificationsModel extends Model
{
    protected $table          = 'notifications';
    protected $primaryKey     = 'id';
    protected $returnType     = 'App\Entities\NotificationEntity';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['user_id', 'message', 'link', 'is_read'];
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $validationRules    = [
        'user_id'   => 'required|numeric',
        'message'   => 'required|string|min_length[3]'
    ];
    protected $validationMessages = [];
    protected $skipValidation     = false;
    protected $allowCallbacks     = false;
    protected $beforeInsert       = [];
    protected $afterInsert        = [];
    protected $beforeUpdate       = [];
    protected $afterUpdate        = [];

    /**
     * @param array $data
     * @return bool
     */
    public function send(array $data): bool
    {
        try {
            notification()->save($data);
            return true;
        } catch (\ReflectionException $e) {
            return false;
        }
    }
}
