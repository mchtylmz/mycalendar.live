<?php namespace App\Entities;

use CodeIgniter\Entity;
use \App\Models\UserModel;

class EventMessageEntity extends Entity
{
    public function getUser()
    {
        return user($this->attributes['user_id']);
    }

    public function getCreateDate()
    {
        return turkish_long_date('j F Y, H:i', $this->attributes['created_at']);
    }

}
