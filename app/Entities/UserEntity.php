<?php

namespace App\Entities;

use CodeIgniter\Entity;

class UserEntity extends Entity
{

	public function getFullname()
	{
		return $this->attributes['first_name'] .' '. $this->attributes['last_name']; 
	}
}
