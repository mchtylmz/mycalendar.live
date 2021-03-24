<?php namespace App\Entities;

use CodeIgniter\Entity;

class CategoryEntity extends Entity
{
    public function getName()
	{
		return $this->attributes['name'];
	}
}
