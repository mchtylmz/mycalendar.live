<?php

namespace App\Entities;

use CodeIgniter\Entity;
use \App\Models\EventsModel;

class UserEntity extends Entity
{
    public function events(int $limit = 5)
    {
        $user_id = $this->attributes['id'];
        $cache_name = "userevents_{$limit}_{$user_id}";
        // is exists cache
        $user = cache($cache_name);
        if (!$user) {
            $user = (new EventsModel())
                ->where('owner', $user_id)
                ->orderBy('start_date', 'ASC');
            if (!auth_check()) {
                $user->where('status', '2');
            }
            $user = $user->findAll($limit);
            if ($user)
                cache()->save($cache_name, $user, 1800);
        } // not found
        return $user;
    }

	public function getFullname()
	{
		return $this->attributes['first_name'] .' '. $this->attributes['last_name'];
	}

	public function getImage()
	{
		if ($this->attributes['image']) {
			return uploads_url($this->attributes['image']);
		}
		return get_gravatar($this->attributes['email']);
	}
}
