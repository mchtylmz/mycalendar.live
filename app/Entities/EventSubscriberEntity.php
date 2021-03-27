<?php namespace App\Entities;

use CodeIgniter\Entity;
use \App\Models\UserModel;

class EventSubscriberEntity extends Entity
{
    public function getUser()
    {
        $user_id = $this->attributes['user_id'];
        $cache_name = "users_{$user_id}";
        // is exists cache
        $user = cache($cache_name);
        if (!$user) {
            $user = (new UserModel())->where('id', $user_id)->first();
            if ($user)
                cache()->save($cache_name, $user, 1800);
        } // not found
        return $user;
    }
}
