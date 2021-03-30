<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table          = 'category';
    protected $primaryKey     = 'id';
    protected $returnType     = 'App\Entities\CategoryEntity';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['slug', 'name', 'color'];
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $validationRules    = [
        'slug'   => 'is_unique[category.slug,slug,{slug}]',
        'name'   => 'required|string|min_length[3]'
    ];
    protected $validationMessages = [];
    protected $skipValidation     = false;
    protected $allowCallbacks     = true;
    protected $beforeInsert       = ['slug'];
    protected $afterInsert        = [];
    protected $beforeUpdate       = ['slug'];
    protected $afterUpdate        = [];

    public function slug(array $data)
    {
      $data['data']['slug'] = generate_permalink($data['data']['slug'] ?? $data['data']['name']);
      // update slug
      return $data;
    }


}
