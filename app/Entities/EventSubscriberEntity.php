<?php namespace App\Entities;

use CodeIgniter\Entity;
use \App\Models\UserModel;

class EventSubscriberEntity extends Entity
{
    public function getUser()
    {
        return user($this->attributes['user_id']);
    }
}
