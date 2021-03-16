<?php

namespace App\Entities;

use CodeIgniter\Entity;

class UserEntity extends Entity
{

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

	public function updateLastSeen()
	{
		$this->attributes['last_seen'] = date('Y-m-d H:i:s');

	}
}
